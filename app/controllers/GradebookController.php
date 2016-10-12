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
                <tr>
                <td><b>{$lang['lbl_teacher_comment']}:</b></td>
                <td>".$detail->comment."</td>
                </tr>
                <tr>
                </tbody>
                </tabel> 

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
                $name_of_gradebook = explode('-',$gradebook->name);
                $type_of_gradebook = $name_of_gradebook[count($name_of_gradebook) - 1];
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
    }
