<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\RunOperation;

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
    public function index(Request $request)
    {
        $operations = array('Reset Slot','Prepare Device','Apply Template');
	$results = array('Success','Failure');
	$interface = \App\Models\NetinstallInterface::find($request->interfaceId);
	if ($interface) {
	    $operation = $request->selectOperation;
	    $template = \App\Models\RouterosTemplate::find($request->selectTemplate);
            RunOperation::dispatch($interface, $operation, $template);
        }
        return view('index', ['interfaces' => \App\Models\NetinstallInterface::all(), 'templates' => \App\Models\RouterosTemplate::all(), 'operations' => $operations, 'results' => $results ]);
    }
}
