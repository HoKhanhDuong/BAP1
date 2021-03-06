<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Models\User;

class ProfileController extends Controller
{
    public function profile(){
        $user = Session::get('users');
        if(empty($user[0][0])) return view('home');
        $user_id = $user[0][0]->id;
        $formation = DB::table('Users')
            ->where('Users.id',$user_id)
            ->first();
        $data = [];
        $data['formation'] = $formation;
        return view('profile',$data);
    }

    public function editProfile() {
        $user = Session::get('users');
        if(empty($user[0][0])) return view('home');
        $user_id = $user[0][0]->id;
        $formation = DB::table('Users')
                        ->where('Users.id',$user_id)
                        ->first();
        $data = [];
        $data['formation'] = $formation;
        return view('editprofile',$data);
    }

    public function updateProfile(Request $request) {
        $user = Session::get('users');
        if(empty($user[0][0])) return view('home');
        $user_id = $user[0][0]->id;
        $user = DB::table('Users')
                    ->where('Users.id',$user_id)
                    ->first();
//        if(!empty($request->full_name)) $user->full_name = $request->full_name;
//        if(!empty($request->email)) $user->email = $request->email;
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $img = rand(0, 100000) . "_" . $file->getClientOriginalname();
            while (file_exists("upload/" . $img)) {
                $img = rand(0, 100000) . "_" . $file->getClientOriginalname();
            }
//            $user->avatar = $img;
            DB::table('Users')
                ->where('Users.id',$user->id)
                ->update([
                    'full_name' => $request->full_name,
                    'email' => $request->email,
                    'avatar' => $img,
                ]);
            $file->move('upload/', $img);
        }
        else {
            DB::table('Users')
                ->where('Users.id', $user->id)
                ->update([
                    'full_name' => $request->full_name,
                    'email' => $request->email,
                ]);
        }
        $data = [];
        $data['formation'] =  DB::table('Users')
            ->where('Users.id',$user_id)
            ->first();
        return view('profile', $data);
    }
}
