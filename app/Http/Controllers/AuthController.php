<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authorize;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function auth(Authorize $request){
        $user = User::where('email', $request->input('email'))->first();
        $pass = Hash::check($request->input('password'), $user->password);
        if(!$pass){
            throw ValidationException::withMessages([
                'password' => ['Неверный пароль!']
            ]);
        }
       Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);

        return response()->redirectTo('/crm');
    }

    public function logout(){
        Auth::logout();
        return response()->redirectTo('/');
    }
}
