<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Language;
use App\Models\Faq;


class HomeController extends Controller
{
    function index() {
        $language_shortcut = Language::where('main', 1)->pluck('shortcut')->first();

        $services = Service::get();
        $faqs = Faq::orderBy('ordering', 'asc')->get();

        return view('frontend.home', compact('services', 'language_shortcut','faqs'));

    }
}
