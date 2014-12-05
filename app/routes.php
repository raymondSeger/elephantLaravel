<?php
    
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

use ElephantIO\Client,
    ElephantIO\Engine\SocketIO\Version1X;

Route::post('/send_msg', 'ChatController@send_msg');    

Route::get('/chat', function(){
    $user = Auth::User();
    return View::make('chat')->with('user', $user);
});

Route::post('/clientReceiver', function(){

    $usernameDestination = Input::get('usernameDestination');
    $theMessage = Input::get('theMessage');
    $delay = Input::get('delay');
    $username = Input::get('username');

    $client = new Client(new Version1X('http://192.168.10.10:9900'));

    $client->initialize();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        switch($_POST['command']) {

            case 'private message FROM CLIENT':
                $chat['usernameDestination'] = $_POST['usernameDestination'];
                $chat['theMessage'] = $_POST['theMessage'];
                $chat['delay'] = $_POST['delay'];
                $chat['username'] = $_POST['username'];
                $client->emit('private message FROM CLIENT', $chat);
                break;
            case 'private message to username FROM CLIENT':
                $chat['usernameDestination']= $_POST['usernameDestination'];
                $chat['theMessage'] = $_POST['theMessage'];
                $chat['delay'] = $_POST['delay'];
                $chat['username'] = $_POST['username'];
                $client->emit('private message to username FROM CLIENT', $chat);
                break;
            default:
                break;
        }

    }

    $client->close();

});


Route::group(
    array(
        'prefix' => LaravelLocalization::setLocale(),
        'before' => 'LaravelLocalizationRedirectFilter' // LaravelLocalization filter
    ), function () {
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

    Route::get('/', array('as' => 'home',
            function () {
                return View::make('frontend.home')
                    ->withPortfolios(Portfolio::All());
            })
    );

    // Static content
    Route::get('/web-design', function () {
        return View::make('frontend.content.webDesignPage');
    });
    Route::get('/online-visibility', function () {
        return View::make('frontend.content.onlineVisibilityPage');
    });
    Route::get('/web-hosting', function () {
        return View::make('frontend.content.webHostingPage');
    });
    Route::get('/web-security', function () {
        return View::make('frontend.content.webSecurityPage');
    });
    Route::get('/telephone-system', function () {
        return View::make('frontend.content.telephoneSystemPage');
    });
    Route::get('/career', function () {
        return View::make('frontend.content.careerPage');
    });
    Route::get('/policy', function () {
        return View::make('frontend.content.policyPage');
    });

    // Generate Form
    Route::Post('/sendMessage', 'HomeController@contactFormSubmit');


    Route::resource('user', 'UserController');
    Route::resource('corporate', 'CorporateController');
    Route::resource('project', 'ProjectController');


    // Confide routes
    Route::get('users/create', 'UsersController@create');
    Route::post('users', 'UsersController@store');
    Route::get('users/login', 'UsersController@login');
    Route::post('users/login', 'UsersController@doLogin');
    Route::get('users/confirm/{code}', 'UsersController@confirm');
    Route::get('users/forgot_password', 'UsersController@forgotPassword');
    Route::post('users/forgot_password', 'UsersController@doForgotPassword');
    Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
    Route::post('users/reset_password', 'UsersController@doResetPassword');
    Route::get('users/logout', 'UsersController@logout');

    Route::resource('user', 'UserController');
    Route::resource('corporate', 'CorporateController');
    Route::resource('project', 'ProjectController');
    Route::resource('message', 'MessageController');
    Route::resource('admin/portfolio', 'PortfolioController');

    Route::get('/user/corporate/request', 'CorporateController@request_corporate');
    Route::post('/user/corporate/request_corporate', 'CorporateController@store_request_corporate');
    Route::get('/homepage', array('before' => 'auth','uses' => 'HomeController@indexBackend'));
    Route::any('/user/unsubscribed/{id}', 'UserController@unsubscribed');

});

/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/






