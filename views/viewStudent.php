<?php
	require("../controllers/controller_student.php");
?>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h4>View Student</h4>
	</div>
	<div class="panel-body">
		<table class="table" id='tblviewStudent'>
			<thead>
				<tr>
				<th>Name</th>
				<th>Tel</th>
        <th>Address</th>
        <th>email</th>
        <th>view</th>
				<th>edit</th>
        <th>delete</th>
				</tr>
			</thead>
			<tbody>
				<?php
					viewStudent();
				?>
			</tbody>		
		</table>
	</div>
</div>

<!-- Modal for edit form -->
<div id="modelEditBook" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>Edite Student Details</b></h4>
      </div>
      <div class="modal-body">
      	<form class="form-horizontal" id="frmStudntEdit">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="txtsid">
              Studet ID
            </label>
              <div class="col-sm-2">
                <input type="text"  readonly="readonly" class="form-control" id="txtsid" name="txtsid"/>
              </div> 
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="txtname">
              Stduent Name
            </label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="txtname" name="txtname"/>
            </div> 
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="txtAdd">
              Address
            </label>
            <div class="col-sm-6">
              <input type="textarea" class="form-control" id="txtAdd" name="txtAdd"/>
            </div> 
          </div>


          <div class="form-group">
            <label class="col-sm-2 control-label" for="cmbProvince">
              Province
            </label>
            <div class="col-md-3 col-sm-3 col-xs-12">
              <select name="txtpro" id="txtpro" class="form-control">
                <option value="">--Select Province--</option>
              </select>
            </div> 
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="gender">
              Gender
            </label>
            <div class="col-sm-6">
              <label class="radio-inline" >
                <input type="radio"  id="optmale" name="optgen" value="0"/>Male
              </label>
              <label class="radio-inline" >
                <input type="radio"  id="optfemale" name="optgen" value="1"/>Female
              </label>
            </div> 
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="txtTel">
             Phone Number
            </label>
            <div class="col-md-3 col-sm-3 col-xs-12">
              <input type="text" class="form-control" id="txtTel" name="txtTel"/>
              <input type="text" class="form-control" id="txtoptTel" name="txtoptTel"/>
            </div> 
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="txtEmail">
              Email
            </label>
            <div class="col-md-3 col-sm-3 col-xs-12">
              <input type="text" class="form-control" id="txtEmail" name="txtEmail"/>
            </div> 
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btnUpdate">Update</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnMdlrstupdtBk" onclick="$('#frmStudntEdit')[0].reset();">Cancel</button>
      </div>
    </div>
    <!--end Modal content-->
  </div>
</div>
<!--End Modal  -->

<!-- Modal for view Student-->
<div id="modelViewStudent" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>View Student Details</b></h4>
      </div>
      <div class="modal-body">
        <table class="table" id=''>
          <thead>
            <tr>
            <th class="col-sm-2"></th>
            <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Student Id  : </td>
              <td><label id="lblsid" class="viewBookInfo"></label></td>
            </tr>
            <tr>
              <td>Student Name  :</td>
              <td><label id="lblname" class="viewBookInfo"></label></td>
            </tr>
            <tr>
              <td>Student Address  :</td>
              <td><label id="lbladd" class="viewBookInfo"></label></td>
            </tr>
            <tr>
              <td>Province  :</td>
              <td><label id="lblprovince" class="viewBookInfo"></label></td>
            </tr>
            <tr>
              <td>Gender  :</td>
              <td><label id="lblgender" class="viewBookInfo"></label></td>
            </tr>
            <tr>
              <td>Tel  :</td>
              <td><label id="lbltel" class="viewBookInfo"></label></td>
            </tr>
            <tr>
              <td></td>
              <td><label id="lbltel_opt" class="viewBookInfo"></label></td>
            </tr>
            <tr>
              <td>Email  :</td>
              <td><label id="lblemail" class="viewBookInfo"></label></td>
            </tr>
            <tr>
              <td>City  :</td>
              <td><label id="lblcity" class="viewBookInfo"></label></td>
            </tr>
          </tbody>    
        </table> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnMdlviewBkInfo" onclick="$('.viewBookInfo').text('');">Close</button>
      </div>
    </div>
    <!--end Modal content-->
  </div>
