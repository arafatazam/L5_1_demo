<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">L5.1 Demo</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @can('view')
                <li><a href="{{route('products.index')}}">Products</a></li>
                @endcan
                @can('administer')
                <li><a href="{{route('categories.index')}}">Categories</a></li>
                @endcan
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->check()? auth()->user()->name : 'Session' }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @cannot('view')
                        <li><a href="{{route('auth.get-register')}}">Sign Up</a></li>
                        <li><a href="{{route('auth.get-login')}}">Sign In</a></li>
                        @endcannot
                        @can('view')
                        <li><a href="{{route('auth.logout')}}">Sign out</a></li>
                        @endcan
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>