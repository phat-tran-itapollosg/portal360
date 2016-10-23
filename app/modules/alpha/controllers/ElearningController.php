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

    public function index(){
        $Classroom = \AlphaClassroom::all();
        $this->layout->content = \view::make('alpha::elearning.index')->with(array('Classroom' => $Classroom));
    }
    public function retrieve_result($id = NULL){
        if(isset($id) && !empty($id)){
            $result = $this->retrievecourse($id,1);
            $count_students = 0;
            $count_courses = 0;
            $count_lessons = 0;
            if($result['error'] == FALSE){
                if(intval($result['total_pages']) > 1){
                    for ($i=1; $i < $result['total_pages']; $i++) { 
                        $result = $this->retrievecourse($id, $i + 1);
                        $count_students = intval($result['count_students']);
                        $count_courses = intval($result['count_courses']);
                        $count_lessons = intval($result['count_lessons']);
                    }
                    $this->layout->content = \view::make('alpha::elearning.retrieve')->with(array(
                        'classroom' => $result['classroom'],
                        'count_students' => $count_students,
                        'count_courses' => $count_courses,
                        'count_lessons' => $count_lessons,
                        ));
                }else{                    
                    $this->layout->content = \view::make('alpha::elearning.retrieve')->with(array(
                        'classroom' => $result["data"]['classroom'],
                        'count_students' => $result["data"]['count_students'],
                        'count_courses' => $result["data"]['count_courses'],
                        'count_lessons' => $result["data"]['count_lessons'],
                        ));
                }
            }else{
                return App::make("ErrorsController")->callAction("error", ['code'=>500,'messenger' => $result['messenger']]);
            }
        }else{
             return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
        }
    }
    public function retrievecourse($id,$page){

        $serviceConfig = \Config::get('app.service_elearning');
        $url = $serviceConfig['retrievingUrl'].$id.".json?page=".$page;//"https://re.reallyenglish.com/teachatapollo/sso"; 
        // var_dump($url);die();
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
           //var_dump($info);
           if (empty($info['http_code']) OR ($info['http_code'] == 404)) { 
                return array(
                    'error' => TRUE,
                    'messenger' => "No HTTP code was returned"
                );
           } else { 
                $array = json_decode($result, true);
                //var_dump($array);
                //die();
                $classroom = array(
                    "updated_at" => $array["updated_at"],
                    "created_at"=> $array["created_at"],
                    "total_pages"=> $array["course_pagination"]["total_pages"],
                    "per_page"=> $array["course_pagination"]["per_page"],
                    "name"=> $array["name"],
                    "id"=> $array["id"],
                    );

                $AlphaClassroom = $this->classroomfindAndCreate($classroom);
                // var_dump($AlphaClassroom->getKey());die();
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
                        "alpha_classroom_id" => $AlphaClassroom->getKey(),
                        "classroom_id" => $AlphaClassroom->id
                        );

                    $deleteStudents = \AlphaStudents::where('alpha_classroom_id', '=', $AlphaClassroom->getKey())
                    ->update(array('alpha_delete' => 1));

                    $deleteCourses = \AlphaCourses::where('alpha_classroom_id', '=', $AlphaClassroom->getKey())
                    ->update(array('alpha_delete' => 1));

                    $deleteLessons = \AlphaLessons::where('alpha_classroom_id', '=', $AlphaClassroom->getKey())
                    ->update(array('alpha_delete' => 1));
                    // var_dump($deleteStudents);
                    // var_dump($deleteCourses);
                    // var_dump($deleteLessons);
                    // die();
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
                            "alpha_classroom_id" => $AlphaClassroom->getKey(),
                            "alpha_student_id" => $AlphaStudents->getKey()
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
                                "alpha_course_id" => $AlphaCourses->getKey(),
                                "alpha_classroom_id" => $AlphaClassroom->getKey(),
                                "alpha_student_id" => $AlphaStudents->getKey()
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

            		$Class = new \AlphaClassroom;
                    $Class->alpha_classroom_id = \AlphaUtil::create_guid();
                    $Class->name = $classroom['name'];
                    $Class->id = $classroom['id'];

                    $updated_at = new \DateTime($classroom['updated_at']);                 
                    $Class->updated_at = $updated_at->format('Y-m-d H:i:s');

                    $created_at = new \DateTime($classroom['created_at']);
                    $Class->created_at = $created_at->format('Y-m-d H:i:s');

                    $time_retrieve = new \DateTime();
                    $Class->time_retrieve = $time_retrieve->format('Y-m-d H:i:s');

                    $Class->total_pages = $classroom['total_pages'];
            		$Class->per_page = $classroom['per_page'];
            		$Class->save();

            }else{
                $Class->total_pages = $classroom['total_pages'];
                $Class->per_page = $classroom['per_page'];
                $time_retrieve = new \DateTime();
                $Class->time_retrieve = $time_retrieve->format('Y-m-d H:i:s');

                $Class->save();
            }
        	return $Class;
    	}else{
    		return NULL;
    	}
    }
    public function studentfindAndCreate($student)
    {

        if(!empty($student)){
            $record = \AlphaStudents::where('login' , $student['login'])
            ->where('first_name', $student['first_name'])
            ->where('last_name', $student['last_name'])
            ->where('email', $student['email'])
            ->where('alpha_classroom_id', $student['alpha_classroom_id'])
            ->first();
            if($record == NULL){
                $record = new \AlphaStudents;
                $record->alpha_student_id = \AlphaUtil::create_guid();
                $record->login = $student['login'];
                $record->login = $student['login'];
                $record->first_name = $student['first_name'];
                $record->last_name = $student['last_name'];
                $record->email = $student['email'];
                $record->alpha_classroom_id = $student['alpha_classroom_id'];
                $record->classroom_id = $student['classroom_id'];
                $record->save();
            }else{
                $record->alpha_delete = 0;
                $record->save();
            }
            return $record;
        }else{
            return NULL;
        }
    }
    public function coursefindAndCreate($course)
    {
        if(!empty($course)){
            $record = \AlphaCourses::where('id' , $course['id'])
            ->first();

            if($record == NULL){
                $record = new \AlphaCourses;
                $record->alpha_course_id = \AlphaUtil::create_guid();

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
            }else{
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

                $record->alpha_delete = 0;
                $record->save();
            }
            return $record;
        }else{
            return NULL;
        }
    }
    public function lessonfindAndCreate($lesson)
    {


        if(!empty($lesson)){
            $record = \AlphaLessons::where('id' , $lesson['id'])
            ->first();
            if($record == NULL){
                $record = new \AlphaLessons;
                $record->alpha_lesson_id = \AlphaUtil::create_guid();

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
            }else{
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

                $record->alpha_delete = 0;
                $record->save();
            }
            return $record;
        }else{
            return NULL;
        }
    }

    protected function studentsOfClass($id = NULL)
    {
        if(!empty($id)){
            $record = \AlphaClassroom::find($id);
            $students = $record->students()->where('alpha_delete', '=', '0')->get();
            //var_dump($record->students()->where('alpha_delete', '=', '0')->get());die();
            // ->first();
            $this->layout->content = \view::make('alpha::elearning.classroom')
                                ->with(array(
                                    'classroom' => $record,
                                    'students' => $students,
                                    ));
        }else{
            return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
        }
        
        
    }
    protected function coursesOfStudents($id)
    {
        if(!empty($id)){
            $record = \AlphaStudents::find($id);
            $courses = $record->courses()->where('alpha_delete', '=', '0')->get();
            
            //->first();
            $this->layout->content = \view::make('alpha::elearning.courses')
                                ->with(array(
                                    'record' => $record,
                                    'courses' => $courses,
                                    ));
        }else{
            return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
        }
    }   
    protected function lessionsOfCourse($id)
    {
        if(!empty($id)){
            $record = \AlphaCourses::find($id);
            $lessons = $record->lessons()->where('alpha_delete', '=', '0')->get();
            // ->first();
            $this->layout->content = \view::make('alpha::elearning.lessons')
                                ->with(array(
                                    'record' => $record,
                                    'lessons' => $lessons,
                                    ));
        }else{
            return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
        }

    }

    public function retrieve_result_json($id = NULL){
        if(isset($id) && !empty($id)
           AND isset($_REQUEST['username']) AND !empty($_REQUEST['username'])
           AND isset($_REQUEST['password']) AND !empty($_REQUEST['password'])
        ){
            //var_dump($_REQUEST);die();
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            // $remember = Input::get('remember_me');
            $result = $this->client->login($username, $password);
            if($result != 'success_for_admin'){
                header('Content-type: application/json');
                echo json_encode(array(
                    'success'=>0,
                    'notify'=>'Authorization Required'
                ));
                exit();
            }
            $result = $this->retrievecourse($id,1);
            $count_students = 0;
            $count_courses = 0;
            $count_lessons = 0;
            if($result['error'] == FALSE){
                if(intval($result['total_pages']) > 1){
                    for ($i=1; $i < $result['total_pages']; $i++) { 
                        $result = $this->retrievecourse($id, $i + 1);
                        $count_students = intval($result['count_students']);
                        $count_courses = intval($result['count_courses']);
                        $count_lessons = intval($result['count_lessons']);
                    }
                    // $this->layout->content = \view::make('alpha::elearning.retrieve')->with(array(
                    //     'classroom' => $result['classroom'],
                    //     'count_students' => $count_students,
                    //     'count_courses' => $count_courses,
                    //     'count_lessons' => $count_lessons,
                    //     ));
                    header('Content-type: application/json');
                    echo json_encode(array(
                        'success'=>1,
                        'notify'=>'Success',
                        'value_list' => array(
                            'classroom' => $result["data"]['classroom'],
                            'count_students' => $result["data"]['count_students'],
                            'count_courses' => $result["data"]['count_courses'],
                            'count_lessons' => $result["data"]['count_lessons'],
                        )
                    ));
                    exit();
                }else{                    
                    // $this->layout->content = \view::make('alpha::elearning.retrieve')->with(array(
                    //     'classroom' => $result["data"]['classroom'],
                    //     'count_students' => $result["data"]['count_students'],
                    //     'count_courses' => $result["data"]['count_courses'],
                    //     'count_lessons' => $result["data"]['count_lessons'],
                    //     ));
                    header('Content-type: application/json');
                    echo json_encode(array(
                        'success'=>1,
                        'notify'=>'Success',
                        'value_list' => array(
                            'classroom' => $result["data"]['classroom'],
                            'count_students' => $result["data"]['count_students'],
                            'count_courses' => $result["data"]['count_courses'],
                            'count_lessons' => $result["data"]['count_lessons'],
                        )
                    ));
                    exit();
                }
            }else{
                // return App::make("ErrorsController")->callAction("error", ['code'=>500,'messenger' => $result['messenger']]);
                header('Content-type: application/json');
                echo json_encode(array(
                    'success'=>0,
                    'notify'=>$result['messenger']
                ));
                exit();
            }
        }else{
             // return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
            header('Content-type: application/json');
            echo json_encode(array(
                'success'=>0,
                'notify'=>'Looks like Something went wrong.'
            ));
            exit();
        }
    }
}

