<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [ 'client_id', 'pack_id', 'user_id' ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pack(){
        return $this->belongsTo(Pack::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }
}