<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Application Debug Mode
	|--------------------------------------------------------------------------
	|
	| When your application is in debug mode, detailed error messages with
	| stack traces will be shown on every error that occurs within your
	| application. If disabled, a simple generic error page is shown.
	|
	*/

	'debug' => true,

	/*
	|--------------------------------------------------------------------------
	| Application URL
	|--------------------------------------------------------------------------
	|
	| This URL is used by the console to properly generate URLs when using
	| the Artisan command line tool. You should set this to the root of
	| your application so that it is used when running Artisan tasks.
	|
	*/

	'url' => 'http://alphateam.tech/',
	//'url' => 'http://localhost/apollo_portal',

    // For RSS at home page. Added by Hieu Nguyen on 2016-03-15
    'rss_url' => '',
    
    // For webservice. Added by Hieu Nguyen on 2016-03-15
    'service_config' => array(
        'server_url' => 'http://sistest.apollo.edu.vn/',
        'custom_service' => true,   // Use custom service in custom folder or not
        'root_username' => 'webservice',
        'root_password' => '57ee62e7ce2ba75fac974faa3eae09e0',  // MD5
        //'root_password' => 'dc483e80a7a0bd9ef71d8cf973673924',
    ),
    // End for webservice
    
    // Date time config. Added by Hieu Nguyen on 2016-03-15
    'date_formats' => array (
        'Y-m-d' => '2010-12-23',
        'm-d-Y' => '12-23-2010',
        'd-m-Y' => '23-12-2010',
        'Y/m/d' => '2010/12/23',
        'm/d/Y' => '12/23/2010',
        'd/m/Y' => '23/12/2010',
        'Y.m.d' => '2010.12.23',
        'd.m.Y' => '23.12.2010',
        'm.d.Y' => '12.23.2010',
    ),
    'time_formats' => array (
        'H:i' => '23:00',
        'h:ia' => '11:00pm',
        'h:iA' => '11:00PM',
        'h:i a' => '11:00 pm',
        'h:i A' => '11:00 PM',
        'H.i' => '23.00',
        'h.ia' => '11.00pm',
        'h.iA' => '11.00PM',
        'h.i a' => '11.00 pm',
        'h.i A' => '11.00 PM',
    ),
    // End date time config
    
	/*
	|--------------------------------------------------------------------------
	| Application Timezone
	|--------------------------------------------------------------------------
	|
	| Here you may specify the default timezone for your application, which
	| will be used by the PHP date and date-time functions. We have gone
	| ahead and set this to a sensible default for you out of the box.
	|
	*/

	'timezone' => 'Asia/Ho_Chi_Minh',

	/*
	|--------------------------------------------------------------------------
	| Application Locale Configuration
	|--------------------------------------------------------------------------
	|
	| The application locale determines the default locale that will be used
	| by the translation service provider. You are free to set this value
	| to any of the locales which will be supported by the application.
	|
	*/

	'locale' => 'en',

	/*
	|--------------------------------------------------------------------------
	| Application Fallback Locale
	|--------------------------------------------------------------------------
	|
	| The fallback locale determines the locale to use when the current one
	| is not available. You may change the value to correspond to any of
	| the language folders that are provided through your application.
	|
	*/

	'fallback_locale' => 'en',

	/*
	|--------------------------------------------------------------------------
	| Encryption Key
	|--------------------------------------------------------------------------
	|
	| This key is used by the Illuminate encrypter service and should be set
	| to a random, 32 character string, otherwise these encrypted strings
	| will not be safe. Please do this before deploying an application!
	|
	*/

	'key' => 'kwh0kR7ddmtQVe4F5e7UqNviaDObdZUA',

	/*
	|--------------------------------------------------------------------------
	| Autoloaded Service Providers
	|--------------------------------------------------------------------------
	|
	| The service providers listed here will be automatically loaded on the
	| request to your application. Feel free to add your own services to
	| this array to grant expanded functionality to your applications.
	|
	*/

	'providers' => array(

		'Illuminate\Foundation\Providers\ArtisanServiceProvider',
		'Illuminate\Auth\AuthServiceProvider',
		'Illuminate\Cache\CacheServiceProvider',
		'Illuminate\Session\CommandsServiceProvider',
		'Illuminate\Foundation\Providers\ConsoleSupportServiceProvider',
		'Illuminate\Routing\ControllerServiceProvider',
		'Illuminate\Cookie\CookieServiceProvider',
		'Illuminate\Database\DatabaseServiceProvider',
		'Illuminate\Encryption\EncryptionServiceProvider',
		'Illuminate\Filesystem\FilesystemServiceProvider',
		'Illuminate\Hashing\HashServiceProvider',
		'Illuminate\Html\HtmlServiceProvider',
		'Illuminate\Log\LogServiceProvider',
		'Illuminate\Mail\MailServiceProvider',
		'Illuminate\Database\MigrationServiceProvider',
		'Illuminate\Pagination\PaginationServiceProvider',
		'Illuminate\Queue\QueueServiceProvider',
		'Illuminate\Redis\RedisServiceProvider',
		'Illuminate\Remote\RemoteServiceProvider',
		'Illuminate\Auth\Reminders\ReminderServiceProvider',
		'Illuminate\Database\SeedServiceProvider',
		'Illuminate\Session\SessionServiceProvider',
		'Illuminate\Translation\TranslationServiceProvider',
		'Illuminate\Validation\ValidationServiceProvider',
		'Illuminate\View\ViewServiceProvider',
        'Illuminate\Workbench\WorkbenchServiceProvider',
        //'Montoya\BMI\BMIServiceProvider',
<<<<<<< Updated upstream
        'Creolab\LaravelModules\ServiceProvider',
        // 'App\Modules\Content\ContentServiceProvider',
    	// 'App\Modules\Content\AnotherServiceProvider',
    	// 'App\Modules\Faq\FaqServiceProvider',
    	'App\Modules\Alpha\AlphaServiceProvider'
=======
>>>>>>> Stashed changes

	),

	/*
	|--------------------------------------------------------------------------
	| Service Provider Manifest
	|--------------------------------------------------------------------------
	|
	| The service provider manifest is used by Laravel to lazy load service
	| providers which are not needed for each request, as well to keep a
	| list of all of the services. Here, you may set its storage spot.
	|
	*/

	'manifest' => storage_path().'/meta',

	/*
	|--------------------------------------------------------------------------
	| Class Aliases
	|--------------------------------------------------------------------------
	|
	| This array of class aliases will be registered when this application
	| is started. However, feel free to register as many as you wish as
	| the aliases are "lazy" loaded so they don't hinder performance.
	|
	*/

	'aliases' => array(

		'App'             => 'Illuminate\Support\Facades\App',
		'Artisan'         => 'Illuminate\Support\Facades\Artisan',
		'Auth'            => 'Illuminate\Support\Facades\Auth',
		'Blade'           => 'Illuminate\Support\Facades\Blade',
		'Cache'           => 'Illuminate\Support\Facades\Cache',
		'ClassLoader'     => 'Illuminate\Support\ClassLoader',
		'Config'          => 'Illuminate\Support\Facades\Config',
		'Controller'      => 'Illuminate\Routing\Controller',
		'Cookie'          => 'Illuminate\Support\Facades\Cookie',
		'Crypt'           => 'Illuminate\Support\Facades\Crypt',
		'DB'              => 'Illuminate\Support\Facades\DB',
		'Eloquent'        => 'Illuminate\Database\Eloquent\Model',
		'Event'           => 'Illuminate\Support\Facades\Event',
		'File'            => 'Illuminate\Support\Facades\File',
		'Form'            => 'Illuminate\Support\Facades\Form',
		'Hash'            => 'Illuminate\Support\Facades\Hash',
		'HTML'            => 'Illuminate\Support\Facades\HTML',
		'Input'           => 'Illuminate\Support\Facades\Input',
		'Lang'            => 'Illuminate\Support\Facades\Lang',
		'Log'             => 'Illuminate\Support\Facades\Log',
		'Mail'            => 'Illuminate\Support\Facades\Mail',
		'Paginator'       => 'Illuminate\Support\Facades\Paginator',
		'Password'        => 'Illuminate\Support\Facades\Password',
		'Queue'           => 'Illuminate\Support\Facades\Queue',
		'Redirect'        => 'Illuminate\Support\Facades\Redirect',
		'Redis'           => 'Illuminate\Support\Facades\Redis',
		'Request'         => 'Illuminate\Support\Facades\Request',
		'Response'        => 'Illuminate\Support\Facades\Response',
		'Route'           => 'Illuminate\Support\Facades\Route',
		'Schema'          => 'Illuminate\Support\Facades\Schema',
		'Seeder'          => 'Illuminate\Database\Seeder',
		'Session'         => 'Illuminate\Support\Facades\Session',
		'SSH'             => 'Illuminate\Support\Facades\SSH',
		'Str'             => 'Illuminate\Support\Str',
		'URL'             => 'Illuminate\Support\Facades\URL',
		'Validator'       => 'Illuminate\Support\Facades\Validator',
		'View'            => 'Illuminate\Support\Facades\View',

	),
	'service_survey' => array(
		'serviceUrl'      =>'http://survey.alphateam.tech/',
		'remotecontrol'   =>'http://survey.alphateam.tech/admin/remotecontrol',
		'surveyURL'       =>'http://survey.alphateam.tech/survey/index/sid/',
		'username'        =>'admin',
		'password'        =>'123456',
	),
	'service_elearning' => array(
		'remoteUrl'      =>'https://re.reallyenglish.com/teachatapollo/sso',
		'auth'   =>array(
			'organization_code' => 'APOLLO',
			'password' => 'w7vubOvqX',
		),
		// 'course'       =>array(
		// 	'course_code' => 'APOLLO-PE6',
  //           'group_code' => 'TEST_GROUP',
  //           'start_date' =>  '2016-08-01',  
  //           'end_date' =>  '2016-12-31', 
  //           'access_end_date' =>  '2016-12-31'   
		// ),
		'course'       =>array(
			'course_code' => 'APOLLO-360-FLEXI',
            'group_code' => 'INTERMEDIATE',
            'start_date' =>  '2016-08-01',  
            'end_date' =>  '2016-12-31', 
            'access_end_date' =>  '2016-12-31'   
		),

	),
	'service_admin' => array(
		'url'      =>'http://alphateam.tech/admin/faq',
		'onetTimeUrl'      =>'http://survey.alphateam.tech/admin/authentication/login?',
		

	)
);
