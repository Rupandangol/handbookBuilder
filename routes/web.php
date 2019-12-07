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


Route::group(['prefix' => '@admin@', 'middleware' => 'auth:admin'], function () {

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


//    Project
    Route::post('/newProject', 'backendController@newProject')->name('newProject');
    Route::get('/projectLists', 'backendController@projectLists')->name('projectLists');
//    Route::get('/api/deleteProject', 'ajaxController@deleteProject')->name('deleteProject');
    Route::post('/projectLists/deleteProject', 'backendController@deleteProject')->name('deleteProject');

    Route::get('/api/updateProject', 'ajaxController@updateProject')->name('updateProject');
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


//    LOG
    Route::get('/Log', 'logController@viewLog')->name('viewLog');
    Route::get('/api/searchLog', 'logController@searchLog')->name('searchLog');

});


//Frontend

Route::get('/loginUser', 'userLoginController@userLogin')->name('loginUser');
Route::post('/loginUser', 'userLoginController@userLoginAction');
Route::get('/logoutUser', 'userLoginController@userLogout')->name('user-logout');

Route::get('/register', 'userLoginController@userRegister')->name('registerUser');
Route::post('/register', 'userLoginController@userRegisterAction');

Route::group(['middleware' => 'auth:userList'], function () {
    Route::get('/dashboard', 'frontendController@dashboard')->name('frontend-dashboard');

    Route::get('/userInfoForm', 'frontendController@userInfoForm')->name('userInfoForm');
    Route::post('/userInfoForm', 'frontendController@userInfoFormAction');
    Route::group(['prefix' => '/handbookList', 'middleware' => 'checkUserInfo'], function () {
        Route::get('/', 'userHandbookController@handbookList')->name('handbookList');
        Route::get('/api/fetchLanguage', 'userHandbookController@fetchLanguage')->name('fetchLanguage');
        Route::get('/api/createUserHandbook', 'userHandbookController@createUserHandbook')->name('createUserHandbook');
//        handbook
        Route::get('/titleContents/{id}', 'userHandbookController@titleContents')->name('handbookContentTitle');
        Route::get('/contents/{id}', 'userHandbookController@contents')->name('handbookContent');
        Route::post('/contents/{id}', 'userHandbookController@contentsUpdate');

//        pdf User
        Route::post('/userPdfView/', 'userPdfController@userPdfView')->name('userPdfView');
        Route::post('/userPdfDownload/', 'userPdfController@userPdfDownload')->name('userPdfDownload');

        Route::get('/api/includeCode/', 'userHandbookController@includeCode')->name('include');

    });
});



//AUth
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
