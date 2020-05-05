
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

Route::get('/index', function () {
    if(Auth::check()){return Redirect::to('home');}
    return view('index');
});
Route::get('/', function () {
    if(Auth::check()){return Redirect::to('home');}
    return view('index');
});




Route::post('/payment', array(
    'as' => 'payment',
    'uses' => 'FinancialTransactionsController@postPayment',
));

// this is after make the payment, PayPal redirect back to your site
Route::get('payment/status', array(
    'as' => 'payment.status',
    'uses' => 'FinancialTransactionsController@getPaymentStatus',
));



//Route::get('/showproject', 'MainController@getShowProject');



// oi selides pou apetoun o user na einai log in
Route::group(['middleware' => 'auth'], function() {




    //Route::get('/profile/', 'MainController@getProfile');
    Route::get('/profile/{user_id?}', 'UserController@getProfileByUserID');

    Route::post('/save-personal', 'UserController@saveProfile');

//    Route::get('/addproject', 'SkillCategoriesController@index');
    Route::get('/addskills', 'UserController@showUserEditSkillsForm');
    Route::post('/addskills/{user_id?}', 'UserController@updateUserSkills');
    Route::post('/addproject/{user_id?}', 'ProjectController@addProject');
    Route::get('/home', 'MainController@getHome');
    Route::get('/payment', 'FinancialTransactionsController@getPayment');

    Route::get('/addproject', 'ProjectController@showUserAddProjectForm');
    Route::get('/searchproject', 'ProjectController@getSearchProject');
    Route::post('/searchproject', 'ProjectController@postSearchProject');
    Route::get('/showproject/{project_id?}/{user_id?}', array('as' => 'showproject', 'uses' => 'ProjectController@getShowProject'));
    Route::post('/addbid', 'ProjectController@addBid');
    Route::post('/editbid', 'ProjectController@editBid');
    Route::post('/editproject', 'ProjectController@editProject');


    Route::get('/chat', 'ChatController@getChat');
    Route::post('/getConversation', 'ChatController@getConversation');
    Route::post('/sendMessage', 'ChatController@sendMessage');
    Route::post('/retrieveChatMessages', array('uses' => 'ChatController@retrieveChatMessages'));
    Route::post('/sendHireMessage', 'ChatController@createNewConversasion');


    Route::post('/hire', 'ProjectController@hireFreelancer');
    Route::post('/accept-hire', 'ProjectController@acceptHire');
    Route::post('/cancel-hire', 'ProjectController@cancelHire');
    Route::post('/refuse-hire', 'ProjectController@refuseHire');
    Route::post('/end-project', 'ProjectController@endProject');

    Route::post('/postProjectFile', 'ProjectController@postProjectFile');
    Route::post('/file-save', 'ProjectController@fileSave');


    Route::post('/milistone-add', 'ProjectController@milistoneAdd');
    Route::post('/milistone-accept', 'ProjectController@milistoneAccept');
    Route::post('/milistone-reject', 'ProjectController@milistoneReject');
    Route::post('/milistone-pay', 'ProjectController@milistonePay');


    Route::post('/rating-freelancer', 'ProjectController@ratingFreelancer');


});
