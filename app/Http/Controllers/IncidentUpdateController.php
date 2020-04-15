<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class IncidentUpdateController extends Controller
{

    public function showIncidentUpdate()
    {
        $keys = config('app.GMAPKEY');
        return view('incidentUpdate', compact('keys'));
    }

    protected function loadIncidents(Request $request)
    {
        $incidents = DB::table('incident_report')
            ->join('categories', 'incident_report.category', '=','categories.id')
            ->join('companies', 'incident_report.company', '=','companies.id')
            ->join('provinces', 'incident_report.province', '=','provinces.id')
            ->join('cantons', 'incident_report.canton', '=','cantons.id')
            ->join('districts', 'incident_report.district', '=','districts.id')
            ->select('categories.name as category', 'companies.name as company', 'provinces.name as province',
                'cantons.name as canton','districts.name as district', 'incident_report.address','incident_report.state','incident_report.id' )
            ->where('user', $request->user)->get();
        return response()->json($incidents);
    }

    protected function loadIncidentDetails(Request $request)
    {
        $incidents = DB::table('incident_report')
            ->join('categories', 'incident_report.category', '=','categories.id')
            ->join('companies', 'incident_report.company', '=','companies.id')
            ->join('provinces', 'incident_report.province', '=','provinces.id')
            ->join('cantons', 'incident_report.canton', '=','cantons.id')
            ->join('districts', 'incident_report.district', '=','districts.id')
            ->select('categories.name as category', 'companies.name as company', 'provinces.name as province',
                'cantons.name as canton','districts.name as district','incident_report.address','incident_report.latitude',
                'incident_report.longitude','incident_report.pictures','incident_report.details','incident_report.state','incident_report.id')
            ->where('incident_report.id', $request->id)->get()->first();
        return response()->json($incidents);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateIncidentState(Request $request)
    {
        $requestData = $request->all();
        $validData = Validator::make($requestData, [
            'state' => 'required|integer|gte:2|lte:3',
        ]);

        if ($validData->passes()) {
            DB::table('incident_report')->where('incident_report.id', $request->id)->update(['state' => $request->state]);
            return response()->json(['success' => 'Data saved']);
        } else {
            return response()->json(['error' => $validData->errors()->all()]);
        }
    }
}
