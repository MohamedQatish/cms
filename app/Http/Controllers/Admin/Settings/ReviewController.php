<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\CourseReview;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{


    public function index()
    {
        $reviews = CourseReview::with('course')
            ->orderBy('id', 'desc')
            ->get();

        return view(
            'admin.settings.reviews',
            [
                'reviews' => $reviews,
                'catName' => 'tables',
                'title' => 'رسائل التواصل',
                'breadcrumbs' => ['الإعدادات', 'رسائل التواصل'],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    }


    public function approveReview($id, $value)
    {
        CourseReview::where('id', $id)->update(['approved' => $value]);
        return redirect()->route('admin.reviews.index')->with('success', 'تم تحديث حالة التقييم بنجاح');
    }

    public function destroy($id)
    {
        CourseReview::destroy($id);
        return redirect()->route('admin.reviews.index')->with('success', 'تم حذف التقييم بنجاح');
    }
}
