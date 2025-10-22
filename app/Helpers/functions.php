<?php

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Route;

if (!function_exists('get_meta')) {

    function get_meta(): array
    {
        $meta = [];
        $route = Route::current();
        $routeName = $route->getName();

        $allMeta = config('meta.page', []);
        $meta = $allMeta[$routeName] ?? [];

        // dd(compact('routeName', 'allMeta', 'meta'));

        if (!empty($meta)) return $meta;

        if ($routeName == 'home') {
            $meta = config('meta.page.index');
        } elseif ($routeName == 'become_member' || strpos($routeName, 'membership') !== false) {
            $meta = config('meta.page.membership');
        } elseif ($routeName == 'private_gathering') {
            $meta = config('meta.page.private-gatherings');
        } elseif ($routeName == 'event_meetings') {
            $meta = config('meta.page.event-meetings');
        } elseif ($routeName == 'event_weddings_and_celebrations') {
            $meta = config('meta.page.weddings-celebrations');
        } elseif (strpos($routeName, 'event') !== false) {
            $meta = config('meta.page.events');
        } else {
            $meta = config('meta.page.index');
        }

        return $meta;
    }
}

if (!function_exists('get_gallery')) {

    function get_gallery(): array
    {
        return config('gallery');
    }
}

if (!function_exists('get_upcoming_events')) {

    function get_upcoming_events(array $columns = ['*'], ?string $date = null, int $limit = 3, ?string $order = 'ASC'): array|Collection
    {
        $query = Event::query();
        // $date = is_null($date) ? date('Y-m-d') : $date;

        $query->where('is_active', 1);

        if (!empty($date)) {
            $query->where(function (Builder $builder) use ($date) {
                $builder->whereDate('validity_start', '<=', $date);
                $builder->whereDate('validity_end', '>=', $date);
            });
        }

        $query->where(function (Builder $builder) {
            $builder->whereNull('validity_start', 'OR');
            $builder->whereNull('validity_end', 'OR');
        });

        $query
            ->orderBy('rank', $order)
            ->limit($limit);

        // dump($query->getQuery()->toSql());

        return $query->get($columns);
    }
}

if (!function_exists('get_asset')) {

    function get_asset(?string $path, ?string $default = null): string
    {
        if (empty($path) && $default) return $default;
        if (strpos($path, 'http') !== false) return $path;

        return asset($path);
    }
}

if (!function_exists('get_link')) {

    function get_link(string $link, array $parameters = []): string
    {
        $link = trim($link);
        if ($link == '#') {
            return $link;
        }

        if (strpos($link, 'http') !== false) {
            return $link;
        }

        if (strpos($link, 'ftp') !== false) {
            return $link;
        }

        return route($link, $parameters);
    }
}

if (!function_exists('format_time')) {

    function format_time(string $time, string $format = 'H.i'): string
    {
        $date = new DateTime($time);

        return $date->format($format);
    }
}

if (function_exists('is_spam')) {

    function is_spam(string $name, string $email, int $scoreRef = 4): bool
    {
        $score = 0;

        // Règle 1 : Analyse du ratio majuscules/minuscules dans chaque mot
        $words = explode(' ', $name);
        foreach ($words as $word) {
            if (empty($word)) continue;

            $uppercaseCount = preg_match_all('/[A-Z]/', $word);
            $lowercaseCount = preg_match_all('/[a-z]/', $word);
            $wordLength = strlen($word);

            // Format nom normal : première lettre majuscule, reste en minuscules
            $isNormalName = ($uppercaseCount === 1 && $word[0] === strtoupper($word[0]) &&
                $lowercaseCount === ($wordLength - 1));

            if (!$isNormalName) {
                // Si le mot a trop de majuscules par rapport aux minuscules
                if ($uppercaseCount > 1 && $lowercaseCount > 0) {
                    $score += 2;
                    // dump('le mot a trop de majuscules par rapport aux minuscules');
                }
                // Si le mot est tout en majuscules et long
                if ($uppercaseCount === $wordLength && $wordLength > 3) {
                    $score += 1;
                    // dump('le mot est tout en majuscules et long');
                }
            }

            // Pénaliser les mots vraiment longs
            if ($wordLength > 15) {
                $score += 1;
                // dump('mots vraiment longs');
            }
        }

        // Règle 2 : Vérifier la présence de consonnes consécutives
        if (preg_match('/[bcdfghjklmnpqrstvwxz]{5,}/i', $name)) {
            $score += 2;
            // dump('consonnes consécutives');
        }

        // Règle 3 : Vérifier les caractères spéciaux ou chiffres dans le nom
        if (preg_match('/[0-9\W]/', $name)) {
            $score += 2;
            // dump('caractères spéciaux ou chiffres dans le nom');
        }

        // Règle 4 : Analyse de l'email
        $localPart = strstr($email, '@', true);
        $domain = substr(strrchr($email, "@"), 1);

        // Vérifier si l'email suit un format courant pour un nom réel
        // (ex: prenom.nom, p.nom, prenom_nom, prenomnom)
        $isCommonEmailFormat = preg_match('/^[a-z]+\.?[a-z]*$/i', $localPart) ||
            preg_match('/^[a-z]\.[a-z]+$/i', $localPart) ||
            preg_match('/^[a-z]+_[a-z]+$/i', $localPart);

        if (!$isCommonEmailFormat) {
            // Vérifier les séquences de lettres aléatoires
            if (preg_match('/[a-z]{10,}/', $localPart)) {
                $score += 2;
                // dump('séquences de lettres aléatoires');
            }

            // Détecter les motifs numériques
            if (preg_match('/[0-9]{3,}/', $localPart)) {
                $score += 2;
                // dump('motifs numériques');
            }
        }

        // Vérifier les combinaisons de mots suspects dans l'email
        $spamWords = ['ghost', 'shadow', 'dark', 'cyber', 'phantom', 'umbra', 'glyph', 'wraith', 'sylvan'];
        foreach ($spamWords as $word) {
            if (stripos($localPart, $word) !== false) {
                $score += 2;
                // dump('combinaisons de mots suspects dans l\'email');
                break;
            }
        }

        // Vérifier les domaines populaires
        $popularDomains = ['yahoo.com', 'gmail.com', 'outlook.com', 'hotmail.com'];
        if (in_array($domain, $popularDomains)) {
            if (!$isCommonEmailFormat && strlen($localPart) > 12) {
                // dump(' domaines populaires');
                $score += 1;
            }
        }

        // dump('Score: ' . $score);

        // DEBUG: Afficher le score détaillé
        error_log("Name Analysis - Name: $name, Score: $score");
        error_log("Email Analysis - Email: $email, Score: $score");

        return $score > $scoreRef;
    }
}
