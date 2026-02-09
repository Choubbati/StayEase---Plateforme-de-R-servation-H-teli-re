<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Chambre;



class Hotel extends Model
{
    use HasFactory;

    protected $fillable  =['nom','description', 'ville','manager_id', 'image','status'];

    public function chambres(): HasMany
    {
        return $this->hasMany(Chambre::class);
    }
    public function manager(){
        // return $this->belongsTo(\App\Model\User::class,'manager_id');
        return $this->belongsTo(\App\Models\User::class, 'manager_id');
    }
}
