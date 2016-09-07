<?php namespace App\Modules\Faq\Controllers;

use App, Entry, View;

/**
 * Content controller
 * @author Boris Strahija <bstrahija@gmail.com>
 */
class FaqController extends \BaseController {
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
                        ->get();
        //var_dump($faqdelget);
       
        if($faqdelget!=null){
            $this->layout->content = \view::make('packages.faqgetall')->with(array('faqdelget' => $faqdelget));
    }
    }
 }