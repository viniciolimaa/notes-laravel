<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){

        // load user notes
        $id = session('user.id');
        $user = User::find($id)->toArray();
        $notes = User::find($id)->notes()->get()->toArray();

        // echo '<pre>';

        // print_r($user);
        // print_r($notes);

        //show home view
        return view('home', ['notes' => $notes]);

    }

        public function newNote(){

        echo "I'm create new note!";

    }
    public function logout(){
        session()->forget('user');
        return redirect()->to('/login');
    }
}
