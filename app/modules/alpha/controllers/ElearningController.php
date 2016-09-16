<?php 

namespace App\Modules\Alpha\Controllers;

use App, Entry, View;
use Illuminate\Support\Facades\Input;
/**
 * Content controller
 * @author Eroshaly <Eroshaly@gmail.com>
 */
class ElearningController extends \BaseController {
	protected $layout = 'layout.layout_master'; 

    public function retrieve(){

        $this->layout->content = \view::make('alpha::elearning.retrieve')->with(array());
    }
    public function index(){

        $result = $this->retrievecourse(1);
        $count_students = 0;
        $count_courses = 0;
        $count_lessons = 0;
                // var_dump('<pre>');
                // var_dump($result["data"]);
                // var_dump('</pre>');
                // die();
        if($result['error'] == FALSE){
            if(intval($result['total_pages']) > 1){
                for ($i=1; $i < $result['total_pages']; $i++) { 
                    $result = $this->retrievecourse( $i + 1);
                    $count_students = intval($result['count_students']);
                    $count_courses = intval($result['count_courses']);
                    $count_lessons = intval($result['count_lessons']);
                }
                // var_dump($count_students);
                // var_dump($count_courses);
                // var_dump($count_lessons);
                // die();
                $this->layout->content = \view::make('alpha::elearning.retrieve')->with(array(
                    'classroom' => $result['classroom'],
                    'count_students' => $count_students,
                    'count_courses' => $count_courses,
                    'count_lessons' => $count_lessons,
                    ));
            }else{
                // classroom
                
                $this->layout->content = \view::make('alpha::elearning.retrieve')->with(array(
                    'classroom' => $result["data"]['classroom'],
                    'count_students' => $result["data"]['count_students'],
                    'count_courses' => $result["data"]['count_courses'],
                    'count_lessons' => $result["data"]['count_lessons'],
                    ));
                // var_dump($result);
                // die();
            }
        }else{
            return App::make("ErrorsController")->callAction("error", ['code'=>500,'messenger' => $result['messenger']]);
        }
    }
    public function retrievecourse($page){

        $serviceConfig = \Config::get('app.service_elearning');
        $url = $serviceConfig['retrievingUrl']."20130.json?page=".$page;//"https://re.reallyenglish.com/teachatapollo/sso"; 
        $ch = curl_init(); // initialize curl handle 
        curl_setopt($ch, CURLOPT_HEADER, false);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                       'X_API_KEY: '.$serviceConfig['auth']['api_key'],
                                       'Accept: application/json',
                                     ));
        $result = curl_exec($ch); // run the whole process 
        
        if (empty($result)) { 
           // some kind of an error happened 
            return array(
                    'error' => TRUE,
                    'messenger' => curl_error($ch)
                );
           // return App::make("ErrorsController")->callAction("error", ['code'=>500,'messenger' => curl_error($ch)]);
           curl_close($ch); // close cURL handler 
        } else { 
           $info = curl_getinfo($ch); 
           curl_close($ch); // close cURL handler 
           if (empty($info['http_code'])) { 
                return array(
                    'error' => TRUE,
                    'messenger' => "No HTTP code was returned"
                );
                   // return App::make("ErrorsController")->callAction("error", ['code'=>500,'messenger' => "No HTTP code was returned"]);
           } else { 
                //var_dump($url);
                $array = json_decode($result, true);

                $classroom = array(
                    "updated_at" => $array["updated_at"],
                    "created_at"=> $array["created_at"],
                    "total_pages"=> $array["course_pagination"]["total_pages"],
                    "per_page"=> $array["course_pagination"]["per_page"],
                    "name"=> $array["name"],
                    "id"=> $array["id"],
                    );

                $AlphaClassroom = $this->classroomfindAndCreate($classroom);
                $count_students = 0;
                $count_courses = 0;
                $count_lessons = 0;
                foreach ($array['students'] as $students) {
                    $count_students++;
                    $student = array(
                        "last_name" => $students['last_name'],
                        "login" => $students['login'],
                        "first_name" => $students['first_name'],
                        "email" => $students['email'],
                        "alpha_classroom_id" => $AlphaClassroom->classroom_id
                        );

                    $AlphaStudents = $this->studentfindAndCreate($student);
                    foreach ($students['courses'] as $courses) {
                        $count_courses++;
                        $course = array(
                            "end_date" => $courses['end_date'],
                            "start_date" => $courses['start_date'],
                            "payment_status" => $courses['payment_status'],
                            "parent_id" => $courses['parent_id'],
                            "classroom_id" => $courses['classroom_id'],
                            "updated_at" => $courses['updated_at'],
                            "course_type" => $courses['course_type'],
                            "access_end_date" => $courses['access_end_date'],
                            "registration_item_id" => $courses['registration_item_id'],
                            "created_at" => $courses['created_at'],
                            "access_start_date" => $courses['access_start_date'],
                            "course_name" => $courses['course_name'],
                            "course_id" => $courses['course_id'],
                            "member_id" => $courses['member_id'],
                            "linking" => $courses['linking'],
                            "course_session_id" => $courses['course_session_id'],
                            "id" => $courses['id'],
                            "alpha_classroom_id" => $AlphaClassroom->classroom_id,
                            "alpha_student_id" => $AlphaStudents->student_id
                            );

                        $AlphaCourses = $this->coursefindAndCreate($course);
                        foreach ($courses['lessons'] as $lessons) {
                            $count_lessons++;
                            $lesson = array(
                                "title_local" => $lessons['title_local'],
                                "skill" => $lessons['skill'],
                                "updated_at" => $lessons['updated_at'],
                                "level" => $lessons['level'],
                                "title" => $lessons['title'],
                                "created_at" => $lessons['created_at'],
                                "passed_in_course" => $lessons['passed_in_course'],
                                "session_id" => $lessons['session_id'],
                                "passed" => $lessons['passed'],
                                "submitted" => $lessons['submitted'],
                                "graded" => $lessons['graded'],
                                "grade" => $lessons['grade'],
                                "status" => $lessons['status'],
                                "time" => $lessons['time'],
                                "unit_type" => $lessons['unit_type'],
                                "unit_id" => $lessons['unit_id'],
                                "id" => $lessons['id'],
                                "score" => $lessons['score'],
                                "alpha_course_id" => $AlphaCourses->alpha_course_id,
                                "alpha_classroom_id" => $AlphaClassroom->classroom_id,
                                "alpha_student_id" => $AlphaStudents->student_id
                                );

                            $AlphaLessons = $this->lessonfindAndCreate($lesson);




                        }



                    }
                }


                // var_dump($classroom);
                // var_dump($count_students);
                // var_dump($count_courses);
                // var_dump($count_lessons);
                return array(
                    'error' => FALSE,
                    'data' => array(
                        'classroom' => $classroom,
                        'count_students' => $count_students,
                        'count_courses' => $count_courses,
                        'count_lessons' => $count_lessons,
                        ),
                    'next_page' => $array["course_pagination"]["next_page"] ,
                    'current_page' => $array["course_pagination"]["current_page"] ,
                    'total_pages' => $array["course_pagination"]["total_pages"] ,
                    'messenger' => ""
                );
                // die();
                // $xml = new SimpleXMLElement($result);
                // if(isset($xml->url_start[0]) && !empty($xml->url_start[0])){
                //   var_dump($xml->url_report[0]);die;
                //   header("Location: ".$xml->url_report[0]);
                //     exit();  
                // }else{
                //     return App::make("ErrorsController")->callAction("error", ['code'=>500,'messenger' => $result]);
                // }                
           } 
        } 
    }
    public function classroomfindAndCreate($classroom)
    {
    	if(!empty($classroom)){
    		$Class = \AlphaClassroom::where('id' , $classroom['id'])
        	->first();

        	if($Class == NULL){
                // "course_pagination":{
                //     "current_page":1,
                //     "previous_page":null,
                //     "per_page":100,
                //     "next_page":null,
                //     "total_pages":1
                // },
                // "id":20130,
                // "created_at":"2016-08-04T08:34:56Z",
                // "name":"TEST_GROUP",
                // "students":[],
                // "updated_at":"2016-08-04T08:34:56Z"
                // try{
            		$Class = new \AlphaClassroom;
                    $Class->name = $classroom['name'];
                    $Class->id = $classroom['id'];

                    $updated_at = new \DateTime($classroom['updated_at']);                 
                    $Class->updated_at = $updated_at->format('Y-m-d H:i:s');

                    $created_at = new \DateTime($classroom['created_at']);
                    $Class->created_at = $created_at->format('Y-m-d H:i:s');

                    $Class->total_pages = $classroom['total_pages'];
            		$Class->per_page = $classroom['per_page'];
            		$Class->save();
                // }
                // catch(Exception $e){
                //    // do task when error
                //    echo $e->getMessage();   // insert query
                // }
                    //var_dump($Class);
                //die();
            }else{
                $Class->total_pages = $classroom['total_pages'];
                $Class->per_page = $classroom['per_page'];
                $Class->save();
            }
        	return $Class;
    	}else{
    		return NULL;
    	}
    }
    public function studentfindAndCreate($student)
    {
        // "courses":[],
        // "last_name":"Schenker",
        // "first_name":"Michael",
        // "login":"yoshin",
        // "email":"yoshin+apollo@reallyenglish.com"
        if(!empty($student)){
            $record = \AlphaStudents::where('login' , $student['login'])
            ->where('first_name', $student['first_name'])
            ->where('last_name', $student['last_name'])
            ->where('email', $student['email'])
            // ->where('classroom_id', $student['classroom_id'])
            ->first();
            if($record == NULL){
                $record = new \AlphaStudents;
                $record->login = $student['login'];
                $record->first_name = $student['first_name'];
                $record->last_name = $student['last_name'];
                $record->email = $student['email'];
                $record->alpha_classroom_id = $student['alpha_classroom_id'];
                $record->save();
            }
            return $record;
        }else{
            return NULL;
        }
    }
    public function coursefindAndCreate($course)
    {
        // "lessons":[],
        // "parent_id":null,
        // "id":720285,
        // "access_start_date":"2016-08-01T00:00:00+09:00",
        // "course_type":"PE6",
        // "course_name":"Practical English 6",
        // "created_at":"2016-08-04T08:34:56Z",
        // "registration_item_id":408395,
        // "access_end_date":"2016-12-31T00:00:00+09:00",
        // "end_date":"2016-12-31T00:00:00+09:00",
        // "payment_status":0,
        // "member_id":313750,
        // "linking":1,
        // "classroom_id":20130,
        // "updated_at":"2016-08-04T08:34:56Z",
        // "start_date":"2016-08-01T00:00:00+09:00",
        // "course_session_id":15612,
        // "course_id":15910
        if(!empty($course)){
            $record = \AlphaCourses::where('id' , $course['id'])
            ->first();

            if($record == NULL){
                $record = new \AlphaCourses;
                $record->course_name = $course['course_name'];

                $updated_at = new \DateTime($course['updated_at']);   
                $record->updated_at = $updated_at->format('Y-m-d H:i:s');

                $access_end_date = new \DateTime($course['access_end_date']); 
                $record->access_end_date = $access_end_date->format('Y-m-d H:i:s');

                $created_at = new \DateTime($course['created_at']); 
                $record->created_at = $created_at->format('Y-m-d H:i:s');

                $end_date = new \DateTime($course['end_date']); 
                $record->end_date = $end_date->format('Y-m-d H:i:s');

                $start_date = new \DateTime($course['start_date']); 
                $record->start_date = $start_date->format('Y-m-d H:i:s');

                $access_start_date = new \DateTime($course['access_start_date']); 
                $record->access_start_date = $access_start_date->format('Y-m-d H:i:s');

                $record->course_session_id = $course['course_session_id'];
                $record->id = $course['id'];
                $record->payment_status = $course['payment_status'];
                $record->classroom_id = $course['classroom_id'];
                $record->member_id = $course['member_id'];
                $record->linking = $course['linking'];
                $record->course_type = $course['course_type'];
                
                
                $record->parent_id = $course['parent_id'];
                $record->registration_item_id = $course['registration_item_id'];
                $record->alpha_student_id = $course['alpha_student_id'];
                $record->alpha_classroom_id = $course['alpha_classroom_id'];
                $record->save();
            }
            return $record;
        }else{
            return NULL;
        }
    }
    public function lessonfindAndCreate($lesson)
    {
        // "graded":null,
        // "score":80,
        // "skill":"Listening",
        // "passed":true,
        // "status":0,
        // "session_id":"febf-95df-0bc9-cc210@html_57d12567fe23bf0cee00bf11",
        // "unit_type":"Lesson",
        // "id":23925040,
        // "level":"1",
        // "created_at":"2016-09-08T09:03:28Z",
        // "time":null,
        // "grade":null,
        // "unit_id":"50191e505ce5587fef000096",
        // "updated_at":"2016-09-08T09:03:28Z",
        // "submitted":"2016-09-08T09:03:27Z",
        // "title":"My working day",
        // "title_local":"My working day",
        // "passed_in_course":true

        if(!empty($lesson)){
            $record = \AlphaLessons::where('id' , $lesson['id'])
            ->first();
            if($record == NULL){
                $record = new \AlphaLessons;
                $record->graded = $lesson['graded'];
                $record->score = $lesson['score'];
                $record->skill = $lesson['skill'];
                $record->passed = $lesson['passed'];
                $record->status = $lesson['status'];
                $record->session_id = $lesson['session_id'];
                $record->unit_type = $lesson['unit_type'];
                $record->id = $lesson['id'];
                $record->level = $lesson['level'];

                $created_at = new \DateTime($lesson['created_at']); 
                $record->created_at = $created_at->format('Y-m-d H:i:s');

                $updated_at = new \DateTime($lesson['updated_at']); 
                $record->updated_at = $updated_at->format('Y-m-d H:i:s');

                $submitted = new \DateTime($lesson['submitted']); 
                $record->submitted = $submitted->format('Y-m-d H:i:s');


                $record->time = $lesson['time'];
                $record->grade = $lesson['grade'];
                $record->unit_id = $lesson['unit_id'];
                
                
                $record->title = $lesson['title'];
                $record->title_local = $lesson['title_local'];
                $record->passed_in_course = $lesson['passed_in_course'];
                $record->alpha_course_id = $lesson['alpha_course_id'];
                $record->alpha_student_id = $lesson['alpha_student_id'];
                $record->alpha_classroom_id = $lesson['alpha_classroom_id'];
                $record->save();
            }
            return $record;
        }else{
            return NULL;
        }
    }

}

