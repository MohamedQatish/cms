<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Language;
use App\Models\HomepageWidget;
use App\Models\Faq;
use App\Models\Story;
use App\Models\Client;
use App\Models\Blog;


use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{

    public function changeLanguage(Request $request)
    {
        $lang = $request->query('lang');

        if ($lang) {
            Session::put('lang', $lang);
        }
         return redirect()->route('home');
    }

    function index() {
        $homeWidgets = HomepageWidget::where('active', 1)->orderBy('ordering')->get();
        $language_shortcut = Language::where('main', 1)->pluck('shortcut')->first();

        $services = Service::get();
        $faqs = Faq::orderBy('ordering', 'asc')->get();
        $clients = Client::get();
        $stories = Story::get();
        $blogs = Blog::orderBy('date', 'desc')->where('featured',1)->get();

        return view('frontend.home', compact('homeWidgets','language_shortcut','services', 'blogs','faqs','clients','stories'));

    }


}
