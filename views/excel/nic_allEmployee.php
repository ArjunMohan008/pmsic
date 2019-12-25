<?php
	require_once("../../models/class_dbconnection.php");

	if(isset($_POST["btnnicAllEmp"])){

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

			$output="<table class='table' border='1'>
				<thead style=' background-color: #bde9ba;''>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>NIC</th>
						<th>Tel</th>
						<th>email</th>
					</tr>
				</thead>
				<tbody>";

			if($result->num_rows>0)
			{
				while($rec=$result->fetch_assoc()){
					$output.="<tr>
						<td>".$rec["emp_id"]."</td>
						<td>".$rec["emp_name"]."</td>
						<td>".$rec["emp_nic"]."</td>
						<td>".$rec["emp_tel"]."</td>
						<td>".$rec["emp_email"]."</td>
					</tr>";
				}

				$output.="</tbody></table>";
			}

			header("Content-Type: application/xls");
			header("Content-Disposition: attachment; filename=EmployeeWithNIC.xls");
			echo $output;

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