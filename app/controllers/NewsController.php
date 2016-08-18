<?php
/*
 *Alpha team Mr.tanphat 
 *trantanphat.it@gmail.com
 *
 */
//namespace App\Controllers\Faq;
//use DB;
//use Validator;
//use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\ThrottlesLogins;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class NewsController extends BaseController
{
    ///Show FAQ
    protected $layout = 'layouts.master';
    public function Getnews()
    {
    	
    	//var_dump($user->id);
    	$this->layout->content = View::make('news.index');
    }

}