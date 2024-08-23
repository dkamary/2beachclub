<?php

namespace App\Managers;

use App\Models\Tracking;

class TrackingManager
{
    const PAGE_VIEW = 'page_view';
    const DOWNLOAD = 'download';
    const SUBMIT = 'submit';

    public static function track(string $url, ?string $event = self::PAGE_VIEW, ?string $referralUrl = null, ?string $ip = null, ?string $userAgent = null): Tracking
    {
        $data = [
            'url' => $url,
            'event' => $event,
            'visitor_referral_url' => $referralUrl ?? request()->headers->get('referer') ?? $_SERVER['HTTP_REFERER'] ?? null,
            'visitor_ip' => $ip ?? request()->ip() ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? null,
            'visitor_user_agent' => $userAgent ?? request()->userAgent() ?? $_SERVER['HTTP_USER_AGENT'] ?? null,
        ];

        $tracking = Tracking::create($data);

        return $tracking;
    }

    public static function pageView(string $url, ?string $referralUrl = null, ?string $ip = null, ?string $userAgent = null): Tracking
    {
        return self::track($url, self::PAGE_VIEW, $referralUrl, $ip, $userAgent);
    }

    public static function download(string $url, ?string $referralUrl = null, ?string $ip = null, ?string $userAgent = null): Tracking
    {
        return self::track($url, self::DOWNLOAD, $referralUrl, $ip, $userAgent);
    }

    public static function submit(string $url, ?string $referralUrl = null, ?string $ip = null, ?string $userAgent = null): Tracking
    {
        return self::track($url, self::DOWNLOAD, $referralUrl, $ip, $userAgent);
    }
}
