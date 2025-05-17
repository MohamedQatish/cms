<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Menu;
use App\Models\UserPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        $users = Admin::with('permissions')->orderBy('id', 'desc')->get();

        return view('admin.settings.admins', [
            'users' => $users,
            'catName' => 'dashboard',
            'title' => 'إدارة المديرين',
            'breadcrumbs' => ['الإعدادات', 'إدارة المديرين'],
            'scrollspy' => 1,
            'simplePage' => 0
        ]);
    }

    public function create()
    {
        $menu = Menu::all();

        return view('admin.settings.adminsCreate', [
            'menu' => $menu,
            'catName' => 'dashboard',
            'title' => 'إضافة مدير جديد',
            'breadcrumbs' => ['الإعدادات', 'إدارة المديرين', 'إضافة جديد'],
            'scrollspy' => 1,
            'simplePage' => 0
        ]);
    }
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $admin = Admin::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);

            DB::table('user_per')->where('user_id', $admin->id)->delete();

            if ($request->has('menu')) {
                $permissions = [];

                foreach ($request->menu as $menuId) {
                    $permissions[] = [
                        'menu_type' => $menuId . '_0',
                        'user_id' => $admin->id
                    ];
                }

                DB::table('user_per')->insert($permissions);
            }

            DB::commit();

            return redirect()->route('admin.admins.index')
                ->with('success', 'تم إضافة المدير الجديد بنجاح');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'حدث خطأ أثناء حفظ البيانات: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $user = Admin::with('permissions')->findOrFail($id);
        $menu = Menu::all();
        $userPermissions = $user->permissions->pluck('menu_type')->map(function ($item) {
            return (int) explode('_', $item)[0];
        })->toArray();

        return view('admin.settings.adminsEdit', [
            'user' => $user,
            'menu' => $menu,
            'userPermissions' => $userPermissions,
            'catName' => 'dashboard',
            'title' => 'تعديل مدير',
            'breadcrumbs' => ['الإعدادات', 'إدارة المديرين', 'تعديل'],
            'scrollspy' => 1,
            'simplePage' => 0
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'password' => 'nullable|string|min:8',
            'menu' => 'sometimes|array',
            'menu.*' => 'integer|exists:menu,id'
        ]);

        DB::beginTransaction();

        try {
            $user = Admin::findOrFail($id);
            $updateData = ['username' => $request->username];

            if ($request->filled('password')) {
                $updateData['password'] = Hash::make($request->password);
            }

            $user->update($updateData);

            UserPermission::where('user_id', $id)->delete();

            if ($request->has('menu')) {
                $permissions = collect($request->menu)->map(function ($menuId) use ($id) {
                    return [
                        'menu_type' => $menuId . '_0',
                        'user_id' => $id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ];
                })->toArray();

                UserPermission::insert($permissions);
            }

            DB::commit();

            return redirect()->route('admin.admins.index')
                ->with('success', 'تم تحديث بيانات المدير بنجاح');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'حدث خطأ أثناء تحديث البيانات: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $user = Admin::findOrFail($id);

            // حذف الصلاحيات أولاً
            UserPermission::where('user_id', $id)->delete();

            // ثم حذف المستخدم
            $user->delete();

            DB::commit();

            return redirect()->route('admin.admins.index')
                ->with('success', 'تم حذف المدير بنجاح');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'حدث خطأ أثناء حذف المدير: ' . $e->getMessage());
        }
    }
}
