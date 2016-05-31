<?php

/*
*   Class feedbackController
*   Auhor: Hieu Nguyen
*   Date: 2016-03-15
*   Purpose: To handle feedback logic
*/

class FeedbackController extends BaseController {

    // Render the index page
    public function index() {
        $feedbacks = SugarUtil::getFeedbackList();
        $appListStrings = Session::get('app_list_strings');

        $data = array(
            'feedbacks' => $feedbacks,
            'types' => $appListStrings->case_type_options,
            'targets' => $appListStrings->case_target_options,
            'statuses' => $appListStrings->case_status_dom,
        );

        return View::make('feedback.index')->with($data);
    }
    
    // Render the add page
    public function add() {
        $session = Session::get('session');
        $user = Session::get('user');
        $contact = Session::get('contact');
        $appListStrings = Session::get('app_list_strings');
        
        $data = array(
            'typeOptions' => $appListStrings->case_type_options,
            'targetOptions' => $appListStrings->case_target_options,
            'user' => $user,
            'contact' => $contact,
        );
        
        return View::make('feedback.add')->with($data);    
    }
    
    // Handle saving feedback
    public function save() {
        $session = Session::get('session');
        $user = Session::get('user');
        $contact = Session::get('contact');
        
        // Save user data
        $data = array(
            'name' => Input::get('subject'),
            'type' => Input::get('slc_type'),
            'target' => Input::get('slc_target'),
            'status' => 'New',
            'priority' => 'P1', // High
            'description' => Input::get('contents'),
            'student_id' => $contact->id,
            'assigned_user_id' => $user->id,
        );

        $result = $this->client->save($session->id, 'Cases', '', $data);
        
        // Return result into the view
        if($result != null) {
            Session::flash('success_message', trans('feedback_index.send_feedback_success_msg'));
            return Redirect::to('feedback/index');
        } else {
            Session::flash('error_message', trans('feedback_add.send_feedback_failed_msg'));
            return Redirect::back();
        }    
    }	
}