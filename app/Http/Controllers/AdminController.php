<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //
    public function ListBook(){
        $book = DB::table('Books')->paginate(10);
        $data = [];
        $data['book'] = $book;
        return view('admin/admin_listbooks',$data);
    }

    public function ListUser(){
        $user = DB::table('Users')->paginate(10);
        $data = [];
        $data['user'] = $user;
        return view('admin/admin_listuser',$data);
    }

    public function Delete(Request $request) {
        $delete = DB::table($request->type)
                    ->where('id',$request->id)
                    ->delete();
        Session::flash('sussces', 'Deleted');
        if($request->type == "Books") redirect('/admin/admin_listbooks');
        else redirect('admin/admin_listuser');
    }
}
