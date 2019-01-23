<?php
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//start_Person_start
Route::resource('man', 'API\PersonAPIController');

//end_Person_end

//start_Todo_start
Route::resource('todo', 'API\TodoAPIController');

//end_Todo_end

//start_Comment_start
Route::resource('comment', 'API\CommentAPIController');

//end_Comment_end

//*****Do Not Delete Me
