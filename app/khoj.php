<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class khoj extends Model
{
    protected $fillable = [
        'user_id', 'input_values', 'search_value'
    ];
}
