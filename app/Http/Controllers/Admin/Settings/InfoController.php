<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    public function index()
    {
        $settings = Setting::orderBy('ordering')->get();
        $languages = Language::all();
        return view('admin.settings.info', [
            'languages' => $languages,
            'settings' => $settings,
            'catName' => 'tables',
            'title' => 'Bootstrap Tables',
            'breadcrumbs' => ["Tables", "Bootstrap"],
            'scrollspy' => 1,
            'simplePage' => 0
        ]);
    }
    public function show() {}


    public function update(Request $request, $id)
    {
        // البحث عن الإعداد المطلوب
        $setting = Setting::findOrFail($id);

        // التحقق من النوع
        if ($setting->type == 0) {
            // الحفظ للحقول النصية
            $translations = $request->input('content');

            // التحقق من وجود البيانات
            if (is_array($translations)) {
                foreach ($translations as $lang => $value) {
                    $setting->setTranslation('content', $lang, $value);
                }
            }
        } elseif ($setting->type == 1) {
            // الحفظ للصور
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('settings', 'public');
                $setting->content = $path;
            }
        }

        // حفظ الإعداد
        $setting->save();

        // رسالة نجاح
        return redirect()->back()->with('success', __('menu.setting_updated'));
    }

    public function getTranslatedContent($locale)
    {
        return $this->getTranslatedContent('en');
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
