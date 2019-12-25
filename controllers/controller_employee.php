<?php
	require_once("../models/class_dbconnection.php");

	if(isset($_GET["type"])){
		$type=$_GET["type"];
		switch($type){			// checks the type
			case "addNewEmp":
				addNewEmployee(); 		// calls function new_id
				break;
		}
	}

	function addNewEmployee(){
		try{/* creat an object of connection class*/
			$db=new Connection();
			$dbcon=$db->db_con();

			/* Add data to employeers tbl*/
			$sql="INSERT INTO tbl_employee(emp_title,emp_name,emp_nic,emp_gender,emp_dob,emp_add,emp_tel,emp_email) 
								VALUES(?,?,?,?,?,?,?,?);";
			$stmt=$dbcon->prepare($sql);
			$stmt->bind_param("ississis",$title,$name,$nic,$gender,$dob,$address,$tel,$email);
			$title=$_POST["title"];
			$name=$_POST["name"];
			$nic=$_POST["nic"];
			$dob=$_POST["dob"];
			$gender=$_POST["gender"];
			$address=$_POST["add"];
			$tel=$_POST["tel"];
			$email=$_POST["email"];
			$stmt->execute();

			if($dbcon->error)
			{
				throw new Exception($dbcon->error);
			}
			if($stmt->affected_rows=="1")
				echo($dbcon->insert_id);
		}

		catch(Exception $e){
			echo("Error :".$e->getMessage());
		}
		
		
		finally{
			$stmt->close();
			$dbcon->close();
		}

	}

	/* display all employee in table*/
	function viewEmployeeList(){
		try{
			//creat object of Dbcon class
			$db=new Connection();
			$dbcon=$db->db_con();

			$sql="SELECT * FROM tbl_employee WHERE emp_status=? ORDER BY emp_id DESC";
			$stmt=$dbcon->prepare($sql);
			$stmt->bind_param("i",$status);
			$status=0;
			$stmt->execute();
			$result = $stmt->get_result();
				
			if($dbcon->error)
			{
				throw new Exception($dbcon->error);
			}
			if($result->num_rows==0)
					echo("<td></td>");

			while($rec=$result->fetch_assoc()){
				echo ("<tr>");
				echo("<td>".$rec["emp_id"]."</td>");
				echo("<td>".$rec["emp_name"]."</td>");
				echo("<td>".$rec["emp_nic"]."</td>");
				echo("<td>".$rec["emp_tel"]."</td>");
				echo("<td>".$rec["emp_email"]."</td>");
				echo("</tr>");
			}
		
		}
		catch(Exception $e){
			echo("Error :".$e->getMessage());
		}
		finally{
			$stmt->close();
			$dbcon->close();
		}
	}

?>