<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        $language = Language::where('active', true)->get();

        return view(
            'admin.settings.pages',
            [
                'pages' => $pages,
                'languages' => $language,
                'catName' => 'dashboard',
                'title' => 'Bootstrap Tables',
                "breadcrumbs" => ["Tables", "Bootstrap"],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    }

    public function create()
    {

        $pages = Page::all();
        $languages = Language::getActiveLanguages();

        return view('admin.settings.pagesCreate', [
            'pages' => $pages,
            'languages' => $languages,
            'catName' => 'dashboard',
            'title' => 'Bootstrap Tables',
            'breadcrumbs' => ['Tables', 'Bootstrap'],
            'scrollspy' => 1,
            'simplePage' => 0,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|array',
            'name.*' => 'nullable|string',
            'content' => 'required|array',
            'content.*' => 'nullable|string',
            // السماح بالقيمة 0 أو أن يكون parent_id موجود في الصفحات
            'parent_id' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) {
                    if ($value != 0 && !\App\Models\Page::where('id', $value)->exists()) {
                        $fail('الصفحة الأب المحددة غير موجودة.');
                    }
                }
            ],
            'ordering' => 'nullable|integer|min:0',
            'useful_links' => 'nullable|integer|min:0',
            'top_menu' => 'nullable|boolean',
        ]);

        $data = [
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'parent_id' => $request->input('parent_id') == 0 ? null : $request->input('parent_id'),
            'ordering' => $request->input('ordering', 1),
            'useful_links' => $request->input('useful_links', 0),
            'top_menu' => $request->boolean('top_menu'),
        ];

        Page::create($data);

        return redirect()->route('admin.pages.index')->with('success', 'تمت إضافة الصفحة بنجاح');
    }



    public function edit($id)
    {
        $page = Page::findOrFail($id); // اجلب الصفحة بناءً على الـ ID
        $languages = Language::getActiveLanguages(); // اجلب اللغات النشطة
        $parentPages = Page::where('id', '!=', $id)->get(); // استثني الصفحة الحالية من قائمة الآباء


        return view('admin.settings.pagesEdit', [
            'page' => $page,
            'languages' => $languages,
            'parentPages' => $parentPages,
            'catName' => 'dashboard',
            'title' => 'Bootstrap Tables',
            "breadcrumbs" => ["Tables", "Bootstrap"],
            'scrollspy' => 1,
            'simplePage' => 0
        ]);
    }

    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        // اجلب اللغات الفعالة (يمكن استخدام نفس الطريقة التي تستخدمها في الـ edit)
        $languages = Language::getActiveLanguages();

        // قواعد التحقق
        $rules = [
            // parent_id يمكن أن يكون 0 (يعني لا أب) أو موجود في الصفحات مع استثناء الصفحة الحالية
            'parent_id' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) use ($id) {
                    if ($value != 0 && !\App\Models\Page::where('id', $value)->where('id', '!=', $id)->exists()) {
                        $fail('الصفحة الأب المحددة غير موجودة أو غير صالحة.');
                    }
                },
            ],
        ];

        // إضافة قواعد التحقق لكل لغة
        foreach ($languages as $language) {
            $rules['name.' . $language->shortcut] = 'required|string|max:255';
            $rules['content.' . $language->shortcut] = 'nullable|string';
        }

        $validated = $request->validate($rules);

        $parent_id = $validated['parent_id'] == 0 ? null : $validated['parent_id'];

        // تحديث الصفحة
        $page->update([
            'parent_id' => $parent_id,
            'name' => $validated['name'],
            'content' => $validated['content'],
        ]);

        return redirect()->route('admin.pages.index')->with('success', 'تم تحديث الصفحة بنجاح.');
    }


    // حذف الصفحة
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')
            ->with('success', 'تم حذف الصفحة بنجاح');
    }

    // AJAX Functions

    public function toggleUsefulLinks(Request $request)
    {
        $page = Page::findOrFail($request->id);
        $page->useful_links = $request->value;
        $page->save();

        return response()->json(['success' => true, 'message' => 'تم تحديث روابط المهمة.']);
    }

    public function toggleTopMenu(Request $request)
    {
        $page = Page::findOrFail($request->id);
        $page->top_menu = $request->value;
        $page->save();

        return response()->json(['success' => true]);
    }

    public function changeOrdering(Request $request)
    {
        $page = Page::findOrFail($request->id);
        $page->ordering = $request->ordering;
        $page->save();

        return response()->json(['success' => true]);
    }
}
