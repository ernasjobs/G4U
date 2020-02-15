<?php
require 'config.php';
/* 
if btnSubmit is clicked we will make a query to database with
username and password that is being provided.
if number of row returned is equals to one then we check role attribute,
if role is equals to 'admin' we are pointing to admin panel otherwise
to  homepage
*/
if(isset($_POST['btnSubmit'])){
    $textUsername=$_POST['txtUsername'];
    $textPassword=$_POST['txtPass'];
    $stmt=$pdo ->prepare('SELECT * FROM Employee WHERE staffId=? AND password=?');
    $stmt ->execute([$textUsername,$textPassword]);
    $num_rows = $stmt->rowCount();
    if($num_rows==1)
    {
        $query=$stmt->fetch();
        if($query['jobTitle']=="Sales Assistant"){
            header("Location:saleasssitant.php");
   } 
    else if ($query['jobTitle']=="Senior Sales") {
           header("Location:seniorsales.php");
        } 
        else if ($query['jobTitle']=="Assistant QA Control") {
            header("Location:qacontrol.php");
         } 
         else if ($query['jobTitle']=="Manager") {
            header("Location:manager.php");
         }
    }
    else
    {
      $message="The username or password is incorrect!";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>G4U - Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form action="index.php" method="post" class="login100-form validate-form">
					<span class="login100-form-title">
						Staff Login
                    </span>
                    <span class="login100-form-message">
						<?php if(isset($message)) echo $message; ?>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="txtUsername" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="txtPass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" name="btnSubmit" class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="text-center p-t-20">
						<a class="txt2" href="admin.php">
							Go to Head Office Page
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>