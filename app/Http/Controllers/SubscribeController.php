<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscribe;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required|numeric',
            'college' => 'required',
            'collegeproof' => 'required|file|mimes:pdf,png,jpg,jpeg,gif|max:2048',
            'year' => 'required',
            'score' => 'required',
            'scoreproof' => 'required|file|mimes:pdf,png,jpg,jpeg,gif|max:2048',
            // 'consent' => 'required',
        ]);

        // upload college and score proof files

        $collegeproof = $request->file('collegeproof')->store('proofs');
        $scoreproof = $request->file('scoreproof')->store('proofs');

        $subscribe = new Subscribe();
        $subscribe->email = $request->email;
        $subscribe->name = $request->name;
        $subscribe->phone = $request->phone;
        $subscribe->college = $request->college;
        $subscribe->collegeproof = $collegeproof;
        $subscribe->year = $request->year;
        $subscribe->score = $request->score;
        $subscribe->scoreproof = $scoreproof;
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
}
