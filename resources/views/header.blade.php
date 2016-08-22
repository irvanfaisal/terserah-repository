<header>
    <div class="container">
        <div class="row no-padding">
            <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}"><img class="logo" src="{{ URL::asset('/img/logo-white.png') }}" alt="Lootslog"></a>
                </div>
                <div class="col-md-8 col-sm-7 col-xs-12">
                    {!! Form::open(['method'=>'GET','action' => ['ProductsController@result'],'role'=>'search'])  !!}
                    <div class="input-group search-bar">
                        <input type="text" class="form-control form-search" name="search" placeholder="Explore our collectibles database...">
						<span class="input-group-btn btn-search">
							<button type="submit" class="btn btn-default" aria-label="Left Align">
                                <i class="fa fa-search"></i>
                            </button>
						</span>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::check())
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('',['user','profile',Auth::user()->id]) }}">My Profile</a></li>
                                    <li><a href="{{ url('',['logout']) }}">Sign Out</a></li>
                                </ul>
                            </li>
                        @else
                            <a href="{{ url('login') }}" class="btn btn-register" aria-label="Left Align">
                                <span>Sign in</span>
                            </a>
                        @endif
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>
    </div>
    <div class="product-list">
        <div class="container">
            <div class="row no-padding">
                <a class="list" href="{{ url('',['products','list','Hot Toys']) }}"><b>Hot Toys</b></a>
                <a class="list" href="{{ url('',['products','list','Sideshow']) }}"><b>Sideshow</b></a>
                <a class="list" href="{{ url('',['products','list','Threezero']) }}"><b>Threezero</b></a>
                <a class="list no-border" href="{{ url('',['products','list','Star Ace']) }}"><b>Star Ace</b></a>
            </div>
        </div>
    </div>
</header>