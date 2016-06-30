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
            $class_id = $_POST['class_id'];
            $datas = SugarUtil::getGradebookDetail($class_id);
            $html = "";
            $html = "<table id = 'gradebook_content' class = 'table table-striped' width='100%'>
            <thead>
            <tr>
            <td ><b>No.</b></td>            
            <td ><b>Name</b></td>            
            <td ><b>Weight</b></td>
            <td ><b>Date Input</b></td>
            <td ><b>Total Result</b></td>                      
            <td ><b>Center</b></td>            
            <td ><b></b></td>            
            </tr> 
            </thead>  
            <tbody> ";
            //$no = 0;
            //return count($gradebooks);
            $gradebooks = $datas->gradebooks;
            for($i = 0; $i < count($gradebooks); $i++) {  
                $gradebook = $gradebooks[$i]; 
                $detail = $gradebook->detail;
                $detail_content = "<table class = 'gb_detail' width='100%'>
                <tbody>
                <tr>
                <td>Gradebook Name:</td>
                <td>{$gradebook->name}</td>
                </tr>
                <tr>    
                <td>Class Name:</td>
                <td>{$gradebook->class_name}</td>
                </tr>
                <tr>
                <td>Date Input:</td>
                <td>".(SugarUtil::formatDate($gradebook->date_input))."</td>
                </tr>
                <tr>
                <td>Center:</td>
                <td>{$gradebook->center_name}</td>
                </tr>
                <tr>
                </tbody>
                </tabel>
                <hr>
                <table class = 'mark_detail table table-striped' width='100%'>
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
                <td>Weight</td>
                $weight_html
                </tr>
                <tr>    
                <td>Max Score</td> 
                $max_html                
                </tr>
                <tr>    
                <td>Score</td>
                $mark_html
                </tr>                   
                <tr>
                <td>Result (%)</td>
                $per_html
                </tr>
                <tr>
                </tbody>
                </tabel> 
                "; 
                // $detail_content = array(base64_encode($detail_content));

                $tr = "<tr>
                <td class = 'center'>".($i+1)."</td>
                <td>{$gradebook->name}</td>
                <td>{$gradebook->weight}%</td>                 
                <td>".(SugarUtil::formatDate($gradebook->date_input))."</td>                 
                <td>".($gradebook->total_mark +0)."</td>                 
                <td>{$gradebook->center_name}</td>                 
                <td class='center'>
                <input name='detail' type = 'button' value = 'Detail' class ='btn-info btn btn_detail' data='".(base64_encode($detail_content))."' >  
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
                <td ><b>Final Result: </b></td>            
                <td ><b>{$result->mark}</b></td>            
                </tr> 
                </thead>  
                <tbody> 
                <tr>
                <td>Teacher's Comment: </td>
                <td>{$result->comment}</td>
                </tbody>
                </table>
                ";
            }

            return json_encode(array(
                'html' => $html,
                'total_result' => $total_result,
            ));                
        }
    }
