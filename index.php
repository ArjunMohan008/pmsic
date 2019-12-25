
<html>

<script type="text/javascript" src="/pmsic/assets/js/jquery.js"></script>
<script type="text/javascript" src="/pmsic/assets/js/bootstrap.min.js"></script>
	<body>

		<form action="" method="POST">
			<div class="login-box">
				<div class="textbox">
	
					<input type="text" name="user" id="user" placeholder="Username"><br>
				</div>
				<div>
					<input type="password" name="pwd" id="pwd" placeholder="Password"><br>
				</div>
					<input type="button" name="submit" value="Login" id="sub">
			</div>
		</form>

	</body>	
		<script type="text/javascript">
				$(document).ready(function(){
					$("#sub").click(function(){//save button in Contact info form
					var user=$("#user").val();
					var pwd=$("#pwd").val();
					//alert(user, pwd)
					$.post("controllers/login.php",{user:user,pwd:pwd},function(data,status){
						alert(data);
						if(data==1){
							alert("Invalid Username or Password");
						}
						if (data==2){
							alert("Your account has been deactivated.Contact your administartor.");
						}
						if (data==3){
							window.location.href="controllers/route.php";
						}

					 });
				});
			});
  		</script>
</html>
