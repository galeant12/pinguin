<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Destination;

class DestinationController extends Controller
{
	public function all()
	{
        $data = Destination::all()

		$response = [
			'list_destination' => $data
		];

		return response()->json($response);
	}

	public function one($id)
	{
		 $data = Company::where('companyId',$id)
            	->first();

		$response = [
			'data_company ' => $data
		];

		return response()->json($response);
	}

    public function create(Request $req)
    {
    	$destination = $req->input('destination');
        $city = $req->input('city');
        $province = $req->input('province');
        $country = $req->input('country');
        $latitude = $req->input('latitude');
        $longitude = $req->input('longitude');

        // $validation1 = Company::where('companyEmail')->first();
        // if($validation1 != null)
        // {
        //     $validation2 = Company::where('companyName')->first();
        // }
        $create = new Destination;
        $create->destination = $destination;
        $create->city = $city;
        $create->province = $province;
        $create->country = $country;
        $create->latitude = $latitude;
        $create->longitude = $longitude;
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
        $destination = $req->input('destination');
        $city = $req->input('city');
        $province = $req->input('province');
        $country = $req->input('country');
        $latitude = $req->input('latitude');
        $longitude = $req->input('longitude');

        $update = Destination::where('destinationId',$id)
                ->update([
                    'destination' => $destination,
                    'city' => $city,
                    'province' => $province,
                    'country' => $country,
                    'latitude' => $latitude,
                    'longitude' => $longitude
                ]);

        if($update)
        {
            $response = [
                'msg' => 'destination with id-'.$id.' already updated',
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
    	$delete = Destination::where('destinationId', $id)->delete();

    	if($delete)
    	{
    		$response = [
    			'msg' => 'destination-'.$id.'-has deleted'
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
