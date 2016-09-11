<?php 

namespace App\Modules\Alpha\Controllers;

use App, Entry, View;
use Illuminate\Support\Facades\Input;
/**
 * Content controller
 * @author Boris Strahija <bstrahija@gmail.com>
 */
class SurveyController extends \BaseController {
	protected $layout = 'layout.layout_master'; 

    public function index()

    {
    	$serviceConfig = \Config::get('app.service_admin');
    	$SessionUser = \Session::get('user');
        // var_dump($SessionUser);
        // die();
//         $SessionUser = (object)array("modified_by_name"=>  "Phung Gia Bao",
// "created_by_name"=>  "Phung Gia Bao",
// "id"=>  "f3b54472-813e-8258-91c1-57b1bf9d169c",
// "user_name"=>  "pong.pi",
// "user_hash"=>  "",
// "system_generated_password"=>  "0",
// "pwd_last_changed"=>  "2016-08-15 13:11:00",
// "authenticate_id"=>  "",
// "sugar_login"=>  "1",
// "picture"=>  "",
// "first_name"=>  "Pong",
// "last_name"=>  "Pi",
// "full_name"=>  "Pi Pong",
// "name"=>  "Pi Pong",
// "full_user_name"=>  "Pi Pong",
// "is_admin"=>  "1",
// "portal_user"=>  "0",
// "external_auth_only"=>  "0",
// "receive_notifications"=>  "0",
// "description"=>  "",
// "date_entered"=>  "2016-08-15 13:11:34",
// "date_modified"=>  "2016-08-29 00:48:08",
// "modified_user_id"=>  "954ca1ac-c4c2-2455-ff3e-565530629de3",
// "created_by"=>  "954ca1ac-c4c2-2455-ff3e-565530629de3",
// "title"=>  "",
// "department"=>  "",
// "phone_home"=>  "",
// "phone_mobile"=>  "",
// "phone_work"=>  "",
// "phone_other"=>  "",
// "phone_fax"=>  "",
// "status"=>  "Active",
// "address_street"=>  "",
// "address_city"=>  "",
// "address_state"=>  "",
// "address_country"=>  "",
// "address_postalcode"=>  "",
// "UserType"=>  "",
// "default_team"=>  "f3860aea-9b40-e3a7-295e-56245ee98b47",
// "team_id"=>  "f3860aea-9b40-e3a7-295e-56245ee98b47",
// "team_set_id"=>  "f3860aea-9b40-e3a7-295e-56245ee98b47",
// "team_name"=>  "Phu My Hung",
// "deleted"=>  "0",
// "portal_only"=>  "0",
// "show_on_employees"=>  "1",
// "employee_status"=>  "Active",
// "messenger_id"=>  "",
// "messenger_type"=>  "",
// "reports_to_id"=>  "",
// "reports_to_name"=>  "",
// "email1"=>  "khongco@apollo.edu.vn",
// "email"=>  "",
// "email_link_type"=>  "",
// "is_group"=>  "0",
// "c_accept_status_fields"=>  "",
// "m_accept_status_fields"=>  "",
// "accept_status_id"=>  "",
// "accept_status_name"=>  "",
// "preferred_language"=>  "en_us",
// "aims_id"=>  "",
// "lock_homepage"=>  "",
// "default_homepage"=>  "",
// "toggle"=>  "0",
// "only_once"=>  "0",
// "gender"=>  "",
// "is_notify_new_task"=>  "0",
// "is_notify_pending_task"=>  "0",
// "is_notify_customer_birthday"=>  "0",
// "numofday_notify_customer_birthday"=>  "0",
// "numofday_before_notify_pending_task"=>  "0",
// "dob_day"=>  "",
// "dob_month"=>  "",
// "dob_year"=>  "",
// "dob_date"=> true,
// "leaving_request_confirmer"=>  "",
// "worklog_reminder_recipient"=>  "",
// "for_portal_only"=>  "0",
// "portal_contact_id"=>  "",
// "sign"=>  "",
// "is_template"=>  "0");
    	if(!empty($SessionUser)){
	    	$user_id = $this->findAndCreateUser((object)$SessionUser);
	    	$user = \AlphaUsers::where('users_name' , $SessionUser->user_name)
        	->where('email', isset($SessionUser->email) && !empty($SessionUser->email) ? $SessionUser->email : $SessionUser->user_name . '@apollo.edu.vn')->first();
	    	$onepass = $this->generateRandomString(10);
			$user->one_time_pw = md5($onepass);

			$user->save();

			$url = $serviceConfig['onetTimeUrl'].'user='.$user->users_name.'&onepass='.$onepass;
			// var_dump($url );
			// die();
			/* Redirect browser */
			header("Location: ".$url);
			 
			/* Make sure that code below does not get executed when we redirect. */
			exit;
        }else{
        	return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
        }
        
        //die();
    }
    
