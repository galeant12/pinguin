<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
	public function all()
	{
		$data = Admin::all();

		$response = [
			'list_admin' => $data
		];

		return response()->json($data);
	}

	public function one($id)
	{
		$data = Admin::where('adminId', $id)->first();

		$response = [
			'list_admin' => $data
		];

		return response()->json($response);
	}

    public function create(Request $req)
    {
    	$email = $req->input('email');
    	$password  = md5($req->input('password'));

    	$validation = Admin::where('email', $email)->get();
    	if(count($validation) == 0)
    	{
    		$register = new Admin;
    		$register->email = $email;
    		$register->password = $password;
    		$register->save();

    		if($register)
    		{
    			$response = [
    				'email' => $email,
    				'password' => 'secret',
    				'redirect_url' => 'www.login.com'
    			];
    			return response()->json($response);
    		}else{
    			$response = [
    				'msg' => 'something wrong, please contact admin'
    			];
    			return response()->json($response);
    		}
     	}else{
    		$response = [
    			'msg' => 'email already register',
    			'email' => $email,
    			'redirect_url' => 'www.register.com'
    		];
    		return response()->json($response);
    	}
    }
    public function update(Request $req, $id)
    {
    	$email = $req->input('email');
    	$password = md5($req->input('password'));

    	$update = Admin::where('adminId', $id)
    			->update([
    				'email' => $email,
    				'password' => $password
    			]);

    	if($update)
    	{
    		$response = [
    			'msg' => 'admin-'.$id.'-has updated',
    			'email' => $email,
    			'password' => 'secret'
    		];
    		return response()->json($response);
    	}else{
    		$response = [
    			'msg' => 'something wrong, please contact admin'
    		];
    		return response()->json($response);
    	}

    }
    public function delete($id)
    {
    	$delete = Admin::where('adminId', $id)->delete();

    	if($delete)
    	{
    		$response = [
    			'msg' => 'admin-'.$id.'-has deleted'
    		];

    		return response()->json($response);
    	}else{
    		$response = [
    			'msg' => 'something wrong, please contact admin'
    		];
    		return response()->json($response);

    	}
    }

    public function login(Request $req)
    {
    	$email = $req->input('email');
    	$password  = md5($req->input('password'));

    	$validation1 = Admin::where('email',$email)->get();

    	if(count($validation1) == 1)
    	{	
    		$validation2 = Admin::where([
	    		'email' => $email,
	    		'password' => $password,
	    	])->get();

	    	if(count($validation2) == 1)
	    	{
	    		$response = [
	    			'msg' => 'admin-'.$email.'-login',
	    			'redirect_url' => 'www.dashboard.com'
	    		];

	    		return response()->json($response);
	    	}else{
	    		$response = [
	    			'msg' => 'wrong password',
	    			'redirect_url' => 'www.login.com'
	    		];

	    		return response()->json($response);
	    	}
    	}else{
    		$response = [
    			'msg' => 'wrong email',
    			'redirect_url' => 'www.login.com'
    		];
    		return response()->json($response);
    	}
    }
}
