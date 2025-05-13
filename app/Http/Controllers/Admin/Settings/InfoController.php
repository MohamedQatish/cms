<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    public function index()
    {
        $settings = Setting::orderBy('ordering')->get();

        return view('admin.settings.info', [
            'settings' => $settings,
            'catName' => 'tables',
            'title' => 'Bootstrap Tables',
            'breadcrumbs' => ["Tables", "Bootstrap"],
            'scrollspy' => 1,
            'simplePage' => 0
        ]);
    }

    public function update(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);
        $setting->update(['content' => $request->content]);
        return redirect()->route('admin.settings.index');
    }

    public function updateImage(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($setting->content && Storage::disk('public')->exists($setting->content)) {
                Storage::disk('public')->delete($setting->content);
            }

            $path = $request->file('image')->store('settings', 'public');

            $setting->update([
                'content' => $path
            ]);
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'تم تحديث الصورة بنجاح');
    }
}
