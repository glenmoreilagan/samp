<!DOCTYPE html>
<html lang="en">

{{-- FOR ICONS --}}
{{-- https://feathericons.com/?query=auth --}}


<!-- Mirrored from appstack.bootlab.io/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Jan 2021 13:06:37 GMT -->
<!-- Added by HTTrack -->
{{-- <meta http-equiv="content-type" content="text/html;charset=UTF-8" /> --}}
<!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">

	<title>@yield('title')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- <link rel="canonical" href="calendar.html" /> -->
	<link rel="shortcut icon" href="/img/favicon.ico">

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">

	<!-- Choose your prefered color scheme -->
	<!-- <link href="css/light.css" rel="stylesheet"> -->
	<!-- <link href="css/dark.css" rel="stylesheet"> -->

	<!-- BEGIN SETTINGS -->
	<!-- Remove this after purchasing -->
	<link class="js-stylesheet" href="/css/css/light.css" rel="stylesheet"/>
	<link class="js-stylesheet" href="/css/datatable-customize.css" rel="stylesheet"/>
	<link class="js-stylesheet" href="/css/all.css" rel="stylesheet"/>
	<link class="js-stylesheet" href="/plugins/nprogress/nprogress.css" rel="stylesheet"/>
	<style type="text/css">
		body[data-theme=light] .sidebar-brand svg {
		  fill: #fff !important;
		}
		body[data-theme=light] .sidebar-brand svg path:first-child {
     	fill: #fff !important; 
		}
	</style>
	<!-- END SETTINGS -->
<script type="text/javascript">
	const getCookie = (cname) => {
	  let name = cname + "=";
	  let ca = document.cookie.split(';');
	  for(let i = 0; i < ca.length; i++) {
	    let c = ca[i];
	    while (c.charAt(0) == ' ') {
	      c = c.substring(1);
	    }
	    if (c.indexOf(name) == 0) {
	      return c.substring(name.length, c.length);
	    }
	  }
	  return "";
	}

	const notify = (data) => {
		var message = data.message
		var type = "success"; // success or danger
		if(data.status === false) type = "danger";
		var duration = 2500;
		var ripple = false;
		var dismissible = true;
		var positionX = "left";
		var positionY = "top";
		window.notyf.open({
			type, message, duration, ripple, dismissible,
			position: { x: positionX, y: positionY }
		});
	}

	const formatter = new Intl.NumberFormat('en-US', {
	  style: 'currency',
	  currency: 'PHP',

	  // These options are needed to round to whole numbers if that's what you want.
	  //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
	  //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
	});
</script>
</head>
<!--
  HOW TO USE: 
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-behavior: sticky (default), fixed, compact
-->

<body data-theme="light" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <i class="align-middle" data-feather="zap"></i>
          <span class="align-middle mr-3">PASTPODS</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-item">
						<a href="dashboard" class="sidebar-link">
              <i class="align-middle" data-feather=""></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>
					@foreach($navs['parent'] as $key => $p)
						<li class="sidebar-item">
							<a href="#{{ strtolower(str_replace(" ", "", $p->parentname)) }}" data-toggle="collapse" class="sidebar-link collapsed">
	              <i class="align-middle" data-feather=""></i> <span class="align-middle">{{ $p->parentname }}</span>
	            </a>
							<ul id="{{ strtolower(str_replace(" ", "", $p->parentname)) }}" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
	            @foreach($navs['child'] as $k => $c)
	            	@if($p->parentid == $c->parentid)
										<li class="sidebar-item"><a class="sidebar-link" href="{{ $c->url }}">{{ $c->childname }}</a></li>
										{{-- <li class="sidebar-item"><a class="sidebar-link" href="/suppliers">Suppliers</a></li> --}}
	            	@endif
	            @endforeach
							</ul>
						</li>
					@endforeach
					<li class="sidebar-item">
						<a href="#multi" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="share-2"></i> <span class="align-middle">Multi Level</span>
            </a>
						<ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
							<li class="sidebar-item">
								<a href="#multi-2" data-toggle="collapse" class="sidebar-link collapsed">
                  Two Levels
                </a>
								<ul id="multi-2" class="sidebar-dropdown list-unstyled collapse">
									<li class="sidebar-item">
										<a class="sidebar-link" href="#">Item 1</a>
										<a class="sidebar-link" href="#">Item 2</a>
									</li>
								</ul>
							</li>
							<li class="sidebar-item">
								<a href="#multi-3" data-toggle="collapse" class="sidebar-link collapsed">
                  Three Levels
                </a>
								<ul id="multi-3" class="sidebar-dropdown list-unstyled collapse">
									<li class="sidebar-item">
										<a href="#multi-3-1" data-toggle="collapse" class="sidebar-link collapsed">
                      Item 1
                    </a>
										<ul id="multi-3-1" class="sidebar-dropdown list-unstyled collapse">
											<li class="sidebar-item">
												<a class="sidebar-link" href="#">Item 1</a>
												<a class="sidebar-link" href="#">Item 2</a>
											</li>
										</ul>
									</li>
									<li class="sidebar-item">
										<a class="sidebar-link" href="#">Item 2</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<!-- <form class="d-none d-sm-inline-block">
					<div class="input-group input-group-navbar">
						<input type="text" class="form-control" placeholder="Search projects…" aria-label="Search">
						<div class="input-group-append">
							<button class="btn" type="button">
                <i class="align-middle" data-feather="search"></i>
              </button>
						</div>
					</div>
				</form> -->

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell-off"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">6h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.1</div>
												<div class="text-muted small mt-1">8h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Anna accepted your request.</div>
												<div class="text-muted small mt-1">12h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded-circle mr-1" alt="Chris Wood" /> <span class="text-dark">Chris Wood</span>
              </a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="pages-settings.html">Settings & Privacy</a>
								<a class="dropdown-item" href="#">Help</a>
								<a class="dropdown-item" href="/logout">Sign out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">
					<!-- <h1 class="h3 mb-3">Items</h1> -->
					@yield('content')
				</div>
			</main>
		</div>
	</div>
	<script src="/js/js/app.js"></script>
	<script src="/plugins/filter-tags/autofilter.js"></script>
	<script src="/plugins/nprogress/nprogress.js"></script>
	{{-- https://www.uglifyjs.net/ --}}
	<script type="text/javascript" src="/js/post_request.js"></script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			$("input").attr('autocomplete', 'off');
		});
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.js" integrity="sha512-5m2r+g00HDHnhXQDbRLAfZBwPpPCaK+wPLV6lm8VQ+09ilGdHfXV7IVyKPkLOTfi4vTTUVJnz7ELs7cA87/GMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script>
		const setChart = (labelss, monthss, datass) => {
			const annual_ctx = document.getElementById('annual-chart').getContext('2d');
			const annual_chart = new Chart(annual_ctx, {
		    type: 'bar',
		    data: {
	        labels: monthss,
	        datasets: [{
	          label: `${labelss[0]} Sales`,
	          data: datass[0],
	          backgroundColor: [
	              'rgba(255, 99, 132, 0.4)',
	              'rgba(54, 162, 235, 0.4)',
	              'rgba(255, 206, 86, 0.4)',
	              'rgba(75, 192, 192, 0.4)',
	              'rgba(153, 102, 255, 0.4)',
	              'rgba(255, 159, 64, 0.4)'
	          ],
	          borderColor: [
	              'rgba(255, 99, 132, 1)',
	              'rgba(54, 162, 235, 1)',
	              'rgba(255, 206, 86, 1)',
	              'rgba(75, 192, 192, 1)',
	              'rgba(153, 102, 255, 1)',
	              'rgba(255, 159, 64, 1)'
	          ],
	          // borderWidth: 1,
	          // hoverBorderWidth : 3
	        },{
	          label: `${labelss[1]} Sales`,
	          data: datass[1],
	          backgroundColor: [
	              'rgba(255, 99, 132, 0.8)',
	              'rgba(54, 162, 235, 0.8)',
	              'rgba(255, 206, 86, 0.8)',
	              'rgba(75, 192, 192, 0.8)',
	              'rgba(153, 102, 255, 0.8)',
	              'rgba(255, 159, 64, 0.8)'
	          ],
	          borderColor: [
	              'rgba(255, 99, 132, 1)',
	              'rgba(54, 162, 235, 1)',
	              'rgba(255, 206, 86, 1)',
	              'rgba(75, 192, 192, 1)',
	              'rgba(153, 102, 255, 1)',
	              'rgba(255, 159, 64, 1)'
	          ],
	          // borderWidth: 1,
	          // hoverBorderWidth : 3
	        }]
		    },
		    options : {
	        scales : {
	          y: {
	            beginAtZero:true
	          }
	        },
	        responsive : true,
	        maintainAspectRatio: false,
	        plugins : {
	        	legend : {
	        		display : false
	        	},
	        	layout : {
	        		padding : {
	        			left : 50,
	        			right : 50,
	        			bottom : 50,
	        			top : 50
	        		}
	        	},
	      		tooltip: {
	      			// enabled : false
	      		}
	        }
		    }
			});
		}

		const get_annualchart = async (url = "/dashboard/annualChart", data = {}) => {
			let labelss = [];
			let datass = [];
			let monthss = [
				'January', 'February', 
				'March', 'April', 
				'May', 'June', 
				'July', 'August', 
				'September', 'October', 
				'November', 'December'
			];
			await postData(url, data)
		  .then(res => {
		  	for(let i in res) {
		  		labelss.push(res[i].year);
		  		datass.push([
		  			res[i].january,
		  			res[i].february,
		  			res[i].march,
		  			res[i].april,
		  			res[i].may,
		  			res[i].june,
		  			res[i].july,
		  			res[i].august,
		  			res[i].september,
		  			res[i].october,
		  			res[i].november,
		  			res[i].december
		  		]);
		  	}
		  	// console.log(monthss);
		  	// console.log(datass[0]);
		  	setChart(labelss, monthss, datass);
		  }).catch((error) => {
		    console.log(error);
		  });
		}
		get_annualchart();

		
	</script>
</body>
</html>