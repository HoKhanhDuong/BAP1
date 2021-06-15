@extends('layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-4 mt-4 d-flex justify-content-center" >
            <img src="{{asset('upload/'.$book->image)}}" alt="anh1" style="width: 95%; height: 95%"/>
        </div>
        <div class="col-7 mt-4">
            <br/>
            <br/>
            <h3 class="card-title">{{$book->name}}</h3>
            <p class="card-text"><span class="font-weight-bold">Tac gia:</span> {{$book->tac_gia}}</p>
            <h5 class="card-title">Noi dung:</h5>
            <p class="card-text">{{$book->content}}</p>
            <h5 class="card-title">rate : {{$book->rate}}</h5>
        </div>
        <div class="col mt-4">
        <form action="{{route('edit-book')}}" method="GET">
            @csrf
            <div class="form-row">

                <div class="col-0">
                    <input type="hidden" name="id" value="{{$book->id}}" class="form-control" >
                </div>
                <div class="col-1">
                    <button style="display: {{( !empty(Session::get('users')[0][0]) && ($book->user_id == Session::get('users')[0][0]->id)) ? 'block' : 'none'}}" type="submit" class="btn btn-primary mb-2">Edit</button>
                </div>

            </div>
        </form>
        </div>
    </div>
    <div class="response mt-4">
        <h4>Comments</h4>
        <form action="{{url('user/comment/'.$book->id)}}" method="POST">
            @csrf
            <div class="form-row">

                <div class="col-10">
                    <input type="text" name="content" class="form-control" placeholder="Comment" required>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary mb-2">Comment</button>
                </div>

            </div>
        </form>


            @if($comment->count()>0)
                @foreach($comment as $key=>$c)

                    <div class="media response-info">
                        <div class="media-left response-text-left">
                            <a href="#">
                                <img class="media-object avt" src="{{asset('upload/'.$c->avatar)}}" alt=""/>
                            </a>
                        </div>
                        <div class="media-body response-text-right">
                            <h6><a href="#">{{$c->full_name}}</a></h6>
                            <p>{{$c->content}}</p>
                        </div>
                    </div>
            
                @endforeach
            @endif
        </div>


</div>
@endsection
