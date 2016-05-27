<?php

/*
*   Class UserController
*   Auhor: Hieu Nguyen
*   Date: 2016-03-15
*   Purpose: To handle user logic
*/

class UserController extends BaseController {

	// Render the login page
    public function login() {
        // Redirect the user into the dashboard right away if he already logged in
        if(Session::get('session')) {
            return Redirect::to('home/index');
        }
        
        // User accessed the login page
        if(!Input::get('submit')) {
            $data = array(
                'username' => '',
                'password' => '',
                'result' => ''
            );
            
            // Show remembered username and password
            if(Input::cookie('remembered_user')) {
                $rememberedUser = Input::cookie('remembered_user');
                $data['username'] = $rememberedUser['username'];
                $data['password'] = $rememberedUser['password'];
            }
            
            return View::make('user.login')->with($data);
        }
        // User submitted the login form
        else {
            $username = Input::get('username');
            $password = Input::get('password');
            $remember = Input::get('remember_me');
            
            $result = $this->client->login($username, $password);
            
            // Login success
            if($result == 'success') {
                // Get app list strings
                $session = Session::get('session');
                
                $languageParams = array(
                    'session' => $session->id, 
                    'type' => 'app_list_strings', 
                    'language' => (App::getLocale() == 'en') ? 'en_us' : 'vn_vn'
                );
                
                $language = $this->client->call(SugarMethod::GET_SUGAR_LANGUAGE, $languageParams);
                Session::put('app_list_strings', $language);
                
                // Redirect the user into the dashboard the login result is success
                if(!empty($remember)) {
                    // Save username and password into cookie
                    if(!empty($username) && !empty($password)) {
                        $cookie = Cookie::forever('remembered_user', array('username'=>$username, 'password'=>$password));
                        return Redirect::to('home/index')->withCookie($cookie);
                    }
                }
                // Remove the remember cookie if user does not tick on the remember checkbox
                else {
                    if(Input::cookie('remembered_user')) {
                        return Redirect::to('home/index')->withCookie(Cookie::forget('remembered_user'));    
                    }
                }
                
                return Redirect::to('home/index');
            }
            
            // Show the login page with error message
            $data = array(
                'username' => '',
                'password' => '',
                'result' => $result
            );
            
            // Remove the remember cookie saved previously if user does not tick on the remember checkbox 
            if(Input::cookie('remembered_user')) {
                return View::make('user.login')->with($data)->withCookie(Cookie::forget('remembered_user'));    
            }
            
            return View::make('user.login')->with($data);
        }
    }
    
    // Log out the authenticated user
    public function logout() {
        Session::forget('session');
        Session::forget('user');
        Session::forget('contact');
        Session::forget('user_preferences');
        
        return Redirect::to('user/login');    
    }
    
    // Render the user profile page
    public function profile() {
        $session = Session::get('session');
        $user = Session::get('user');
        $appListStrings = Session::get('app_list_strings');

        // Get data for the view
        $user = $this->client->retrieve($session->id, 'Users', $user->id);
        $contact = $this->client->retrieve($session->id, 'Contacts', $user->portal_contact_id);
        $preferences = $this->client->getUserPreferences($session->id, $user->id, 'global');
        
        // Store preference into session cache so that we can use it later in other pages
        Session::set('user_preferences', $preferences);

        $data = array(
            'user' => $user,
            'contact' => $contact,
            'timezones' => $appListStrings->timezone_dom,
            'dateFormats' => Config::get('app.date_formats'),
            'timeFormats' => Config::get('app.time_formats'),
            'preferences' => $preferences
        );
        
        // Render the view with necessary data
        return View::make('user.profile')->with($data);    
    }

    // Save profile
    public function saveProfile() {
        $session = Session::get('session');
        $user = Session::get('user');
        
        // Save user data
        $data = array(
            'first_name' => Input::get('first_name'),
            'last_name' => Input::get('last_name'),
            'phone_work' => Input::get('office_phone'),
            'phone_mobile' => Input::get('mobile_phone'),
            'email1' => Input::get('email'),
            'address_street' => Input::get('address'),
            'description' => Input::get('description'),
        );
        
        $result = $this->client->save($session->id, 'Users', $user->id, $data);
        
        // Save prefrences
        $preferencesParams = array(
            'session' => $session->id,
            'preferences' => array(
                'timezone' => Input::get('timezone'),
                'datef' => Input::get('date_format'),
                'timef' => Input::get('time_format'),    
            ),
        );
        
        $result = $this->client->call(SugarMethod::SET_USER_PREFERENCES, $preferencesParams);
        
        Session::flash('flash_message', trans('user_profile.update_profile_success_msg'));
        return Redirect::back();
    }
    
    // Render the change password page
    public function changePassword() {
        $data = array(
            'current_password' => '',
            'new_password' => '',
            'confirm_password' => '',
        );
        
        // Get data returned from the save password action if any
        if(Session::has('data')) {
            $data = Session::get('data');
        }
        
        return View::make('user.change_password')->with($data);    
    }

    // Save the new password
    public function savePassword() {
        $session = Session::get('session');
        
        $passwordParams = array(
            'session' => $session->id,
            'current_password' => Input::get('current_password'),    
            'new_password' => Input::get('new_password'),    
        );
        
        $result = $this->client->call(SugarMethod::CHANGE_PASSWORD, $passwordParams);

        // Return the result into the view
        if($result == null) {
            Session::flash('error_message', trans('user_change_password.update_password_failed_error_msg'));
        }
        else if($result->status == 'Error') {
            Session::flash('error_message', trans('user_change_password.current_password_not_correct_error_msg'));    
        } 
        else {
            Session::flash('success_message', trans('user_change_password.update_password_success_msg'));    
        }
        
        // Redirect back to the change password page with the submitted data
        return Redirect::back()->with('data', Input::all());
    }

    // Switch language
    public function switchLanguage() {
        $lang = Input::get('lang');
        
        // Set locale as user's selected language
        if(isset($lang) && in_array($lang, array('en', 'vi'))) {
            Session::put('locale', $lang);
            App::setLocale($lang);
        }
        
        return Redirect::back();
    }
}
