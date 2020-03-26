<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class IncidentReportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function showIncidentReportForm()
    {
        $provinces = DB::table('provinces')->get();
        $companies = DB::table('companies')->get();
        $categories = DB::table('categories')->get();
        return view('incidentReport', compact('provinces','companies', 'categories'));
    }

    protected function loadCanton(Request $request)
    {
        $cantons = DB::table('cantons')->where('prov', $request->province)->pluck('name', 'id');
        return response()->json($cantons);
    }

    /**
     * Load the district dropdown menu
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function loadDistrict(Request $request)
    {
        $districts = DB::table('districts')->where('canton', $request->canton)->pluck('name', 'id');
        return response()->json($districts);
    }

    protected function loadCompanies(){
        $companies = DB::table('companies')->get();
        return response()->json($companies);
    }

    protected function loadCategories(){
        $categories = DB::table('categories')->get();
        return response()->json(categories);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

  /*  public function crearArray(array $data)
    {
        return array('user' => $data['user'],
            'category' => $data['category'],
            'company' => $data['company'],
            'province' => $data['province'],
            'canton' => $data['canton'],
            'district' => $data['district'],
            'address' => $data['address'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'pictures' => "'[\"img1\",\"img2\"]'", // '[\"1\",\"2\"]'tiene que tener esta estructura
            'details' => $data['details'],//detail en base
            'state' => '1');
    }*/

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerIncidentReport(Request $request)
    {
        $validData = Validator::make($request->all(), [
            'user' => 'required|integer|digits:9',
            'category' => 'required|integer',
            'company' => 'required|integer',
            'province' => 'required|integer|gte:1|lte:7',
            'canton' => 'required|integer|gte:1|lte:82',
            'district' => 'required|integer|gte:1|lte:484',
            'address' => 'required|string|max:190|min:10',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'pictures' => 'required',//hacer una validacion personalizada para limitar 4 imagenes
            'pictures.*' => 'required|image',
            'details' => 'required|string|between:10,190'
        ]);

        if ($validData->passes()){
          //  $id = DB::table('incident_report')->insertGetId($this->crearArray($request->all()));
           // if($id!=-1)
                return response()->json(['success'=> 'Data saved']);
         //   else
          //      return response()->json(['error'=> 'Data could not be saved']);
        }
        else {
            return response()->json(['error'=>$validData->errors()->all()]);
        }
    }
}
