<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use DB;
use Hash;
use App\Message;
use App\ReplyMessage;

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
        $data = User::where('name', \Auth::User()->name)->first();
        return view('changebanner', compact('data'));
    }

    public function updatebanner(Request $request)
    {
        $request->validate([
            'image'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'text' => 'required'
        ]);
        // Check if a profile image has been uploaded
        if ($request->has('image')) {
            $imageName = \Auth::User()->name.time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'), $imageName);
            User::where('id', \Auth::User()->id)
            ->update([
                'banner' => $imageName,
                'text' => $request['text']
            ]);
            Session::flash('success', 'Profile updated successfully');
            return redirect('/chnagebanner');
        }
    }

    public function generatecode()
    {
        return view('user.generatecode');
    }

    public function generatecodenow(Request $request)
    {
        $request->validate([
            'tourType' => 'required',
            'code_number' => 'required',
            'win_number' => 'required',
            'promo_start' => 'required',
            'promo_end' => 'required',
        ]);
        if ($request['type'] === 'Rounds') {
            $type = 'rounds';
        }
        else{
            $type = 'ordinary';
        }
        $table = \Auth::User()->name;
        #GENERATE NON WINNING CODE
        $non_winning = $request['code_number'] - $request['win_number'];
        for ($i=0; $i < $non_winning; $i++) { 
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
            $code = substr(str_shuffle($permitted_chars), 0, 6);
            DB::table($table)->insert([
                'type' => $request['tourType'],
                'subtype' => $type,
                'code' => $code,
                'verified_by' => 'to be verified',
                'verify_phone' => 'to be verified',
                'verify_email' => 'to be verified',
                'date_start' => $request['promo_start'],
                'date_end' => $request['promo_end'],
                'round_winner' => 0
            ]);
        }
        if ($request['win_number'] > 0) {

        #GENERATE WINNING CODE
            for ($i=0; $i < $request['win_number']; $i++) { 
                $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                $winning = substr(str_shuffle($permitted_chars), 0, 6);
                DB::table($table)->insert([
                    'type' => $request['tourType'],
                    'subtype' => 'winning',
                    'code' => $winning,
                    'verified_by' => 'to be verified',
                    'verify_phone' => 'to be verified',
                    'verify_email' => 'to be verified',
                    'date_start' => $request['promo_start'],
                    'date_end' => $request['promo_end'],
                    'round_winner' => 0
                    
                ]);
            }
            return redirect('generatecode')->with('success', 'Code Created successfully');
        }   
    }

    public function viewcode()
    {
        return view('user.viewcode');
    }

    public function checkcode(Request $request)
    {
        $request->validate([
            'tourType' => 'required',
            'promo_start' => 'required',
            'promo_end' => 'required',
        ]);
        Session::put('tourType', $request['tourType']);
        Session::put('promo_start', $request['promo_start']);
        Session::put('promo_end', $request['promo_end']);
        Session::put('subtype', $request['type']);
        return redirect('tourcodes');
        // $table = \Auth::User()->name;
        // $result = DB::table($table)->where('type', $request['tourType'])
        // ->where('date_start', '>=', $request['promo_start'])
        // ->where('date_end', '>=', $request['promo_end'])
        // ->orderBY('id', 'desc')
        // ->paginate(2);
        // if ($result->isEmpty()) {
        //     return redirect()->back()->with('success', 'no record found');
        // }
        // return view('user.checkcode', compact('result'));
    }

    public function tourcodes()
    {
        $table = \Auth::User()->name;
        if (Session::get('subtype') === 'Rounds') {
           $result = DB::table($table)->where('type', Session::get('tourType'))
           ->where('date_start', '>=', Session::get('promo_start'))
           ->where('date_end', '>=', Session::get('promo_end'))
           ->where('subtype', 'Rounds')
           ->orderBY('id', 'desc')
           ->paginate(100);
       }
       else{
        $result = DB::table($table)->where('type', Session::get('tourType'))
        ->where('date_start', '>=', Session::get('promo_start'))
        ->where('date_end', '>=', Session::get('promo_end'))
        ->where('subtype', '!=', 'rounds')
        ->orderBY('id', 'desc')
        ->paginate(100);
    }
    
    if ($result->isEmpty()) {
        return redirect()->back()->with('success', 'no record found');
    }
    return view('user.checkcode', compact('result'));
        //return Session::get('request');
}

