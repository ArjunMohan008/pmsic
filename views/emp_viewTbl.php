<?php
	require("../controllers/controller_employee.php");
?>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h4>All Employee</h4>
	</div>
	<div class="panel-body">
		<table class="table" id='tblviewEmp'>
			<thead>
				<tr>
        			<th>ID</th>
					<th>Name</th>
					<th>NIC</th>
					<th>Tel</th>
        			<th>email</th>
				</tr>
			</thead>
			<tbody>
				<?php
					viewEmployeeList();
				?>
			</tbody>		
		</table>
    <div class="col-sm-offset-2 col-sm-2">
      <form action="views/excel/excel_allEmployee.php" method="post">
        <input type="submit" name="btnExcelAllEmp" class="btn btn-info btn-sm " value="Excel">
      </form>
    </div>
    
    <div class="col-sm-offset-2 col-sm-2">
      <form action="views/excel/nic_allEmployee.php" method="post">
        <input type="submit" name="btnnicAllEmp" class="btn btn-primary" value="Excel NIC">
      </form>
    </div>
</form>
     <div class="col-sm-offset-2 col-sm-2">
      <a href="views/reports/report_allEmp.php" target="_blank">
       	<button class="btn btn-primary">PDF</button>
      </a>
    </div>
	</div>
</div>


<script type="text/javascript">
  $(document).ready(function(){
        $('#tblviewEmp').DataTable();//data tabel
  });