<?php
	require_once("../models/class_dbconnection.php");

	if(isset($_GET["type"])){
		$type=$_GET["type"];
		switch($type){			// checks the type
			case "product":
				get_product(); 		// calls function new_id
				break;
		}
	}



function get_product()
{
	try{
			//creat object of Dbcon class
		$db=new Connection();
		$dbcon=$db->db_con();

		$sql="SELECT * FROM tbl_products";
		$stmt=$dbcon->prepare($sql);
		//$stmt->bind_param();
		$stmt->execute();
		$result = $stmt->get_result();

		if($dbcon->error)
		{
			throw new Exception($dbcon->error);
		}

		$nor = $result->num_rows;
	    if ($nor > 0) {
	        $array = array();
	        while ($row = $result->fetch_assoc()) {
	            array_push(
	       			$array,
	                array(
	                    'pname' => $row['pro_name'],
                    	'quantity' => $row['pro_quantity'],
                    	'reorderLevel' => $row['pro_reorder_level']
	                )
	            );
	        }
	        echo json_encode($array);
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