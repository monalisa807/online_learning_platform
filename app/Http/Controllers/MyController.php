<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Video;

class MyController extends Controller
{
    public function register(Request $request){
        $user=User::insert(['name'=>$request->name,'email'=>$request->email,'password'=>$request->password,'role'=>$request->role]);
        if($user){
            return redirect('/')->with('message','Register Successfully');
        }
    }
    public function login(Request $request){
        $user=User::where('email',$request->email)->where('password',$request->password)->first();
        Session::put('userid',$user->id);
        Session::put('name',$user->name);
        Session::put('role',$user->role);
        if($user->role=='teacher'){
            return redirect('/teacher')->with('message','Login Successfully');
        }
        if($user->role=='student'){
            return redirect('/student')->with('message','Login Successfully');

        }
    }
    public function upload(Request $request)
    {
        // Validate the request
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'title' => 'required|string|max:255',
            'video' => 'required|file|mimes:mp4,avi,mov|max:10240', // max size 10MB
        ]);

        // Get the uploaded file
        $file = $request->file('video');

        // Generate a unique filename
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Define the destination path
        $destinationPath = public_path('videos');

        // Ensure the directory exists
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Move the uploaded file to the desired location
        $file->move($destinationPath, $fileName);

        // Create a new Video instance
        $video = new Video();
        $video->userid = Session::get('userid');
        $video->subject_id = $request->subject_id;
        $video->title = $request->title;
        $video->video = 'videos/' . $fileName; // Store relative path
        $video->save();

        // Redirect with a success message
        return redirect()->back()->with('message', 'Video uploaded successfully!');
    }
    public function fetchVideo(){
        $userid=Session::get('userid');
        $data=Video::join('subjects','videos.subject_id','=','subjects.id')->join('users','videos.userid','=','users.id')->where('users.id','=',$userid)->get(['videos.id','subjects.subject_name','videos.title','videos.video']);
        // dd($data);
        return view('fetchVideos')->with('datas',$data);
    }
    public function fetchVideoForStudent(){
        $data=Video::join('subjects','videos.subject_id','=','subjects.id')->join('users','videos.userid','=','users.id')->get(['videos.id','subjects.subject_name','videos.title','videos.video','users.name']);
        return view('videoForStudent')->with('videos',$data);
    }
    public function logout(){
        Session::flush();
        return redirect('/');
    }
}
