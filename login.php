<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<?php include_once 'helper/template/include.php'; ?>
</head>
<body>
	<?php include_once 'helper/template/header.php'; ?>
	<?php  
		if( isset($_SESSION["username"]) )
		{
			header("Location: ./index.php");
		}
	?>
	<div class="container text-center login">
    	<div class="container">
	        <div class="card card-container">
	            <img id="profile-img" class="profile-img-card" src="public/image/asset/avatar_2x.png" />
	            <p id="profile-name" class="profile-name-card"></p>
	            <form class="form-signin" method="POST" action="./controller/doLogin.php">
					<input type="text" name="txtUsername" id="inputUsername" class="form-control" placeholder="Username" value="">
					<input type="password" name="txtPassword" id="inputUsername" class="form-control" placeholder="Password"value="">
	                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Login</button>
	            </form>
	            <div class="errorMessage">
					<p style="color: red;"> 
					<?php
						if( isset($_SESSION["error"]) )
						{
							echo $_SESSION["error"];
							session_unset();
						}
					?>
				</p>
	        	</div>
	        </div>
        </div>
	</div>
	
	<?php include_once 'helper/template/footer.php'; ?>
</body>
</html>