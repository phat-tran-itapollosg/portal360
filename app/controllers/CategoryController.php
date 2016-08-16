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

class CategoryController extends BaseController
{
    protected function categoryadd(){
         $getcate = DB::table('alpha_category')
                        ->where('cdelete', 0)
                        ->get();
                        
        $getdel=0;
        return View::make('category.categetadd')->with(array('cate'=>$getcate,'getdel'=>0));
    }
    
}