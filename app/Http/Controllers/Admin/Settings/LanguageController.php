<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('admin.settings.languages', [
            'languages' => $languages,
            'catName' => 'tables',
            'title' => 'language',
            'breadcrumbs' => ["Tables", "Bootstrap"],
            'scrollspy' => 1,
            'simplePage' => 0
        ]);
    }
    public function create()
    {
        return view('admin.settings.languagesCreate', [
            'catName' => 'tables',
            'title' => 'language',
            'breadcrumbs' => ["Tables", "Bootstrap"],
            'scrollspy' => 1,
            'simplePage' => 0
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'flag' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'shortcut' => 'required|max:2|unique:languages,shortcut',
            'active' => 'sometimes|boolean',
        ]);

        try {
            if ($request->hasFile('flag')) {
                $flagPath = $request->file('flag')->store('flags', 'public');
            } else {
                return back()->with('error', 'لم يتم تحميل صورة العلم')->withInput();
            }

            $language = Language::create([
                'name' => $validated['name'],
                'flag' => $flagPath,
                'shortcut' => $validated['shortcut'],
                'active' => $request->boolean('active'), // التعديل الأساسي هنا
            ]);

            return redirect()->route('admin.languages.index')->with('success', 'تم إضافة اللغة بنجاح!');
        } catch (\Exception $e) {
            return back()->with('error', 'حدث خطأ: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        $language = Language::findOrFail($id);
        $language->delete();

        return redirect()->route('admin.languages.index')->with('success', 'Language deleted successfully!');
    }

    public function toggleActive(Request $request, $id)
    {
        $request->validate([
            'active' => 'required|boolean',
        ]);

        try {
            $language = Language::findOrFail($id);
            $language->update(['active' => $request->active]);

            return response()->json([
                'success' => true,
                'message' => 'تم تحديث حالة اللغة بنجاح',
                'active' => $language->active
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'فشل في التحديث: ' . $e->getMessage()
            ], 500);
        }
    }

    public function toggleMain($id)
    {
        try {
            DB::beginTransaction();

            // إلغاء تحديد أي لغة رئيسية حالية
            Language::where('main', true)->update(['main' => false]);

            // تحديد اللغة الجديدة كرئيسية
            $language = Language::findOrFail($id);
            $language->update(['main' => true]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'تم تحديث اللغة الرئيسية بنجاح',
                'main' => $language->main
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'فشل في التحديث: ' . $e->getMessage()
            ], 500);
        }
    }
}
