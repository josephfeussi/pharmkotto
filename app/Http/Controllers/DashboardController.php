<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function userPage(){
        return view('dashboard.users',['users'=> User::with('profile')->get()]);
    }

    public function infoPage(){
        return view('dashboard.informations',['infos'=> User::all()]);
    }

    public function gardePage(){
        return view('dashboard.gardes',['gardes'=> User::all()]);
    }
}
