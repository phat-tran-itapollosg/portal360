<?php

/*
 *Alpha team Mr. Pong Pi 
 *eroshaly@gmail.com
 *
 */

class ErrorsController extends BaseController {

    protected $layout = "layouts.master";

    /*
    |--------------------------------------------------------------------------
    | Errors Controller
    |--------------------------------------------------------------------------
    */

    public function error($code) {
        switch ($code) {
            case 404:
                $this->layout->content = View::make('errors.404');
                break;

            default:
                $this->layout->content = View::make('errors.500');
                break;
        }
    }
}
