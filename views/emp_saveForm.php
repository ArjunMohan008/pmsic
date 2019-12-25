
<div class="panel-heading">
	<h3 class="col-sm-offset-3 col-sm-8"><b>Employee Registration</b></h3>
</div>

<div class="panel-body">
	<!-- panel form add personal Info -->
	<form class="form-horizontal"  id="frm_addPersonalInfo">
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-4">
	 			<h4>Personal Information</h4>
			</div>
		</div>

		<!--text box for Student name-->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="txtname">
				Title
			</label>
			<div class="col-sm-6">
				<select class="form-control" name="cmbTitle" id="cmbTitle">
					<option value="">--Select Title--</option>
					<option value="1">Mr.</option>
					<option value="2">Mrs.</option>
					<option value="3">Miss.</option>
					<option value="4">Dr.</option>
				</select>
			</div>
		</div>
		
		<!--text box for Student name-->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="txtname">
				Name
			</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="txtname" name="txtname"/>
			</div>
		</div>

		<!--text box for NIC-->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="nic">
				NIC
			</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="nic" name="nic"/>
			</div>
		</div>
		
		<!--radio button for gender selection-->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="optgender">
				Gender
			</label>
			<div class="col-sm-2">
				<label><input type="radio" name="optgender" value="0" checked> Male</label>
			</div>
			 <div class="col-sm-2">
				<label><input type="radio" name="optgender" value="1" > Female</label>
			</div>
		</div>

		<!--text box for Date of birth-->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="txtname">
				Date of Birth
			</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="txtDob" name="txtDob"/>
				<span class="input-group-addon glyphicon glyphicon-calendar form-control-feedback center"></span>
			</div>
		</div>
		
		<!--save and clear buttons -->
		<div class="form-group">
			<label class="col-sm-2 control-label">
			</label>
			<div class="col-sm-2">
				<input type="button" class="btn btn-primary" value="Next" id="btnPrnlInfoNext"/>
				<input type="reset" class="btn btn-danger" value="clear" id="btnPrnlInfoclear"/>
			</div>
		</div>

	</form>
	<!-- end - form for add personal Info -->

	<!-- form for add contact Info -->
	<form class="form-horizontal" id="frm_addContactInfo" style="display:none">
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-4">
	 			<h4>Personal Information</h4>
			</div>
		</div>

		<!--text box for Student address-->
		 <div class="form-group">
			<label class="col-sm-2 control-label" for="txtadd">
				Address
			</label>
			<div class="col-sm-6">
				<textarea name="txtadd" id="txtadd" class="form-control"></textarea>
			</div>
		</div>		
		
		<!--text box for Student telephone number-->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="txttel">
				Telephone
			</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="txttel" name="txttel"/>
			</div>
		</div>

		<!--text box for Student mail address-->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="txtemail">
				Email
			</label>
			<div class="col-sm-6">
				<input type="email" class="form-control" id="txtemail" name="txtemail"/>
			</div>
		</div>
		
		<!--save and clear buttons -->
		<div class="form-group">
			<label class="col-sm-2 control-label">
			</label>
			<div class="col-sm-3">
				<input type="button" class="btn btn-success" value="Back" id="btnCntctInfoback"/>
				<input type="button" class="btn btn-primary" value="Save" id="btnCntctInfosave"/>
				<input type="reset" class="btn btn-danger" value="Clear" id="btnCntctInfoclear"/>
			</div>
		</div>
	</form>
	<!-- end - form for add contact Info -->
</div>



<!--js function for image preview-->
<script type="text/javascript">
	$(document).ready(function(){

		$("#txtDob").datepicker({
			dateFormat:"yy/mm/dd",
			changeMonth:true,
			changeYear:true,
			minDate: new Date(1960, 12 - 1, 31),
			maxDate: new Date(2001, 12 - 1, 31)
		});//data picker for date of birth

		$("#btnPrnlInfoNext").click(function(){//Next button in personal info form
			$("#frm_addPersonalInfo").css("display","none");
			$("#frm_addContactInfo").css("display","");
		});

		$("#btnCntctInfoback").click(function(){//back button in Contact info form
			$("#frm_addPersonalInfo").css("display","");
			$("#frm_addContactInfo").css("display","none");
		});

		$("#btnCntctInfosave").click(function(){//save button in Contact info form
			var title=$("#cmbTitle").find('option:selected').val();
			var name=$("#txtname").val();
			var n=$("#nic").val();
			var dob=$("#txtDob").val();
			var gender=$("input[name='optgender']:checked").val();
			var add=$("#txtadd").val();
			var tel=$("#txttel").val();
			var email=$("#txtemail").val();

			$.post("controllers/controller_employee.php?type=addNewEmp",{title:title,name:name,nic:nic,add:add,dob:dob,gender:gender,tel:tel,email:email},function(data,status){
				if(status=="success")
        		{
        			if($.isNumeric(data)==true){
						$("#lnkaddemp").click();
						alert("Newly Added Id is :"+data);
					}
					else{
						alert("Please try agin!");
					}
				}
			});
		});
	});
	
</script>