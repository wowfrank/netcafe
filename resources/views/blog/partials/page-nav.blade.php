<div class="main-header">
    <div class="container">
        <div id="menu-wrapper">
            <div class="row">
                <div class="logo-wrapper col-md-4 col-sm-2 col-xs-8">
                    <h1>
                        <a href="/">{{ trans('messages.Netcafe') }}</a>
                    </h1>
                </div> <!-- /.logo-wrapper -->
                <div class="col-md-8 col-sm-10 col-xs-4 main-menu text-right">
                    <ul class="menu-first hidden-sm hidden-xs">
                        <li><a href="/">{{ trans('messages.Home') }}</a></li>
                        <li class="active"><a href="#">{{ trans('messages.Blog') }}</a></li>
                        <li><a href="{{ route('message.list') }}">{{ trans('messages.Messages') }}</a></li>
                        @if(Auth::user())
                            <li>
                                <a href="{{ Auth::logout() }}">
                                    <img src="{{ Auth::user()->avatar }}" width="24" height="24" />
                                    {{ Auth::user()->name }}-{{ trans('messages.Logout') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                    <a href="#" class="toggle-menu visible-sm visible-xs"><i class="fa fa-bars"></i></a>
                </div> <!-- /.main-menu -->
            </div> <!-- /.row -->
        </div> <!-- /#menu-wrapper -->
        <div class="menu-responsive hidden-md hidden-lg">
            <ul>
                <li><a href="/">{{ trans('messages.Home') }}</a></li>
                <li class="active"><a href="#">{{ trans('messages.Blog') }}</a></li>
                <li><a href="route('message.list')">{{ trans('messages.Messages') }}</a></li>
                @if(Auth::user())
                    <li>
                        <a href="{{ Auth::logout() }}">
                            <img src="{{ Auth::user()->avatar }}" width="24" height="24" />
                            {{ Auth::user()->name }}-{{ trans('messages.Logout') }}
                        </a>
                    </li>
                @endif
            </ul>
        </div> <!-- /.menu-responsive -->
    </div> <!-- /.container -->
</div> <!-- /.main-header -->