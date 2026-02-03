<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['nom', 'ville', 'image','description','status', 'chambre_id'];
}
