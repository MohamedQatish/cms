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
        $language = Language::all();

        return view(
            'admin.settings.pages',
            [
                'pages' => $pages,
                'languages' => $language,
                'catName' => 'tables',
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
        $languages = Language::where('active', 1)->get();

        return view('admin.settings.pagesCreate', [
            'pages' => $pages,
            'languages' => $languages,
            'catName' => 'tables',
            'title' => 'Bootstrap Tables',
            'breadcrumbs' => ['Tables', 'Bootstrap'],
            'scrollspy' => 1,
            'simplePage' => 0,
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->all();

        $data['title'] = '';
        $data['useful_links'] = $data['useful_links'] ?? 0;
        $data['top_menu'] = $data['top_menu'] ?? 0;
        $data['ordering'] = $data['ordering'] ?? 1;
        $data['parent_id'] = $request->parent_id;
        $data['tr_name'] = $data['tr_name'] ?? '';
        $data['tr_content'] = $data['tr_content'] ?? '';
        $data['sw_name'] = $data['sw_name'] ?? '';
        $data['sw_content'] = $data['sw_content'] ?? '';

        $languages = Language::where('active', 1)->get();
        foreach ($languages as $language) {

            $nameField = $language->shortcut . '_name';
            $contentField = $language->shortcut . '_content';
            $data[$nameField] = $request->$nameField;
            $data[$contentField] = $request->$contentField;

        }

        Page::create($data);

        return redirect()->route('admin.pages.index')->with('success', 'Page created successfully');
    }


    public function edit($id)
    {
        $page = Page::findOrFail($id);
        $languages = Language::all();
        $parentPages = Page::where('id', '!=', $id)->get();

        return view('admin.settings.pagesEdit', [
            'page' => $page,
            'languages' => $languages,
            'parentPages' => $parentPages,
            'catName' => 'tables',
            'title' => 'Bootstrap Tables',
            "breadcrumbs" => ["Tables", "Bootstrap"],
            'scrollspy' => 1,
            'simplePage' => 0
        ]);
    }

    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        // التحقق من البيانات
        $rules = [
            'parent_id' => 'nullable|exists:pages,id',
        ];

        // إضافة قواعد التحقق الديناميكية للغات
        foreach (Language::all() as $language) {
            $rules[$language->shortcut . '_name'] = 'required|string|max:255';
            $rules[$language->shortcut . '_content'] = 'nullable|string';
        }

        $validated = $request->validate($rules);

        $page->update($validated);

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
