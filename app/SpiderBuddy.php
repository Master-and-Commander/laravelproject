<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpiderBuddy extends Model
{
    //
    protected $primaryKey = 'spiderbuddy_id';

    protected $attributes = [
        'spider_id' => "",
        'user_id' => "",
        'setup_id' => "",
        'buddy_name' => "",
        'description' => "",
    ];
}
