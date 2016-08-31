<?php

namespace Montoya\BMI\Controllers;
use DB;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\bmi;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class BMIController extends \BaseController
{
    protected $layout = 'layout.layout_master';

    public function index()

    {
    	$this->layout->content =  \View::make('packages.index');
    }
    
    protected function faq()
    {
        $faqdelget = DB::table('alpha_faq')
                        ->join('alpha_category','cid', '=', 'alpha_faq.idcate')
                        //->select('alpha_faq.idcate','alpha_faq.id','alpha_category.ccontent')
                        ->where('alpha_faq.faqdelete',0)
                        ->Where('alpha_category.cdelete',0)
                        ->get();
        //var_dump($faqdelget);
       
        if($faqdelget!=null){
            $this->layout->content = \view::make('packages.faqgetall')->with(array('faqdelget' => $faqdelget));
    }
    }
    protected function Fagadd()
    {
        $getcate = DB::table('alpha_category')
                        ->where('cdelete', 0)
                        ->get();
                        
        //$getdel=0;
        $this->layout->content = \View::make('packages.faqadd')->with(array('cate'=>$getcate));
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
            $insert = DB::table('alpha_faq')->insert($data); } 

        else {
            # code...
            $loi = 'Vui lòng nhập đầy đủ dữ liệu câu hỏi và câu trả lời của FAQ <br> Vui lòng nhập lại
            <a href="../../faq/add" > Nhập FAQ </a> ';
            $this->layout->content = \View::make('packages.error')->with(array('loi'=>$loi));
        }
    }

    public function delFagget()
    {
        $faqdelget = DB::table('alpha_faq')
                        ->join('alpha_category','cid', '=', 'alpha_faq.idcate')
                        //->select('alpha_faq.idcate','alpha_faq.id','alpha_category.ccontent')
                        ->where('alpha_faq.faqdelete',1)
                        ->Where('alpha_category.cdelete',0)
                        ->get();
        //var_dump($faqdelget);
       
        if($faqdelget!=null){
            $this->layout->content = \view::make('packages.faqdelget')->with(array('faqdelget' => $faqdelget,
                'flat'=>1));
        }else
        {
            $this->layout->content = \view::make('packages.faqdelget')->with(array('faqdelget' => $faqdelget,
                'flat'=>-1));
        }
    }
    
    protected function editFag($id)
    {
            //echo $id;
                $getInfoFag = DB::table('alpha_faq')->where('id', $id)->get();
                foreach ($getInfoFag as $getfaqs)
                {
                   $idcate= $getfaqs->idcate;
                   //var_dump($idcate);
                }
                
                $getCategoryed = DB::table('alpha_category')
                                ->where('cid',$idcate)
                                ->get();
                $getCategory = DB::table('alpha_category')                
                                ->where('cdelete',0)
                                ->get();
                //echo Input::get('id');
            //return view('faq.faqedit',['infofaq'=>$getInfoFag]);
                $this->layout->content = \view::make('packages.faqedit')->with(array(
                                                            'infofaq'=>$getInfoFag,
                                                            'cate'=>$getCategory,
                                                            'selected'=>$getCategoryed
                                                             ));

    }
    protected function updateimg()
    {

        $this->layout->content= \View::make('packages.uploadimages');
    }

    protected function editFagdata()
     {
        error_reporting(E_ALL | E_STRICT);
        require(app_path().'/helpers/'.'UploadHandler.php');
        $upload_handler = new UploadHandler();
         
        var_dump(Input::get());
        $id = Input::get('id');

        //echo $id;
        //var_dump(Input::get('idcate'));
       /*
        $Update = DB::table('alpha_faq')
                ->Where('id',$id)
                ->update(array('faqquestion'=>Input::get('txtq'),
                            'faqreply'=>Input::get('txtr'),
                            'idcate'=>Input::get('idcate'),
                            'faqdelete'=>0,
                          ));
         */     
         //DB::table('users')->update(array('votes' => 1));
        //$getInfoFag = DB::table('alpha_faq')->where('id', Input::get('id'))->get();
        //$getdel = 0;
        //return view::make('faq.faq')->with(array('faq'=>$getInfoFag,'getdel'=>$getdel));
    
        return Redirect::to('/faq');
     }
    protected function delFagdata($id)
    {
        $DeleteData = DB::table('alpha_faq')
                ->Where('id',$id)
                ->update(array('faqdelete'=>1));
        //var_dump($id);
        //delFagget
        //return $this->delFagget();
        //return view('faq.faqdelget',['faqdelget' => $getfaq]);
        
        return Redirect::to('/faq/del/get');
    }
    protected function redelFagdata(Request $request)
     {
        $Redata= DB::table('alpha_faq')
                ->Where('id',$request->input('id'))
                ->update(['faqquestion'=>$request->input('txtq'),
                          'faqreply'=>$request->input('txtr'),
                          'faqdelete'=>0,
                          ]);
        
        return $this->getFag();
     }

     //test upload img

    // insert new FAQ

    protected function upload_img($id){
            
        
        $GetId= DB::table('alpha_faq')
                ->where('id',$id)
                ->orderBy('id', 'desc')
                ->first();

        

        //$GetId = $GetId+1;        
        return View::make('faq.uploadfile')->with(array('id'=>$GetId));
       // return var_dump(Input::get());


    }
    /*
    protected function upload_img_data()
    {
        $id = Input::get('id');
        $url= Input::get('url');
        error_reporting(E_ALL | E_STRICT);
        require(app_path().'/helpers/'.'UploadHandler.php');
        $upload_handler = new UploadHandler();
        
        if(isset( $txtr) && !empty($txtr))
        {
            //$data = array('img'=>'url');

            var_dump(Input::get());
            $Update = DB::table('alpha_faq')
                ->Where('id',$id)
                ->update($data);
            
            
            if($Update)
            {

                return Redirect::to('/faq/edit/$id;');
            }
            header('Content-type: application/json');
                echo json_encode(array(
                    'error'=>FALSE, 
                    'data' => $url,
                    'message'=>'Thành công'
                ));
            exit();
        }
        else
        {   

            header('Content-type: application/json');
            echo json_encode(array(
                'error'=>TRUE, 
                'data' => NULL,
                'message'=>'Không có Id Hoặc Url'
            ));
            exit(); 
        }

    }

*/
    protected function updatajson()
    {
        $id = Input::get('id');
        $url= Input::get('url');
        var_dump(Input::get());
        header('Content-type: application/json');
                echo json_encode(array(
                    'error'=>FALSE, 
                    'data' => $url,
                    'message'=>'thanh cong',
                ));
            exit();
        /*
        if( isset($id)  && isset($url) && !empty($id) && !empty($url) )
        {
            $Update = DB::table('alpha_faq')
                ->Where('id',$id)
                ->update(array('img' => $url));
            //$data = array('img'=>'url');

            header('Content-type: application/json');
                echo json_encode(array(
                    'error'=>FALSE, 
                    'data' => $url,
                    'message'=>'thanh cong',
                ));
            exit();
            

        }

        else
        {
           header('Content-type: application/json');
            echo json_encode(array(
                'error'=>TRUE, 
                'data' => NULL,
                'message'=>'khong Id hoac Url'
            ));
        exit(); 
        }
        */
    }
      
    protected function updata(){
        //echo "updata";
        error_reporting(E_ALL | E_STRICT);
        require(app_path().'/helpers/'.'UploadHandler.php');
        $upload_handler = new \UploadHandler();
        
        var_dump($upload_handler);
        var_dump($_FILES) ; 

        //return var_dump(Input::get());  
        //return Json(new {msg="Successfully added "+person.Name });
        //echo (Input::get('postimg'));
        //$data[]=array('url' => Input::get('file')->url);
        //$insert = DB::table('img_test')->insert($data);
        //var_dump($insert);
        //$Redata= DB::table('img_test')
        //die();
        //return View::make('faq.uploadfile');
        // echo "Hien"; echo "<br>";
        // public function action_index($folder = null)
        // {
        //     //if ( ! Request::ajax())
        //         //return;
        //     //Bundle::start('juploader');
        //     $uploader = IoC::resolve('Uploader');
        //     $uploader
        //         ->with_uploader('Uploader\DatabaseUploadHandler')
        //         //->with_uploader('Uploader\DbIdUploadHandler')
        //         ->with_argument('1')
        //         ->with_option('script_url' , URL::to_action('juploader::dbupload@index'))
        //         ->Start();
        //     return $uploader->get_response();
        // }
    }
    protected function newslist(){
        $getfaq1= DB::table('alpha_news')
            ->join('alpha_ncategory','nid', '=', 'alpha_news.idcate')
            //->select('alpha_faq.idcate','alpha_faq.id','alpha_category.ccontent')
            ->where('alpha_news.ndelete',0)
            ->Where('alpha_ncategory.cdelete',0)
            ->get();

         $this->layout->content = \view::make('packages.newslist')->with(
            array('getfaq1'=>$getfaq1));
    }
    protected function newsedit($id)
    {

        $getInfoFag = DB::table('alpha_news')->where('id', $id)->get();
                foreach ($getInfoFag as $getfaqs)
                {
                   $idcate= $getfaqs->idcate;
                   //var_dump($idcate);
                }
                
                $getCategoryed = DB::table('alpha_ncategory')
                                ->where('nid',$idcate)
                                ->get();
                $getCategory = DB::table('alpha_ncategory')                
                                ->where('cdelete',0)
                                ->get();
                //echo Input::get('id');
            //return view('faq.faqedit',['infofaq'=>$getInfoFag]);
                $this->layout->content = \view::make('packages.newsedit')->with(array(
                                                            'infofaq'=>$getInfoFag,
                                                            'cate'=>$getCategory,
                                                            'selected'=>$getCategoryed
                                                             ));

    }
    protected function editnewsdata()
    {
        $id = Input::get('id');
        $Update = DB::table('alpha_news')
                ->Where('id',$id)
                ->update(array('ntitle'=>Input::get('txttitle'),
                            'ncontent'=>Input::get('txtcontent'),
                            'idcate'=>Input::get('idcate'),
                            'ndelete'=>0,
                            'ndate' => $now = new DateTime(),
                          ));
    }
    protected function delNewsget()
    {
        $newsdelget= DB::table('alpha_news')
            ->join('alpha_ncategory','nid', '=', 'alpha_news.idcate')
            //->select('alpha_faq.idcate','alpha_faq.id','alpha_category.ccontent')
            ->where('alpha_news.ndelete',1)
            ->Where('alpha_ncategory.cdelete',0)
            ->get();

        if($newsdelget!=null){
            $this->layout->content = \view::make('packages.newsdelget')->with(array('newsdelget' => $newsdelget,
                'flat'=>1));
        }else
        {
            $this->layout->content = \view::make('packages.newsdelget')->with(array('newsdelget' => $newsdelget,
                'flat'=>-1));
        }
    }
    protected function newsadd()
    {

        $getcate = DB::table('alpha_ncategory')
                        ->where('cdelete', 0)
                        ->get();
        $this->layout->content= \View::make('packages.newsadd')->with(array('getcate'=>$getcate));
    }
    protected function newsadddata()
    {
        //var_dump(Input::get());
        $title = Input::get('txttitle');
        $contents = Input:get('txtcontents');
        $idcate = Input::get('idcate');
        if(isset($title) && isset($contents) && isset($idcate) && !empty($txttitle) && !empty($txtcontents) && !empty($idcate))
        {
            $data = array(
            'faqquestion' => Input::get('txtq'),
            'faqreply' => Input::get('txtr'),
            'idcate' => Input::get('idcate'),
            'img'   => 'favicon_apollo.png'
            );
            $insert = DB::table('alpha_faq')->insert($data); 
        } 

        else {
            # code...
            $loi = 'Vui lòng nhập đầy đủ dữ liệu tiêu đề, nội dung của News <br> Vui lòng nhập lại
            <a href="../../faq/add" > Nhập FAQ </a> ';
            $this->layout->content = \View::make('packages.error')->with(array('loi'=>$loi));
        
        }

    }
}