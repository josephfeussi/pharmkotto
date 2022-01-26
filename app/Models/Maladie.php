<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maladie extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function conseils(){
        return $this->belongsToMany(Conseil::class,'maladie_conseil');
    }


    public function users(){
        return $this->belongsToMany(User::class,'user_maladies');
    }
}
