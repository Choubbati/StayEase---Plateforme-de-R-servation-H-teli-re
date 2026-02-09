<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    protected $fillable =  ['name', 'slug'];
    public function chambres(){
        return $this->belongsToMany(Chambre::class, 'chambres_tags');
    }
}
