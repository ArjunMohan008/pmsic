<?php
	session_start();
	if(!isset($_SESSION["user"]))
	{
	 	header("Location:../index.php");
	}
	$utype=$_SESSION["user"]["utype"];
	if($utype=="1")
	{
		header("Location:../admin_panel.php");
		
	}
	else if($utype=="2")
	{
		header("Location:manager.php");
		
	}
	else if($utype=="3")
	{
		header("Location:clerk.php");
		
	}

?>