<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('admin.dashboard.index') }}">管理後台</a>
    </div>
    <!-- Top Menu Items -->
    @if (Route::has('login'))
        @auth
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->name}} <b class="caret"></b></a>
            <ul class="dropdown-menu">

                <li>
                    <a href="{{ route('home.index') }}"><i class="fa fa-fw fa-user"></i> 返回前端</a>
                </li>
                <li>
                    <a href="{{ route('profile.show') }}"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>


                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <li class="divider"></li>
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       this.closest('form').submit();"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
                </form>
            </ul>
        </li>
    </ul>
    @endauth
@endif
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menus on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-fw fa-dashboard"></i> 主控台</a>
            </li>
            <li>
                <a href="{{route('admin.members.index')}}"><i class="fa fa-fw fa-edit"></i> 會員管理</a>
            </li>
            <li>
                <a href="{{route('admin.menus.index')}}"><i class="fa fa-fw fa-edit"></i> 餐點管理</a>
            </li>
            <li>
                <a href="{{route('admin.orderlists.index')}}"><i class="fa fa-fw fa-edit"></i> 訂單管理</a>
            </li>



        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
