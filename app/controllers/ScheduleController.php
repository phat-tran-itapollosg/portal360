<?php

/*
*   Class StudentController
*   Auhor: Hieu Nguyen
*   Date: 2016-03-15
*   Purpose: To handle user logic
*/

class ScheduleController extends BaseController {

    public function index() {
        //$session = Session::get('session');
        $contact = Session::get('contact');

        $schedules = SugarUtil::getSchedules();

        // Render events for fullcalendar format and return to the view
        $events = array();
        $todayDate = time();

        for($i = 0; $i < count($schedules); $i++) {
            $focusDate = strtotime($schedules[$i]->date);
            $bgClass = '';

            // The session is in the pass
            if($todayDate > $focusDate) {
                // Student is present
                if($schedules[$i]->attendance_type == 'P') {
                    $bgClass = 'bgm-green';
                }
                // Student is absent
                else {
                    $bgClass = 'bgm-red';
                }
            }
            // The session is not started
            else {
                $bgClass = 'bgm-yellow';
            }

            $events[] = array(
                'title' => $schedules[$i]->class_name,
                'start' => date('Y-m-d H:i:s',strtotime("+7 hours".($schedules[$i]->date_start))),
                'end' => date('Y-m-d H:i:s',strtotime("+7 hours".($schedules[$i]->date_end))), // $schedules[$i]->date_end,
                'allDay' => false,
                'className' => $bgClass
            );
        }
        
        $data = array(
            'events' => $events
        );

        return View::make('schedule.index')->with($data);
    }
}
