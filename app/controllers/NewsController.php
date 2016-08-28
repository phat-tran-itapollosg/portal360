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

    	$getnews= DB::table('alpha_news')
            ->join('alpha_ncategory','nid', '=','alpha_news.idcate')
            //->select('alpha_faq.idcate','alpha_faq.id','alpha_category.ccontent')
            ->where('alpha_news.ndelete',0)
            ->Where('alpha_ncategory.cdelete',0)
            ->get();

        	//var_dump($getnews);
        if($getnews!=null)
        {
            $this->layout->content = View::make('news.news')->with(array('getnews'=>$getnews));
            //return View::make('home.index')->with(array('feed'=>$feed));
        }
        else
            {
                echo 'khong co du lieu';
            }
    	//var_dump($user->id);
    }
    protected function Getdetal($id)
    {
    	$Getdetal= DB::table('alpha_news')
            ->join('alpha_ncategory','nid', '=','alpha_news.idcate')
            //->select('alpha_faq.idcate','alpha_faq.id','alpha_category.ccontent')
            ->where('alpha_news.ndelete',0)
            ->Where('alpha_news.id',$id)
            ->Where('alpha_ncategory.cdelete',0)
            ->get();
    	if($Getdetal!=null)
        {
            $this->layout->content = View::make('news.detal')->with(array('Getdetal'=>$Getdetal));
            //return View::make('home.index')->with(array('feed'=>$feed));
        }
        else
            {
                echo 'khong co du lieu';
            }
    }

}