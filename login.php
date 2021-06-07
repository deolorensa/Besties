<?php
session_start();

if(!isset($_SESSION['log'])){
	
} else {
	header('location:index.php');
};

include 'dbconnect.php';
date_default_timezone_set("Asia/Bangkok");
$timenow = date("j-F-Y-h:i:s A");

	if(isset($_POST['login']))
	{
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$pass = mysqli_real_escape_string($conn,$_POST['pass']);
	$queryuser = mysqli_query($conn,"SELECT * FROM login WHERE email='$email'");
	$cariuser = mysqli_fetch_assoc($queryuser);
		
		if( password_verify($pass, $cariuser['password']) ) {
			$_SESSION['id'] = $cariuser['userid'];
			$_SESSION['role'] = $cariuser['role'];
			$_SESSION['notelp'] = $cariuser['notelp'];
			$_SESSION['name'] = $cariuser['namalengkap'];
			$_SESSION['log'] = "Logged";
			header('location:index.php');
		} else {
			echo 'Username atau password salah';
			header("location:login.php");
		}		
	}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Petshop</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <script defer type="text/javascript" src="assets/js/popup.js"> </script>
</head>

<body>


    
<!----form login-->
                <div class="center">
                    <h1>LOGIN</h1>
                    <form class="" method="post">
                    <div class="text_field">
                        <input type="text" name="email" required>
                        <span></span>
                        <label for="Email">Email</label>
                    </div>

                    <div class="text_field">
                        <input type="password" name="pass" required>
                        <span></span>
                        <label for="Password">Password</label>
                    </div>
                    <input type="submit" name="login" value="Login">

                    <div class="signup"> Belum punya akun?
                        <a href="registered.php">Sign Up</a>
                    </div>
                    </form>
                </div>
           
        </div>
    </div>
    
</body>
</html>