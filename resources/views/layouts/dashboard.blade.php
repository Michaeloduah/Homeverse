@if (auth()->user()->account_type == "Client")
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">	

			<!-- Boxicons -->
			<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
			<!-- My CSS -->
			<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">

			<title>Homeverse - Dashboard</title>
		</head>
		<body id="testing" class="">


			<!-- SIDEBAR -->
			<section id="sidebar">
				<a href="{{ route('dashboard.index') }}" class="brand">
					<img id="logo1" width="100%" class="" src="{{asset('assets/images/logo.png')}}" alt="Homeverse logo">
					<img id="logo2" width="100%" class="logo-dark" src="{{asset('assets/images/logo-light.png')}}" alt="Homeverse logo">
				</a>
				<ul class="side-menu top">
					<li class="active">
						<a href="{{ route('dashboard.index') }}">
							<i class='bx bxs-dashboard' ></i>
							<span class="text">Dashboard</span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class='bx bxs-home' ></i>
							<span class="text">House or Property For Sale</span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class='bx bxs-building-house' ></i>
							<span class="text">House or Property For Rent</span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class='bx bxs-cart-add' ></i>
							<span class="text">Saved Items</span>
						</a>
					</li>
				</ul>
				<ul class="side-menu">
					<li>
						<a href="#">
							<i class='bx bxs-message-dots' ></i>
							<span class="text">Notification</span>
						</a>
					</li>
					<li>
						<a href="{{ route('dashboard.profile') }}">
							<i class='bx bxs-user-circle' ></i>
							<span class="text">Profile</span>
						</a>
					</li>
					<li>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
							@csrf
						
							<button class="logout-btn" type="submit">
								<a href="" class="logout" style="padding: 10px 0px 10px 0px">
									<i class='bx bxs-log-out-circle' ></i>
									<span class="">Logout</span>
								</a>
							</button>
						</form>
					</li>
				</ul>
			</section>
			<!-- SIDEBAR -->



			<!-- CONTENT -->
			<section id="content">
				<!-- NAVBAR -->
				<nav>
					<i class='bx bx-menu' ></i>
					<a href="#" class="nav-link">Categories</a>
					<form action="#">
						<div class="form-input">
							<input type="search" placeholder="Search...">
							<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
						</div>
					</form>
					<input type="checkbox" id="switch-mode">
					<label for="switch-mode" class="switch-mode"></label>
					<p class="username"> {{ auth()->user()->username}} </p>
					<a href="#" class="profile">
						@if (auth()->user()->image == NULL)
							<img src="{{ asset('assets/images/no-profile.png') }}" alt="">
						@else
							<img src="{{asset('storage/'.auth()->user()->image)}}">
						@endif
					</a>
				</nav>
				<!-- NAVBAR -->

				<!-- MAIN -->


				@yield('content')


				<!-- MAIN -->
			</section>
			<!-- CONTENT -->
			

			<script src="{{ asset('assets/js/dashboard.js') }}"></script>
		</body>
	</html>
