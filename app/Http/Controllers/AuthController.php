<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
     public function loginSubmit(Request $request){
        $request->validate(
            // rules
            [
                'text_username' => 'required|email',
                'text_password' => 'required|min:8|max:16'
            ]
            ,
            // error menssages
            [
                'text_username.required' => 'O username é obrigatorio.',
                'text_username.email' => 'O username deve ser um email valido.',
                'text_password.required' => 'O password é obrigatorio.',
                'text_password.min' => 'O password deve ter no minimo :min caracteres.',
                'text_password.max' => 'O password deve ter no maximo :max caracteres.'
            ]
        );

        $username = $request->input('text_username');
        $password = $request->input('text_password');

        // check if users exists

        $user = User::where('username', $username)->where('deleted_at', null)->first();

        if(!$user){
            return redirect()->back()->withInput()->with('loginError', 'Username ou password incorretos.');
        }
        if(!password_verify($password, $user->password)){
            return redirect()->back()->withInput()->with('loginError', 'Username ou password incorretos.');
        }

        $user ->last_login = date('Y-m-d H:i:s');
        $user ->save();

        //login user

        session([
            'user' => [
               'id' => $user->id,
               'username' => $user->username

            ]
            ]);

        // get all the users from the datebase
        // $users = User::all()->toArray();

        //as an object instace of the model's class
        // $userModel = new User();
        // $users = $userModel->all()->toArray();
        echo 'Login com sucesso!';
    }

    public function logout(){
        echo 'logout';
    }
    

}
