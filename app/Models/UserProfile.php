<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserProfile extends Model
{
    use HasFactory;

    //Make sur we can fill all the fields on Mass assignement
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /*  public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    } */

    public function getInitialsAttribute()
    {
        return ucfirst($this->first_name[0]) . ucfirst($this->last_name[0]);
    }


    public function getRulesArray(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string',
            'excerpt' => 'nullable|string|max:160',
            'published_at' => 'nullable|date',
        ];
    }
}
