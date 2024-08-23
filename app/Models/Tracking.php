<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;

    const TABLE_NAME = 'tracking';

    const FILLABLE = [
        'id',
        'url',
        'event',
        'visitor_referral_url',
        'visitor_ip',
        'visitor_user_agent',
        'created_time',
    ];

    const UPDATED_AT = null;

    protected $table = self::TABLE_NAME;
    protected $fillable = self::FILLABLE;
}
