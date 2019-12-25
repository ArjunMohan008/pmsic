<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link type="text/css" rel="stylesheet" href="/pmsic/assets/css/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="/pmsic/assets/css/font-awesome-4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="/pmsic/assets/css/w3.css" />
<script type="text/javascript" src="/pmsic/assets/js/jquery.js"></script>
<script type="text/javascript" src="/pmsic/assets/js/bootstrap.js"></script>
<script type="text/javascript" src="/pmsic/assets/datatable/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/pmsic/assets/datatable/DataTables-1.10.18/js/dataTables.bootstrap.min.js"></script>
<link type="text/css" rel="stylesheet" href="/pmsic/views/ui_css/form.css">
<script type="text/javascript" src="/pmsic/assets/js/jquery-ui-1.11.4/jquery-ui.min.js"></script>
<link type="text/css" rel="stylesheet" href="/pmsic/assets/js/jquery-ui-1.11.4/jquery-ui.min.css" />
<!--<link type="text/css" rel="stylesheet" href="/pmsic/assets/sweetalert/css/sweetalert.css" />
<script type="text/javascript" src="/pmsic/assets/sweetalert/js/sweetalert.min.js"></script>
<script type="text/javascript" src="/pmsic/assets/jQuery-Alert/notify.js"></script>
<link type="text/css" rel="stylesheet" href="/pmsic/assets/jQuery-Alert/notify.css" />-->
<link type="text/css" rel="stylesheet" href="/pmsic/assets/jquery-confirm-master/dist/jquery-confirm.min.css" />
<script type="text/javascript" src="/pmsic/assets/jquery-confirm-master/dist/jquery-confirm.min.js"></script>
<script type="text/javascript" src="/pmsic/assets/echarts/echarts.min.js"></script>
<style>
	body {
	  margin: 0;
	}
	#logo{
		height:auto;
		width:10%;
		padding-bottom:5px;
		padding-left:29px;
		padding-right:0%;
		padding-top:5px;
		float:left;
	}
	.topnav{
	  overflow: hidden;
	  /*background-color:#2ACD9C;*/
	}
	
	.topnav a {
	  display: block;
	  color: #f2f2f2;
	  float: right;
	  padding: 14px 16px;
	  text-decoration: none;
	  font-size: 17px;
	}
	.topnav a:hover {
	  color: #000000;
	}
	
	.topnav .icon {
	  display: none;
	}
	
	/*@media screen and (max-width: 600px) {
	  .topnav a:not(:first-child) {display: none;}
	  .topnav a.icon {
		float: right;
		display: block;
	  }
	}
	
	@media screen and (max-width: 600px) {
	  .topnav.responsive {position: relative;}
	  .topnav.responsive .icon {
		position: absolute;
		right: 0;
		top: 0;
	  }
	  .topnav.responsive a {
		float: none;
		display: block;
		text-align: left;
	  }
	}*/
	
	
	/* Style page content */
	.main {
		margin-left: 160px; /* Same as the width of the sidebar */
		padding: 0px 10px;
	}
	
	/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
	@media screen and (max-height: 450px) {
		.sidenav {padding-top: 15px;}
		.sidenav a {font-size: 18px;}
	}
</style>
</head>

<body>
	<?php $bgcount=0; ?>
	<div class="topnav navbar-fixed-top w3-teal row" id="topnav">
		
		<h3 style=" float:left; padding-left:15px; text-align:justify">Company logo</h3>
		<a href="controllers/logout.php"> <span class="glyphicon glyphicon-log-in"></span> logout</a>		
		<a href="javascript:void(0);" class="icon" onclick="mylogout()">
			<i class="fa fa-bars"></i>
		</a>
	</div>
	
	<!--<script>
		function mylogout(){
			var logout=document.getElementById("topnav");
			if (logout.className==="topnav"){
				logout.className+=" responsive";
			}else{
				logout.className="topnav";
			}
		}
	</script> -->