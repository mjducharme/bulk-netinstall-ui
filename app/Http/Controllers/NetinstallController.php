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
    public function index(Request $request)
    {
        $operations = array('Reset Slot','Prepare Device','Apply Template');
	$results = array('Success','Failure');
	$interface = \App\NetinstallInterface::find($request->interfaceId);
	if ($interface) {
	    if ($request->selectOperation != 0) {
                $interface->last_operation = $request->selectOperation;
	        $interface->last_result = 0;
	        $interface->save();
	    } else {
		$interface->last_operation = null;
		$interface->last_result = null;
		$interface->save();
            }
        }
        return view('index', ['interfaces' => \App\NetinstallInterface::all(), 'templates' => \App\RouterosTemplate::all(), 'operations' => $operations, 'results' => $results ]);
    }
}
