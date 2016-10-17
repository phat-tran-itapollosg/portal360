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
        $lang = App::getLocale();
        if($lang == "en")
        {
            $lang = 1;
        }
        else
        {
            $lang = 0;
        }

    	$getnews= DB::table('alpha_news')
            ->join('alpha_ncategory','nid', '=','alpha_news.idcate')
            //->select('alpha_faq.idcate','alpha_faq.id','alpha_category.ccontent')
            ->where('alpha_news.lang',$lang)
            ->where('alpha_news.ndelete',0)
            ->Where('alpha_ncategory.cdelete',0)
            ->orderBy('ndate','DESC')
            ->get();

        	// var_dump($getnews);
         //    die();
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
        $lang = App::getLocale();
        if($lang == "en")
        {
            $lang = 1;
        }
        else
        {
            $lang = 0;
        }

    	$Getdetal= DB::table('alpha_news')
            ->join('alpha_ncategory','nid', '=','alpha_news.idcate')
            //->select('alpha_faq.idcate','alpha_faq.id','alpha_category.ccontent')
            ->where('alpha_news.ndelete',0)
            ->where('alpha_news.lang',$lang)
            ->Where('alpha_news.id',$id)
            ->Where('alpha_ncategory.cdelete',0)
            ->orderBy('ndate','DESC')
            ->get();
    	if($Getdetal!=null)
        {
            $this->layout->content = View::make('news.newsdetal')->with(array('Getdetal'=>$Getdetal));
            //return View::make('home.index')->with(array('feed'=>$feed));
        }
        else
            {
                 return Redirect::to('/news');
            }
    }

}