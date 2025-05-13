<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function index()
    {
        if (Session::has('admin_user_id')) {
            return redirect()->route('home');
        }

        $logo = DB::table('settings')->where('name', 'like', '%logo%')->value('content');

        return view('login', ['logo' => $logo]);
    }

    public function newAccount()
    {
        if (Session::has('admin_user_id')) {
            return redirect()->route('home');
        }

        return view('new_account');
    }

    public function newAccountDone(Request $request)
    {
        $email = $request->input('email');
        $password = md5($request->input('password'));

        $existingStudent = DB::table('students')->where('email', $email)->first();

        if (!$existingStudent) {
            $adminUser = DB::table('admin_users')
                ->where('username', $email)
                ->where('password', $password)
                ->first();

            if ($adminUser) {
                Session::put('admin_user_id', $adminUser->id);
                return redirect()->route('home');
            }

            return redirect()->route('login');
        }

        return redirect()->route('login');
    }

    public function check(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $key = 'login-attempts:' . $request->ip();
        $maxAttempts = 5;
        $decayMinutes = 1;

        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            $seconds = RateLimiter::availableIn($key);
            return back()
                ->withErrors(['username' => trans('auth.throttle', ['seconds' => $seconds])])
                ->withInput();
        }

        $credentials = $request->only('username', 'password');
        $user = DB::table('users')->where('username', $credentials['username'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            RateLimiter::clear($key);
            Session::put('admin_user_id', $user->id);
            Session::put('lang', 'ar');

            if ($request->has('remember')) {
            }

            return redirect()->intended(route('dashboard'));
        }

        RateLimiter::hit($key, $decayMinutes * 60);
        return back()
            ->withErrors(['username' => trans('auth.failed')])
            ->withInput();
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }
}
