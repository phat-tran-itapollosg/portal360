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
        $faqdelget = \DB::table('alpha_faq')
                        ->join('alpha_category','cid', '=', 'alpha_faq.idcate')
                        //->select('alpha_faq.idcate','alpha_faq.id','alpha_category.ccontent')
                        ->where('alpha_faq.faqdelete',0)
                        ->Where('alpha_category.cdelete',0)
                        ->orderBy('alpha_faq.faqdate', 'DESC')
                        ->get();
        //var_dump($faqdelget);
       //return View::make('shop::index');
        $getCateFaq = \DB::table('alpha_category')
                    ->where('cdelete',0)
                    ->get();
        if($faqdelget!=null){
            $this->layout->content = view::make('alpha::faq.faqgetall')->with(array(
                                                                                    'faqdelget' => $faqdelget,
                                                                                    'getCateFaq'=>$getCateFaq

                ));
    	}
    }
    protected function Fagadd()
    {
        $getcate = \DB::table('alpha_category')
                        ->where('cdelete', 0)
                        ->get();
                        
        //$getdel=0;
        $this->layout->content = \view::make('alpha::faq.faqadd')->with(array('cate'=>$getcate));
        //return view::make('faq.faqadd');
        
    }
    protected function addFagdata()
    {
        //Còn lưu thêm session user
        // 'iduser'=> session id user
        //var_dump(Input::get());
        $txtq = Input::get('txtq');
        $txtr = Input::get('txtr');
        //var_dump(Input::get());
        //$url= Input::get('url');
        //$idcate = Input::get('idcate');
        if( isset( $txtr) && !empty($txtr) && isset($txtq) && !empty($txtq) ){

            
            $data = array(
            'faqquestion' => Input::get('txtq'),
            'faqreply' => Input::get('txtr'),
            'idcate' => Input::get('idcate')
            );
            $insert = \DB::table('alpha_faq')->insert($data); 
            if($insert)
            {
            	return \Redirect::to(route('alpha.faq.faq'));
            }
            else
            {
                $this->layout->content = \view::make('alpha::error')->with(array('code'=>'error'));
            }
        } 
            
        else {
            $this->layout->content = \view::make('alpha::error')->with(array('code'=>'empty'));
        }
        
    }
    protected function delFag($id)
    {
        if(isset($id) && !empty($id))
        {       
            $DeleteData = \DB::table('alpha_faq')
                    ->Where('id',$id)
                    ->update(array('faqdelete'=>1));
            if($DeleteData )
            {
            	return \Redirect::to(route('alpha.faq.faq'));
            }
            else
            {   
                $this->layout->content = \view::make('alpha::error')->with(array('code'=>'error'));
            }
        }
        else
        {
                $this->layout->content = \view::make('alpha::error')->with(array('code'=>'empty'));
        }
    }

    protected function editFag($id)
    {
    //echo $id;

        $getInfoFag = \DB::table('alpha_faq')->where('id', $id)->get();
        foreach ($getInfoFag as $getfaqs)
        {
           $idcate = $getfaqs->idcate;
           //var_dump($idcate);
        }
        
        $getCategoryed = \DB::table('alpha_category')
                        ->where('cid',$idcate)
                        ->get();
        $getCategory = \DB::table('alpha_category')                
                        ->where('cdelete',0)
                        ->get();
        //echo Input::get('id');
    //return view('faq.faqedit',['infofaq'=>$getInfoFag]);
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
        //var_dump(Input::get());
        $id = Input::get('id');
        if(isset($txtq) && isset($txtr) && isset($idcate) && !empty($txtq) && !empty($txtr) && !empty($idcate))
        {
        	if(
        	$Update = \DB::table('alpha_faq')
                ->Where('id',$id)
                ->update(array('faqquestion'=>$txtq,
                            'faqreply'=>$txtr,
                            'idcate'=>$idcate,
                            'faqdelete'=>0,
                            'faqdate'=>$now = new \DateTime(),
                          ))
           	)
        	{
        		return \Redirect::to(route('alpha.faq.faq'));
	        }
        	else
            {

        	   $this->layout->content = \view::make('alpha::error')->with(array('code'=>'error'));

        	}
    	}
    	else
    	{
    		$this->layout->content = \view::make('alpha::error')->with(array('code'=>'empty'));
    	}
    }
    //category faq
    protected function getCategoryFaq()
    {
        $getCateFaq = \DB::table('alpha_category')
                    ->where('cdelete',0)
                    ->get();
        //var_dump($getCateFaq);
        $this->layout->content = \view::make('alpha::faq.categorydetall')->with(array('getCateFaq'=>$getCateFaq));
    }

    protected function addCategoryFaq()
    {
        //echo "Them ca tegory faq";
        $this->layout->content=\view::make('alpha::faq.categoryadd');
    }

    protected function addCategoryFaqData()
    {
        $txtCategoryFaq = Input::get('txtCategoryFaq');
        if(isset($txtCategoryFaq) && !empty($txtCategoryFaq))
        {
            $data=array('ccontent' => $txtCategoryFaq);

            $insert = \DB::table('alpha_category')->insert($data);
            if ($insert) {
                return \Redirect::to(route('alpha.faq.faq'));
            }
            else
            {
                $this->layout->content=\View::make('alpha::error')->with(array('code'=>'error'));
            } 
        }
        else
        {
            $this->layout->content=\View::make('alpha::error')->with(array('code'=>'empty'));
        }
        //var_dump(Input::get());
    }

    protected function editCategoryFaq($id)
    {
        $getEditCateFaq = \DB::table('alpha_category')
                        ->where('cid',$id)
                        ->get();
        $this->layout->content= \view::make('alpha::faq.categoryedit')->with(array('getEditCateFaq'=>$getEditCateFaq));
    }

    protected function editCategoryFaqData()
    {
        $ccontent = Input::get('txtcontent');
        $id = Input::get('id');
       // var_dump(Input::get());
        if(isset($id) && !empty($id) && isset($ccontent) && !empty($ccontent))
        {
            $editCategory = \DB::table('alpha_category')
                        ->where('cid',$id)
                        ->Update(array('ccontent'=>$ccontent));
            if ($editCategory) {
                //var_dump($editCategory);
               return \Redirect::to(route('alpha.faq.faq'));
            
            }
            else
            {
                $this->layout->content = \view::make('alpha::error')->with(array('code'=>'error.category'));
            }
        }
        else
        {
            $this->layout->content = \view::make('alpha::error')->with(array('code'=>'empty.category'));
        }
       
    }

    protected function delCategoryFaq($id)
    {
        if(isset($id) && !empty($id))
        {

        $delCategory = \DB::table('alpha_category')
                    ->where('cid',$id)
                    ->update(array('cdelete'=>1));

            if ($delCategory) {
                return \Redirect::to(route('alpha.faq.faq'));
            
            }
            else
            {
                $this->layout->content = \view::make('alpha::error')->with(array('code'=>'error.category'));
            }
        }
        else
        {
            $this->layout->content = \view::make('alpha::error')->with(array('code'=>'empty.category'));
        }
    }

    //controller news
    protected function newslist(){
        $getfaq1= \DB::table('alpha_news')
            ->join('alpha_ncategory','nid', '=', 'alpha_news.idcate')
            //->select('alpha_faq.idcate','alpha_faq.id','alpha_category.ccontent')
            ->where('alpha_news.ndelete',0)
            ->Where('alpha_ncategory.cdelete',0)
            ->orderBy('alpha_news.ndate', 'DESC')
            ->get();
        $getCategoryNews = \DB::table('alpha_ncategory')
                    ->where('cdelete',0)
                    ->get();
       
         $this->layout->content = \view::make('alpha::news.newslist')->with(
            array('getfaq1'=>$getfaq1,'getCategoryNews' =>$getCategoryNews));
    }

    protected function delnews($id)
    {
        if(isset($id) && !empty($id))
        {
        	$DeleteData = \DB::table('alpha_news')
                    ->Where('id',$id)
                    ->update(array('ndelete'=>1));
            if($DeleteData )
            {
            	return \Redirect::to(route('alpha.news.newslist'));
            }
            else
            {   
                $this->layout->content = \view::make('alpha::error')->with(array('code'=>'error'));
            }
        }
        else
        {
            $this->layout->content = \view::make('alpha::error')->with(array('code'=>'empty'));
        }
    }

    protected function newsedit($id)
    {

        if(isset($id) && !empty($id))
        {

            $getInfoFag = \DB::table('alpha_news')->where('id', $id)->get();
                foreach ($getInfoFag as $getfaqs)
                {
                   $idcate= $getfaqs->idcate;
                   //var_dump($idcate);
                }
                
                $getCategoryed = \DB::table('alpha_ncategory')
                                ->where('nid',$idcate)
                                ->get();
                $getCategory = \DB::table('alpha_ncategory')                
                                ->where('cdelete',0)
                                ->get();
                //echo Input::get('id');
            //return view('faq.faqedit',['infofaq'=>$getInfoFag]);
                $this->layout->content = \view::make('alpha::news.newsedit')->with(array(
                                                            'infofaq'=>$getInfoFag,
                                                            'cate'=>$getCategory,
                                                            'selected'=>$getCategoryed
                                                             ));
        }
        else
        {
            $this->layout->content = \view::make('alpha::error')->with(array('code'=>'empty'));
        }

    }
    protected function editnewsdata()
    {
        $id = Input::get('id');
        $txttitle = Input::get('txttitle');
        $txtncontent = Input::get('txtcontent');
        $idcate = Input::get('idcate');
        //var_dump(Input::get());
        if(isset($txttitle) && isset($txtncontent) && isset($idcate) && !empty($txttitle) && !empty($txtncontent) && !empty($idcate))
        {
        	if(
		        $Update = \DB::table('alpha_news')
		                ->Where('id',$id)
		                ->update(array('ntitle'=>$txttitle,
		                            'ncontent'=>$txtncontent,
		                            'idcate'=>$idcate,
		                            'ndelete'=>0,
		                            'ndate' => $now = new \DateTime()
		                          ))
		        )
        	{
        		return \Redirect::to(route('alpha.news.newslist'));
	        }
        	else
            {

        	   $this->layout->content = \view::make('alpha::error')->with(array('code'=>'error'));
    		}
    	}
    	else
    	{
    		$this->layout->content = \view::make('alpha::error')->with(array('code'=>'empty'));
    		
    	}
    }
    protected function newsadd()
    {

        $getcate = \DB::table('alpha_ncategory')
                        ->where('cdelete', 0)
                        ->get();
        $this->layout->content= \view::make('alpha::news.newsadd')->with(array('getcate'=>$getcate));
    }
    protected function newsadddata()
    {
        //var_dump(Input::get());
        $title = Input::get('txttitle');
        $contents = Input::get('txtcontents');
        $idcate = Input::get('idcate');
        //var_dump(Input::get());
        if(isset($title) && isset($contents) && isset($idcate) && !empty($title) && !empty($contents) && !empty($idcate))
        {

             $data = array(
            'ntitle' => $title,
            'ncontent' => $contents,
            'idcate' => $idcate
            );
            if(
            $insert = \DB::table('alpha_news')->insert($data)
            )
            {
            	return \Redirect::to(route('alpha.news.newslist'));
            }
            else
            {
            	$this->layout->content = \view::make('alpha::error')->with(array('code'=>'error'));
            }
        } 

        else {
           $this->layout->content = \view::make('alpha::error')->with(array('code'=>'empty'));
        }
       
    }


    //category news
    protected function getCategoryNews()
    {
        $getCateFaq = \DB::table('alpha_ncategory')
                    ->where('cdelete',0)
                    ->get();
        $this->layout->content = \view::make('alpha::news.categorydetall')->with(array('getCateFaq'=>$getCateFaq));
    }

    protected function addCategoryNews()
    {
        $this->layout->content=\view::make('alpha::news.categoryadd');
        //$this->layout->content = \view::make('alpha::news.categoryadd');
    }

    protected function addCategoryNewsData()
    {
        //var_dump(Input::get());
        $txtCategoryFaq = Input::get('txtCategoryNews');
        if(isset($txtCategoryFaq) && !empty($txtCategoryFaq))
        {
            $data=array('ccontents' => $txtCategoryFaq);

            $insert = \DB::table('alpha_ncategory')->insert($data);
            if ($insert) {
                return \Redirect::to(route('alpha.news.newslist'));
            }
            else
            {
                $this->layout->content=\View::make('alpha::error')->with(array('code'=>'error'));
            } 
        }
        else
        {
            $this->layout->content=\View::make('alpha::error')->with(array('code'=>'empty'));
        }
    }

    protected function editCategoryNews($id)
    {
        $getEditCateFaq = \DB::table('alpha_ncategory')
                        ->where('nid',$id)
                        ->get();
        $this->layout->content= \view::make('alpha::news.categoryedit')->with(array('getEditCateFaq'=>$getEditCateFaq));
    }

    protected function editCategoryNewsData()
    {
        $ccontent = Input::get('txtcontent');
        $id = Input::get('id');
       // var_dump(Input::get());
        if(isset($id) && !empty($id) && isset($ccontent) && !empty($ccontent))
        {
            $editCategory = \DB::table('alpha_ncategory')
                        ->where('nid',$id)
                        ->Update(array('ccontents'=>$ccontent));
            if ($editCategory) {
                //var_dump($editCategory);
                return \Redirect::to(route('alpha.news.newslist'));
            
            }
            else
            {
                $this->layout->content = \view::make('alpha::error')->with(array('code'=>'error.category'));
            }
        }
        else
        {
            $this->layout->content = \view::make('alpha::error')->with(array('code'=>'empty.category'));
        }
       
    }

    protected function delCategoryNews($id)
    {
        if(isset($id) && !empty($id))
        {

        $delCategory = \DB::table('alpha_ncategory')
                    ->where('nid',$id)
                    ->update(array('cdelete'=>1));

            if ($delCategory) {
                //var_dump($editCategory);
               return \Redirect::to(route('alpha.news.newslist'));
            
            }
            else
            {
                $this->layout->content = \view::make('alpha::error')->with(array('code'=>'error.category'));
            }
        }
        else
        {
            $this->layout->content = \view::make('alpha::error')->with(array('code'=>'empty.category'));
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
        //var_dump(Input::get());
        if( isset($id)  && isset($url) && !empty($id) && !empty($url) )
        {
            
            if (\DB::table('alpha_faq')
                ->Where('id',$id)
                ->update(array('img' => $url))
            ){
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
        //var_dump(Input::get());
        if( isset($id)  && isset($url) && !empty($id) && !empty($url) )
        {
            
            if (\DB::table('alpha_news')
                ->Where('id',$id)
                ->update(array('img' => $url))
            ){
                return \Response::json(array('result' => TRUE));
            }else{
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
       // var_dump(Input::get());
        exit();
    }
    protected function error500()
    {
        $this->layout->content=\view::make('alpha::500');
    }

 }