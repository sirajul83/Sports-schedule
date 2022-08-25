<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <a class="navbar-brand" href="{{ url('/')}}">
      <img src="{{ asset('public/web/assets/img/logoschdule.png')}}"  />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse menuArea" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/news')}}"> News </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('sports')}}">Sports</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('entertainment')}}">Entertainment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('health-tips')}}">Health & Tips</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('contact')}}">Contact </a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>