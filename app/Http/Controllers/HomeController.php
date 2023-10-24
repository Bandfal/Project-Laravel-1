<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Halaman_2() {
        return view('halaman_2');
    }
    
    public function admin() {
        return view('admin.admin');
    }
    
    public function home() {
        return view('home');
    }
    
    public function dashboard() {
        return view('dashboard');
    }
}
