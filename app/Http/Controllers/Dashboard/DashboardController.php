<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];

        return view('dashboard.index', $data);
    }

}
