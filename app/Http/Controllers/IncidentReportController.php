<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;

class IncidentReportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function showIncidentReportForm()
    {
        $keys = config('app.GMAPKEY');
        $provinces = DB::table('provinces')->get();
        $companies = DB::table('companies')->get();
        $categories = DB::table('categories')->get();
        return view('incidentReport', compact('provinces','companies', 'categories', 'keys'));
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

    protected function createArray(array $data)
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
            'pictures' => $data['pictures'],
            'details' => $data['details'],
            'state' => '1');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerIncidentReport(Request $request)
    {
        $requestData= $request->all();
        $validData = Validator::make($requestData, [
            'user' => 'required|integer|digits:9',
            'category' => 'required|integer',
            'company' => 'required|integer',
            'province' => 'required|integer|gte:1|lte:7',
            'canton' => 'required|integer|gte:1|lte:82',
            'district' => 'required|integer|gte:1|lte:484',
            'address' => 'required|string|max:190|min:10',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'pictures' => 'required|max:4',
            'pictures.*' => 'required|image',
            'details' => 'required|string|between:10,190'
        ]);

        if ($validData->passes())
        {
            $imagesNames= array();
            if($request->hasfile('pictures'))
            {
                foreach($request->file('pictures') as $img)
                {
                    $imagePath = $img->store('public/incidents');
                    array_push($imagesNames,basename($imagePath));
                }
                $requestData['pictures']= json_encode($imagesNames);
                DB::table('incident_report')->insert($this->createArray($requestData));
                return response()->json(['success'=> 'Data saved']);
                //falta validar si se inserto bien
                //return response()->json(['error'=> 'Data could not be saved']);
            }else{
                return response()->json(['error'=> 'Problems with images upload']);
            }
        }
        else {
            return response()->json(['error'=>$validData->errors()->all()]);
        }
    }

}
