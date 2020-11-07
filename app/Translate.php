<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translate extends Model
{
    public $timestamps = false;
    static public $languagesAccepts = ['en', 'ru', 'ar'];

    protected $fillable = [
        'lang', 'texttype', 'value',
    ];
}
