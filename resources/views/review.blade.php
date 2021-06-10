@extends('layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-5 mt-4 d-flex justify-content-center" >
            <img src="{{asset('upload/'.$book->image)}}" alt="anh1" style="width: 95%; height: 95%"/>
        </div>
        <div class="col-7 mt-4">
            <br/>
            <br/>
            <h3 class="card-title">{{$book->name}}</h3>
            <p class="card-text"><span class="font-weight-bold">Tac gia:</span> {{$book->tac_gia}}</p>
            <h5 class="card-title">Noi dung:</h5>
            <p class="card-text">{{$book->content}}</p>

        </div>
    </div>
    <div class="response mt-4">
        <h4>Comments</h4>
        <form action="{{url('user/comment/'.$book->id)}}" method="POST">
            @csrf
            <div class="form-row">

                <div class="col-11">
                    <input type="text" name="content" class="form-control" placeholder="Comment" required>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
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