public function user()
{
    $user = \Auth::User()->name;
    $user = User::where('name', $user)->get();
    return view('user.users', compact('user'));
}

public function adduser()
{
    return view('user.adduser');
}

public function registeruser(Request $request)
{
    $request->validate([
        'contact_name' => ['required', 'string', 'max:255'],
        'contact_phone' => ['required', 'numeric', 'min:11'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
    User::create([
        'name' => \Auth::User()->name,
        'contact_name' => $request['contact_name'],
        'contact_phone' => $request['contact_phone'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
    ]);

    Session::flash('message', 'user created successfully');
    return redirect('user');
}

public function useredit($id)
{
    $data = User::where('id', $id)->get();
    return view('user.useredit', compact('data'));
}

public function updateuser(Request $request)
{
    $request->validate([
        'contact_name' => ['required', 'string', 'max:255'],
        'contact_phone' => ['required', 'numeric', 'min:11'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
    User::where('id', $request['id'])
    ->update([
        'contact_name' => $request['contact_name'],
        'contact_phone' => $request['contact_phone'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
    ]);
    Session::flash('success', 'user updated successfully');
    return redirect('user');
}

public function userdelete($id)
{
    User::where('id', $id)->delete();
    Session::flash('error', 'user deleted successfully');
    return redirect('user');
}

public function roundwinner()
{
    $table = \Auth::User()->name;
    $code = DB::table($table)->where('subtype', 'rounds')
    ->where('round_winner', 0)
    ->where('verify_email', '!=', 'to be verified')->get();
    return view('user.roundwinner', compact('code'));
}

public function codeDelete($id)
{
    $table = \Auth::User()->name;
    DB::table($table)->where('id', $id)->delete();
    return redirect()->back()->with('message', 'Deleted successfully');
}

public function addWinner(Request $request)
{
    $request->validate([
        'code' => 'required'
    ]);
    $table = \Auth::User()->name;
    DB::table($table)->where('code', $request['code'])
    ->update([
        'round_winner' => 1
    ]);
    return redirect()->back()->with('success', 'winner added successfully');

}

public function checkRoundWinner()
{
    return view('user.checkRoundWinner');
}

public function viewRoundWinner(Request $request)
{
    $request->validate([
        'tourType' => 'required',
        'promo_start' => 'required',
        'promo_end' => 'required',
    ]);
    Session::put('tourType', $request['tourType']);
    Session::put('promo_start', $request['promo_start']);
    Session::put('promo_end', $request['promo_end']);
    Session::put('subtype', 'rounds');
    return redirect('roundwinners');
}

public function roundwinners()
{
    $table = \Auth::User()->name;
    $result = DB::table($table)->where('type', Session::get('tourType'))
    ->where('date_start', '>=', Session::get('promo_start'))
    ->where('date_end', '>=', Session::get('promo_end'))
    ->where('subtype', 'rounds')
    ->where('round_winner', 1)
    //->orderBY('id', 'desc')
    ->paginate(100);
    if ($result->isEmpty()) {
        return redirect()->back()->with('message', 'no record found');
    }
    return view('user.checkcode', compact('result'));
}


public function messageAdmin()
{
    return view('user.messageAdmin');
}

public function sendMessage(Request $request)
{
    $request->validate([
        'subject' => 'required',
        'message' => 'required'
    ]);
    Message::create([
        'subject' => $request['subject'],
        'message' => $request['message'],
        'promoter' => \Auth::User()->name,
    ]);
    return redirect()->back()->with('success', 'message sent successfully');
}

public function inbox()
{
    $message = Message::where('promoter', \Auth::User()->name)->orderBy('id', 'desc')->paginate(20);
    return view('user.message', compact('message'));
}

public function message($id)
{
    $message = Message::where('id', $id)->where('promoter', \Auth::User()->name)->get();
    $msg = ReplyMessage::where('message_id', $id)->get();
    return view('user.readMessage', compact('message','msg'));

}


}








