    <header>
      <div class="blog-masthead">
        <div class="container">
          <nav class="nav">
            <a class="nav-link" href="/">Home</a>
            <a class="nav-link" href="/posts">Posts</a>
            <a class="nav-link" href="/tasks">Tasks</a>
            <a class="nav-link" href="/users">Users</a>
            
            {{-- Check to see if we have a user signed in --}}
            @if (Auth::check()) 
              <a class="nav-link ml-auto" href="#">{{ Auth::user()->name }}</a>
              <a href="/logout" class="nav-link">Sign Out</a>
            @endif

            @guest
            <a class="nav-link ml-auto" href="/register">Register</a>
            <a href="/login" class="nav-link">Sign In</a>
            @endguest

          </nav>
        </div>
      </div>

      <div class="blog-header">
        <div class="container">
          <h1 class="blog-title">The Bootstrap Blog</h1>
          <p class="lead blog-description">An example blog template built with Bootstrap.</p>
        </div>
      </div>
    </header>