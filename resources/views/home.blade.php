@extends('layout.master')
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-end mb-4 mt-4">
        <a type="button" class="btn btn-outline-success" href="{{route('user.getaddbook')}}">Add book</a>
    </div>
    <div class="row">
        @if($book->count()>0)
            @foreach($book as $key=>$b)
                <div class="col-4">
                    <div class="card">
                        <img class="card-img-top" src="{{asset('upload/'.$b->image)}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$b->name}}</h5>
                            <p class="card-text">{{$b->tac_gia}}</p>
                        </div>
                        <div class="d-flex justify-content-end mx-4 mb-4">
                            <a type="button" class="btn btn-danger" href="{{url('user/reviewbook/'.$b->id)}}">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <nav aria-label="Page navigation example" class="d-flex justify-content-center mt-4">
        <ul class="pagination">
          <li class="page-item {{ ($book->currentPage() == 1) ? ' disabled' : '' }}">
              <a class="page-link" href="{{ $book->url(1) }}">Previous</a>
          </li>
            @for($i = 1; $i <= $book->lastPage(); $i++)
                <li class="page-item {{ ($book->currentPage() == $i) ? ' active' : '' }}">
                    <a class="page-link" href="{{ $book->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
          <li class="page-item {{ ($book->currentPage() == $book->lastPage()) ? ' disabled' : '' }}">
              <a class="page-link" href="{{ $book->url($book->currentPage()+1) }}">Next</a>
          </li>
        </ul>
      </nav>
</div>

@endsection
