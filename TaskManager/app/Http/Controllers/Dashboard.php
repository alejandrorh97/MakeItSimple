<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function index()
    {

        //$tasks = User::find($id)->tasks;
        //get user by id
        //$user = User::find($id);
        if (Auth::user()->role != 'user') {
            $usuarios = User::all();
            return view('dashboard', compact('usuarios'));
        } else {
            //post to url
            return view('Error');
        }
    }
}
