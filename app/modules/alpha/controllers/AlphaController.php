<?php 

namespace App\Modules\Alpha\Controllers;

use App, Entry, View;
use Illuminate\Support\Facades\Input;
/**
 * Content controller
 * @author Boris Strahija <bstrahija@gmail.com>
 */
class AlphaController extends \BaseController {
	protected $layout = 'layout.layout_master'; 

    public function index()

    {
    	$this->layout->content =  View::make('faq.index');
    }
    
    protected function faq()
    {
        
        $recordAlphaFaq =  \AlphaFaq::where('faqdelete',0)->orderBy('faqdate','desc')->get();
        $getCateFaq = \AlphaFaqCategory::where('cdelete',0)->get();
        $this->layout->content = view::make('alpha::faq.faqgetall')->with(array('faqdelget' =>$recordAlphaFaq,

                                                                                'getCateFaq'=> $getCateFaq));

    }
    protected function Fagadd()
    {
        
        $getcate = \AlphaFaqCategory::where('cdelete',0)->get();       
        $this->layout->content = \view::make('alpha::faq.faqadd')->with(array('cate'=>$getcate));
    }
    protected function addFagdata()
    {
        $iduser = \Session::get('user')->modified_user_id;
        $txtq = Input::get('txtq');
        $txtr = Input::get('txtr');
        $idcate = Input::get('idcate');
        $lang = Input::get('lang');

        //var_dump($lang);die();
        if( isset( $txtr) && !empty($txtr) && isset($txtq) && !empty($txtq) ){

            $AlphaFaq = new \AlphaFaq;
            $AlphaFaq->faqquestion = $txtq;
            $AlphaFaq->faqreply = $txtr;
            $AlphaFaq->idcate = $idcate;
            $AlphaFaq->iduser = $iduser;
            $AlphaFaq->lang = $lang;

            if($AlphaFaq->save())
            {
                return \Redirect::to(route('alpha.faq.faq'));
            }
            else
            {
                return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
            }
        

        } 
            
        else {
            return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
        }
        
    }
    protected function delFag($id)
    {
        if(isset($id) && !empty($id))
        {       
            // $DeleteData = \DB::table('alpha_faq')
            //         ->Where('id',$id)
            //         ->update(array('faqdelete'=>1));

            $DeleteData = \AlphaFaq::find($id);
            $DeleteData->faqdelete = 1;
            if($DeleteData->save())
            {
            	return \Redirect::to(route('alpha.faq.faq'));
            }
            else
            {   
                return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
            }
        }
        else
        {
            return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
        }
    }

