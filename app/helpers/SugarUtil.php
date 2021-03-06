<?php

    /*
    *   Class ViewUtil
    *   Auhor: Hieu Nguyen
    *   Date: 2016-03-15
    *   Purpose: To handle Sugar's util methods
    */

    class SugarUtil {

        // Util function to get the SugarClient to handle webservice methods
        static function getClient() {
            $serviceConfig = Config::get('app.service_config');
            $serverUrl = $serviceConfig['server_url'];
            $customService = $serviceConfig['custom_service'];
            $rootUsername = $serviceConfig['root_username'];
            $rootPassword = $serviceConfig['root_password'];

            $client = new SugarClient($serverUrl, $customService, $rootUsername, $rootPassword);
            return $client;
        }

        /**
        * function check session_id API is die
        * 
        * @param string session_id 
        * @return bool
        * 
        * @author Trung Nguyen 2016.06.17
        */
        public static function checkSession($session_id) {              
            $client = self::getClient();
            $params = array(
                'session' => $session_id
            );
            $result = $client->call("check_session", $params);  
            if(isset($result->status))          
                return $result->status;
            return false;             
        }

        // Util function to get complaint list that belongs to the current portal contact
        public static function getFeedbackList() {
            $client = self::getClient();
            $session = Session::get('session');
            $student = Session::get('contact');
            //$rootSession = $client->getRootSession();

            // Get feedback list
            /* $feddbacks = $client->getFullList(
            $session->root_session_id, 
            'Cases',
            array(),    // Get all fields
            'cases.student_id = "'.$student->id.'"',
            'cases.date_entered ASC'
            );  */
            $relationshipsParams = array(
                'session' => $session->root_session_id,
                'module_name' => 'Contacts',
                'module_id' => $student->id,
                'link_field_name' => 'contacts_j_feedback_1',      
                'related_module_query' => 'j_feedback.type_feedback_list = "Customer" ' ,
                'related_fields' => array(
                    'id', 'name', 'status',  'description', 
                    'assigned_user_name', 'date_entered', 'slc_target', 'resolved_date' ,
                    'type_feedback_list','relate_feedback_list', 'feedback', 'receiver'
                ),
                'related_module_link_name_to_fields_array' => array(),
                'deleted'=> '0',
                'order_by' => 'j_feedback.date_entered DESC',
                'offset' => 0,
                'limit' => 1000,
            );

            $result = $client->call(SugarMethod::GET_RELATIONSHIPS, $relationshipsParams);
            $feddbacks = $client->toSimpleObjectList($result->entry_list);
			
			  //TEST API - Get Data By Entry Point - By Lap Nguyen
        $data_params = array(
            'session'   =>  $session->root_session_id,
            'function'  =>  'getTeamList',
            'param'     =>  '',
        );
        $result = $client->call('entryPoint', $data_params);

        $data_params = array(
            'session'   =>  $session->root_session_id,
            'function'  =>  'getSessionBooking',
            'param'     =>  array(
                'student_id'=>'173fd695-524d-dc26-7a50-5710d3fbbeea',
                'start'     =>'2016-09-12',
                'end'       =>'2016-10-04',
                'class_type'=>'',
            ),
        );
        $result = $client->call('entryPoint', $data_params);
        //END: Test API

            return $feddbacks;  
        }

        // Util function to get ticket list that belongs to the current portal contact
        public static function getTicketList() {
            $client = self::getClient();
            $session = Session::get('session');
            $contact = Session::get('contact');
            //$rootSession = $client->getRootSession();

            // Get ticket that linked to the portal contact
            $relationshipsParams = array(
                'session' => $session->root_session_id,
                'module_name' => 'Accounts',
                'module_id' => $contact->account_id,
                'link_field_name' => 'cases',
                'related_module_query' => 'cases.type = "Ticket"',
                'related_fields' => array(
                    'id', 'case_number', 'name', 'status', 'priority', 'description', 'assigned_user_name', 'date_entered' 
                ),
                'related_module_link_name_to_fields_array' => array(),
                'deleted'=> '0',
                'order_by' => 'cases.date_entered DESC',
                'offset' => 0,
                'limit' => 1000,
            );

            $result = $client->call(SugarMethod::GET_RELATIONSHIPS, $relationshipsParams);
            $tickets = $client->toSimpleObjectList($result->entry_list);

            return $tickets;    
        }

        // Util function to get schedules that belongs to the current student
        public static function getSchedules() {
            $client = self::getClient();
            $session = Session::get('session');
            // $rootSession = $client->getRoot
            $contact = Session::get('contact');

            $params = array(
                'session' => $session->root_session_id,
                'student_id' => $contact->id,
            );

            $result = $client->call(SugarMethod::GET_SCHEDULES, $params);

            return $result;
        }

        // Util function to get exactly the link records by a given link name
        public static function getLinkRecords($linkList, $linkName, $singleRecord = false) {
            for($i = 0; $i < count($linkList); $i++) {
                if($linkList[$i]->name == $linkName) {
                    if($singleRecord) {
                        return $linkList[$i]->records[0];    
                    } 
                    else {
                        return $linkList[$i]->records;    
                    }
                }       
            }    
        }

        // Util function to format date time string
        public static function formatDate($dateString) {             
            if(!empty($dateString)) {
                $preferences = Session::get('user_preferences');
                $timezone = isset($preferences->timezone)?$preferences->timezone:"";
                $dateFormat = isset($preferences->date_format)?$preferences->date_format:"";
                $timeFormat = isset($preferences->time_format)?$preferences->time_format:"";
                
                if(strlen($dateString) > 10) {
                    $format = $dateFormat .' '. $timeFormat;    
                } 
                else {
                    $format = $dateFormat;
                }

                $date = new DateTime($dateString);
                $date->setTimezone(new DateTimeZone($timezone));                    
                return $date->format($format);
            }    
        }

        public static function formatMoney($money) {     
            $moneyString = money_format("%.0n",$money );        
            if(!empty($moneyString)) {
                if((int)strpos($moneyString,"$")!=false)
                {
                    $moneyString = str_replace('$', '', $moneyString);
                    $moneyString = $moneyString.'đ';
                }             
                return $moneyString;         
            }    
        }

        // Util function to convert a given date string with from format to db date format 
        public static function toDbDate($dateString, $fromFormat, $toUTC = false) {
            if(!empty($dateString)) {
                $preferences = Session::get('user_preferences');
                $timezone = $preferences->timezone;
                $date = DateTime::createFromFormat($fromFormat, $dateString, new DateTimeZone($timezone));
                $dbDateFormat = 'Y-m-d'; 
                $dbTimeFormat = 'H:i:s'; 
                $dbFormat = $dbDateFormat .' '. $dbTimeFormat; 

                if($toUTC) {
                    // Convert to UTC
                    $date->setTimezone(new DateTimeZone('UTC'));
                }

                if(strlen($dateString) > 10) {
                    // Date only
                    return $date->format($dbFormat);
                } 
                else {
                    // Date and time
                    return $date->format($dbDateFormat);
                }    
            }
        }  
        //
        public static function getDateformat() {
            $preferences = Session::get('user_preferences');
            $dateFormat = isset($preferences->date_format)?$preferences->date_format:"";
            return $dateFormat;
        }

        public static function getTimeformat() {
            $preferences = Session::get('user_preferences');
            $timeFormat = isset($preferences->time_format)?$preferences->time_format:"";
            return $timeFormat;
        }

        //add by Tung Bui - generate tzname
        public static function tzName($name, $off){
            if(empty($name)) return '';

            $appListStrings = Session::get('app_list_strings');
            $timezineDom = get_object_vars($appListStrings->timezone_dom);

            if(in_array($name, $timezineDom)) {
                $name = $timezineDom[$name];
            }
            return sprintf("%s (GMT%+2d:%02d)%s", str_replace('_',' ', $name), $off/3600, (abs($off)/60)%60, "");
        }

        //Add by Tung - get offset of timezone
        public static function getOffset($tzName){
            if($tzName instanceof DateTimeZone) $tz = $tzName;
            else $tz = timezone_open($tzName);
            if(!$tz) return "???";

            $now = new DateTime("now", $tz);
            return $now->getOffset();
        }

        //Add by Tung - get timezone list
        public static function getTimezoneList(){
            $timezoneList = timezone_identifiers_list();
            $offsetList = array();
            $tempList = array();

            foreach($timezoneList as $key => $value){
                $offset = self::getOffset($value);
                if(!in_array($offset, $offsetList)) $offsetList[] = $offset;
                $tempList[$value] = array(
                    'offset' => $offset,
                    'label' => self::tzName($value,$offset),
                );
            }

            sort($offsetList);
            $timezoneList = array();

            foreach($offsetList as $offset){
                foreach($tempList as $key => $value){
                    if($value['offset'] == $offset){
                        $timezoneList[] = array(
                            'key'    => $key,
                            'label'  => $value['label'],
                            'offset' => $offset,
                        );
                    }
                }
            }

            return $timezoneList;
        }

        //Trung Nguyen
        public static function getClassOfStudent() {
            $client = self::getClient();
            $contact = Session::get('contact');
            $session = Session::get('session');
            //$rootSession = $client->getRootSession();

            // Get complaints that linked to the portal contact
            $relationshipsParams = array(
                'session' => $session->root_session_id,
                'module_name' => 'Contacts',
                'module_id' => $contact->id,
                'link_field_name' => 'j_class_contacts_1',
                'related_module_query' => ' j_class.class_type_adult = "Practice" ',
                'related_fields' => array(
                    'id', 'name', 'end_date', 'hours' 
                ),
                'related_module_link_name_to_fields_array' => array(),
                'deleted'=> '0',
                'order_by' => 'j_class.end_date DESC',
                'offset' => 0,
                'limit' => 1000,
            );

            $result = $client->call(SugarMethod::GET_RELATIONSHIPS, $relationshipsParams);
            $complaints = $client->toSimpleObjectList($result->entry_list);

            return $complaints; 
        }

        public static function getGradebookDetail($class_id){
            $client = self::getClient();
            $contact = Session::get('contact');
            $session = Session::get('session');
            //$rootSession = $client->getRootSession();

            // Get complaints that linked to the portal contact
            $params = array(
                'session' => $session->root_session_id,
                'student_id' => $contact->id,
                'class_id' => $class_id,                
            );

            $result = $client->call("getGradebookDetail", $params);

            return $result;
        }
        //End Trung Nguyen
        //Add by Lam Hai
        public static function getCertificate($classID){
            $client = self::getClient();
            $contact = Session::get('contact');
            $session = Session::get('session');
            // Get complaints that linked to the portal contact
            $params = array(
                'session' => $session->root_session_id,
                'studentID' => $contact->id,
                'classID' => $classID,                
            );

            $result = $client->call("getCertificate", $params);

            return $result;
        }
        //End Lam Hai
    }
?>
