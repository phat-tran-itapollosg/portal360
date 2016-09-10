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
        if($faqdelget!=null){
            $this->layout->content = view::make('alpha::faq.faqgetall')->with(array('faqdelget' => $faqdelget));
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
        //$url= Input::get('url');
        //$idcate = Input::get('idcate');
        
        if( isset( $txtr) && !empty($txtr) ){

            
            $data = array(
            'faqquestion' => Input::get('txtq'),
            'faqreply' => Input::get('txtr'),
            'idcate' => Input::get('idcate'),
            'img'   => 'favicon_apollo.png'
            );
            $insert = \DB::table('alpha_faq')->insert($data); 
            if($insert)
            {
            	return \Redirect::to('alpha/admin/faq');
            }
        } 
            
        else {
            # code...
            $loi = 'Vui lòng nhập đầy đủ dữ liệu câu hỏi và câu trả lời của FAQ <br> Vui lòng nhập lại
            <a href="../../faq/add" > Nhập FAQ </a> ';
            $this->layout->content = \view::make('alpha::error')->with(array('loi'=>$loi));
        }
    }
    protected function delFag($id)
    {
        $DeleteData = \DB::table('alpha_faq')
                ->Where('id',$id)
                ->update(array('faqdelete'=>1));
        if($DeleteData )
        {
        	 $loi = ' Xóa thành công '.'
            <a href="../../../admin/faq" > trở lại FAQ </a> ';
            $this->layout->content = \view::make('alpha::error')->with(array('loi'=>$loi));
        }
        else
        {   $loi = ' Xóa không thành công '.'
            <a href="../../../admin/faq" > nhập FAQ </a> ';
            $this->layout->content = \view::make('alpha::error')->with(array('loi'=>$loi));
        }
    }

    public function delFagget()
    {
        $faqdelget = \DB::table('alpha_faq')
                        ->join('alpha_category','cid', '=', 'alpha_faq.idcate')
                        //->select('alpha_faq.idcate','alpha_faq.id','alpha_category.ccontent')
                        ->where('alpha_faq.faqdelete',1)
                        ->Where('alpha_category.cdelete',0)
                        ->get();
        //var_dump($faqdelget);
       
        if($faqdelget!=null){
            $this->layout->content = \view::make('alpha::faq.faqdelget')->with(array('faqdelget' => $faqdelget,
                'flat'=>1));
        }else
        {
            $this->layout->content = \view::make('alpha::faq.faqdelget')->with(array('faqdelget' => $faqdelget,
                'flat'=>-1));
        }
    }

    protected function redel($id){

		$DeleteData = \DB::table('alpha_faq')
	            ->Where('id',$id)
	            ->update(array('faqdelete'=>0));
	    if($DeleteData )
	    {
	    	 $loi = ' Phục hồi thành công '.'
	        <a href="../../../../alpha/admin/faq" > Trở lại FAQ </a> ';
	        $this->layout->content = \view::make('alpha::error')->with(array('loi'=>$loi));
	    }
	    else
	    {   
	    	$loi = ' Phục hồi không thành công '.'
	        <a href="../../../../alpha/admin/faq" > Trở lại FAQ </a> ';
	        $this->layout->content = \view::make('alpha::error')->with(array('loi'=>$loi));
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
        		$loi = ' Lưu bản sửa thành công '.'
		        <a href="../../../admin/faq" > Trở lại FAQ </a> ';
		        $this->layout->content = \view::make('alpha::error')->with(array('loi'=>$loi));
	        }
        	else{

        	$loi = ' Lưu bản sửa không thành công '.'
	        <a href="../../../admin/faq" > Trở lại FAQ </a> ';
	        $this->layout->content = \view::make('alpha::error')->with(array('loi'=>$loi));

        	}
    	}

    	else
    	{
    		$loi = ' Lưu bản sửa không thành công vui lòng nhập đủ dữ liệu '.'
	        <a href="../../../admin/faq" > Trở lại FAQ </a> ';
	        $this->layout->content = \view::make('alpha::error')->with(array('loi'=>$loi));
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

         $this->layout->content = \view::make('alpha::news.newslist')->with(
            array('getfaq1'=>$getfaq1));
    }

    protected function delnews($id)
    {
    	$DeleteData = \DB::table('alpha_news')
                ->Where('id',$id)
                ->update(array('ndelete'=>1));
        if($DeleteData )
        {
        	 $loi = ' Xóa thành công '.'
            <a href="../../../admin/news" > trở lại NEWS </a> ';
            $this->layout->content = \view::make('alpha::error')->with(array('loi'=>$loi));
        }
        else
        {   $loi = ' Xóa không thành công '.'
            <a href="../../../admin/news" > trở lại NEWS </a> ';
            $this->layout->content = \view::make('alpha::error')->with(array('loi'=>$loi));
        }

    }
    protected function redelnews($id)
    {
    	$DeleteData = \DB::table('alpha_news')
                ->Where('id',$id)
                ->update(array('ndelete'=>0));
        if($DeleteData )
        {
        	 $loi = ' Phục hồi thành công '.'
            <a href="../../../../alpha/admin/news" > trở lại NEWS </a> ';
            $this->layout->content = \view::make('alpha::error')->with(array('loi'=>$loi));
        }
        else
        {   $loi = ' Phục hồi không thành công '.'
            <a href="../../../../alpha/admin/news" > trở lại NEWS </a> ';
            $this->layout->content = \view::make('alpha::error')->with(array('loi'=>$loi));
        }
    }

    public function delNewsget()
    {
        $newsdelget= \DB::table('alpha_news')
            ->join('alpha_ncategory','nid', '=', 'alpha_news.idcate')
            //->select('alpha_faq.idcate','alpha_faq.id','alpha_category.ccontent')
            ->where('alpha_news.ndelete',1)
            ->Where('alpha_ncategory.cdelete',0)
            ->get();

        if($newsdelget!=null){
            $this->layout->content = \view::make('alpha::news.newsdelget')->with(array('newsdelget' => $newsdelget,
                'flat'=>1));
        }else
        {
            $this->layout->content = \view::make('alpha::news.newsdelget')->with(array('newsdelget' => $newsdelget,
                'flat'=>-1));
        }
    }
    protected function newsedit($id)
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
        		$loi = ' Lưu bản sửa thành công '.'
		        <a href="../../../admin/news" > trở lại NEWS </a> ';
		        $this->layout->content = \view::make('alpha::error')->with(array('loi'=>$loi));
	        }
        	else{

        	$loi = ' Lưu không thành công '.'
	        <a href="../../../admin/news" > trở lại NEWS </a> ';
	        $this->layout->content = \view::make('alpha::error')->with(array('loi'=>$loi));
    		}
    	}
    	else
    	{
    		$loi = 'Vui lòng nhập đủ dữ liệu '.'
	        <a href="../../../admin/news" > trở lại NEWS </a> ';
	        $this->layout->content = \view::make('alpha::error')->with(array('loi'=>$loi));
    		
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
            'idcate' => $idcate,
            'img'   => 'favicon_apollo.png'
            );
            if(
            $insert = \DB::table('alpha_news')->insert($data)
            )
            {
            	$loi = 'Thêm News thành công
	            <a href="../../../admin/news/add" > trở lại NEWS </a> ';
	            $this->layout->content = \view::make('alpha::error')->with(array('loi'=>$loi));
            }
            else
            {
            	$loi = 'Thêm News không thành công
	            <a href="../../../admin/news" > trở lại NEWS </a> ';
	            $this->layout->content = \view::make('alpha::error')->with(array('loi'=>$loi));
            }
        } 

        else {
            # code...
            $loi = 'Vui lòng nhập đầy đủ dữ liệu câu hỏi và câu trả lời của News <br> Vui lòng nhập lại
            <a href="../../../admin/news/add" > Nhập NEWS </a> ';
            $this->layout->content = \view::make('alpha::error')->with(array('loi'=>$loi));
        }
       
    }

 }