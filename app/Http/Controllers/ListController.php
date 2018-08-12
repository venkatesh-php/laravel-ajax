<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class ListController extends Controller
{
    public function getStateList(Request $request)
    {
        // return $request->id;
        $states = DB::table("states")
                    ->where("country_id",$request->id)
                    ->get();

        return $states;
    }
    public function getCityList(Request $request)
    {
        $cities = DB::table("cities")
                    ->where("state_id",$request->id)
                    ->get();
        return $cities;
    }

}
