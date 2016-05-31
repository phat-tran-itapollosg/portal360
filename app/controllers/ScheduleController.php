<?php

/*
*   Class StudentController
*   Auhor: Hieu Nguyen
*   Date: 2016-03-15
*   Purpose: To handle user logic
*/

class ScheduleController extends BaseController {

    public function index() {
        $session = Session::get('session');
        $contact = Session::get('contact');

        
        
        $data = array(
        
        );

        return View::make('schedule.index')->with($data);
    }
}
