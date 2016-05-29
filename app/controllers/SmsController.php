<?php

/*
*   Class StudentController
*   Auhor: Hieu Nguyen
*   Date: 2016-03-15
*   Purpose: To handle user logic
*/

class SmsController extends BaseController {

    public function index() {
        $session = Session::get('session');
        $contact = Session::get('contact');

        // Get sms that linked to the current student
        $relationshipsParams = array(
            'session' => $session->id,
            'module_name' => 'Contacts',
            'module_id' => $contact->id,
            'link_field_name' => 'contacts_sms',
            'related_module_query' => 'c_sms.parent_type = "Contacts"',
            'related_fields' => array(
                'id', 'phone_number', 'description', 'delivery_status', 'date_send'
            ),
            'related_module_link_name_to_fields_array' => array(),
            'deleted'=> '0',
            'order_by' => 'c_sms.date_entered DESC',
        );

        $result = $this->client->call(SugarMethod::GET_RELATIONSHIPS, $relationshipsParams);
        $smsArr = $this->client->toSimpleObjectList($result->entry_list);
        
        $data = array(
            'smsList' => $smsArr,
        );

        return View::make('sms.index')->with($data);
    }
}
