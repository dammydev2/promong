<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use DB;

class CompanyController extends Controller
{

	public function company($name)
	{
		Session::put('company_name', $name);
		$company_data = User::where('name', $name)->first();
		return view('company.index', compact('company_data'));
	}

	public function registercode(Request $request)
	{
		$table = Session::get('company_name');
		//$chk = DB::table($table)->where('code', $request['code'])->first();
		if ($request['type'] === 'Register Code') {
			$chk = DB::table($table)->where('code', $request['code'])->where('subtype', 'Rounds')->first();
			if ($chk === null) {
				Session::flash('error', 'Code does not exist');
				return redirect('/user/company/'.$table);
			}
			DB::table($table)->where('code', $request['code'])
			->update([
				'verified_by' => $request['name'],
				'verify_phone' => $request['phone'],
				'verify_email' => $request['email'],
			]);
			Session::flash('success', 'Code registered, You will be contacted soonest via the mail you provided');
			return redirect('/user/company/'.$table);
		}
		else{
			$chk = DB::table($table)->where('code', $request['code'])->first();
			if ($chk === null) {
				Session::flash('error', 'Code does not exist');
				return redirect('/user/company/'.$table);
			}
			DB::table($table)->where('code', $request['code'])
			->update([
				'verified_by' => $request['name'],
				'verify_phone' => $request['phone'],
				'verify_email' => $request['email'],
			]);
			if ($chk->subtype === 'winning') {
				Session::flash('success', 'You have just won a tour, You will be contacted soonest via the mail you provided');
			}
			else{
				Session::flash('error', 'not a winning code, try again when you get another code');
			}
			
				return redirect('/user/company/'.$table);
		}
	}

}
