<?php

namespace App\Http\Controllers;

use App\Models\FormUsers;

use Illuminate\Http\Request;

class FormUsersController extends Controller
{
    public function index(Request $request)
    {
        $order = "ASC";
        $newOrder = "DESC";
        if (isset($request->order)) {
            if ($request->order === "DESC") {
                $newOrder = "ASC";
                $order = "DESC";
            }
        }
        return view("users", [
            "users" => FormUsers::orderBy('firstname', $order)
        ->get(),
            "order" => $newOrder,
        ]);
    }

    public function persoonToevoegen(Request $request)
    {
        $user = new FormUsers;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->save();
        return redirect("manschappen")->with("status", "Persoon toegevoegd");
    }

    public function persoonUpdaten(Request $request)
    {
        FormUsers::where("formuser_id", $request->user_id)
            ->update(['firstname' => $request->firstname, 'lastname' => $request->lastname]);
        return redirect("manschappen")->with("status", "Persoon geupdate");
    }

    public function persoonverwijderen(Request $request)
    {
        FormUsers::where("formuser_id", $request->user_id)
            ->delete();
        return redirect("manschappen")->with("status", "persoon verwijderd");
    }
}
