<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table="faqs";
    use HasFactory;



    //Make sur we can fill all the fields on Mass assignement
    protected $guarded = [];
}
