<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperForm
 */
class Event extends Model
{
    use HasFactory;

    const TABLE_NAME = 'events';
    const FILLABLES = [
        'title',
        'slug',
        'subtitle',
        'content',
        'preview_text',
        'preview_img',
        'header_image',
        'book_link',
        'menu_link',
        'opening_time',
        'closing_time',
        'validity_start',
        'validity_end',
        'created_at',
        'updated_at',
        'is_active',
    ];

    protected $table = self::TABLE_NAME;
    protected $fillable = self::FILLABLES;
    protected $dates = [
        'created_at',
        'updated_at',
        'validity_start',
        'validity_end',
    ];
}
