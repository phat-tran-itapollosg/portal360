<?php

/*
*   Class StudentController
*   Auhor: Hieu Nguyen
*   Date: 2016-03-15
*   Purpose: To handle user logic
*/

class EnrollmentController extends BaseController {

    public function index() {
        $session = Session::get('session');
        $contact = Session::get('contact');

        // Get sms that linked to the current student
        $relationshipsParams = array(
            'session' => $session->id,
            'module_name' => 'Contacts',
            'module_id' => $contact->id,
            'link_field_name' => 'ju_studentsituations',
            'related_module_query' => 'j_studentsituations.is_delayed <> "1"
            AND type IN ("Enrolled","Settle","Moving In")
            ',
            'related_fields' => array(
                'id',
                'type', 
                'total_hour', 
                'total_amount', 
                'start_study', 
                'end_study',
                'ju_class_id',
                'team_id'
            ),
            'related_module_link_name_to_fields_array' => array(),
            'deleted'=> '0',
            'order_by' => 'j_studentsituations.date_entered DESC',
        );

        $result = $this->client->call(SugarMethod::GET_RELATIONSHIPS, $relationshipsParams);
        $enrollmentArr = $this->client->toSimpleObjectList($result->entry_list);

        foreach($enrollmentArr as $enrollment){
            $class = $this->client->retrieve($session->id, 'J_Class', $enrollment->ju_class_id);  
            $team = $this->client->retrieve($session->id, 'Teams', $enrollment->team_id);  
            $enrollment->class_name = $class->name;
            $enrollment->team_name = $team->name;
        }

        $data = array(
            'enrollentList' => $enrollmentArr,
        );

        return View::make('enrollment.index')->with($data);
    }
}
