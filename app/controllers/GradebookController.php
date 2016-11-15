<?php
    class GradebookController extends BaseController {

        public function index() {
            //$contact = Session::get('contact');  .
            if(!Session::get('session')) {
                return Redirect::to('home/index');
            }

            $class = SugarUtil::getClassOfStudent();
            $data = array(
                'classes' => $class,
            );
            return View::make('gradebook.index')->with($data);
        }

        public function getGradebookDetail() {
            $class_id = Input::get('class_id');
            $contact = Session::get('contact');
            $student_id = $contact->id;
            $getLMSDetail = array();
            $datas = SugarUtil::getGradebookDetail($class_id);
            $detail_htmls = array();
            $lang = trans('gradebook_index');
            // print_r($lang);
            $html = "";
            // [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) |
            $html = "<table id = 'gradebook_content' class = 'table table-striped table-bordered table-hover table-vmiddle' width='100%'>
            <thead>
            <tr>
            <td ><b>".$lang['lbl_no']."</b></td>            
            <td ><b>".$lang['lbl_name']."</b></td>
            <td ><b>".$lang['lbl_type_of_grade']."</b></td>            
            <td ><b>".$lang['lbl_dateinput']."</b></td>
            <td ><b>".$lang['lbl_total_result']."</b></td>                      
            <td ><b>".$lang['lbl_center']."</b></td>            
            <td ><b></b></td>            
            </tr> 
            </thead>  
            <tbody> ";
            //$no = 0;
            //return count($gradebooks);
            $gradebooks = $datas->gradebooks;
            //, echo json_encode($gradebooks);die;
            for($i = 0; $i < count($gradebooks); $i++) {  
                $gradebook = $gradebooks[$i]; 
                $detail = $gradebook->detail;
                $name_of_gradebook = explode('-',$gradebook->name);
                $type_of_gradebook = $name_of_gradebook[count($name_of_gradebook) - 1];




                if($type_of_gradebook != 'LMS'){
                        $detail_content = "<table class = 'gb_detail' width='100%'>
                        <tbody>
                        <tr>
                        <td><b>{$lang['lbl_name']}:</b></td>
                        <td>{$gradebook->name}</td>
                        </tr>
                        <tr>    
                        <td><b>{$lang['lbl_class_name']}:</b></td>
                        <td>{$gradebook->class_name}</td>
                        </tr>
                        <tr>
                        <td><b>{$lang['lbl_dateinput']}:</b></td>
                        <td>".(SugarUtil::formatDate($gradebook->date_input))."</td>
                        </tr>
                        <tr>
                        <td><b>{$lang['lbl_center']}:</b></td>
                        <td>{$gradebook->center_name}</td>
                        </tr>
                        <tr>
                        
                        <td><b>{$lang['lbl_teacher_comment']}:</b></td>
                        <td>".$detail->comment."</td>
                        </tr>
                        
                        </tbody>
                        </table> 
                        <hr>
                        <div class= 'overflow-auto'>
                        <table class = 'mark_detail table table-striped table-bordered table-hover table-vmiddle' width='100%'>
                        <thead>
                        <tr><th></th>";
                        $header_html = '';
                        $max_html = '';
                        $mark_html = '';
                        $weight_html = '';
                        $per_html = '';
                        for($j = 0; $j < count($detail->header); $j++){
                            $header_html.= "<th>{$detail->header[$j]}</th>"; 
                            $max_html.= "<td>{$detail->max[$j]}</td>"; 
                            $mark_html.= "<td>{$detail->mark[$j]}</td>"; 
                            $weight_html.= "<td>{$detail->weight[$j]}</td>"; 
                            $per_html.= "<td>{$detail->per[$j]}</td>"; 
                        }
                        $detail_content .= "$header_html </tr></thead>
                        <tbody>
                        <tr>
                        <td>{$lang['lbl_weight']}</td>
                        $weight_html
                        </tr>
                        <tr>    
                        <td>{$lang['lbl_max_score']}</td> 
                        $max_html                
                        </tr>
                        <tr>    
                        <td>{$lang['lbl_score']}</td>
                        $mark_html
                        </tr>                   
                        <tr>
                        <td>{$lang['lbl_result']}</td>
                        $per_html
                        </tr>
                        <tr>
                        </tbody>
                        </tabel> 
                        </div>
                        "; 
                        // $detail_content = array(base64_encode($detail_content));
                        $detail_htmls[$i] = $detail_content;
                            
                            
                    }else{

                        $variable = $this->gradebookLMSportal($class_id,$student_id);
                        $detail_content ="<table class='gb_detail' width='100%'>
                                <tbody>
                                <tr>
                                <td><b>{$lang['lbl_name']}:</b></td>
                                <td>{$gradebook->name}</td>
                                </tr>
                                <tr>    
                                <td><b>{$lang['lbl_class_name']}:</b></td>
                                <td>{$gradebook->class_name}</td>
                                </tr>
                                <tr>
                                <td><b>{$lang['lbl_dateinput']}:</b></td>
                                <td>".(SugarUtil::formatDate($gradebook->date_input))."</td>
                                </tr>
                                <tr>
                                <td><b>{$lang['lbl_center']}:</b></td>
                                <td>{$gradebook->center_name}</td>
                                </tr>
                                
                                <tr>
                                <td><b>{$lang['lbl_teacher_comment']}:</b></td>
                                <td>".$detail->comment."</td>
                                </tr>
                                
                                </tbody>
                                </table> <hr> <div class= 'overflow-auto'>";

                                

                        $item = "";
                        $detail_htmls[$i] = $detail_content;
                            foreach ($variable as $data) {
                                // $Total = floatval($data->Speaking) 
                                //     + floatval($data->Listening)
                                //     + floatval($data->Reading)
                                //     + floatval($data->Grammar);
                                $item .= "<div class='panel panel-default'>
                                      <!-- Default panel contents -->
                                      <div class='panel-heading'>{$data->lesson_name}</div>
                                      <!-- Table -->
                                      <div class='panel-body'>
                                      <table class='table'> 
                                        <thead> 
                                            <tr> 
                                                <th>{$lang['Columns']}</th> 
                                                <th>{$lang['Speaking']}</th>
                                                <th>{$lang['Listening']}</th> 
                                                <th>{$lang['Reading']}</th> 
                                                <th>{$lang['Grammar']}</th> 
                                                <th>{$lang['Total']}</th> 
                                                <th></th> 
                                            </tr> 
                                        </thead> 
                                        
                                            <tr> 
                                                <th >%</th> 
                                                <td>".number_format($data->Speaking,2)."</td> 
                                                <td>".number_format($data->Listening,2)."</td> 
                                                <td>".number_format($data->Reading,2)."</td> 
                                                <td>".number_format($data->Grammar,2)."</td> 
                                                <td>".number_format($data->Total,2)."</td> 
                                                <td>
                                                    <td class='center'>
                    <input name='detail' type = 'button' value = '{$lang['lbl_detail']}' class ='btn-info btn btn_lms_detail' data='{$data->sso_code}' >  
                    </td>             
                                                </td>
                                            </tr>
                                        
                                      </table>
                                    </div></div>";
                                    $getLMSDetail[$data->sso_code] = $this->getLMSDetail($class_id, $student_id, $data->sso_code);
                                    // array_push($getLMSDetail,$this->getLMSDetail($class_id, $student_id, $data->sso_code));
                                    
                                
                                    
                            }
                           // $detail_content .="</div>";
                        //$detail_content .= $item."</div>";
                        $detail_htmls[$i] = $detail_content.$item."</div>";
                    }
                
                    $tr = "<tr>
                    <td class = 'center'>".($i+1)."</td>
                    <td>{$gradebook->name}</td>
                    <td><a class='grade_type' data='".$i."'>".$type_of_gradebook."</a></td>                 
                    <td>".(SugarUtil::formatDate($gradebook->date_input))."</td>                 
                    <td>".($gradebook->final_result * 100)."</td>                 
                    <td>{$gradebook->center_name}</td>                 
                    <td class='center'>
                    <input name='detail' type = 'button' value = '{$lang['lbl_detail']}' class ='btn-info btn btn_detail' data='".$i."' >  
                    </td>                  
                    </tr>";
                    $html.= $tr;

            }
            $html .= "</tbody>
            </table>             
            ";
            $total_result = "";
            $result = $datas->total;
            if( !empty($result) ) {
                $total_result = " <table id = 'gradebook_result' width='100%'>
                <thead>
                <tr>
                <td ><b>{$lang['lbl_final_result']}: </b></td>            
                <td ><b>{$result->mark}</b></td>            
                </tr> 
                </thead>  
                <tbody> 
                <tr>
                <td>{$lang['lbl_teacher_comment']}: </td>
                <td>".base64_decode($result->comment)."</td>
                </tbody>
                </table> 
                ";
            }

            if(!empty($result) && !empty($result->certificate_type) && $result->certificate_type != 'Fail') {

                $url = Config::get('app.url')."/gradebook/viewCertificate?class_id=$class_id";
                $total_result .= "
                <hr>
                <input name='detail' type = 'button' value = '{$lang['lbl_certificate']}' class ='btn-info btn btn_certificate' 
                onClick=\"window.open('$url','_blank')\" >  
                ";
            }
            
            return json_encode(array(
                'html' => $html,
                'total_result' => $total_result,
                'detail' => $detail_htmls,
                'getLMSDetail' => $getLMSDetail,
            ));                
        }

        public function viewCertificate() {   
            $classID = Input::get('class_id');             
            $data = SugarUtil::getCertificate($classID);   
            //  'https://view.officeapps.live.com/op/view.aspx?src='.$GLOBALS['sugar_config']['site_url'].'/'.$file;       
            // return Redirect::to('https://docs.google.com/viewer?url='.$data->file_url); 
            if(isset($data->file_url)) {         
                return Redirect::to('https://view.officeapps.live.com/op/view.aspx?src='.$data->file_url);           
            } else {
                echo "<h2>Had error! Try again!</h2>";
                die;
            }
// [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) |

        }

        public function gradebookLMSportal($class_id, $student_id)
        {
            $sql_text ="
                        SELECT result.student_id, result.lesson_name, result.sso_code,
                            MAX(result.Grammar) AS Grammar, 
                            MAX(result.Reading) AS Reading,
                            MAX(result.Listening) AS Listening,
                            MAX(result.Speaking) AS Speaking,
                            (AVG(result.Grammar) + AVG(result.Reading) 
                            + AVG(result.Listening) + AVG(result.Speaking)) AS Total
                        FROM    

                        (SELECT 
                            
                            ac.sso_code,
                            s.sis_student_id student_id,
                            ac.name lesson_name,
                            CASE (ls.skill)
                                WHEN 'Grammar' THEN AVG(ls.score)
                                ELSE 0
                            END 'Grammar',
                            CASE (ls.skill)
                                WHEN 'Reading' THEN AVG(ls.score)
                                ELSE 0
                            END 'Reading',
                            CASE (ls.skill)
                                WHEN 'Listening' THEN AVG(ls.score)
                                ELSE 0
                            END 'Listening',
                            CASE (ls.skill)
                                WHEN 'Speaking' THEN AVG(ls.score)
                                ELSE 0
                            END 'Speaking'
                        FROM
                            (SELECT 
                                MAX(score) score,
                                    MAX(passed) passed,
                                    skill,
                                    level,
                                    title,
                                    alpha_student_id,
                                    alpha_classroom_id
                            FROM
                                alpha_lessons
                            GROUP BY alpha_student_id , alpha_classroom_id , unit_id) ls
                                INNER JOIN
                            alpha_students s ON s.alpha_student_id = ls.alpha_student_id
                            AND s.sis_student_id = '".$student_id."' 
                                AND ls.alpha_classroom_id = s.alpha_classroom_id
                                INNER JOIN
                            alpha_classroom ac ON ac.alpha_classroom_id = ls.alpha_classroom_id
                                INNER JOIN
                            meetings m ON m.deleted = 0
                                AND m.sso_code = ac.sso_code
                                AND m.id = s.session_id
                                AND m.ju_class_id = '".$class_id."' 
                        GROUP BY s.sis_student_id , ac.sso_code , ls.skill
                        ORDER BY class_id , student_id , CASE
                            WHEN ac.name LIKE 'Beginner%' THEN 0
                            WHEN ac.name LIKE 'Elementary%' THEN 1
                            WHEN ac.name LIKE 'Pre-intermediate%' THEN 2
                            WHEN ac.name LIKE 'Intermediate%' THEN 3
                            WHEN ac.name LIKE 'Upper-intermediate%' THEN 4
                            ELSE 5
                        END ASC , lesson_name) result GROUP BY result.lesson_name";

                        /*761f2190-d0c9-85f8-bb8f-57e9ce5f299c student_id */
                        /* e33b145e-d8b3-46cf-0649-57edc5aab064 class id*/
            //var_dump($sql_text);
            //die();
            try{
                $results = DB::select($sql_text);
                return $results;
            } catch (Exception $e) {
                //var_dump($e);die();
                return array();
                
            }
            
        }
        public function getLMSDetail($class_id, $student_id, $sso_code) {
            // $class_id = Input::get('class_id');
            // $student_id = Input::get('student_id');
            $lang = trans('gradebook_index');
            $variable = $this->gradebookLMSportalDetail($class_id,$student_id, $sso_code);
            $html = "<table class='table table-bordered table-striped table-hover table-condensed'>
                <thead> 
                
                <tr>
                    <th class='text-center'>{$lang['Title']}</th>
                    <th class='text-center' colspan='4'>{$lang['LMSScore']}</th>
                </tr>  
                <tr> 
                    <th></th> 
                    <th class='text-center'>{$lang['Speaking']}</th>
                    <th class='text-center'>{$lang['Listening']}</th> 
                    <th class='text-center'>{$lang['Reading']}</th> 
                    <th class='text-center'>{$lang['Grammar']}</th> 
                   
                </tr> 
              
                </thead>
                <tbody>
                    ";
                    foreach ($variable as $value) {
                       $html .= "
                        <tr> 
                            <td >{$value->RE_title}</td> 
                            <td>".(floatval($value->Speaking) > 0 ? number_format($value->Speaking,2) : '')."</td> 
                            <td>".(floatval($value->Listening) > 0 ?number_format($value->Listening,2): '')."</td> 
                            <td>".(floatval($value->Reading) > 0 ?number_format($value->Reading,2): '')."</td> 
                            <td>".(floatval($value->Grammar) > 0 ?number_format($value->Grammar,2): '')."</td> 
                            
                            
                        </tr>";
                    }

            $html .=        "
                </tbody>
            </table>";//$html
            return array(
                'body' => $html,
                'title' => $variable[0]->classroom_name,
                );
            // return json_encode(array(
            //     'html' => $html,
            //     // 'total_result' => $total_result,
            //     // 'detail' => $detail_htmls,
            // ));
            // // echo $html;die();
            // exit();
        }
        public function gradebookLMSportalDetail($class_id, $student_id, $sso_code)
        {
            $sql_text ="
                        SELECT 
                            m.ju_class_id class_id,
                            cc.j_class_contacts_1contacts_idb student_id,
                            c.full_student_name student_name,
                            ac.name classroom_name,
                            al.lesson_name RE_title,
                            CASE (ls.skill)
                                WHEN 'Grammar' THEN ls.score
                                ELSE 0
                                END 'Grammar',
                                CASE (ls.skill)
                                WHEN 'Reading' THEN ls.score
                                ELSE 0
                                END 'Reading',
                                CASE (ls.skill)
                                WHEN 'Listening' THEN ls.score
                                ELSE 0
                                END 'Listening',
                                CASE (ls.skill)
                                WHEN 'Speaking' THEN ls.score
                                ELSE 0
                            END 'Speaking'
                        FROM
                            alpha_lessonname al
                        INNER JOIN
                            alpha_classroom ac ON al.alpha_classroom_id = ac.id AND ac.sso_code = '$sso_code'
                        INNER JOIN
                            meetings m ON ac.sso_code = m.sso_code 
                                        AND m.deleted = 0
                                        AND m.ju_class_id = '$class_id' 
                                        AND convert(date_add(m.date_start, interval -161 hour), date) <= CURDATE()
                        INNER JOIN
                            j_class_contacts_1_c cc ON cc.j_class_contacts_1j_class_ida = m.ju_class_id
                                                        AND cc.deleted = 0
                        INNER JOIN contacts c on c.id = cc.j_class_contacts_1contacts_idb
                                                AND c.deleted = 0
                                                AND c.id = '$student_id' 
                        LEFT JOIN
                            (
                                SELECT 
                                    MAX(alpha_lessons.score) score,
                                    MAX(alpha_lessons.passed) passed,
                                    alpha_lessons.skill,
                                    alpha_lessons.level,
                                    alpha_lessons.title,
                                    alpha_lessons.alpha_student_id,
                                    alpha_lessons.alpha_classroom_id,
                                    alpha_students.sis_student_id
                                FROM
                                    alpha_lessons
                                INNER JOIN alpha_students ON alpha_lessons.alpha_student_id = alpha_students.alpha_student_id
                                WHERE
                                    IFNULL(alpha_students.sis_student_id, '') <> ''
                                GROUP BY alpha_student_id , alpha_classroom_id , unit_id
                            ) 
                            ls ON ls.alpha_classroom_id = ac.alpha_classroom_id
                                AND ls.title = al.lesson_name  
                                AND ls.sis_student_id = cc.j_class_contacts_1contacts_idb
                        GROUP BY student_id , classroom_name , lesson_name
                        ORDER BY class_id , student_id , CASE
                                                            WHEN ac.name LIKE 'Beginner%' THEN 0
                                                            WHEN ac.name LIKE 'Elementary%' THEN 1
                                                            WHEN ac.name LIKE 'Pre-intermediate%' THEN 2
                                                            WHEN ac.name LIKE 'Intermediate%' THEN 3
                                                            WHEN ac.name LIKE 'Upper-intermediate%' THEN 4
                                                            ELSE 5
                                                            END ASC , ac.sis_lesson_number;
                            ";

                        /*761f2190-d0c9-85f8-bb8f-57e9ce5f299c student_id */
                        /* e33b145e-d8b3-46cf-0649-57edc5aab064 class id*/
            //var_dump($sql_text);
            //die();
            try{
                $results = DB::select($sql_text);
                return $results;
            } catch (Exception $e) {
                //var_dump($e);die();
                return array();
                
            }
            
        }
    }
