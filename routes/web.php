<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Models\Subject;
use App\Models\Video;
Route::get('/', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/teacher',function (){
    $subject=Subject::all();
    return view('teacher')->with('subjects',$subject);
});
Route::post('/upload',[MyController::class,"upload"]);
Route::get('/student',function (){
    return view('student');
});
Route::get('/fetchVideoForStudents',[MyController::class,'fetchVideoForStudent']);
Route::post('/register',[MyController::class,'register']);
Route::post('/',[MyController::class,'login']);
Route::get('/fetchVideo',[MyController::class,'fetchVideo']);
Route::get('/deleteVideo/{id}',function($id){
    $data=Video::find($id)->delete();
    return redirect()->back()->with('message', 'Video Deleted successfully!');
});
Route::get('/logout',[MyController::class,'logout']);