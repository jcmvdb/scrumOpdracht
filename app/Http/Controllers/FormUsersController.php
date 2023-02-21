<?php

namespace App\Http\Controllers;
use App\Models\FormUsers;

use Illuminate\Http\Request;

class FormUsersController extends Controller
{
    public function index() {
        return view("manschappen");
    }

    public function persoonToevoegen(Request $request) {
        $user = new FormUsers;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->save();
        return redirect("manschappen")->with("status", "Persoon toegevoegd");
    }

    public function persoonUpdaten(Request $request) {
        FormUsers::where("formuser_id", $request->user_id)->update(['firstname' => $request->firstname, 'lastname' => $request->lastname]);
        return redirect("manschappen")->with("status", "Persoon geupdate");
    }

    public function persoonverwijderen(Request $request) {
        
    }
}
