<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function authenticate(LoginRequest $request) {
        // Auth::attempt <- cacatul asta face verificarea cu parola criptata
        if ($request->validated()) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                toastr()->success('ok');
            } else {
                toastr()->error('nu ok');
            }
        }
        return redirect()->back();
    }
    public function authlogout() {
        Auth::logout();
        return redirect('/login');
    }
}
