<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    
	public function all()
	{
        $data = Company::with([
                'products.prices',
                'products.files',
                'products.schedules',
                'products.itineraries',
                'products.activities',
                'products.destinations'
            ])
            ->get();

		$response = [
			'list_company' => $data
		];

		return response()->json($response);
	}

	public function one($id)
	{
		 $data = Company::with([
                'products.prices',
                'products.files',
                'products.schedules',
                'products.itineraries',
                'products.activities',
                'products.destinations'
            ])
            ->where('companyId',$id)
            ->first();

		$response = [
			'data_company ' => $data
		];

		return response()->json($response);
	}

    public function create(Request $req)
    {
    	$companyCode = rand(2,1000);
        $companyName = $req->input('companyName');
        $companyEmail = $req->input('companyEmail');
        $companyPhone = $req->input('companyPhone');
        $companyWebsite = $req->input('companyWebsite');
        $companyAddress = $req->input('companyAddress');
        $ownerName = $req->input('ownerName');
        $ownerEmail = $req->input('ownerEmail');
        $status = 'Need Kuration';

        // $validation1 = Company::where('companyEmail')->first();
        // if($validation1 != null)
        // {
        //     $validation2 = Company::where('companyName')->first();
        // }
        $create = new Company;
        $create->companyCode = $companyCode;
        $create->companyName = $companyName;
        $create->companyEmail = $companyEmail;
        $create->companyPhone = $companyPhone;
        $create->companyWebsite = $companyWebsite;
        $create->companyAddress = $companyAddress;
        $create->ownerName = $ownerName;
        $create->ownerEmail = $ownerEmail;
        $create->status = $status;
        $create->save();

        if($create)
        {
            $response = [
                'msg' => 'company succesfl created',
                'data_company' => $req->all()
            ];

            return response()->json($response);
        }else{
            $response = [
                'msg' => 'something wrong, please contact admin'
            ];

            return response()->json($response);
        }
    }
    public function update(Request $req, $id)
    {
        $companyName = $req->input('companyName');
        $companyEmail = $req->input('companyEmail');
        $companyPhone = $req->input('companyPhone');
        $companyWebsite = $req->input('companyWebsite');
        $companyAddress = $req->input('companyAddress');
        $ownerName = $req->input('ownerName');
        $ownerEmail = $req->input('ownerEmail');
        $status = 'Clear Kuration';

        $update = Company::where('companyId',$id)
                ->update([
                    'companyName' => $companyName,
                    'companyEmail' => $companyEmail,
                    'companyPhone' => $companyPhone,
                    'companyWebsite' => $companyWebsite,
                    'companyAddress' => $companyAddress,
                    'ownerName' => $ownerName,
                    'ownerEmail' => $ownerEmail
                ]);

        if($update)
        {
            $response = [
                'msg' => 'company with id-'.$id.' already updated',
                'data_update' => $req->all()
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
}
