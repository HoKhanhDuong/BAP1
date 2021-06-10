<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    public function ListBook(){
        $book = DB::table('Books')->paginate(10);
        $data = [];
        $data['book'] = $book;
        return view('home',$data);
    }
    public function getAddBook(){
        return view('addbook');
    }
    public function postAddBook(Request $request){
        $user = Session::get('users');
        $user_id = $user[0][0]->id;

        $this->validate($request,
            [
                'name' => 'unique:Books,name'
            ],
            [
                'name.unique' => 'Name already exists'
            ]
        );
        $book = new Books;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $img = rand(0, 100000) . "_" . $file->getClientOriginalname();
            while (file_exists("upload/" . $img)) {
                $img = rand(0, 100000) . "_" . $file->getClientOriginalname();
            }
            $book->image = $img;
            $file->move('upload/', $img);
        }
        $book->name = $request->name;
        $book->content = $request->content;
        $book->user_id = $user_id;
        $book->tac_gia = $request->tac_gia;
        $book->rate = $request->rate;
        $book->save();
        return redirect()->route('user.home');
    }
    public function reviewBook($id){
        $data = [];
        $book = DB::table('Books')
            ->where('id','=',$id)
            ->first();
        $data['book'] = $book;
        $comment = DB::table('Comments')
            ->where('book_id','=',$id)
            ->join('Users','Users.id','=','Comments.user_id')
            ->get();
        $data['comment'] = $comment;
        return view('review',$data);
    }

    public function Comment(Request $request, $id){
        $user = Session::get('users');
        $user_id = $user[0][0]->id;
        $comment = new Comments;
        $comment->user_id = $user_id;
        $comment->content = $request->content;
        $comment->book_id = $id;
        $comment->save();
        return redirect()->back();
    }
}