    protected function editFag($id)
    {
        $getInfoFag = \AlphaFaq::where('id' , $id)->first();
        $getCategoryed = $getInfoFag->idcate;
        $getCategory = \AlphaFaqCategory::where('cdelete',0)->get();
        $this->layout->content = \view::make('alpha::faq.faqedit')->with(array(
                                                    'infofaq'=>$getInfoFag,
                                                    'cate'=>$getCategory,
                                                    'selected'=>$getCategoryed
                                                     ));

    }
    protected function editFagdata()
    {
        $txtq = Input::get('txtq');
        $txtr = Input::get('txtr');

        $idcate = Input::get('idcate');
        $id = Input::get('id');
        $lang = Input::get('lang');
        if(isset($txtq) && isset($txtr) && isset($idcate) 
            && !empty($txtq) && !empty($txtr) && !empty($idcate)
        )
        {
            $Update = \AlphaFaq::find($id);
            $Update->faqquestion = $txtq;
            $Update->faqreply = $txtr;
            $Update->idcate = $idcate;
            $Update->faqdelete = 0;
            $Update->lang = $lang;
            $Update->faqdate = new \DateTime();

            if($Update->save())
        	{
        		return \Redirect::to(route('alpha.faq.faq'));
	        }
        	else
            {

        	   return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);

        	}
    	}
    	else
    	{
    		return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
    	}
    }
    //category faq
    protected function getCategoryFaq()
    {
        $getCateFaq = \AlphaFaqCategory::where('cdelete',0)->get();
        $this->layout->content = \view::make('alpha::faq.categorydetall')->with(array('getCateFaq'=>$getCateFaq));
    }

    protected function addCategoryFaq()
    {
        $this->layout->content=\view::make('alpha::faq.categoryadd');
    }

    protected function addCategoryFaqData()
    {
        $txtCategoryFaq = Input::get('txtCategoryFaq');
        if(isset($txtCategoryFaq) && !empty($txtCategoryFaq))
        {
            $UpdateCategory = new \AlphaFaqCategory;
            $UpdateCategory ->ccontent = $txtCategoryFaq;
            if ($UpdateCategory->save()) 
            {
                return \Redirect::to(route('alpha.faq.faq'));
            }
            else
            {
                return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
            } 
        }
        else
        {
            return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
        }
    }

    protected function editCategoryFaq($id)
    {
        if(!empty($id))
        {
            $getEditCateFaq = \AlphaFaqCategory::where('cid',$id)->get();  
            $this->layout->content= \view::make('alpha::faq.categoryedit')->with(array('getEditCateFaq'=>$getEditCateFaq));
        }
        else{
            return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
        }

    }

    protected function editCategoryFaqData()
    {
        $ccontent = Input::get('txtcontent');
        $id = Input::get('id');
        if(isset($id) && !empty($id) && isset($ccontent) && !empty($ccontent))
        {
            /*
            $editCategory = \DB::table('alpha_category')
                        ->where('cid',$id)
                        ->Update(array('ccontent'=>$ccontent));
                        */
            $editCategory = \AlphaFaqCategory::find($id);
            $editCategory->ccontent = $ccontent;

            if ($editCategory->save()) 
            {
               return \Redirect::to(route('alpha.faq.faq'));
            
            }
            else
            {
                return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
            }
        }
        else
        {
            return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
        }
       
    }

    protected function delCategoryFaq($id)
    {
        if(isset($id) && !empty($id))
        {
        /*
        $delCategory = \DB::table('alpha_category')
                    ->where('cid',$id)
                    ->update(array('cdelete'=>1));
        */

            $delCategory = \AlphaFaqCategory::find($id);
            $delCategory->cdelete = 1;
            if ($delCategory->save()) {
                return \Redirect::to(route('alpha.faq.faq'));
            
            }
            else
            {
                return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
            }
        }
        else
        {
            return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
        }
    }

    //controller news
    protected function newslist()
    {
        $getfaq1 = \AlphaNews::where('ndelete',0)->orderBy('ndate','desc')->get();
        $getCategoryNews = \AlphaNewsCategory::where('cdelete',0)->get();
         $this->layout->content = \view::make('alpha::news.newslist')->with(
            array('getfaq1'=>$getfaq1,'getCategoryNews' =>$getCategoryNews));
    }

    protected function delnews($id)
    {
        if(isset($id) && !empty($id))
        {
            $DeleteData = \AlphaNews::find($id);
            $DeleteData->ndelete = 1;
            if($DeleteData->save())
            {
            	return \Redirect::to(route('alpha.news.newslist'));
            }
            else
            {   
                return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);            
            }
        }
        else
        {
            return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);   
        }
    }

    protected function newsedit($id)
    {
        if(isset($id) && !empty($id))
        {       
            $infonews = \AlphaNews::where('id' , $id)->first();
            $getCategoryed = $infonews->idcate;
            $getCategory = \AlphaNewsCategory::where('cdelete',0)->get();
            $this->layout->content = \view::make('alpha::news.newsedit')->with(array(
                                                    'infonews'=>$infonews,
                                                    'cate'=>$getCategory,
                                                    'selected'=>$getCategoryed
                                                     ));
        }
        else
        {
            return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);   
        }

    }
    protected function editnewsdata()
    {
        $id = Input::get('id');
        $txttitle = Input::get('txttitle');
        $txtncontent = Input::get('txtcontent');
        $idcate = Input::get('idcate');
        $lang = Input::get('lang');
        if(isset($txttitle) && isset($txtncontent) && isset($idcate) && !empty($txttitle) && !empty($txtncontent) && !empty($idcate))
        {
            $UpdateNews = \AlphaNews::find($id);
            $UpdateNews->ntitle = $txttitle;
            $UpdateNews->ncontent = $txtncontent ;
            $UpdateNews->idcate = $idcate ;
            $UpdateNews->ndelete = 0;
            $UpdateNews->lang = $lang;
            $UpdateNews->ndate = new \DateTime();
        	if($UpdateNews->save())
        	{
        		return \Redirect::to(route('alpha.news.newslist'));
	        }
        	else
            {

        	   return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);   
    		}
    	}
    	else
    	{
    		return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);   
    		
    	}
    }
    protected function newsadd()
    {

       
        $getcate = \AlphaNewsCategory::where('cdelete',0)->get();
        $this->layout->content= \view::make('alpha::news.newsadd')->with(array('getcate'=>$getcate));
    }
    protected function newsadddata()
    {
        $title = Input::get('txttitle');
        $contents = Input::get('txtcontents');
        $idcate = Input::get('idcate');
        if(isset($title) && isset($contents) && isset($idcate) && !empty($title) && !empty($contents) && !empty($idcate))
        {
            $InsertNews = new \AlphaNews;
            $InsertNews->ntitle = $title;
            $InsertNews->ncontent = $contents;
            $InsertNews->idcate = $idcate;

            if($InsertNews->save())
            {
            	return \Redirect::to(route('alpha.news.newslist'));
            }
            else
            {
            	return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);   
            }
        } 

        else {
           return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);   
        }
       
    }


    //category news
    protected function getCategoryNews()
    {
        $getCateFaq = \AlphaNewsCategory::where('cdelete',0)->get();    
        $this->layout->content = \view::make('alpha::news.categorydetall')->with(array('getCateFaq'=>$getCateFaq));
    }

    protected function addCategoryNews()
    {
        $this->layout->content=\view::make('alpha::news.categoryadd');
    }

    protected function addCategoryNewsData()
    {
        $txtCategoryFaq = Input::get('txtCategoryNews');
        if(isset($txtCategoryFaq) && !empty($txtCategoryFaq))
        {
            $InsertNewsCategory = new \AlphaNewsCategory;
            $InsertNewsCategory ->ccontents = $txtCategoryFaq;

            if ($InsertNewsCategory->save()) {
                return \Redirect::to(route('alpha.news.newslist'));
            }
            else
            {
                return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']); 
            } 
        }
        else
        {
            return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']); 
        }
    }

    protected function editCategoryNews($id)
    {
        
        $getEditCateFaq = \AlphaNewsCategory::where('nid',$id)->get();
        $this->layout->content= \view::make('alpha::news.categoryedit')->with(array('getEditCateFaq'=>$getEditCateFaq));
    }

    protected function editCategoryNewsData()
    {
        $ccontent = Input::get('txtcontent');
        $id = Input::get('id');
        if(isset($id) && !empty($id) && isset($ccontent) && !empty($ccontent))
        {
            $editCategory = \AlphaNewsCategory::find($id);
            $editCategory->ccontents = $ccontent;
            if ($editCategory->save()) 
            {
                return \Redirect::to(route('alpha.news.newslist'));
            
            }
            else
            {
                return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']); 
            }
        }
        else
        {
            return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']); 
        }
       
    }

    protected function delCategoryNews($id)
    {
        if(isset($id) && !empty($id))
        {
            $delCategoryNews = \AlphaNewsCategory::find($id);
            $delCategoryNews->cdelete = 1;
            if ($delCategoryNews->save()) 
            {
               return \Redirect::to(route('alpha.news.newslist'));
            
            }
            else
            {
                return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']); 
            }
        }
        else
        {
            return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']); 
        }
    }


    //add images
    protected function updateimg($id)
    {

        $this->layout->content=\view::make('alpha::faq.imgadd')->with(array('id' => $id));
    }

    protected function updateimgnews($id)
    {
        $this->layout->content=\view::make('alpha::news.imgadd')->with(array('id' => $id));
    }

    protected function updatajson()
    {
        $id = Input::get('id');
        $url= Input::get('url');
        if( isset($id)  && isset($url) && !empty($id) && !empty($url) )
        {
            $UpdateimgFAQ = \AlphaFaq::find($id);
            $UpdateimgFAQ->img = $url;
            if ($UpdateimgFAQ->save())
            {
                return \Response::json(array('result' => TRUE));
            }else{
                return \Response::json(array('result' => FALSE));
            }

        }else{
            return \Response::json(array('result' => FALSE));
        }
    }
     
    protected function updatajsonnews()
    {
        $id = Input::get('id');
        $url= Input::get('url');
        if( isset($id)  && isset($url) && !empty($id) && !empty($url) )
        {
            $UpdateimgNews = \AlphaNews::find($id);
            $UpdateimgNews->img = $url;
            
            if ($UpdateimgNews->save())
            {
                return \Response::json(array('result' => TRUE));
            }
            else
            {
                return \Response::json(array('result' => FALSE));
            }

        }else{
            return \Response::json(array('result' => FALSE));
        }
    } 
    protected function updata(){

        error_reporting(E_ALL | E_STRICT);
        require(app_path().'/helpers/'.'UploadHandler.php');
        $upload_handler = new \UploadHandler();
        exit();
    }
    protected function error500()
    {
        $this->layout->content=\view::make('alpha::500');
    }

 }