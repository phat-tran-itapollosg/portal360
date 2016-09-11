<?php

/*
*   Auhor: Loc Pham
*   Date: 2016-09-11
*/

class BookingController extends BaseController {

    public function index() {
        $session = Session::get('session');
        $contact = Session::get('contact');

        // Get sms that linked to the current student
        $params = array(
            'session' => $session->root_session_id,
            'student_id' => $contact->id,
        );

        $enrrolments = $this->client->call(SugarMethod::GET_ENROLLMENT_LIST, $params);
        //return $enrrolments;
        $data = array(
            'enrollents' => $enrrolments,
        );

        return View::make('booking.index')->with($data);
    }

    public function history()
    {
        $session = Session::get('session');
        $contact = Session::get('contact');

        // Get sms that linked to the current student
        $params = array(
            'session' => $session->root_session_id,
            'student_id' => $contact->id,
        );

        $enrrolments = $this->client->call(SugarMethod::GET_ENROLLMENT_LIST, $params);
        //return $enrrolments;
        $data = array(
            'enrollents' => $enrrolments,
        );

        return View::make('booking.history')->with($data);
    }
}