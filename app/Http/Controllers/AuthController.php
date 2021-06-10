<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function getRegister(){
        return view('register');
    }
    public function Register(Request $request){
        $this->validate($request,
            [
                'password' => 'min:8|required',
                'email' => 'unique:Users,email',
            ],
            [
                'password.min' => 'Password must be longer than 8 characters',
                'email.unique' => 'Email already exists.',
            ]
        );
        $user = new User;
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $img = rand(0, 100000) . "_" . $file->getClientOriginalname();
            while (file_exists("upload/" . $img)) {
                $img = rand(0, 100000) . "_" . $file->getClientOriginalname();
            }
            $user->avatar = $img;
            $file->move('upload/', $img);
        }
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->type = 0;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login');
    }
    public function login(){
        return view('login');
    }

    public function postLogin(Request $request) {
        $this->validate($request,
            [
                'password' => 'min:8|required'
            ],
            [
                'password.min' => 'Password must be longer than 8 characters'
            ]
        );

        $user = DB::table('Users')
            ->where([
                ['email', '=', $request->email]
            ])
            ->get();


        if ( Hash::check($request->password, $user[0]->password) ) {
            Session::push('users', $user);
            switch ($user[0]->type) {
                case 1:
                    # code...
                    return redirect('admin/admin_listbooks');
                case 0:
                    return redirect('/');
            }
        } else {
            // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
            Session::flash('error', 'Username or password is incorrect!');
            return redirect('login');
        }
    }
    public function logout() {
        if (Session::has('users')) {
            Session::forget('users');
            return redirect('/login');
        } else {
            return redirect('/login');
        }
    }
}