    public function findAndCreateUser($SessionUser)
    {
    	if(!empty($SessionUser)){
    		$user = \AlphaUsers::where('users_name' , $SessionUser->user_name)
        	->where('email', isset($SessionUser->email) && !empty($SessionUser->email) ? $SessionUser->email : $SessionUser->user_name . '@apollo.edu.vn')
        	->first();

        	if($user == NULL){
        		$user = new \AlphaUsers;
        		$user->users_name = $SessionUser->user_name;
        		$user->email = isset($SessionUser->email) && !empty($SessionUser->email) ? $SessionUser->email : $SessionUser->user_name . '@apollo.edu.vn';
        		$user->full_name = $SessionUser->full_name;
        		$user->parent_id = 1;
        		$user->lang = 'auto';
        		$user->htmleditormode = 'default';
        		$user->templateeditormode = 'default';
        		$user->questionselectormode = 'default';
        		$user->one_time_pw = $this->generateRandomString(10);
        		$user->dateformat = 1;
        		$user->created = date("Y-m-d H:i:s");
        		$user->save();
        		//var_dump($user);
        		//die();
        		$UserGroup = \AlphaUserGroups::where('team_id' , $SessionUser->team_id)
        		->first();
        		if($UserGroup == NULL){
        			$UserGroup = new \AlphaUserGroups;
        			$UserGroup->name =  $SessionUser->team_name;
                    $UserGroup->description =  $SessionUser->team_name;
        			$UserGroup->team_id =  $SessionUser->team_id;
        			$UserGroup->owner_id =  1;
        			$re = $UserGroup->save();
        		}
                // var_dump($UserGroup);
                // var_dump($user);
                // die();
        		$UserInGroups = new \AlphaUserInGroups;
        		$UserInGroups->ugid = $UserGroup->ugid;
        		$UserInGroups->uid = $user->uid;
        		$UserInGroups->save();
                //var_dump($UserInGroups);
                //die();

                $data = array(
                    array(
                        "entity" => "global",
                        "entity_id" => "0",
                        "uid" => $user->uid,
                        "permission" => "participantpanel",
                        "create_p" => "1",
                        "read_p" => "1",
                        "update_p" => "1",
                        "delete_p" => "1",
                        "import_p" => "0",
                        "export_p" => "1"
                    ),
                    array(
                        "entity" => "global",
                        "entity_id" => "0",
                        "uid" => $user->uid,
                        "permission" => "surveys",
                        "create_p" => "1",
                        "read_p" => "1",
                        "update_p" => "1",
                        "delete_p" => "1",
                        "import_p" => "0",
                        "export_p" => "1"
                    ),
                    array(
                        "entity" => "template",
                        "entity_id" => "0",
                        "uid" => $user->uid,
                        "permission" => "default",
                        "create_p" => "0",
                        "read_p" => "1",
                        "update_p" => "0",
                        "delete_p" => "0",
                        "import_p" => "0",
                        "export_p" => "0"
                    ),
                    array(
                        "entity" => "global",
                        "entity_id" => "0",
                        "uid" => $user->uid,
                        "permission" => "auth_db",
                        "create_p" => "0",
                        "read_p" => "1",
                        "update_p" => "0",
                        "delete_p" => "0",
                        "import_p" => "0",
                        "export_p" => "0"
                    )
                );
                $Permissions = \AlphaPermissions::insert($data);

        	}
        	return $user->id;
        	//var_dump($user);
    	}else{
    		return NULL;
    	}
    }
    function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

 }