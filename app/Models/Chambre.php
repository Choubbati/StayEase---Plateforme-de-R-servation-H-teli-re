<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
       protected $fillables =
    [
        'hotel_id', 'number', 'price_per_night', 'capacity', 'description'
    ];

    public function tags(){
        return $this->belongsToMany(Tag::class, 'chambres_tags');
    }
    public function properties(){
         return $this->belongsToMany(Properties::class,'chambres_properties');
    }
}
