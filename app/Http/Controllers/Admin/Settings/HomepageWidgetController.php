<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Effect;
use App\Models\HomepageWidget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageWidgetController extends Controller
{
    public function index()
    {
        $homepageWidgets = HomepageWidget::with('effect')->get();
        $effects = Effect::all();
        return view('admin.settings.homepage_widgets', [
            'effects' => $effects,
            'homepageWidgets' => $homepageWidgets,
            'catName' => 'dashboard',
            'title' => 'إدارة أقسام الصفحة الرئيسية',
            'breadcrumbs' => ['الإعدادات', 'إدارة أقسام الصفحة الرئيسية'],
            'scrollspy' => 1,
            'simplePage' => 0
        ]);
    }

    // public function create()
    // {
    //     $effects = Effect::all();
    //     return view('admin.settings.homepage_widgets.create', [
    //         'effects' => $effects,
    //         'title' => 'إضافة قسم جديد',
    //         'breadcrumbs' => ['الإعدادات', 'إضافة قسم جديد'],
    //     ]);
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'file_name' => 'required|string|max:255',
    //         'ordering' => 'nullable|integer',
    //         'effect_id' => 'nullable|exists:effects,id',
    //         'duration' => 'nullable|integer',
    //         'active' => 'boolean',
    //     ]);

    //     HomepageWidget::create($request->all());

    //     return redirect()->route('admin.homepage_widgets.index')
    //         ->with('success', 'تمت إضافة القسم بنجاح.');
    // }

    // public function edit(HomepageWidget $widget)
    // {
    //     $effects = Effect::all();
    //     return view('admin.settings.homepage_widgets.edit', [
    //         'widget' => $widget,
    //         'effects' => $effects,
    //         'title' => 'تعديل القسم',
    //         'breadcrumbs' => ['الإعدادات', 'تعديل القسم'],
    //     ]);
    // }

    // public function update(Request $request, HomepageWidget $widget)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'file_name' => 'required|string|max:255',
    //         'ordering' => 'nullable|integer',
    //         'effect_id' => 'nullable|exists:effects,id',
    //         'duration' => 'nullable|integer',
    //         'active' => 'boolean',
    //     ]);

    //     $widget->update($request->all());

    //     return redirect()->route('admin.homepage_widgets.index')
    //         ->with('success', 'تم تعديل القسم بنجاح.');
    // }

    // public function destroy(HomepageWidget $widget)
    // {
    //     $widget->delete();

    //     return redirect()->route('admin.homepage_widgets.index')
    //         ->with('success', 'تم حذف القسم بنجاح.');
    // }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:homepage_widgets,id',
            'status' => 'required|boolean',
        ]);

        $widget = HomepageWidget::findOrFail($request->id);
        $widget->update(['active' => $request->status]);

        return response()->json(['message' => __('menu.status_updated')]);
    }

    public function changeOrdering(Request $request)
    {
        $request->validate([
            'table' => 'required|string',
            'id' => 'required|exists:homepage_widgets,id',
            'value' => 'required|integer',
        ]);

        $widget = HomepageWidget::findOrFail($request->id);
        $widget->update(['ordering' => $request->value]);

        return response()->json(['message' => __('menu.order_updated')]);
    }

    public function changeEffect(Request $request)
    {
        try {
            DB::beginTransaction();

            $widget = HomepageWidget::findOrFail($request->id);
            $widget->effect_id = $request->effect_id;
            $widget->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => __('menu.effect_updated')
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'فشل التحديث: ' . $e->getMessage()
            ], 500);
        }
    }

    public function changeEffectDuration(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:homepage_widgets,id',
            'duration' => 'required|string|max:100',
        ]);

        $widget = HomepageWidget::findOrFail($request->id);
        $widget->update(['duration' => $request->duration]);

        return response()->json(['message' => __('menu.duration_updated')]);
    }
}
