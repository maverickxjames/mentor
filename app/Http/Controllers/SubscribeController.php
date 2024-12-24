<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscribe;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribes,email',
            'name' => 'required',
            'password' => 'required',
            'phone' => 'required|numeric',
            'college' => 'required',
            'collegeproof' => 'required|file|mimes:pdf,png,jpg,jpeg,gif|max:2048',
            'year' => 'required',
            'score' => 'required',
            'scoreproof' => 'required|file|mimes:pdf,png,jpg,jpeg,gif|max:2048',
            'message' => 'required',
            'subject_expert' => 'required',
            'profile' => 'required|file|mimes:pdf,png,jpg,jpeg,gif|max:2048',
            'video_clip' => 'required|file|mimes:mp4,3gp,avi,mov,flv,wmv|max:20480',
        

            // 'consent' => 'required',
        ]);


        // upload these files to public folder and store the path in database

        $collegeproof = time().'.'.$request->collegeproof->extension();
        $request->collegeproof->move(public_path('uploads/college'), $collegeproof);

        $scoreproof = time().'.'.$request->scoreproof->extension();
        $request->scoreproof->move(public_path('uploads/score'), $scoreproof);

        $profile = time().'.'.$request->profile->extension();
        $request->profile->move(public_path('uploads/profile'), $profile);

        $video_clip = time().'.'.$request->video_clip->extension();
        $request->video_clip->move(public_path('uploads/video'), $video_clip);



        
        

        $subscribe = new Subscribe();
        $subscribe->email = $request->email;
        $subscribe->password = bcrypt($request->password);
        $subscribe->name = $request->name;
        $subscribe->phone = $request->phone;
        $subscribe->college = $request->college;
        $subscribe->collegeproof = $collegeproof;
        $subscribe->year = $request->year;
        $subscribe->score = $request->score;
        $subscribe->scoreproof = $scoreproof;
        $subscribe->message = $request->message;
        $subscribe->subject_expert = $request->subject_expert;
        $subscribe->profile = $profile;
        $subscribe->vedio_clip = $video_clip;
        // $subscribe->consent = $request->consent;
        $subscribe->save();

        if($subscribe){
            return redirect()->back()->with('success','Your request has been submitted successfully');
        }else{
            return redirect()->back()->with('error','Failed to subscribe');
        }

        

    }

    public function index()
    {

        return view('admin');
    }

    public function verify($id)
    {
        $subscribe = Subscribe::find($id);
        $subscribe->status = 1;
        $subscribe->save();
        return redirect()->back()->with('success','User verified successfully');
    }

    public function temp_ban($id)
    {
        $subscribe = Subscribe::find($id);
        $subscribe->status = 2;
        $subscribe->save();
        return redirect()->back()->with('success','User banned temporarily');
    }

    public function perm_ban($id)
    {
        $subscribe = Subscribe::find($id);
        $subscribe->status = 3;
        $subscribe->save();
        return redirect()->back()->with('success','User banned permanently');
    }

    public function about()
    {
        return view('aboutus');
    }

    
}
