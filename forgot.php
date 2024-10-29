<!-- Lee Kai Mun -->
<?php 
session_start();
$error = array();

require "mail.php";

	if(!$conn = mysqli_connect("localhost","root","","loa_music_website")){

		die("could not connect");
	}

	$mode = "enter_email";
	if(isset($_GET['mode'])){
		$mode = $_GET['mode'];
	}

	//something is posted
	if(count($_POST) > 0){

		switch ($mode) {
			case 'enter_email':
				// code...
				$email = $_POST['email'];
				//validate email
				if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
					$error[] = "Please enter a valid email";
				}elseif(!valid_email($email)){
					$error[] = "That email was not found";
				}else{

					$_SESSION['forgot']['email'] = $email;
					send_email($email);
					header("Location: forgot.php?mode=enter_code");
					die;
				}
				break;

			case 'enter_code':
				// code...
				$code = $_POST['code'];
				$result = is_code_correct($code);

				if($result == "the code is correct"){

					$_SESSION['forgot']['code'] = $code;
					header("Location: forgot.php?mode=enter_password");
					die;
				}else{
					$error[] = $result;
				}
				break;

			case 'enter_password':
				// code...
				$password = $_POST['password'];
				$password2 = $_POST['password2'];

				if($password !== $password2){
					$error[] = "Passwords do not match";
				}elseif(!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])){
					header("Location: forgot.php");
					die;
				}else{
					
					save_password($password);
					if(isset($_SESSION['forgot'])){
						unset($_SESSION['forgot']);
					}

					header("Location: login.php");
					die;
				}
				break;
			
			default:
				// code...
				break;
		}
	}

	function send_email($email){
		
		global $conn;

		//Code will expire after one minute
		$expire = time() + (60 * 1);
		$code = rand(10000,99999);
		$email = addslashes($email);

		$query = "insert into codes (email,code,expire) value ('$email','$code','$expire')";
		mysqli_query($conn,$query);

		//send email here
		send_mail($email,'Password reset',"Hi, we are received a password reset request from you. Here is your code: " . $code);
	}
	
	function save_password($password){
		
		global $conn;

		//$password = password_hash($password, PASSWORD_DEFAULT);
		$email = addslashes($_SESSION['forgot']['email']);

		$query = "update users set password = '$password' where email = '$email' limit 1";
		mysqli_query($conn,$query);

	}
	
	function valid_email($email){
		global $conn;

		$email = addslashes($email);

		$query = "select * from users where email = '$email' limit 1";		
		$result = mysqli_query($conn,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				return true;
 			}
		}

		return false;

	}

	function is_code_correct($code){
		global $conn;

		$code = addslashes($code);
		$expire = time();
		$email = addslashes($_SESSION['forgot']['email']);

		$query = "select * from codes where code = '$code' && email = '$email' order by id desc limit 1";
		$result = mysqli_query($conn,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_assoc($result);
				if($row['expire'] > $expire){

					return "the code is correct";
				}else{
					return "the code is expired";
				}
			}else{
				return "the code is incorrect";
			}
		}

		return "the code is incorrect";
	}

	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Forgot</title>
    <link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="../IP_Assignment/assets/css/bootstrap5.min.css">

</head>

<body>


		<!-- 3 form follow step-by-step that let user to change their password when forgot -->
		<?php 

			switch ($mode) {
				case 'enter_email':
					// code...
					?>
					<div class="py-5">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-md-5">
							
							<div class="card">
								<div class="card-header">
									<h1>Forgot Password</h1>
									<h7>Enter your email below</h7>
								</div>
								<div class="card-body">

									<form method="post" action="forgot.php?mode=enter_email"> 
										<span style="font-size: 14px;color:red;">
										<?php 
											foreach ($error as $err) {
												// code...
												echo $err . "<br>";
											}
										?>
										</span>
										<div class="form-group mb-3">
											<input class="textbox" type="email" name="email" placeholder="Email address...">
										<!--<br style="clear: both;">-->
										</div>
										<div class="form-group mb-3">
											<input type="submit" value="Next">
										</div>
										<div><a href="login.php">Back to login</a></div>
									</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
					<?php				
					break;

				case 'enter_code':
					// code...
					?>
					<div class="py-5">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-md-5">
							
							<div class="card">
								<div class="card-header">
									<h1>Forgot Password - OTP code</h1>
									<h7>The code had sent to your email. Check it within one minute.</h7>
								</div>
								<div class="card-body">
								<form method="post" action="forgot.php?mode=enter_code"> 
									
									<span style="font-size: 14px;color:red;">
									<?php 
										foreach ($error as $err) {
											// code...
											echo $err . "<br>";
										}
									?>
									</span>
									<div class="form-group mb-3">
										CODE: <input class="textbox" type="text" name="code" placeholder="Eg.12345">
										<br style="clear: both;">
									</div>
									<div class="form-group mb-3">
										<input type="submit" value="Next" style="float: right;">
									</div>
									<a href="forgot.php">
										<input type="button" value="Start Over">
									</a>
									<div><br><a href="login.php">Back to login</a></div>
								</form>
								</div>
								</div>
							</div>
						</div>
					</div>
					</div>
					<?php
					break;

				case 'enter_password':
					// code...
					?>
					<div class="py-5">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-md-5">
							
							<div class="card">
								<div class="card-header">
									<h1>Forgot Password - Reset Password</h1>
									<h7>Enter your new password</h7>
								</div>
								<div class="card-body">
								<form method="post" action="forgot.php?mode=enter_password"> 
									
									<span style="font-size: 14px;color:red;">
									<?php 
										foreach ($error as $err) {
											// code...
											echo $err . "<br>";
										}
									?>
									</span>
									<div class="form-group mb-3">
										<input class="password" type="text" name="password" placeholder="Password"><br><br>
										<input class="password" type="text" name="password2" placeholder="Retype Password"><br>
									<!--<br style="clear: both;">-->
									</div>
									<div class="form-group mb-3">
										<input type="submit" value="Next" style="float: right;">
									</div>
									<a href="forgot.php">
										<input type="button" value="Start Over">
									</a>
									
									<div><br><a href="login.php">Back to login</a></div>
								</form>
								</div>
								</div>
							</div>
						</div>
					</div>
					</div>
					<?php
					break;
				
				default:
					// code...
					break;
			}

		?>


</body>
</html>