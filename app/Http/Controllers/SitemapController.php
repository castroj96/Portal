<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\IncidentReportController;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    //
    public function index() {
        $home = HomeController::index();
        //$incidentReport = IncidentReportController::incidentReportindex();

        return response()->view('/sitemap.index', [
            'home' => $home,
            //'incidentReport' => $incidentReport,
        ])->header('Content-Type', 'text/xml');
    }
    public function home() {
        $home = HomeController::index();
        return response()->view('/sitemap.home', [
            'home' => $home,
        ])->header('Content-Type', 'text/xml');
    }

    public function incidentReport() {
        $incidentReport = IncidentReportController::incidentReportindex();
        return response()->view('sitemap.incidentReport', [
            'incidentReport' => $incidentReport,
        ])->header('Content-Type', 'text/xml');
    }


}
