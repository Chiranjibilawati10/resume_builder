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

Route::get('/', function () {
    return view('main');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//using resource route
Route::resource('user-detail', 'UserDetailController')->middleware('auth');
Route::resource('education', 'EducationController')->middleware('auth');
Route::resource('experience', 'ExperienceController')->middleware('auth');
Route::resource('skill', 'SkillController')->middleware('auth');
Route::resource('roles', 'RoleController')->middleware('auth');
Route::resource('users', 'UserController')->middleware('auth');
Route::resource('themes', 'ThemeController')->middleware('auth');


Route::get('resume', 'ResumeController@index')->name('resume.index')->middleware('auth');
Route::get('resume/download', 'ResumeController@download')->name('resume.download')->middleware('auth');

