<?php

	session_start();
	if(!isset($_SESSION["user"])|| $_SESSION["user"]["utype"]!="1"){
		header("location:../index.php");
	}

	
	require_once("includes/head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin panel</title>
	<style>
		/* The sidebar menu */
	.sidenav {
		color:#000000;
		height: 100%; /* Full-height: remove this if you want "auto" height */
		width:auto; /* Set the width of the sidebar */
		position: fixed; /* Fixed Sidebar (stay in place on scroll) */
		z-index: 1; /* Stay on top */
		top: 59px; /* Stay at the top */
		left: 0;
		/*background-color:#58D68D; */
		/*background-color:#CEF6EA;*/
		/*opacity:0.3;*/
		overflow-x: hidden; /* Disable horizontal scroll */
		padding-top: 0px;
	}
	.nav{
		width:auto;
	}
	/* The navigation menu links */
	.sidenav a, .dropdown-btn {
		padding: 6px 8px 6px 16px;
		text-decoration: none;
		font-size: 18px;
		color: #000;
		display: block;
	}
	
	.subsidenav{
		font-size: 16px;
		color: #000;
	}
	
	/* When you mouse over the navigation links, change their color */
	.sidenav a:hover {
		color: #003300;
	}
	#content_buttons{
		margin-left:40%;
		margin-top:6%;
	}
	#content{
		margin-left:19%;
		margin-top:1%;
	}
	#sidenav_panel{
		background-color:#1ABC9C;
		/*margin-left:5%;*/
		width:auto;
		position:absolute;
		text-align:center;
		text-decoration:none;
		
 /* min-height: 10;
  max-height: 10;
  overflow-y: scroll;*/
	}
	.panel-heading{
		 max-height:50px;
	}
	.sidenavbar{
		padding: 3px 4px;
	}
	#otherreport{
		margin-bottom:70px;
	}
	#sidenav_panel_try{
		margin-left:5%;
		/*width:50%;*/
		position:absolute;
		text-align:center;
		text-decoration:none;
	}
	.colapse-sidenav:hover{
		text-decoration:none;
	}
	.colapse-sidenav:active{
		text-decoration:none;
	}
	.close{
		padding-right:10px;
		padding-top:3px;
		color:red;
	}
	.close:hover{
		color:#FF0000;
	}
	.button3{
	border-radius: 8px;
	}
	.sidenav a.active{
    	color: #0E6655;
		text-decoration:none;
	}
	.panel-nav{
		background-color:#0FE2A2;
		/*opacity:0.3;*/
	}
	.btn-sidenav{
		background-color: white;
		color: white;
		border: 2px solid #5DADE2;
	}
	.btn-sidenav-try{
		border: 2px solid #5DADE2;
		border-radius:12px;
	}
	.btn-sidenav:hover {
    	color: #003399;
		border: 2px solid #5DADE2;
		font-weight:700;
	}
	.panel-sidenav{
		border:none;
	}
	.panel-body-nav{
		background-color:#ABEBC6;
	}

	</style>
</head>
<body>

	<div class="panel-group sidenav" id="accordionMenu" role="tablist" aria-multiselectable="true">
		<div class="panel panel-nav">
			<div class="panel-heading" role="tab">
				<h4 class="panel-title">
					<a role="button" class="sidenavbar" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="Home">
						Home
					</a>
				</h4>
			</div>
		</div>
		<div class="panel panel-nav">
			<div class="panel-heading" role="tab" >
				<h4 class="panel-title">
					<a class="collapsed sidenavbar" id="student" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				 	 Student Registration
					</a>
			  	</h4>
			</div>
			
		</div>
		<div class="panel panel-nav">
			<div class="panel-heading" role="tab" >
				<h4 class="panel-title">
					<a class="collapsed sidenavbar" id="studentlist" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				 	 Student list
					</a>
			  	</h4>
			</div>
			
		</div>

		<div class="panel panel-nav">
			<div class="panel-heading" role="tab" >
				<h4 class="panel-title">
					<a class="collapsed sidenavbar" id="employeereg" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				 	 Employee Registration
					</a>
			  	</h4>
			</div>
			
			</div>

			<div class="panel panel-nav">
				<div class="panel-heading" role="tab" >
				<h4 class="panel-title">
					<a class="collapsed sidenavbar" id="employeelist" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				 	 Employee List
					</a>
			  	</h4>
				</div>
			
			</div>
	</div>
	<div id="content_buttons">
	</div>
	<div id="content">
		
		<div class="row">
		  <div class="col-md-6 col-sm-6 col-xs-6" style="background-color:#FFFFFF">
			<div id="divrawMeterial" style="height:500px;"></div>
			</div>
		  <div class="col-md-6 col-sm-6 col-xs-6" style="background-color:#FFFFFF">
			<div id="divTarget" style="height:500px;"></div>
		  </div>
        </div>
	</div>

	<div>
		
	</div>
	
<?php require_once("includes/footer.php"); ?>

	<script type="text/javascript">
	//code for open panels relevant to the side navbar links
		$(document).ready(function(){
			//loadChart();
			//$(".dropdown-container").hide();
			$("#content").load("views/homePanel.php");
			$(".sidenavbar").click(function(){
				//$(document).off();
				var id=$(this).attr("id");
				if(id=="Home")
					$("#content").load("views/homePanel.php");
				if(id=="student")
					$("#content").load("views/form_student.php");
				if(id=="studentlist")
					$("#content").load("views/viewStudent.php");
				if(id=="employeereg")
					$("#content").load("views/emp_saveform.php");
				if(id=="employeelist")
					$("#content").load("views/emp_viewTbl.php");
			
			

			});
			
		});
	</script>