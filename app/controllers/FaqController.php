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
    public function getFag()
    {
        $getfaq = DB::table('alpha_faq')
                        ->where('faqdelete', 0)
                        ->get();      
        //return view('faq.faq',['faq' => $getfaq]);
        $getdel=0;
        return View::make('faq.faq')->with(array('faq'=>$getfaq,'getdel'=>0));
        //return View::make('home.index')->with(array('feed'=>$feed));
    }
    public function delFagget()
    {
        $getfaq = DB::table('alpha_faq')
                        ->where('faqdelete', 1)
                        ->get();
        $getdel=1;
        return view::make('faq.faq')->with(array('faqdelget' => $getfaq,'getdel'=>$getdel));
        
    }
    protected function Fagadd()
    {
        
        return view::make('faq.faqadd');
        
    }
    // insert new FAQ
    protected function addFagdata()
    {
        //Còn lưu thêm session user
        // 'iduser'=> session id user
        if (Request::isMethod('post'))
        {
            
                      
            //show post on views add
            //var_dump(Input::get());
            $data = array(
            'faqquestion' => Input::get('txtq'),
            'faqreply' => Input::get('txtr'));
            DB::table('alpha_faq')->insert($data);
            return $this->getFag();
        }
            return $this->Fagadd();
    }
    protected function editFag($id)
    {
            //echo $id;
            if($id!=null)
            {
                $getInfoFag = DB::table('alpha_faq')->where('id', $id)->get();
                echo Input::get('id');
            //return view('faq.faqedit',['infofaq'=>$getInfoFag]);
                return view::make('faq.faqedit')->with(array('infofaq'=>$getInfoFag));
            }
                // don't id on url
                //return view::make('faq.faqedit')->with(array('infofaq'=>$getInfoFag));
    }
    protected function editFagdata()
     {
         
        // var_dump(Input::get());
        $id = Input::get('id');
        echo $id;
        $Update = DB::table('alpha_faq')
                ->Where('id',$id)
                ->update(array('faqquestion'=>Input::get('txtq'),
                            'faqreply'=>Input::get('txtr'),
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
}