@elseif (auth()->user()->account_type == "Agent")
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">	

		<!-- Boxicons -->
		<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
		<!-- My CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">

		<title>Homeverse - Dashboard</title>
	</head>
	<body id="testing" class="">


		<!-- SIDEBAR -->
		<section id="sidebar">
			<a href="{{ route('dashboard.index') }}" class="brand">
				<img id="logo1" width="100%" class="" src="{{asset('assets/images/logo.png')}}" alt="Homeverse logo">
				<img id="logo2" width="100%" class="logo-dark" src="{{asset('assets/images/logo-light.png')}}" alt="Homeverse logo">
			</a>
			<ul class="side-menu top">
				<li class="active">
					<a href="{{ route('dashboard.index') }}">
						<i class='bx bxs-dashboard' ></i>
						<span class="text">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class='bx bxs-home' ></i>
						<span class="text">Add new House or Property</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class='bx bxs-building-house' ></i>
						<span class="text">My Houses and Properties</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class='bx bxs-cart-add' ></i>
						<span class="text">Orders</span>
					</a>
				</li>
			</ul>
			<ul class="side-menu">
				<li>
					<a href="#">
						<i class='bx bxs-message-dots' ></i>
						<span class="text">Notification</span>
					</a>
				</li>
				<li>
					<a href="{{ route('dashboard.profile') }}">
						<i class='bx bxs-user-circle' ></i>
						<span class="text">Profile</span>
					</a>
				</li>
				<li>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
						@csrf
					
						<button class="logout-btn" type="submit">
							<a href="" class="logout" style="padding: 10px 0px 10px 0px">
								<i class='bx bxs-log-out-circle' ></i>
								<span class="">Logout</span>
							</a>
						</button>
					</form>
				</li>
			</ul>
		</section>
		<!-- SIDEBAR -->



		<!-- CONTENT -->
		<section id="content">
			<!-- NAVBAR -->
			<nav>
				<i class='bx bx-menu' ></i>
				<a href="#" class="nav-link">Categories</a>
				<form action="#">
					<div class="form-input">
						<input type="search" placeholder="Search...">
						<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
					</div>
				</form>
				<input type="checkbox" id="switch-mode">
				<label for="switch-mode" class="switch-mode"></label>
				<p class="username"> {{ auth()->user()->username}} </p>
				<a href="#" class="profile">
					@if (auth()->user()->image == NULL)
						<img src="{{ asset('assets/images/no-profile.png') }}" alt="">
					@else
						<img src="{{asset('storage/'.auth()->user()->image)}}">
					@endif
				</a>
			</nav>
			<!-- NAVBAR -->

			<!-- MAIN -->


			@yield('content')


			<!-- MAIN -->
		</section>
		<!-- CONTENT -->
		

		<script src="{{ asset('assets/js/dashboard.js') }}"></script>
	</body>
</html>

@else 
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">	

		<!-- Boxicons -->
		<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
		<!-- My CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">

		<title>Homeverse - Dashboard</title>
	</head>
	<body id="testing" class="">


		<!-- SIDEBAR -->
		<section id="sidebar">
			<a href="{{ route('dashboard.index') }}" class="brand">
				<img id="logo1" width="100%" class="" src="{{asset('assets/images/logo.png')}}" alt="Homeverse logo">
				<img id="logo2" width="100%" class="logo-dark" src="{{asset('assets/images/logo-light.png')}}" alt="Homeverse logo">
			</a>
			<ul class="side-menu top">
				<li class="active">
					<a href="{{ route('dashboard.index') }}">
						<i class='bx bxs-dashboard' ></i>
						<span class="text">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class='bx bxs-home' ></i>
						<span class="text">House For Sale</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class='bx bxs-building-house' ></i>
						<span class="text">House For Rent</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class='bx bxs-cart-add' ></i>
						<span class="text">Saved Items</span>
					</a>
				</li>
			</ul>
			<ul class="side-menu">
				<li>
					<a href="#">
						<i class='bx bxs-message-dots' ></i>
						<span class="text">Notification</span>
					</a>
				</li>
				<li>
					<a href="{{ route('dashboard.profile') }}">
						<i class='bx bxs-user-circle' ></i>
						<span class="text">Profile</span>
					</a>
				</li>
				<li>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
						@csrf
					
						<button class="logout-btn" type="submit">
							<a href="" class="logout" style="padding: 10px 0px 10px 0px">
								<i class='bx bxs-log-out-circle' ></i>
								<span class="">Logout</span>
							</a>
						</button>
					</form>
				</li>
			</ul>
		</section>
		<!-- SIDEBAR -->



		<!-- CONTENT -->
		<section id="content">
			<!-- NAVBAR -->
			<nav>
				<i class='bx bx-menu' ></i>
				<a href="#" class="nav-link">Categories</a>
				<form action="#">
					<div class="form-input">
						<input type="search" placeholder="Search...">
						<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
					</div>
				</form>
				<input type="checkbox" id="switch-mode">
				<label for="switch-mode" class="switch-mode"></label>
				<p class="username"> {{ auth()->user()->username}} </p>
				<a href="#" class="profile">
					@if (auth()->user()->image == NULL)
						<img src="{{ asset('assets/images/no-profile.png') }}" alt="">
					@else
						<img src="{{asset('storage/'.auth()->user()->image)}}">
					@endif
				</a>
			</nav>
			<!-- NAVBAR -->

			<!-- MAIN -->
			

				@yield('content')


			<!-- MAIN -->
		</section>
		<!-- CONTENT -->
		

		<script src="{{ asset('assets/js/dashboard.js') }}"></script>
	</body>
</html>
	
@endif


