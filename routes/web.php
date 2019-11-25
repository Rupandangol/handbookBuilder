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
    Route::get('/api/adminStatus','ajaxController@adminStatus')->name('adminStatus');

//    User
    Route::get('/userList','backendController@userList')->name('myUserList');

    Route::get('/api/userStatus','ajaxController@userStatus')->name('userStatus');



//    Project
    Route::post('/newProject', 'backendController@newProject')->name('newProject');
    Route::get('/projectLists', 'backendController@projectLists')->name('projectLists');
//    Route::get('/api/deleteProject', 'ajaxController@deleteProject')->name('deleteProject');
    Route::post('/projectLists/deleteProject','backendController@deleteProject')->name('deleteProject');

    Route::get('/api/updateProject', 'ajaxController@updateProject')->name('updateProject');
    Route::get('/api/projectStatus','ajaxController@projectStatus')->name('projectStatus');

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
    Route::get('/downloadWord/{id}','wordController@downloadWord')->name('downloadWord');


//    LOG
    Route::get('/Log','logController@viewLog')->name('viewLog');
    Route::get('/api/searchLog','logController@searchLog')->name('searchLog');

});


//Frontend

Route::get('/loginUser', 'userLoginController@userLogin')->name('loginUser');
Route::post('/loginUser','userLoginController@userLoginAction');

Route::get('/register','userLoginController@userRegister')->name('registerUser');
Route::post('/register','userLoginController@userRegisterAction');

//AUth
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
