<?php
/*
 *Alpha team Mr. Pong Pi 
 *eroshaly@gmail.com
 *
 */
//namespace App\Controllers\Faq;
//use DB;
//use Validator;
//use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\ThrottlesLogins;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class SurveyController extends BaseController
{

    protected $layout = 'layouts.master';
    protected $alphaSurveyClient = null;
    // Make request

    public function createASessionKey()
    {
        
        // without composer this line can be used
        // require_once 'path/to/your/rpcclient/jsonRPCClient.php';
        // with composer support just add the autoloader
        // include_once 'vendor/autoload.php';
        require(app_path().'/helpers/jsonrpcphp/src/org/jsonrpcphp/JsonRPCClient.php');
        $serviceConfig = Config::get('app.service_survey');

        // the survey to process
        // $survey_id=82556;

        // instanciate a new client
        $this->alphaSurveyClient = new \org\jsonrpcphp\JsonRPCClient( $serviceConfig['remotecontrol']);

        // receive session key
        $sessionKey= $this->alphaSurveyClient->get_session_key( $serviceConfig['username'], $serviceConfig['password'] );
       
        return $sessionKey;
    }
    public function index()
    {
        try {
            $contact = Session::get('contact');
            $sessionKey = $this->createASessionKey();
            $list_surveys = $this->alphaSurveyClient->list_surveys($sessionKey,$contact->team_id);

            $this->alphaSurveyClient->release_session_key( $sessionKey );
            if(isset($list_surveys['status']) AND !empty($list_surveys['status'])){
                //return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => $list_surveys['status']]);
                $this->layout->content = View::make('survey.index')->with(array('surveys'=>array(), 'notify' => $list_surveys['status']));
            }else{
                $this->layout->content = View::make('survey.index')->with(array('surveys'=>$list_surveys));
            }
        } catch (Exception $e) {
            $this->layout->content = View::make('survey.index')->with(array('surveys'=>array(), 'notify' => $e->getMessage()));
            // return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => $e->getMessage()]);
        }        
    }
    public function dosurvey($id = NULL)
    {
        

        if(isset($id) && !empty($id)){
            try {
                $serviceConfig = Config::get('app.service_survey');
                $contact = Session::get('contact');
                if(!empty($contact)){
                    $aParticipantData = array( 
                        'user'=>array(
                            'firstname'=>$contact->first_name,
                                'lastname'=>$contact->last_name,
                                'email'=>$contact->email1,
                                'language'=>'en',
                    ));

                    $sessionKey = $this->createASessionKey();
                    $result = $this->alphaSurveyClient->cpd_importParticipants($sessionKey,$aParticipantData);
                    if(isset($result['0'])){
                        $aParticipantData = array( 
                            'user'=>array(
                                'firstname'=>$contact->first_name,
                                    'lastname'=>$contact->last_name,
                                    'email'=>$contact->email1,
                                    'language'=>'en',
                                    'team_id'=>$contact->team_id,
                                    'student_id'=>$contact->id,
                                    'team_name'=>$contact->team_name,
                                    'participant_id'=>$result['0']['participant_id'],
                        ));
                        $result = $this->alphaSurveyClient->add_participants($sessionKey,$id,$aParticipantData);
                        if(!empty($result["user"]) && empty($result["user"]['errors'])){
                            $surveyURL = $serviceConfig["surveyURL"].$id."/token/".$result["user"]['token'].'/lang/en/newtest/Y';
                            $this->alphaSurveyClient->release_session_key( $sessionKey );
                            header("Location: ".$surveyURL);
                            exit;
                        }else{
                            return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
                        }
                    }                
                }else{
                    return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
                }
            } catch (Exception $e) {
                return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => $e->getMessage()]);
            }  
        }else{
             return App::make("ErrorsController")->callAction("error", ['code'=>500, 'messenger' => 'Looks like Something went wrong.']);
        }
        
                       
    }
}