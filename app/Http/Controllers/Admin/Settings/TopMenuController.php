<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\TopMenu;
use Illuminate\Http\Request;

class TopMenuController extends Controller
{
    public function index()
    {
        $topMenus = TopMenu::ALL();
        return view('admin.settings.topMenus', [
            'topMenus' => $topMenus,
            'catName' => 'tables',
            'title' => 'إدارة المديرين',
            'breadcrumbs' => ['الإعدادات', 'إدارة المديرين'],
            'scrollspy' => 1,
            'simplePage' => 0
        ]);
    }
}
