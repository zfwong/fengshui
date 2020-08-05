<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
  <div class="container">
    <!-- Branding Image -->
    <a class="navbar-brand " href="{{ url('/') }}">
        METAPHYSIIICS CONSULTANCY PLT
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <!-- Left Side Of Navbar -->
    <ul class="navbar-nav mr-auto">
    </ul>

    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav navbar-right">
      <!-- Switch Language Links -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarLocaleDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          @if (session()->has('locale'))
            {{ session()->get('locale') == "en" ? __('home.english') : __('home.chinese') }}
          @else 
            {{ __('home.english') }}
          @endif
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarLocaleDropdown">
          <!--<a class="dropdown-item" href="{{ route('setLocale', 'zh-CN') }}">{{ __('home.chinese') }}</a>-->
          <a class="dropdown-item" href="{{ route('setLocale', 'en') }}">English</a>
        </div>
      </li>
      <!-- Authentication Links -->
      @guest
      <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('home.login') }}</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('home.register') }}</a></li>
      @else
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{ Auth::user()->avatar }}" class="img-responsive img-circle" width="30px" height="30px">
            {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('users.show', Auth::id()) }}">Info</a>
            <a class="dropdown-item" href="{{ route('users.edit', Auth::id()) }}">Edit Info</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" id="logout" href="#">
            <form action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                <button class="btn btn-block btn-danger" type="submit" name="button">Exit</button>
            </form>
            </a>
        </div>
      </li>
      @endguest
    </ul>
    </div>
  </div>
</nav>