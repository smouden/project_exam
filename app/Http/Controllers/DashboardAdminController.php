<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index()
    {
        // Retourner la vue avec les données
        return view('admin.dashboard');
    }
}
