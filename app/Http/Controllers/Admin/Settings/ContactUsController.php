<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $messages = ContactUs::orderBy('id', 'desc')->get();
        return view(
            'admin.settings.contact_us',
            [
                'messages' => $messages,
                'catName' => 'tables',
                'title' => 'رسائل التواصل',
                'breadcrumbs' => ['الإعدادات', 'رسائل التواصل'],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    }

    public function show($id)
    {
        $message = ContactUs::findOrFail($id);

        if (!$message->seen) {
            $message->update(['seen' => true]);
        }

        return view(
            'admin.settings.contact_usShow',
            [
                'message' => $message,
                'catName' => 'tables',
                'title' => 'عرض الرسالة',
                'breadcrumbs' => ['الإعدادات', 'عرض الرسالة'],
                'scrollspy' => 1,
                'simplePage' => 0
            ]
        );
    }

    public function destroy($id)
    {
        $message = ContactUs::findOrFail($id);
        $message->delete();

        return redirect()
            ->route('admin.contact_us.index')
            ->with('success', 'تم حذف الرسالة بنجاح');
    }
}
