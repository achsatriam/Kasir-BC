<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    Public function index() { 
        return view('dashboard');
    }

    Public function MasterContact() { 
        return view('admin.kontak.masterkontak');
    }

    Public function MasterProject() { 
        return view('admin.project.masterproject');
    }
}
