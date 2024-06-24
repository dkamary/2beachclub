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

        if ($routeName == 'home') {
            $meta = config('meta.page.index');
        } elseif (strpos($routeName, 'event') !== false) {
            $meta = config('meta.page.events');
        } elseif ($routeName == 'become_member' || strpos($routeName, 'membership') !== false) {
            $meta = config('meta.page.membership');
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
        $date = is_null($date) ? date('Y-m-d') : $date;

        $query->where(function(Builder $builder) use($date) {
            $builder->whereDate('validity_start', '<=', $date);
            $builder->whereDate('validity_end', '>=', $date);
        });

        $query->whereNull('validity_start', 'OR');
        $query->whereNull('validity_end', 'OR');

        $query
        ->orderBy('rank', $order)
        ->limit($limit);

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
