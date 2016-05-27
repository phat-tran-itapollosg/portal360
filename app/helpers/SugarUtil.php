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
        
        // Util function to get complaint list that belongs to the current portal contact
        public static function getComplaintList() {
            $client = self::getClient();
            $session = Session::get('session');
            $contact = Session::get('contact');
            $rootSession = $client->getRootSession();
            
            // Get complaints that linked to the portal contact
            $relationshipsParams = array(
                'session' => $rootSession,
                'module_name' => 'Accounts',
                'module_id' => $contact->account_id,
                'link_field_name' => 'cases',
                'related_module_query' => 'cases.type = "Complaint"',
                'related_fields' => array(
                    'id', 'case_number', 'name', 'status', 'priority', 'description', 'date_entered' 
                ),
                'related_module_link_name_to_fields_array' => array(),
                'deleted'=> '0',
                'order_by' => 'cases.date_entered DESC',
                'offset' => 0,
                'limit' => 1000,
            );
            
            $result = $client->call(SugarMethod::GET_RELATIONSHIPS, $relationshipsParams);
            $complaints = $client->toSimpleObjectList($result->entry_list);
            
            return $complaints;
        }
        
        // Util function to get ticket list that belongs to the current portal contact
        public static function getTicketList() {
            $client = self::getClient();
            $session = Session::get('session');
            $contact = Session::get('contact');
            $rootSession = $client->getRootSession();
            
            // Get ticket that linked to the portal contact
            $relationshipsParams = array(
                'session' => $rootSession,
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
                $timezone = $preferences->timezone;
                $dateFormat = $preferences->datef;
                $timeFormat = $preferences->timef;

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
    }
?>
