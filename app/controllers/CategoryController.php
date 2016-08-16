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
    protected function Categoryget(){
         $getcate = DB::table('alpha_category')
                        ->where('cdelete', 0)
                        ->get();
                        
        $getdel=0;
        return View::make('category.categetadd')->with(array('cate'=>$getcate,'getdel'=>0));
    }
    protected function Categoryadd(){
        if (Request::isMethod('post'))
        {      
            //show post on views add
            //var_dump(Input::get());
            $data = array(
            'ccontent' => Input::get('ccontent'));
            DB::table('alpha_category')->insert($data);
            
            return Redirect::to('category/get');
        }
    }
    
    protected function CategoryEdit($id)
    {
        if($id!=null)
        {
            $getInfoCate = DB::table('alpha_category')->where('cid', $id)->get();
            echo $id;
        //return view('faq.faqedit',['infofaq'=>$getInfoFag]);
            return view::make('category.cateedit')->with(array('infocate'=>$getInfoCate));
        }
    }
    protected function CategoryEditAdd()
    {
        if (Request::isMethod('post'))
        {      
            $id = Input::get('id');
            echo $id;
            $Update = DB::table('alpha_category')
                ->Where('cid',$id)
                ->update(array('ccontent'=>Input::get('ccontent'),
                            'cdelete'=>0,
                          ));
            return Redirect::to('category/get/');
        }
    }
    protected function CategoryDelete($id)
    {
            echo $id;
            $Update = DB::table('alpha_category')
                ->Where('cid',$id)
                ->update(array('cdelete'=> 1));
            return Redirect::to('category/get/');
        
    }
    protected function CategoryDelGet()
    {
        $getcate = DB::table('alpha_category')
                        ->where('cdelete', 1)
                        ->get();
                        
        //$getdel=1;
        return View::make('category.categetadd')->with(array('cate'=>$getcate,'getdel'=>1));
    }
    
}