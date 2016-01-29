<html>
<head>
	<title>Euro 2016</title>
	<link rel="stylesheet" href="{{ asset('css/BootswatchSuperhero/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/BootswatchSuperhero/custom.css') }}">
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>
<body class="custom-background3">

<div class="container">

<div style="padding: 0; witdh: 100%; height: 50%; background-image:url('/images/eurobanner.jpg'); background-size: 100% auto;"></div>
<!-- Fixed navbar -->
    <div class="navbar navbar-inverse" style="margin-bottom: 0px;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Euro 2016</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="/">Home</a></li>
            <li class=""><a href="/Game">Game</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
	    @can('admin-check')
	    <li class="dropdown">
	         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-extended="false">
			Administration <span class="caret"/>
		 </a>
		<ul class="dropdown-menu" role="menu">
			<li><a href="{{ url('/user') }}">Matches</a></li>
			<li><a href="{{ url('/logout') }}">Users</a></li>
		</ul>
		</li>
@endcan
          </ul>
	  <ul class="nav navbar-nav navbar-right custom-userwelcome" style="margin-right: 0px;">
		 @if (Auth::check())
       		 <li class="dropdown">
	         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-extended="false">
			Welcome <span style="text-decoration: underline;"> {{ Auth::user()->name }}</span> <span class="caret"/>
		 </a>
		<ul class="dropdown-menu" role="menu">
			<li><a href="{{ url('/user') }}">Edit profile</a></li>
			<li><a href="{{ url('/logout') }}">Logout</a></li>
		</ul>
		</li>
		@else
            	<li><a href="register">Register</a></li>
           	<li><a href="login">Login</a></li>
	 	@endif
	  </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
@yield('content')
	

<div class="footer text-center" style="border-top: 1px solid #596a7b;">
<div>
Euro 2016
</div>
</div>

</div>
	
</body>
</html>

