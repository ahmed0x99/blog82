<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate();

        return view("Dashboard.users.index" , compact("users"));
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return to_route("users.index");
    }
}
