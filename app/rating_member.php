<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rating_member extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'images', 'point', 'note', 'delete_flg',
    ];
}
