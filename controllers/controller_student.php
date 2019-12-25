<?php
	require_once("../models/class_dbconnection.php");

	if(isset($_GET["type"])){
		$type=$_GET["type"];
		switch($type){			// checks the type
			case "newID":
				new_id(); 		// calls function new_id
				break;
			case "get_province":
				get_provincelist(); 		// calls function new_id
				break;
			case "get_city":
				get_citylist(); 		// calls function new_id
				break;
			case "save":
				save_student(); //calls function save_student
				break;
			case "get_oneStudent":
				get_oneStudent();
				break;
			case "update_studentInfo":
				update_studentInfo();
				break;
			case "delete_student":
				delete_student();
				break;
		}
	}
	
	function new_id(){// function for next ID generator
		
		//db connection
		$db=new Connection();
		$con=$db->db_con();
		
		//query
		$sql="SELECT std_id FROM tbl_student ORDER BY std_id DESC LIMIT 1;";
		
		//execute the query
		$result=$con->query($sql);
		
		//error handling
		if($con->errno)
		{
			echo("SQL Error: ".$con->error);
			exit;
		}
		
		//checks the number of rows in the result
		$nor=$result->num_rows;
		
	
		if($nor>0){
			//fetch the result
			$rec=$result->fetch_assoc();
			//assign ID to variable $num
			$num=$rec["std_id"];
			//eliminate string S and get remaining ID no
			$num=substr($num,1);
			//increment the ID
			$num++;
			//merge zeros to left side of ID (total length of ID should be 4)
			$no=str_pad($num,4,'0',STR_PAD_LEFT);
			//merge string S to new sID
			$new_id="S".$no;
		}
		else{
			//first ID of student
			$new_id="S0001";
		}
		//encode the new ID to JSON
		echo(json_encode($new_id));
		//close the connection
		$con->close();
	}
	
	
	//get province list 
	function get_provincelist(){
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT DISTINCT pro_id,pro_name FROM tbl_province;";
		$result=$con->query($sql);
		if($con->errno)
		{
			echo("SQL Error: ".$con->error);
			exit;
		}
		$nor=$result->num_rows;
		if($nor==0){
			echo("No records");
			exit;
		}
		else{
			//fetch all the records
			while($rec=$result->fetch_assoc())
			{
				//merge province ID a`nd name with HTML
				echo("<option value='".$rec["pro_id"]."'>".$rec["pro_name"]."</option>");
			}
		}
		$con->close();
	}
	

		//get city list 
	function get_citylist(){
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT DISTINCT city_id,city_name FROM tbl_city;";
		$result=$con->query($sql);
		if($con->errno)
		{
			echo("SQL Error: ".$con->error);
			exit;
		}
		$nor=$result->num_rows;
		if($nor==0){
			echo("No records");
			exit;
		}
		else{
			//fetch all the records
			while($rec=$result->fetch_assoc())
			{
				//merge province ID a`nd name with HTML
				echo("<option value='".$rec["city_id"]."'>".$rec["city_name"]."</option>");
			}
		}
		$con->close();
	}
	
	
	function save_student(){
	
		//get data using Global variables and assign it to php variables
		$id=$_POST["txtid"];
		$name=$_POST["txtname"];
		$address=$_POST["txtadd"];
		$province=$_POST["txtpro"];
		$city=$_POST["txtcity"];
		$gender=$_POST["txtgender"];
		$contact=$_POST["txttel"];
		//check whether optional contact number is empty or not
		if($_POST["txttelopt"]=="")
			$opt_contact="";
		else
			$opt_contact=$_POST["txttelopt"];
		
		$email=$_POST["txtemail"];
		
		
		$db=new Connection();
		$con=$db->db_con();
		$sql="INSERT INTO tbl_student(std_id,std_name,std_address,std_province,std_city,std_gender,std_tel,std_tel_opt,std_email)
		VALUES('$id','$name','$address',$province,$city,$gender,'$contact','$opt_contact','$email');";
		$result=$con->query($sql);
 		
		if($con->error){
			echo("SQL error ".$con->error);
			exit;
		}
		if($result>0){
			echo("success");
			//move uploaded photos to folder student photos
			move_uploaded_file($_FILES["txtphoto"]["tmp_name"],"../views/images/$id.jpg");
		}
		else{
			echo("error");
		}
		$con->close();
	}

	function viewStudent(){
		$db=new Connection();
		$con=$db->db_con();
		$sql="SELECT *
				FROM tbl_student
				WHERE std_status=0  ORDER BY std_id DESC;";
		$result = $con->query($sql);
		if($con->errno)
		{
			echo("SQL Error: ".$con->error);
			exit;
		}
		$nor=$result->num_rows;
		if($nor==0){
			echo("No Records Found");
			exit;
		
		}
		while($rec=$result->fetch_assoc()){
			echo("<tr id='".$rec["std_id"]."'>");
			echo("<td>".$rec["std_name"]."</td>");
			echo("<td>".$rec["std_tel"]."</td>");
			echo("<td>".$rec["std_address"]."</td>");
			echo("<td>".$rec["std_email"]."</td>");
			echo("<td><button class='btn btn-link glyphicon glyphicon-list-alt' style='text-decoration:none' data-toggle='modal' data-target='#modelViewStudent'></button></td>");
			echo("<td><button class='btn btn-link glyphicon glyphicon-edit' style='text-decoration:none' data-toggle='modal' data-target='#modelEditBook'></button></td>");
			echo("<td><button class='btn btn-link glyphicon glyphicon-trash' style='text-decoration:none; color:red' data-toggle='modal'></button></td>");
			echo("</tr>");
		
		}
		
		$con->close();
	}
		
	function get_oneStudent(){
			$db=new Connection();
			$con=$db->db_con();
			$sid=$_GET["id"];


			$sql="SELECT * FROM tbl_student S,tbl_province P,tbl_city C WHERE S.std_province=P.pro_id AND 
			S.std_id='$sid'";
			$result=$con->query($sql);
			if($con->errno)
			{
				echo("SQL Error: ".$con->error);
				exit;
			}
			
			$rec=$result->fetch_assoc();
				echo(json_encode($rec));
			$con->close();	
	}
	
	function update_studentInfo(){
		try{

			$db=new Connection();
			$con=$db->db_con();
			$stmt = $con->prepare("UPDATE tbl_student SET std_name=?,
				std_address=?,
				std_province=?,
				std_gender=?,
				std_tel=?,
				std_tel_opt=?,
				std_email=? WHERE std_id=?");
			$stmt->bind_param("ssiiiiss",$sname,$add,$province,$gender,$Tel,$optTel,$email,$sid);

			$sid=$_POST["txtsid"];
			$sname=$_POST["txtname"];
			$add=$_POST["txtAdd"];
			$Tel=$_POST["txtTel"];
			$optTel=$_POST["txtoptTel"];
			$email=$_POST["txtEmail"];
			$province=$_POST["cmbProvince"];
			$gender=$_POST["optgen"];

			if($stmt->execute()){
				echo ("Done");
			}
			else{
				throw new Exception($con->error);
			}
		}
		catch(Exception $e) {
			echo $e->getMessage();
		}
		finally{
			$stmt->close();
			$con->close();
		}
	}

	function delete_student()
	{
		try{
			//creat object of Dbcon class
			$db=new Connection();
			$con=$db->db_con();

			$stmt = $con->prepare("UPDATE tbl_student SET std_status=?
				WHERE std_id=?");
			$stmt->bind_param("is",$std_status,$sid);

			$sid=$_GET["id"];
			$std_status=1;
			if($stmt->execute()){
				echo ("Done");
			}
			else{
				throw new Exception($con->error);
			}

		}
		catch(Exception $e){
			echo("Error :".$e->getMessage());
		}
		finally{
			$con->close();
		}
	}

?>