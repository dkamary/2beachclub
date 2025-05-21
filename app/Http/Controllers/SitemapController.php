<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function generate(Request $request)
    {
        // Generate the sitemap here
        // You can use a package like spatie/laravel-sitemap or implement your own logic
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>
        <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Add your URLs here
        $sitemap .= $this->addUrl(route('home'), date('Y-m-d'), 'monthly', '1.0');
        $sitemap .= $this->addUrl(route('become_member'), date('Y-m-d'), 'monthly', '1.0');
        $sitemap .= $this->addUrl(route('events'), date('Y-m-d'), 'monthly', '1.0');
        $sitemap .= $this->addUrl(route('event_meetings'), date('Y-m-d'), 'monthly', '1.0');
        $sitemap .= $this->addUrl(route('private_gathering'), date('Y-m-d'), 'monthly', '1.0');
        $sitemap .= $this->addUrl(route('event_weddings_and_celebrations'), date('Y-m-d'), 'monthly', '1.0');
        $sitemap .= $this->addUrl(route('event', ['slug' => 'sunset-session']), date('Y-m-d'), 'monthly', '1.0');
        $sitemap .= $this->addUrl(route('event', ['slug' => 'saturday-sounds']), date('Y-m-d'), 'monthly', '1.0');
        $sitemap .= $this->addUrl(route('event', ['slug' => 'sunday-brunch']), date('Y-m-d'), 'monthly', '1.0');
        $sitemap .= $this->addUrl(route('menu_download'), date('Y-m-d'), 'monthly', '1.0');
        $sitemap .= $this->addUrl(route('menu_all_day_en'), date('Y-m-d'), 'monthly', '1.0');
        $sitemap .= $this->addUrl(route('menu_all_day_fr'), date('Y-m-d'), 'monthly', '1.0');
        $sitemap .= $this->addUrl(route('menu_sunset'), date('Y-m-d'), 'monthly', '1.0');
        $sitemap .= $this->addUrl(route('menu_sushi'), date('Y-m-d'), 'monthly', '1.0');
        $sitemap .= $this->addUrl(route('menu_kids'), date('Y-m-d'), 'monthly', '1.0');
        $sitemap .= $this->addUrl(route('newsletter_thankyou'), date('Y-m-d'), 'monthly', '1.0');

        // Add more URLs as needed

        $sitemap .= '
        </urlset>';

        file_put_contents(public_path('sitemap.xml'), $sitemap);

        return response()->json(['message' => 'Sitemap generated successfully']);
    }

    private function addUrl($url, $lastmod = null, $changefreq = null, $priority = null): string
    {
        return '<url>
            <loc>' . $url . '</loc>' .
                ($lastmod ? '<lastmod>' . $lastmod . '</lastmod>' : '') .
                ($changefreq ? '<changefreq>' . $changefreq . '</changefreq>' : '') .
                ($priority ? '<priority>' . $priority . '</priority>' : '') .
            '</url>';
    }
}
