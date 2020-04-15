<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncidentUpdateController extends Controller
{
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
}
