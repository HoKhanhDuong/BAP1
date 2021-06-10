@extends('admin.layout.master')
@section('content')

<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
        <h1 class="h3 mb-0 text-gray-800">List user</h1>
    </div>
    <div class="card card-body border-light shadow-sm table-wrapper table-responsive pt-4">
          <table class="table table-hover">
              <thead>
                <tr>
                  <th class="col-sm-1">#</th>
                  <th class="col-sm-5">Name</th>
                  <th class="col-sm-5">Author</th>
                  <th>Action</th>
              </tr>
              
              </thead>
              <tbody>
              @if($book->count()>0)
                @foreach($book as $key=>$b)
                  <tr>
                    <th>{{$key}}</th>
                    <th>{{$b->name}}</th>
                    <th>{{$b->tac_gia}}</th>
                    <th>
                      <div class="row ml-1">
                          <form action="{{route('delete')}}" method="POST">
                          @csrf
                              <input hidden value="{{$key}}" name="id">
                              <input hidden value="Books" name="type">
                              <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                      </div>
                    </th>
                  </tr>
                @endforeach
              @endif
              </tbody>
          </table>
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
    
</div>
@endsection