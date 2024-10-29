<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginApi extends Controller {

    public function login(Request $request) {
        $output = [
            'success' => false,
            'message' => 'Credenciales incorrectas'
        ];

        $credenciales = $request->only('email', 'password');

        if (Auth::attempt($credenciales)) {
//            $request->session()->regenerate();
            
            $output = [
                'success' => true,
                'message' => 'Inicio de sesión correcta'
            ];
        }

        return response()->json($output);
    }
}
