<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function countUser(){
        $users=User::all();
        $countUsers=$users->count();
    
          return view('dashboard' , compact('countUsers'));

    }
}
