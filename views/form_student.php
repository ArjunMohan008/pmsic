<script type="text/javascript" src="views/js_student.js"></script> 

<div class="panel-heading">
	<h2 class="col-sm-offset-3 col-sm-8">Student Registration</h2>
</div>
<br><br>
<div class="panel-body">
	<form class="form-horizontal" method="post" id="form_studentRegistration" enctype="multipart/form-data">

		<!--text box for Student ID-->
		<div class="form-group">
			<div class="col-sm-offset-6 col-sm-2">
				<input type="text" class="form-control" id="txtid" name="txtid" readonly/>
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
		
		<!--text box for Student address-->
		 <div class="form-group">
			<label class="col-sm-2 control-label" for="txtadd">
				Address
			</label>
			<div class="col-sm-6">
				<textarea name="txtadd" id="txtadd" class="form-control"></textarea>
			</div>
		</div>
		
		<!--combo box for load provinces list -->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="txtpro">
				Province
			</label>
			<div class="col-sm-6">
			   <select class="form-control" id="txtpro" name="txtpro">
					<option value="">Select here</option>
			  </select>
			</div>
		</div>
		
		<!--radio button for gender selection-->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="txtgender">
				Gender
			</label>
			<div class="col-sm-2">
				<label><input type="radio" name="txtgender" value="1" checked> Male</label>
			</div>
			 <div class="col-sm-2">
				<label><input type="radio" name="txtgender" value="2" > Female</label>
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
			 <div class="col-sm-3">
				<input type="text" class="form-control" id="txttelopt" name="txttelopt" placeholder="(optional)"/>
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
		
		<!--file input for upload Student photo -->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="txtphoto">
			   Upload photo
			</label>
			<div class="col-sm-6">
				<input type="file" class="form-control" id="txtphoto" name="txtphoto" onchange="readURL(this);"/>
				<img id="txt_image" src="#" />
			</div>
		</div>
		
		<!--save and clear buttons -->
		<div class="form-group">
			<label class="col-sm-2 control-label">
			</label>
			<div class="col-sm-2">
				<input type="button" class="btn btn-primary" value="save" id="btnsave"/>
				<input type="reset" class="btn btn-danger" value="clear" id="btnclear"/>
			</div>
		</div>
	


		<div class="form-group">
			<label class="col-sm-2 control-label" for="txtpro2">
				Combo
			</label>
			<div class="col-sm-6">
			   <select class="form-control" id="txtpro2" name="txtpro2">
					<option value="">...</option>
			  </select>
			</div>
		</div>

				<div class="form-group">
			<label class="col-sm-2 control-label" for="txtcity">
				City
			</label>
			<div class="col-sm-6">
			   <select class="form-control" id="txtcity" name="txtcity">
					<option value="">Select your city</option>
			  </select>
			</div>
		</div>

<br>

		<div class="form-group">
			<label class="col-sm-2 control-label">
			</label>
			<div class="col-sm-2">
				<input type="button" class="btn btn-primary" value="Save 2" id="btnsave2"/>
				<input type="reset" class="btn btn-danger" value="Clear 2" id="btnclear2"/>
			</div>
		</div>

</form>
</div>
<br />
<!--table for view Student information -->
<div class="container" id="table_container" >
	<table id="table_student" class="table table-striped table-bordered " style="width:100%;display:none;">
		<thead>
			<tr class="w3-black">
				<th>ID</th>
				<th>Name</th>
				<th>Company</th>
				<th>Address</th>
				<th>Email</th>
				<th>Status</th>
				<th>Edit</th>
				<th>View</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody id="tbody_customer">
		</tbody>
	</table>
</div>

<!--js function for image preview-->
<script type="text/javascript">
	function readURL(input){
 		if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
               	$('#txt_image')
               .attr('src', e.target.result)
                 .width(200)
                  .height(200);
          	  };
           	reader.readAsDataURL(input.files[0]);
       	}
	}
	
</script>