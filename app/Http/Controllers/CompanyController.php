<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    
	public function all()
	{
		$data = Company::with('users')->with('products')->get();


		$response = [
			'list_company' => $data
		];

		return response()->json($response);
	}

	public function one($id)
	{
		$data = Company::with('users')->with('products')->where('companyId', $id)->first();

		$response = [
			'data_company ' => $data
		];

		return response()->json($response);
	}

    public function create(Request $req)
    {
    	$email = $req->input('email');
    	$password  = md5($req->input('password'));

    	
    }
    public function update(Request $req, $id)
    {
    	
    }
    public function delete($id)
    {
    	$delete = Company::where('companyId', $id)->delete();

    	if($delete)
    	{
    		$response = [
    			'msg' => 'company-'.$id.'-has deleted'
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
    	// $email = $req->input('email');
    	// $password  = md5($req->input('password'));

    	// $validation1 = Admin::where('email',$email)->get();

    	// if(count($validation1) == 1)
    	// {	
    	// 	$validation2 = Admin::where([
	    // 		'email' => $email,
	    // 		'password' => $password,
	    // 	])->get();

	    // 	if(count($validation2) == 1)
	    // 	{
	    // 		$response = [
	    // 			'msg' => 'admin-'.$email.'-login',
	    // 			'redirect_url' => 'www.dashboard.com'
	    // 		];

	    // 		return response()->json($response);
	    // 	}else{
	    // 		$response = [
	    // 			'msg' => 'wrong password',
	    // 			'redirect_url' => 'www.login.com'
	    // 		];

	    // 		return response()->json($response);
	    // 	}
    	// }else{
    	// 	$response = [
    	// 		'msg' => 'wrong email',
    	// 		'redirect_url' => 'www.login.com'
    	// 	];
    	// 	return response()->json($response);
    	// }
    }
}
