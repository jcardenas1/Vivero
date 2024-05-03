<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vivero_data = [
            'productores',
            'fincas',
            'viveros'
        ];
        
        return view('home', ['vivero_data' => $vivero_data]);
    }
}
