<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Language;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function index()
    {
        $languages = Language::all();

        $faqs = Faq::orderBy('ordering')->get();

        return view(
            'admin.settings.faqs',
            [
                'languages' => $languages,
                'faqs' => $faqs,
                'catName' => 'tables',
                'title' => 'Bootstrap Tables',
                "breadcrumbs" => ["Tables", "Bootstrap"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    }

   public function store(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'ordering' => 'required|integer',
        'ar_qs' => 'required|string',
        'en_qs' => 'required|string',
        'fr_qs' => 'required|string',
        'ar_answer' => 'required|string',
        'en_answer' => 'required|string',
        'fr_answer' => 'required|string',
        'de_qs' => 'nullable|string',
        'de_answer' => 'nullable|string',
        'tr_qs' => 'nullable|string',
        'tr_answer' => 'nullable|string',
        'sw_qs' => 'nullable|string',
        'sw_answer' => 'nullable|string',
    ]);

    // Create a new FAQ record
    Faq::create($request->all());

    return redirect()->route('admin.faqs.index')->with('success', __('تم إضافة السؤال بنجاح'));
}



    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);

        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('success', 'تم حذف السؤال بنجاح.');
    }
}
