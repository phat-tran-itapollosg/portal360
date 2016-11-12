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
                        $bgClass = 'textbg_greenlight';
                }
                // The session is not started
                else {
                    $bgClass = 'textbg_orange';
                }
                $start = date('Y-m-d H:i:s',strtotime("+7 hours".($schedules[$i]->date_start)));
                $end = date('Y-m-d H:i:s',strtotime("+7 hours".($schedules[$i]->date_end)));
               
                $events[] = array(
                    'title' => $schedules[$i]->session_name,
                    'start' => $start,
                    'starttime' => SugarUtil::formatDate($schedules[$i]->date_start),
                    'startinpopup' => SugarUtil::formatDate($start),
                    'end' => $end,
                    'endtime' => SugarUtil::formatDate($schedules[$i]->date_end),
                    'endinpopup' => SugarUtil::formatDate($end),
                    'teacher_name' => $schedules[$i]->teacher_name, 
                    'class_name' => $schedules[$i]->class_name, 
                    'room_name' => $schedules[$i]->room_name, 
                    'duration' => $schedules[$i]->duration, 
                    'allDay' => false,
                    'className' => $bgClass
                );
            }

            $data = array(
                'events' => $events
            );

            return View::make('schedule.index')->with($data);
        }

        public function listview() {             
            $schedules = SugarUtil::getSchedules();
            
            for($i = 0; $i < count($schedules); $i++) {
                $start = date('Y-m-d H:i:s',strtotime("+7 hours".($schedules[$i]->date_start)));
                $end = date('Y-m-d H:i:s',strtotime("+7 hours".($schedules[$i]->date_end)));
               
                $schedules[$i]->startinpopup = SugarUtil::formatDate($start);
                $schedules[$i]->endinpopup = SugarUtil::formatDate($end);
            }
            $data = array(
                'schedules' => $schedules
            );    
            return View::make('schedule.listview')->with($data);
        }
    }
