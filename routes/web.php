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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => '@admin@'], function () {

    Route::get('/', 'backendController@dashboard')->name('dashboard');
//    admin
    Route::get('/addAdmin', 'backendController@addAdmin')->name('addAdmin');
    Route::post('/addAdmin', 'backendController@addAdminAction');
//    manageAdmin
    Route::get('/manageAdmin', 'backendController@manageAdmin')->name('manageAdmin');
    Route::get('/manageAdmin/delete/{id}', 'backendController@deleteAdmin')->name('deleteAdmin');
    Route::get('/manageAdmin/update/{id}', 'backendController@updateAdmin')->name('updateAdmin');
    Route::post('/manageAdmin/update/{id}', 'backendController@updateAdminAction');

//    Project
    Route::post('/newProject', 'backendController@newProject')->name('newProject');
    Route::get('/projectLists', 'backendController@projectLists')->name('projectLists');
    Route::get('/api/deleteProject', 'ajaxController@deleteProject')->name('deleteProject');
    Route::get('/api/updateProject','ajaxController@updateProject')->name('updateProject');

    Route::get('/projectContent/{id}', 'backendController@projectContent')->name('projectContent');
    Route::post('/projectContentTitle', 'backendController@projectContentTitle')->name('projectContentTitle');
    Route::post('/projectContent/content', 'backendController@myProjectContent')->name('myProjectContent');

//    update
    Route::post('/projectContentTitle/update', 'backendController@updateProjectContentTitle')->name('updateProjectContentTitle');
//    edit
    Route::get('/projectContent/content/contentUp/{id}', 'backendController@contentUp')->name('contentUp');
    Route::get('/projectContent/content/contentDown/{id}', 'backendController@contentDown')->name('contentDown');
    Route::get('/projectContent/content/contentDelete/{id}', 'backendController@contentDelete')->name('contentDelete');
    Route::get('/api/editContentNo','ajaxController@editContentNo')->name('editContentNo');

//    previewPdf
    Route::post('/previewPdf','pdfController@previewPdf')->name('previewPdf');

});
