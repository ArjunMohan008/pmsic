<?php
	$base_path="D:\xampp\htdocs\wpmic";
?>
<!DOCTYPE html>
<head>
	<title>WPMIC</title>
	
	<link rel="stylesheet"  type="text/css" href="../assets/css/bootstrap.min.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
	
	<style>
		.nav_main {
			color:#FFFFFF;
		}
		.navbar-brand{
			color:#FFFFFF;
		}
	</style>
</head>

<body>
	<!--navigation bar-->
	<nav class="navbar navbar-fixed-top" style="background-color:#DAA520;">
		<div class="container-fluid">
			<div class="navbar-header">
				<!--responsive button-->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#res_nav_bar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<a class="navbar-brand active" href="#">WPMIC</a>
			</div>
			<div class="collapse navbar-collapse" id="res_nav_bar">
				<ul class="nav navbar-nav">
					<li ><a class="nav_main" href="#" style="font-size:18px;cursor:pointer;" >Home</a></li>
					<li><a class="nav_main" href="#" style="font-size:18px;cursor:pointer;" >Orders</a></li>
						<li class="dropdown">
							<a class="dropdown-toggle nav_main" data-toggle="dropdown" style="font-size:18px;cursor:pointer;" href="#">Inventory
							<span class="caret"></span></a>
							<ul class="dropdown-menu">
							  <li><a href="#">Raw materials</a></li>
							  <li><a href="#">Farmers</a></li>
							  <li><a href="#">Purchases</a></li>
							  <li><a href="#">Issue</a></li>
							  <li><a href="#">Returns</a></li>
							  <li><a href="#">Damages</a></li>
							  <li><a href="../including/ui/cat_add_form.php">management</a></li>
							</ul>
						 </li>
					<li><a class="nav_main" href="#" style="font-size:18px;cursor:pointer;" >User management</a></li>
					<li><a class="nav_main" href="#" style="font-size:18px;cursor:pointer;" >Customers</a></li>
					<li><a class="nav_main" href="#" style="font-size:18px;cursor:pointer;" >Employees</a></li>
					<li><a class="nav_main" href="#" style="font-size:18px;cursor:pointer;" >Configuration</a></li>
				</ul>	
	<!--login with glyphicon"-->
				
					
				<ul class="nav navbar-nav navbar-right" style="text-align:right">
      				<li><a href="#" class="nav_main active" style="font-size:18px;cursor:pointer;"><span class="glyphicon glyphicon-off"></span> Log-out</a></li>
    			</ul>
			</div>
			<!--search textbox with glyphicon-->
			<!--	<form class="navbar-form navbar-right">
					<div class="input-group">
						<input class="form-control" type="text" placeholder="search here">
						<div class="input-group-btn">
							<button type="submit" class="btn btn-default">
								<i class="glyphicon glyphicon-search"></i>
							</button>
						</div>
					</div>
				</form>-->
			</div>
		</div>
	</nav>