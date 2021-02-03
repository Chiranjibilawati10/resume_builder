<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/','main');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/invitation/accept/{token}', 'InvitationController@edit')->name('invitation.accept');
Route::post('/invitation/accept/{user}', 'InvitationController@update')->name('invitation.accept');

Route::group(['middleware' => 'auth'], function(){
    //using resource route
    Route::resource('user-detail', 'UserDetailController');
    Route::resource('education', 'EducationController');
    Route::resource('experience', 'ExperienceController');
    Route::resource('skill', 'SkillController');
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('themes', 'ThemeController');

    Route::get('resume', 'ResumeController@index')->name('resume.index');
    Route::get('resume/download', 'ResumeController@download')->name('resume.download');
    
    Route::get('notification/{id}', 'UserNotificationController@show')->name('notification.view');
});


