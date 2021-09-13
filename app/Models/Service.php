<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prix', 'description'];

    public function packs(){
        return $this->belongsToMany(Pack::class)->withPivot('quantite');
    }

}