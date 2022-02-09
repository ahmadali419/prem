<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/meetings', 'Zoom\MeetingController@list')->name('meeting.list');

// Create meeting room using topic, agenda, start_time.
Route::get('/create', 'Zoom\MeetingController@createMeeting')->name('meeting.create');
Route::post('/meetings', 'Zoom\MeetingController@create')->name('meeting.add');

// Get information of the meeting room by ID.
Route::get('/meetings/{id}', 'Zoom\MeetingController@get')->where('id', '[0-9]+');
Route::patch('/meetings/{id}', 'Zoom\MeetingController@update')->where('id', '[0-9]+');
Route::delete('/meetings/{id}', 'Zoom\MeetingController@delete')->where('id', '[0-9]+');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
