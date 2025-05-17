<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $languages = Language::getActiveLanguages();
        return view('admin.settings.services', [
            'languages' => $languages,
            'services' => $services,
            'catName' => 'dashboard',
            'title' => 'Bootstrap Tables',
            'breadcrumbs' => ["Tables", "Bootstrap"],
            'scrollspy' => 0,
            'simplePage' => 0
        ]);
    }
    public function create()
    {

        return view('admin.settings.servicesCreate', [
            'catName' => 'dashboard',
            'title' => 'Bootstrap Tables',
            'breadcrumbs' => ["Tables", "Bootstrap"],
            'scrollspy' => 0,
            'simplePage' => 0
        ]);
    }
}
