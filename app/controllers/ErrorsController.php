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

    public function error($code, $messenger) {
        // var_dump($messenger);
        // die();
        
        switch ($code) {
            case 404:
                $ms = 'Something went wrong or that page doesn’t exist yet.';
                if(isset($messenger) && !empty($messenger)){
                    $ms = $messenger;
                }
                $this->layout->content = View::make('errors.404')->with(array('messenger'=>$ms));
                break;

            default:
                $ms = 'Looks like Something went wrong.';
                if(isset($messenger) && !empty($messenger)){
                    $ms = $messenger;
                }
                $this->layout->content = View::make('errors.500')->with(array('messenger'=>$ms));
                break;
        }
    }
}
