<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Service;

class Pack extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prix', 'description'];

    public function services(){
        return $this->belongsToMany(Service::class);
    }

    public function commandes(){
        return $this->hasMany(Commande::class);
    }



}