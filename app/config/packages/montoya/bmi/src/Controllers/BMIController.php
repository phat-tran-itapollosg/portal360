<?php

namespace Montoya\BMI\Controllers;
//use View;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\bmi;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class BMIController extends Controller
{

/**
    public function index($request)
    {
        if ($request->has('weight') && $request->has('high')) {

            $weight = $request->get('weight');
            $high = $request->get('high');

            $bmi = round($weight / ($high * $high),1);
        }

    	  return view('bmi::index', compact('bmi'));
    }
 */
    public function index()

    {

        if ($request->has('weight') && $request->has('high')) {

            $weight = $request->get('weight');
            $high = $request->get('high');

            $bmi = round($weight / ($high * $high),1);
        }

    	  return view('bmi::index', compact('bmi'));
    	//return \View::make('bmi::index', compact('bmi'));
    	//return View::make('package::view.index'); 
    	//return \View::make('news.index');
    }
}