</div>
<!--End Modal for view Student-->

<script type="text/javascript">

$(document).ready(function(){
    $('#tblviewStudent').DataTable();//data tabel

    //loads province list to combo box
    $.get("controllers/controller_student.php?type=get_province",function(data,status){
      if(status=="success"){          //if request responds with success status
        //alert(data);
        $("#txtpro").append(data);  
      } 
    
  });

		$("#btnUpdate").click(function(){
		  updateStudntInfo();
		});

    //for edit  button
    $(".glyphicon-edit").keypress(function(e) {
      //Event.which == 1 mouse click left and event. which == 13 is enter key.
       if(e.which == 13) {
          var sid= $(this).parent().parent().attr("id");
          getInfoToEdit(sid);
       }
    });
    $(".glyphicon-edit").click(function(){
        var sid= $(this).parent().parent().attr("id");
        getInfoToEdit(sid);
    });

    //for view info button
    $(".glyphicon-list-alt").keypress(function(e) {
      //Event.which == 1 mouse click left and event. which == 13 is enter key.
       if(e.which == 13) {
          var sid= $(this).parent().parent().attr("id");
          getInfoToView(sid);
       }
    });
    $(".glyphicon-list-alt").click(function(){
        var sid= $(this).parent().parent().attr("id");
        getInfoToView(sid);
    });

    //for delete icon
    $(".glyphicon-trash").keypress(function(e) {
      //Event.which == 1 mouse click left and event. which == 13 is enter key.
       if(e.which == 13) {
          var sid= $(this).parent().parent().attr("id");
          deleteStudent(sid);
       }
    });

    $(".glyphicon-trash").click(function(){
        var sid= $(this).parent().parent().attr("id");
        deleteStudent(sid);
    });

	});


function getInfoToEdit(sid){
  $.get("controllers/controller_student.php?type=get_oneStudent&id="+sid,function(data,status){
    if(status=='success'){
      $('#frmStudntEdit')[0].reset();
      var jdata=jQuery.parseJSON(data);
      $("#txtsid").val(jdata.std_id);
      $("#txtname").val(jdata.std_name);
      $("#txtAdd").val(jdata.std_address);
      $("#txtTel").val(jdata.std_tel);
      $("#txtoptTel").val(jdata.std_tel_opt);
      $("#txtEmail").val(jdata.std_email);
      $("#txtpro option[value='"+jdata.pro_id+"']").prop("selected", true);
      if(jdata.std_gender=="0")
        $("#optmale").prop("checked",true)
      else
        $("#optfemale").prop("checked",true)
    }
  }); 
}

function getInfoToView(sid){
  $.get("controllers/controller_student.php?type=get_oneStudent&id="+sid,function(data,status){
    alert(data);
    if(status=='success'){
          $('.viewBookInfo').text('');
          var jdata=jQuery.parseJSON(data);
          $("#lblsid").text(jdata.std_id);
          $("#lblname").text(jdata.std_name);
          $("#lbladd").text(jdata.std_address);
          $("#lblprovince").text(jdata.pro_name);
          if(jdata.std_gender==0)
            $("#lblgender").text("Meal");
          else
            $("#lblgender").text("Femeal");
          $("#lbltel").text(jdata.std_tel);
          $("#lbltel_opt").text(jdata.std_tel_opt);
          $("#lblcity").text(jdata.std_email);
          $("#lblemail").text(jdata.std_email);
       }
    });
  }

function updateStudntInfo(){
  $.post("controllers/controller_student.php?type=update_studentInfo",$("#frmStudntEdit").serialize(),function(data,status){
    if(data=="Done"){
      $("#btnMdlrstupdtBk").click();
      alert("Successfuly Updated");
      $("#content").load("views/viewStudent.php");
    }
  });
}


function deleteStudent(id){alert(id);
    $.get("controllers/controller_student.php?type=delete_student&id="+id,function(data,status){alert (data);
            if(data=="Done"){
              alert('Deletion successful');
              $("#content").load("views/viewStudent.php");
            }
            else{
              alert('Deletion unsuccessful');
            }
      });
  }

	
</script>