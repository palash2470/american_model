<?php
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator;
use Response;
use Redirect;
use App\Models\{Country, State, City};
class DropdownController extends Controller
{
    public function index()
    {
        $data['countries'] = Country::get(["name", "id"]);
        return view('welcome', $data);
    }
    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
       /*  $data['cities'] = City::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data); */
    }
    public function autoCompleteCity(Request $request){
        $cities = City::where('city_name','LIKE','%'.$request->q.'%')->limit(10)->get(["city_name", "id"]);
        $response = array();
        if(count($cities) > 0){
            foreach($cities as $city){
            $response[] = array("value"=>$city->id,"label"=>$city->city_name);
            }
        }
        return response()->json($response);
    }
}