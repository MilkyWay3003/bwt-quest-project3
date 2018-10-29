<div class="container">
    <div class="navbar">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/">Home</a></li>

            @if (Auth::check())
                <form method="post" action="{{ route('logout') }}">
                {{ csrf_field() }}
                <div class="text-right">
                <li><button class="btn btn-link" type="submit">Log out</button></li>
                </div>
                </form>
            @else
                <li><a href="{{ route('register') }}">Register</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
            @endif
        </ul>
    </div>
</div>
