<nav class="navbar">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Goal Tracker</a>
        </div>
        <ul class="nav navbar-nav">
            @foreach(config('app.nav') as $link => $label)
                <li><a href='{{ $link }}' class='{{ Request::is(substr($link, 1)) ? 'active' : '' }}'>{{ $label }}</a>
            @endforeach
        </ul>
</nav>