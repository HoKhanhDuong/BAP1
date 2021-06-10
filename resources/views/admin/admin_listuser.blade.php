@extends('admin.layout.master')
@section('content')

<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
        <h1 class="h3 mb-0 text-gray-800">List book</h1>
    </div>
    <div class="card card-body border-light shadow-sm table-wrapper table-responsive pt-4">
          <table class="table table-hover">
              <thead>
                <tr>
                  <th class="col-sm-1">#</th>
                  <th class="col-sm-5">Name</th>
                  <th class="col-sm-5">Email</th>
                  <th>Action</th>
              </tr>
              </thead>
              <tbody>
              @if($user->count()>0)
                @foreach($user as $key=>$u)
                <tr>
                  <th>{{$key}}</th>
                  <th>{{$u->full_name}}</th>
                  <th>{{$u->email}}</th>
                  <th>
                    <div class="row ml-1">
                        <form action="{{route('delete')}}" method="POST">
                        @csrf
                            <input hidden value="{{$u->id}}" name="id">
                            <input hidden value="Users" name="type">
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
              <li class="page-item {{ ($user->currentPage() == 1) ? ' disabled' : '' }}">
                  <a class="page-link" href="{{ $user->url(1) }}">Previous</a>
              </li>
                @for($i = 1; $i <= $user->lastPage(); $i++)
                    <li class="page-item {{ ($user->currentPage() == $i) ? ' active' : '' }}">
                        <a class="page-link" href="{{ $user->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
              <li class="page-item {{ ($user->currentPage() == $user->lastPage()) ? ' disabled' : '' }}">
                  <a class="page-link" href="{{ $user->url($user->currentPage()+1) }}">Next</a>
              </li>
            </ul>
          </nav>
    </div>
    
</div>
@endsection