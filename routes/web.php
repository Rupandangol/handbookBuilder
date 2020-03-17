<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Backend
Route::get('/AdminLogin', 'loginController@loginPage')->name('loginPage');
Route::post('/AdminLogin', 'loginController@loginPageAction');
Route::get('/AdminLogout', 'loginController@logout')->name('admin-logout');
Route::get('/AdminForgotPassword', 'loginController@forgotPassword')->name('forgotPassword');
Route::post('/AdminForgotPassword', 'loginController@forgotPasswordAction');

Route::get('/reset/{token?}', 'loginController@resetPassword')->name('resetPassword');
Route::post('/reset/{token?}', 'loginController@resetPasswordAction');

Route::group(['prefix' => '@admin@', 'middleware' => 'auth:admin', 'ContactReviewCheck'], function () {

    Route::get('/', 'backendController@dashboard')->name('dashboard');
//    admin
    Route::get('/addAdmin', 'backendController@addAdmin')->name('addAdmin');
    Route::post('/addAdmin', 'backendController@addAdminAction');
//    manageAdmin
    Route::get('/manageAdmin', 'backendController@manageAdmin')->name('manageAdmin');
    Route::get('/manageAdmin/delete/{id}', 'backendController@deleteAdmin')->name('deleteAdmin');
    Route::get('/manageAdmin/update/{id}', 'backendController@updateAdmin')->name('updateAdmin');
    Route::post('/manageAdmin/update/{id}', 'backendController@updateAdminAction');
    Route::get('/api/adminStatus', 'ajaxController@adminStatus')->name('adminStatus');

//    User
    Route::get('/userList', 'userBackendController@userList')->name('myUserList');
    Route::get('/api/userStatus', 'ajaxController@userStatus')->name('userStatus');


    Route::get('/userList/userInfo/{id}', 'userBackendController@userInfo')->name('userInfo-backend');
    Route::get('/userList/userProject/{id}', 'userBackendController@userProject')->name('userProject');
    Route::get('/api/deleteCodeChange', 'userBackendController@deleteCodeChange')->name('deleteCodeChange');

    Route::get('/userList/userProjectContent/{id}', 'userBackendController@userProjectContent')->name('userProjectContent');
    Route::post('/userList/userProjectContent/{id}', 'userBackendController@userProjectContentSave');

    Route::get('/userList/api/updateProjectContentTitle', 'userBackendController@updateUserContentTitle')->name('updateUserContentTitle');


//    contact Review
    Route::get('/contactReview', 'contactController@contactReview')->name('contactReview');
    Route::get('/contactViewed', 'contactController@contactViewed')->name('contactViewed');

//    Lawyer Profile
    Route::get('/LawyerProfileView', 'lawyerController@lawyerProfileView')->name('lawyerProfileView')->middleware('checkLawyerProfile');
    Route::get('/LawyerProfile', 'lawyerController@lawyerProfile')->name('lawyerProfile');
    Route::post('/LawyerProfile', 'lawyerController@lawyerProfileAction');


//    Project
    Route::post('/newProject', 'backendController@newProject')->name('newProject');
    Route::get('/projectLists', 'backendController@projectLists')->name('projectLists');
//    Route::get('/api/deleteProject', 'ajaxController@deleteProject')->name('deleteProject');
    Route::post('/projectLists/deleteProject', 'backendController@deleteProject')->name('deleteProject');

    Route::get('/api/updateProject', 'ajaxController@updateProject')->name('updateProject');
    Route::get('/api/updatePrice', 'ajaxController@updatePrice')->name('updatePrice');
    Route::get('/api/updateAbout', 'ajaxController@updateAbout')->name('updateAbout');
    Route::get('/api/updateLanguage', 'ajaxController@updateLanguage')->name('updateLanguage');
    Route::get('/api/updateType', 'ajaxController@updateType')->name('updateType');

    Route::get('/api/projectStatus', 'ajaxController@projectStatus')->name('projectStatus');

//    content

    Route::get('/projectContent/{id}', 'backendController@projectContent')->name('projectContent');
    Route::post('/projectContentTitle', 'backendController@projectContentTitle')->name('projectContentTitle');
    Route::post('/projectContent/content', 'backendController@myProjectContent')->name('myProjectContent');

    Route::get('/myContent/{id}', 'backendController@myContent')->name('myContent');
    Route::post('/myContent/{id}', 'backendController@myContentAction');


//    update
    Route::post('/projectContentTitle/update', 'backendController@updateProjectContentTitle')->name('updateProjectContentTitle');
//    edit
    Route::get('/projectContent/content/contentUp/{id}', 'backendController@contentUp')->name('contentUp');
    Route::get('/projectContent/content/contentDown/{id}', 'backendController@contentDown')->name('contentDown');
    Route::get('/projectContent/content/contentDelete/{id}', 'backendController@contentDelete')->name('contentDelete');
    Route::get('/api/editContentNo', 'ajaxController@editContentNo')->name('editContentNo');

//    previewPdf
    Route::post('/previewPdf', 'pdfController@previewPdf')->name('previewPdf');

//    previewWord
    Route::get('/downloadWord/{id}', 'wordController@downloadWord')->name('downloadWord');


//    FAQ
    Route::get('/FAQView', 'FAQController@FAQView')->name('FAQView');
    Route::post('/FAQView', 'FAQController@FAQViewAddAction');
    Route::get('/FAQDelete/{id}', 'FAQController@FAQDelete')->name('FAQDelete');

//    Resources
    Route::get('/resourceAdd', 'resourceController@resourceAdd')->name('resourceAdd');
    Route::post('/resourceAdd', 'resourceController@resourceAddAction');
    Route::get('/resourceManage', 'resourceController@resourceManage')->name('resourceManage');
    Route::get('/resourceUpdate/{id}', 'resourceController@resourceUpdate')->name('resourceUpdate');
    Route::post('/resourceUpdate/{id}', 'resourceController@resourceUpdateAction');
    Route::get('/resourceDelete/{id}', 'resourceController@resourceDelete')->name('resourceDelete');


//    LOG
    Route::get('/Log', 'logController@viewLog')->name('viewLog');
    Route::get('/api/searchLog', 'logController@searchLog')->name('searchLog');

    Route::get('/khaltiLogView', 'khaltiController@khaltiLogView')->name('khaltiLogView');

});