// function \AlphaUtil::create_guid()
// {
//     $microTime = microtime();
//     list($a_dec, $a_sec) = explode(" ", $microTime);

//     $dec_hex = dechex($a_dec* 1000000);
//     $sec_hex = dechex($a_sec);

//     ensure_length($dec_hex, 5);
//     ensure_length($sec_hex, 6);

//     $guid = "";
//     $guid .= $dec_hex;
//     $guid .= \AlphaUtil::create_guid_section(3);
//     $guid .= '-';
//     $guid .= \AlphaUtil::create_guid_section(4);
//     $guid .= '-';
//     $guid .= \AlphaUtil::create_guid_section(4);
//     $guid .= '-';
//     $guid .= \AlphaUtil::create_guid_section(4);
//     $guid .= '-';
//     $guid .= $sec_hex;
//     $guid .= \AlphaUtil::create_guid_section(6);

//     return $guid;

// }

// function \AlphaUtil::create_guid_section($characters)
// {
//     $return = "";
//     for($i=0; $i<$characters; $i++)
//     {
//         $return .= dechex(mt_rand(0,15));
//     }
//     return $return;
// }
// function ensure_length(&$string, $length)
// {
//     $strlen = strlen($string);
//     if($strlen < $length)
//     {
//         $string = str_pad($string,$length,"0");
//     }
//     else if($strlen > $length)
//     {
//         $string = substr($string, 0, $length);
//     }
// }