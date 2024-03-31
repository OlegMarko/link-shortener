<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $original_url
 * @property string $token
 * @property int $max_count
 * @property int $expiration_time
 */
class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_url',
        'token',
        'max_count',
        'redirect_count',
        'expiration_time',
    ];
}
