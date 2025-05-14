<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.settings.sliders', [
            'sliders' => $sliders,
            'catName' => 'tables',
            'title' => 'إدارة المديرين',
            'breadcrumbs' => ['الإعدادات', 'إدارة المديرين'],
            'scrollspy' => 1,
            'simplePage' => 0
        ]);
    }
    public function create()
    {
        return view('admin.settings.slidersCreate', [
            'title' => 'إضافة سلايدر جديد',
            'catName' => 'tables',
            'breadcrumbs' => ['الإعدادات', 'إضافة سلايدر'],
            'scrollspy' => 1,
            'simplePage' => 0
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('sliders', 'public');
        }
        Slider::create([
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'تمت إضافة السلايدر بنجاح.');
    }
    public function destroy($id)
    {
        Slider::where('id', $id)->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'تم حذف السلايد بنجاح.');
    }
}