//Frontend
Route::get('/', 'frontendController@mainPage')->name('mainPage')->middleware('MainPageAfterLogin');

Route::get('/loginUser', 'userLoginController@userLogin')->name('loginUser');
Route::post('/loginUser', 'userLoginController@userLoginAction');
Route::get('/logoutUser', 'userLoginController@userLogout')->name('user-logout');
//Reset Password
Route::get('/userForgotPassword', 'userLoginController@userForgotPassword')->name('userForgotPassword');
Route::post('/userForgotPassword', 'userLoginController@userForgotPasswordAction');
Route::get('/userReset/{token?}', 'userLoginController@userReset')->name('userReset');
Route::post('/userReset/{token?}', 'userLoginController@userResetAction');


Route::get('/termsAndCondition', 'frontendController@termsAndCondition')->name('termsAndCondition');

Route::get('/register', 'userLoginController@userRegister')->name('registerUser');
Route::post('/register', 'userLoginController@userRegisterAction');

Route::group(['middleware' => 'auth:userList'], function () {
    Route::get('/dashboard', 'frontendController@dashboard')->name('frontend-dashboard');

    Route::get('/userInfoForm', 'frontendController@userInfoForm')->name('userInfoForm');
    Route::post('/userInfoForm', 'frontendController@userInfoFormAction');
    Route::group(['prefix' => '/handbookList', 'middleware' => 'checkUserInfo'], function () {
        Route::get('/', 'userHandbookController@handbookList')->name('handbookList');
        Route::get('/api/fetchLanguage', 'userHandbookController@fetchLanguage')->name('fetchLanguage');
        Route::post('/selectUserHandbook', 'userHandbookController@selectUserHandbook')->name('selectUserHandbook');
        Route::post('/createUserHandbook', 'userHandbookController@createUserHandbook')->name('createUserHandbook');
        Route::get('/api/createUserHandbook', 'userHandbookController@apiCreateUserHandbook')->name('api_createUserHandbook');
        Route::get('/api/khaltiLog', 'khaltiController@khaltiLog')->name('khaltiLog');

        Route::get('/builderList', 'userHandbookController@builderList')->name('builderList');
        Route::get('/builderListSelect/{id}', 'userHandbookController@builderListSelect')->name('builderListSelect');
        Route::get('/builderListCreate/{id}', 'userHandbookController@builderListCreate')->name('builderListCreate');
        Route::get('/builderListCreateApi', 'userHandbookController@builderListCreateApi')->name('builderListCreateApi');

        Route::get('/myList', 'userHandbookController@myList')->name('myList');


//        handbook
        Route::get('/titleContents/{id}', 'userHandbookController@titleContents')->name('handbookContentTitle');
        Route::get('/contents/{id}', 'userHandbookController@contents')->name('handbookContent');
        Route::post('/contents/{id}', 'userHandbookController@contentsUpdate');

//        getVerifiedByLawyer
//        Route::get('/verification/lawyer={lawyer_id}/handbook={userHandbook_id}','lawyerController@lawyerVerification')->name('lawyerVerification');
        Route::get('/verification/lawyer={lawyer_id}/handbook={userHandbook_id}', 'lawyerController@lawyerVerification')->name('lawyerVerification');

        Route::post('/lawyerBookAppointment', 'lawyerController@lawyerBookAppointment')->name('lawyerBookAppointment');


//        pdf User
        Route::post('/userPdfView/', 'userPdfController@userPdfView')->name('userPdfView');
        Route::post('/userPdfDownload/', 'userPdfController@userPdfDownload')->name('userPdfDownload');

        Route::get('/api/includeCode/', 'userHandbookController@includeCode')->name('include');


    });
    Route::get('/priceList', 'userHandbookController@priceList')->name('priceList');

//    Profile User
    Route::get('/userProfile', 'userHandbookController@userProfile')->name('userProfile');
    Route::post('/userProfile', 'userHandbookController@userProfileAction');


//    contact
    Route::get('/contact', 'contactController@contact')->name('contact');
    Route::post('/contact', 'contactController@contactAction');


//    FAQ
    Route::get('/FAQ', 'FAQController@FAQ')->name('FAQ');

//    Resources

    Route::get('/resources', 'resourceController@frontendResourceList')->name('resourceList');
    Route::get('/resourcesDetail/{id}', 'resourceController@frontendResourceDetail')->name('resourceDetail');

});
Route::get('/contactMainPage', 'contactController@contactMainPage')->name('contactMainPage');


Route::get('testKhalti', 'khaltiController@viewKhalti')->name('viewKhalti');
Route::get('/payment/verification', 'khaltiController@verification')->name('paymentVerification');


Route::get('/checkout/payment/esewa', [
    'name' => 'eSewa Checkout Payment',
    'as' => 'checkout.payment.esewa',
    'uses' => 'EsewaController@checkout',
]);

Route::post('/checkout/payment/{order}/esewa/process', [
    'name' => 'eSewa Checkout Payment',
    'as' => 'checkout.payment.esewa.process',
    'uses' => 'EsewaController@payment',
]);

Route::get('/checkout/payment/{order}/esewa/completed', [
    'name' => 'eSewa Payment Completed',
    'as' => 'checkout.payment.esewa.completed',
    'uses' => 'EsewaController@completed',
]);

Route::get('/checkout/payment/{order}/failed', [
    'name' => 'eSewa Payment Failed',
    'as' => 'checkout.payment.esewa.failed',
    'uses' => 'EsewaController@failed',
]);
Route::get('/testEsewa', 'esewaController@testEsewa')->name('testEsewa');




//AUth
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
