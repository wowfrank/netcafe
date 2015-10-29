<!DOCTYPE html>
	<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
	<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
	<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
	<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		@include('blog.partials.head')
	</head>
	<body>
	<!--[if lt IE 7]>
	    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
	<![endif]-->
	@include('blog.partials.page-nav')
	@yield('page-header')
	@include('blog.partials.header')
	@yield('content')

	@include('include.footer')
	
	<script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
	<script src="/js/bootstrap.js"></script>
	<script src="/js/plugins.js"></script>
	<script src="/js/main.js"></script>

	@yield('scripts')

	</body>
</html>