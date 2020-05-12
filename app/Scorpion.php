<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scorpion extends Model
{
    //
    protected $primaryKey = 'scorpion_id';

    protected $attributes = [
        'species_name' => "",
        'family_name' => "",
        'common_names' => "",
        'description' => "",
        'habitat' => "",
        'venom' => false,
        'order' => "",
    ];

}
