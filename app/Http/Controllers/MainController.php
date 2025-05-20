<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Services\Operations;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function index()
    {

        // load user notes
        $id = session('user.id');
        $user = User::find($id)->toArray();
        $notes = User::find($id)->notes()->whereNull('deleted_at')->get()->toArray();

        // echo '<pre>';

        // print_r($user);
        // print_r($notes);

        //show home view
        return view('home', ['notes' => $notes]);
    }

    public function newNote()
    {
        return view("new_note");
    }
    public function newNoteSubmit(Request $request)
    {
        $request->validate(
            // rules
            [
                'text_title' => 'required|min:3|max:200',
                'text_note' => 'required|min:3|max:3000'
            ],
            // error menssages
            [
                'text_title.required' => 'O campo titulo é obrigatorio.',
                'text_title.min' => 'O titulo deve ter no minimo :min caracteres.',
                'text_title.max' => 'O titulo deve ter no maximo :max caracteres.',

                'text_note.required' => 'O campo nota é obrigatorio.',
                'text_note.min' => 'A nota deve ter no minimo :min caracteres.',
                'text_note.max' => 'A nota deve ter no maximo :max caracteres.'
            ]
        );

        $id = session('user.id');

        $note = new Note();
        $note->user_id = $id;
        $note->title = $request->text_title;
        $note->text = $request->text_note;
        $note->save();

        return redirect()->route("home");
    }

    public function editNote($id)
    {
        $id = Operations::decryptId($id);

        if($id === null){
            return redirect()->route('home');
        }
        // $id = $this->decryptId($id);
        $note = Note::find($id);

        return view('edit_note', ['note' => $note]);
    }

    public function editNoteSubmit(Request $request)
    {
        $request->validate(
            // rules
            [
                'text_title' => 'required|min:3|max:200',
                'text_note' => 'required|min:3|max:3000'
            ],
            // error menssages
            [
                'text_title.required' => 'O campo titulo é obrigatorio.',
                'text_title.min' => 'O titulo deve ter no minimo :min caracteres.',
                'text_title.max' => 'O titulo deve ter no maximo :max caracteres.',

                'text_note.required' => 'O campo nota é obrigatorio.',
                'text_note.min' => 'A nota deve ter no minimo :min caracteres.',
                'text_note.max' => 'A nota deve ter no maximo :max caracteres.'
            ]
        );

        if ($request->note_id == null) {
            die("error");
            return redirect()->route('home');
        }
        $id = Operations::decryptId($request->note_id);

        if($id === null){
            return redirect()->route('home');
        }

        $note = Note::find($id);
        $note->title = $request->text_title;
        $note->text = $request->text_note;
        $note->save();

        return redirect()->route("home");
    }

    public function deleteNote($id)
    {
        
        // $id = $this->decryptId($id);
        $id = Operations::decryptId($id);

        if($id === null){
            return redirect()->route('home');
        }

        $note = Note::find($id);

        return view('delete_note', ['note' => $note]);
    }
    public function deleteNoteConfirm($id)
    {
        $id = Operations::decryptId($id);

        if($id === null){
            return redirect()->route('home');
        }

        $note = Note::find($id);
        $note->delete();

        // $note->deleted_at = date('Y:m:d H:i:s');
        // $note->save();
        // $note->forceDelete();
        // return redirect()->route('home')->with('success', 'Nota deletada com sucesso.');

        // $id = $this->decryptId($id);
        return redirect()->route('home');
    }


    public function logout()
    {
        session()->forget('user');
        return redirect()->to('/login');
    }

    // private function decryptId($id)
    // {
    //     try {
    //         $id = Crypt::decrypt($id);
    //     } 
    //     catch (DecryptException $e) {

    //         return redirect()->route('home');
    //     }
    // }
}
