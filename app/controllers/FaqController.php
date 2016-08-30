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

class FaqController extends BaseController
{
    ///Show FAQ
    protected $layout = 'layouts.master';

    public function getFag()
    {
        //$getfaq = DB::table('alpha_faq')
        //                ->where('faqdelete', 0)
        //                ->get();
        
        $getfaq1= DB::table('alpha_faq')
            ->join('alpha_category','cid', '=', 'alpha_faq.idcate')
            //->select('alpha_faq.idcate','alpha_faq.id','alpha_category.ccontent')
            ->where('alpha_faq.faqdelete',0)
            ->Where('alpha_category.cdelete',0)
            ->get();
        if($getfaq1!=null)
        {
            
            $getdel=0;
            $this->layout->content = View::make('faq.faq')->with(array('flat'=>0,'admin'=>0,'getfaq1'=>$getfaq1));
            //return View::make('home.index')->with(array('feed'=>$feed));
        }
        else
            {
                //echo 'khong co du lieu';
                return Redirect::to('/faq/add');
            }
    }

    protected function GetFaqCategory($idcate)
    {
        $GetFaqCategory= DB::table('alpha_faq')
            ->join('alpha_category','cid', '=', 'alpha_faq.idcate')
            //->select('alpha_faq.idcate','alpha_faq.id','alpha_category.ccontent')
            ->where('alpha_faq.faqdelete',0)
            ->Where('alpha_category.cdelete',0)
            ->Where('alpha_category.cid',$idcate)
            //->groupBy('alpha_category.idcate')
            ->get();
        $this->layout->content = view::make('faq.faq')->with(array('flat'=>2,'i'=>0,
                                                        'FaqCategory'=>$GetFaqCategory));
    }
    public function getdetal($id)
    {
        $getdetal= DB::table('alpha_faq')
            ->join('alpha_category','cid', '=', 'alpha_faq.idcate')
            //->select('alpha_faq.idcate','alpha_faq.id','alpha_category.ccontent')
            ->where('alpha_faq.faqdelete',0)
            ->Where('alpha_category.cdelete',0)
            ->Where('alpha_faq.id',$id)
            //->groupBy('alpha_category.idcate')
            ->get();
        $this->layout->content = view::make('faq.faqdetal')->with(array(
                                                        'detal'=>$getdetal));
    }
    /*
    public function delFagget()
    {
        $getfaq = DB::table('alpha_faq')
                        ->where('faqdelete', 1)
                        ->get();
       
        if($getfaq!=null){
            $this->layout->content = view::make('faq.faq')->with(array('faqdelget' => $getfaq,
                'flat'=>1));
        }else
        {
            $this->layout->content = view::make('faq.faq')->with(array('faqdelget' => $getfaq,
                'flat'=>-1));
        }
    }
    protected function Fagadd()
    {
        $getcate = DB::table('alpha_category')
                        ->where('cdelete', 0)
                        ->get();
                        
        //$getdel=0;
        $this->layout->content = View::make('faq.faqadd')->with(array('cate'=>$getcate));
        //return view::make('faq.faqadd');
        
    }
    // insert new FAQ
    protected function up()
    {
        return View::make('faq.up');
        //return var_dump(Input::get());
    }
    protected function addFagdata()
    {
        //Còn lưu thêm session user
        // 'iduser'=> session id user
        var_dump(Input::get());

        /*
        if (Request::isMethod('post'))
        {
            
                      
            //show post on views add
            //var_dump(Input::get('txtr'));
            $data = array(
            'faqquestion' => Input::get('txtq'),
            'faqreply' => Input::get('txtr'),
            'idcate' => Input::get('idcate')
            );
            DB::table('alpha_faq')->insert($data);
            //return $this->getFag();
            
            return Redirect::to('/faq');
        }
            return $this->Fagadd();
        
    }
    protected function editFag($id)
    {
            //echo $id;
            if($id!=null)
            {
                $getInfoFag = DB::table('alpha_faq')->where('id', $id)->get();
                foreach ($getInfoFag as $getfaqs)
                {
                   $idcate= $getfaqs->idcate;
                   var_dump($idcate);
                }
                
                $getCategoryed = DB::table('alpha_category')
                                ->where('cid',$idcate)
                                ->get();
                $getCategory = DB::table('alpha_category')                
                                ->where('cdelete',0)
                                ->get();
                //echo Input::get('id');
            //return view('faq.faqedit',['infofaq'=>$getInfoFag]);
                $this->layout->content = view::make('faq.faqedit')->with(array(
                                                            'infofaq'=>$getInfoFag,
                                                            'cate'=>$getCategory,
                                                            'selected'=>$getCategoryed
                                                             ));
            }

    }
    protected function editFagdata()
     {
         
        // var_dump(Input::get());
        $id = Input::get('id');
        //echo $id;
        //var_dump(Input::get('idcate'));
        $Update = DB::table('alpha_faq')
                ->Where('id',$id)
                ->update(array('faqquestion'=>Input::get('txtq'),
                            'faqreply'=>Input::get('txtr'),
                            'idcate'=>Input::get('idcate'),
                            'faqdelete'=>0,
                          ));
              
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


    protected function updatajson()
    {
        $id = Input::get('id');
        $url= Input::get('url');
        var_dump(Input::get());
        if( isset($id)  && isset($url) && !empty($id) && !empty($url) )
        {
            //$Update = DB::table('alpha_faq')
            //    ->Where('id',$id)
            //    ->update(array('img' => $url));
            

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
        
    }
      
    protected function updata(){



        error_reporting(E_ALL | E_STRICT);
        require(app_path().'/helpers/'.'UploadHandler.php');
        return $upload_handler = new UploadHandler();
        
         var_dump(Input::get());  
        //return var_dump(Input::get());  
        //return Json(new {msg="Successfully added "+person.Name });
        //echo (Input::get('postimg'));
        //$data[]=array('url' => Input::get('file')->url);
        //$insert = DB::table('img_test')->insert($data);
        //var_dump($insert);
        //$Redata= DB::table('img_test')
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
        //var_dump($upload_handler);
}