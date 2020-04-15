<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    //
    public function index() {
        $home = HomeController::index();
        //$incidentReport = IncidentReportController::all()->first();
        //$incidentUpdate  = IncidentUpdateController::all();
        return response()->view('sitemap.index', [
            'home' => $home,
            //'incidentReport' => $incidentReport,
        ])->header('Content-Type', 'text/xml');
    }

    public function home() {
        $home = HomeController::index();
        return response()->view('sitemap.home', [
            'home' => $home,
        ])->header('Content-Type', 'text/xml');
    }
/*
    public function incidentReport() {
        $incidentReport  = IncidentReportController::all();
        return response()->view('sitemap.incidentReport', [
            'incidentReport' => $incidentReport,
        ])->header('Content-Type', 'text/xml');
    }*/
    /*public function incidentUpdate() {
        $incidentUpdate  = IncidentUpdateController::all();
        return response()->view('sitemap.incidentUpdate', [
            'incidentUpdate' => $incidentUpdate,
        ])->header('Content-Type', 'text/xml');
    }*/
}
