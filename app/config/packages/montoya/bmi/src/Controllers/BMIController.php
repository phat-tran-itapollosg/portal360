<?php

namespace Montoya\BMI\Controllers;
//use View;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\bmi;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class BMIController extends \BaseController
{
    protected $layout = 'layout.layout_master';

    public function index()

    {

       
    	//return \View::make('bmi::index', compact('bmi'));
    	//return View::make('package::view.index'); 
    	$this->layout->content =  \View::make('packages.index');
    }
}