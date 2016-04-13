<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
          <a class="navbar-brand" href="/">Acme Nature Tours</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="/about-acme">About</a></li>
                <li><a href="/register">Register</a></li>
                <li><a href="/testimonials">Testimonials</a></li>
                @if(Acme\auth\LoggedIn::user())
                    <li><a href="/add-testimonial">Add Testimonial</a></li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if ((Acme\Auth\LoggedIn::user()) && (Acme\Auth\LoggedIn::user()->access_level == 2))
                    <li class="dropdown">
                        <a id="dLabel" href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Admin
                            <span class="caret"></span>
                        </a>
                      <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li><a href="#">Edit Page</a></li>
                      </ul>
                    </li>
                    <li><a href="/logout">
                        <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                         Logout
                    </a></li>
                @elseif (Acme\Auth\LoggedIn::user())
                    <li><a href="/logout">
                        <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                         Logout
                    </a></li>
                @else
                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                    <li><a href="/login">
                        <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                         Login
                    </a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
