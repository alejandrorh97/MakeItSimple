<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Dashboard extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('dashboard' , compact('usuarios'));
    }
}
