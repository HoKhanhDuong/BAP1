<nav class="navbar navbar-expand-sm bg-dark text-white">
    <div class="container">
      <a class="navbar-brand" href=" ">
        <img src="./imgs/logo.png" height="30" alt="image">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav11" aria-controls="navbarNav11" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav11">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('adListUser')}}" >List user<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('adListBook')}}" >List book</a>
          </li>
          <li class="nav-item">
            <a class="nav-link">Log out</a>
          </li>
        </ul>
      </div>
    </div>
</nav>
