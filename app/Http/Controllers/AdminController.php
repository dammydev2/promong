<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Promoter;
use App\Message;
use App\ReplyMessage;
use DB;
use Session;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function promoter()
    {
    	$user = Promoter::orderBy('id', 'desc')->paginate(20);
    	return view('admin.promoter', compact('user'));
    }

    public function activate($id)
    {
    	Promoter::where('id', $id)
    	->update([
    		'status' => 'approved'
    	]);
    	//getting the name
    	$name = Promoter::where('id', $id)->first()->name;
    	User::where('name', $name)
    	->update([
    		'status' => 'approved'
    	]);
        if (Schema::hasTable($name))
        {

        }
        else{
            Schema::create($name, function($table)
            {
                $table->increments('id');
                $table->string('type');
                $table->string('subtype');
                $table->string('code');
                $table->string('verified_by')->nullable();
                $table->string('verify_phone')->nullable();
                $table->string('verify_email')->nullable();
                $table->string('date_start');
                $table->string('date_end');
                $table->string('round_winner');
            });
        }
        return redirect()->back()->with('success', 'User Activated successfully');
    }

    public function deactivate($id)
    {
    	Promoter::where('id', $id)
    	->update([
    		'status' => 'unapproved'
    	]);
    	//getting the name
    	$name = Promoter::where('id', $id)->first()->name;
    	User::where('name', $name)
    	->update([
    		'status' => 'unapproved'
    	]);
    	return redirect()->back()->with('error', 'User De-activated successfully');
    }

    public function delete($id)
    {
    	$name = Promoter::where('id', $id)->first()->name;
    	Promoter::where('id', $id)->delete();
    	User::where('name', $name)->delete();
    	return redirect()->back()->with('error', 'User Deleted successfully');
    }

    public function message()
    {
        $message = Message::orderBy('id', 'desc')->paginate(50);
        return view('admin.allMessage', compact('message'));
    }

    public function read($id)
    {
        $message = Message::where('id', $id)->get();
        $msg = ReplyMessage::where('message_id', $id)->get();
        return view('admin.read', compact('message','msg'));
    }

    public function reply(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);
        ReplyMessage::create([
            'message_id' => $request['message_id'],
            'subject' => $request['subject'],
            'message' => $request['message'],
        ]);
        return redirect()->back()->with('success', 'message sent successfully');
    }

    public function sendMessage()
    {
        $user = Promoter::all();
        return view('admin.sendMessage', compact('user'));
    }

    public function sendUserMessage(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);
        Message::create([
            'promoter' => $request['promoter'],
            'subject' => $request['subject'],
            'message' => $request['message'],
            'status' => 'received'
        ]);
        Session::flash('success', 'message sent to user successfully');
        return redirect('admin/sendMessage');
    }


}





