<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
  <a class="nav-link" href="{{route('roles.index')}}">Role</a>
</li>
		<li class="nav-item">
  <a class="nav-link" href="{{route('categories.index')}}">Category</a>
</li>
		<li class="nav-item">
  <a class="nav-link" href="{{route('posts.index')}}">Post</a>
</li>
		<li class="nav-item">
  <a class="nav-link" href="{{route('comments.index')}}">Comment</a>
</li>
		<li class="nav-item">
  <a class="nav-link" href="{{route('likes.index')}}">Like</a>
</li>
		<li class="nav-item">
  <a class="nav-link" href="{{route('ratings.index')}}">Rating</a>
</li>
		<li class="nav-item">
  <a class="nav-link" href="{{route('tags.index')}}">Tag</a>
</li>
		
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>


                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <li class="nav-item">
  <a class="nav-link" href="{{route('roles.create')}}">Add Role</a>
</li>
		<li class="nav-item">
  <a class="nav-link" href="{{route('categories.create')}}">Add Category</a>
</li>
		<li class="nav-item">
  <a class="nav-link" href="{{route('posts.create')}}">Add Post</a>
</li>
		<li class="nav-item">
  <a class="nav-link" href="{{route('comments.create')}}">Add Comment</a>
</li>
		<li class="nav-item">
  <a class="nav-link" href="{{route('likes.create')}}">Add Like</a>
</li>
		<li class="nav-item">
  <a class="nav-link" href="{{route('ratings.create')}}">Add Rating</a>
</li>
		<li class="nav-item">
  <a class="nav-link" href="{{route('tags.create')}}">Add Tag</a>
</li>
		

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>