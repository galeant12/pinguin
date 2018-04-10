<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;

class ActivityController extends Controller
{
    public function all()
	{
        $data = Activity::all()

		$response = [
			'list_destination' => $data
		];

		return response()->json($response);
	}

	public function one($id)
	{
		 $data = Activity::where('activityId',$id)
            	->first();

		$response = [
			'data_company ' => $data
		];

		return response()->json($response);
	}

    public function create(Request $req)
    {
    	$name = $req->input('name');

        $create = new Activity;
        $create->name = $name;
        $create->save();

        if($create)
        {
            $response = [
                'msg' => 'activity succesfull created',
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
        $name = $req->input('name');

        $update = Activity::where('activityId',$id)
                ->update([
                    'name' => $name
                ]);

        if($update)
        {
            $response = [
                'msg' => 'activity with id-'.$id.' already updated',
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
    	$delete = Activity::where('activityId', $id)->delete();

    	if($delete)
    	{
    		$response = [
    			'msg' => 'activity-'.$id.'-has deleted'
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
