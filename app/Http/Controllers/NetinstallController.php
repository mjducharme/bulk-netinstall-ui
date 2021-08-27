<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NetinstallController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index', ['interfaces' => \App\NetinstallInterface::all(), 'templates' => \App\RouterosTemplate::all() ]);
    }
}
