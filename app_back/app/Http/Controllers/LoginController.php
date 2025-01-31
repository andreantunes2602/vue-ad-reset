<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        if($request->login == 'teste' && $request->password == '123456'){
            return response()->json([
                'message' => 'OK',
                'detail' => 'Login bem sucedido',
                'data' => [
                    'nome' => 'Andre Antunes',
                    'token' => 'hfurriqhqoihalfdjfbagdavaiwrbvwufiuqwevf',
                    'tipo' => 1
                ]
            ]);
        }else{
            return response()->json([
                'message' => 'FAIL',
                'detail' => 'Falha no login',
                'data' => []
            ]);
        }
    }
}
