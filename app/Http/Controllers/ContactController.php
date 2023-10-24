<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        return view('contact');
    }

    public function master_contact() {
        return view('master.master_contact');
    }
    
    public function tambah_contact() {
        return view('tambah.tambah_contact');
    }
    
    public function edit_contact() {
        return view('edit.edit_contact');
    }
}
