<?php

/*
*   Class StudentController
*   Auhor: Hieu Nguyen
*   Date: 2016-03-15
*   Purpose: To handle user logic
*/

class StudentController extends BaseController {

	public function index() {
		//$contact = Session::get('contact');
		$data = array(
			'students' => array(
				array('name' => 'trung'),
				array('name' => 'tung'),
			),
		);
		
		return View::make('student.index')->with($data);
	}
}
