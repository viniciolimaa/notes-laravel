<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){

        // load user notes

        //show home view
        return view('home');

    }

        public function newNote(){

        echo "I'm create new note!";

    }
    public function logout(){
        session()->forget('user');
        return redirect()->to('/login');
    }
}
