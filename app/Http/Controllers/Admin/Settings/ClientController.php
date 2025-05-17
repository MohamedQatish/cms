<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('id', 'desc')->get();
        return view('admin.settings.clients', [
            'clients' => $clients,
            'catName' => 'dashboard',
            'title' => 'إدارة المديرين',
            'breadcrumbs' => ['الإعدادات', 'إدارة المديرين'],
            'scrollspy' => 1,
            'simplePage' => 0
        ]);
    }

    // app/Http/Controllers/ClientController.php
    public function changeOrdering(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'ordering' => 'required|integer'
        ]);

        $client = Client::find($request->client_id);
        $client->ordering = $request->ordering;
        $client->save();

        return response()->json([
            'message' => __('تم تحديث الترتيب بنجاح')
        ]);
    }

    public function changeProgramsCount(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'count' => 'required|integer|min:1'
        ]);

        $client = Client::find($request->client_id);
        $client->programs_count = $request->count;
        $client->save();

        return response()->json([
            'message' => __('تم تحديث عدد البرامج بنجاح')
        ]);
    }
}
