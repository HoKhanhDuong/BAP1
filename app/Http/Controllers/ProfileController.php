<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function profile(){
        $user = Session::get('users');
        $user_id = $user[0][0]->id;
        $formation = DB::table('Users')
            ->where('Users.id',$user_id)
            ->first();
        $data = [];
        $data['formation'] = $formation;
        return view('profile',$data);
    }
}
