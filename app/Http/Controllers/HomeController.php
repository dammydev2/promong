<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function myprofile($userID)
    {
        $data = User::where('id', $userID)->get();
        return view('myprofile', compact('data'));
    }

    public function updateprofile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'contact_name' => ['required', 'string', 'max:255'],
            'contact_phone' => ['required', 'numeric', 'min:11'],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);
        User::where('email', $request['email'])
        ->update([
            'name' => $request['name'],
            'contact_name' => $request['contact_name'],
            'contact_phone' => $request['contact_phone'],
        ]);
        Session::flash('success', 'Profile updated successfully');
        return redirect('/home');
    }

    public function chnagebanner()
    {
        $id = \Auth::User()->id;
        $data = User::get('banner');
        return view('changebanner', compact('data'));
    }

    public function updatebanner(Request $request)
    {
        $request->validate([
            'image'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        // Check if a profile image has been uploaded
        if ($request->has('image')) {
            $imageName = \Auth::User()->name.time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('uploads'), $imageName);
        User::where('id', \Auth::User()->id)
        ->update([
            'banner' => $imageName
        ]);
        Session::flash('success', 'Profile updated successfully');
        return redirect('/chnagebanner');
        }
    }


}








