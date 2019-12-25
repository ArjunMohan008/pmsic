$(document).ready(function(){
	//get request for get next student ID
	$.get("controllers/controller_student.php?type=newID",function(data,status){
		if(status=="success"){					//if request responds with success status
			//alert(data);
			var jdata=jQuery.parseJSON(data);	//decode JSON object (JSON object contains next student ID)
			$("#txtid").val(jdata);				//append ID to textbox
		}
	});		
	
	//loads province list to combo box
	$.get("controllers/controller_student.php?type=get_province",function(data,status){
		if(status=="success"){					//if request responds with success status
			//alert(data);
			$("#txtpro").append(data);	
		}	
		
	});
	
		//loads province list to MY combo box
	$.get("controllers/controller_student.php?type=get_province",function(data,status){
		if(status=="success"){					//if request responds with success status
			//alert(data);
			$("#txtpro2").append(data);	
		}	
		
	});

			//loads province list to city combo
	$.get("controllers/controller_student.php?type=get_city",function(data,status){
		if(status=="success"){					//if request responds with success status
			//alert(data);
			$("#txtcity").append(data);	
		}	
		
	});


	//collect inputs and pass it to controller_student page as AJAX request
	$("#btnsave").click(function(){		
		f= new FormData($("#form_studentRegistration")[0]);
		$.ajax({
		   url:"controllers/controller_student.php?type=save",
		   method:"POST",
		   data:f,
		   processData: false,
		   contentType: false,
		   success: function(data){
			   alert(data);
			   //load success message 
			   if(data=="success"){
					//$('#form_studentRegistration')[0].reset();
					//loads new student registration form
					$("#content").load("views/form_student.php");
				}
			} 
		}); 
	});
	

		//--MY--collect inputs and pass it to controller_student page as AJAX request
	$("#btnsave2").click(function(){		
		f= new FormData($("#form_studentRegistration")[0]);
		$.ajax({
		   url:"controllers/controller_student.php?type=save",
		   method:"POST",
		   data:f,
		   processData: false,
		   contentType: false,
		   success: function(data){
			   alert(data);
			   //load success message 
			   if(data=="success"){
					//$('#form_studentRegistration')[0].reset();
					//loads new student registration form
					$("#content").load("views/form_student.php");
				}
			} 
		}); 
	});

	//click function for clear button
	$("#btnclear").click(function(){	
		//loads new student registration form
		$("#content").load("views/form_student.php");
	});
});
