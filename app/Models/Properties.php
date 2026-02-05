<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    protected $fillable =['nom'];

    public function chambres() { 
    return $this->belongsToMany(Chambre::class, 'chambre_properties'); 
    }
}

