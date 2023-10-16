<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return redirect('/');
    }

    /**
     * Proses login
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $user = User::where('email_pengguna', $request->email)
            ->first();

        if (is_null($user)) {
            return back()->with([
                'success' => false,
                'message' => 'Email atau password salah'
            ]);
        }

        if (!Hash::check($request->password, $user->password_pengguna)) {
            return back()->with([
                'success' => false,
                'message' => 'Email atau password salah'
            ]);
        }

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('index');
    }
}
