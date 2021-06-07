<?php
session_start();
if(!isset($_SESSION['log'])){
	
} else {
	header('location:index.php');
};
include 'dbconnect.php';

if(isset($_POST['adduser']))
	{
		$nama = $_POST['nama'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];
		$email = $_POST['email'];
		$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT); 
			  
		$tambahuser = mysqli_query($conn,"insert into login (namalengkap, email, password, notelp, alamat) 
		values('$nama','$email','$pass','$telp','$alamat')");
		if ($tambahuser){
		echo " <div class='alert alert-success'>
			Berhasil mendaftar, silakan masuk.
		  </div>
		<meta http-equiv='refresh' content='1; url= login.php'/>  ";
		} else { echo "<div class='alert alert-warning'>
			Gagal mendaftar, silakan coba lagi.
		  </div>
		 <meta http-equiv='refresh' content='1; url= registered.php'/> ";
		}
		
	};

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <head>
        <title>SignUp Petshop</title>
        <link rel="stylesheet" href="assets/css/signup.css">
        <meta charset="utf-8">
     <script defer type="text/javascript" src="assets/js/popup.js"> </script>
    </head>
    
    <body>
    
    
        

    <div class="center">
      <h1>SIGN UP</h1>
      <form class="" action="" method="post">
        <div class="text_field">
          <input type="text" name="nama" required>
          <span></span>
          <label for="Name">Username</label>
        </div>
        <div class="text_field">
          <input type="text" name="telp" required maxlength="13">
          <span></span>
          <label for="Nomor Telepon">Phone Number</label>
        </div>
        <div class="text_field">
          <input type="text" name="alamat" required >
          <span></span>
          <label for="Alamat Lengkap">Address</label>
        </div>

        <div class="text_field">
          <input type="email" name="email" required>
          <span></span>
          <label for="Email">Email</label>
        </div>
        <div class="text_field">
          <input type="password" name="pass" required>
          <span></span>
          <label for="Password">Password</label>
        </div>
        
        <button type="submit" name="adduser" id="btn" data-modal-target="#popup">Sign Up</button>
        
        <div class="signup"> Sudah punya akun?
          <a href="login.php">Login</a>
        </div>
      </form>
    </div>
    <div class="popup" id="popup">
      <div class="icon">
        <i class="fas fa-check"></i><br>
      </div>
      <div class="teks">
        <h1>SELAMAT AKUN ANDA BERHASIL TERDAFTAR</h1>
        <br>
        <p>Silahkan Login</p>  
      </div>
      <div class="button">
        <button data-close-button class="close-button" type="submit"><a href="login.php">Login</a></button> 
      </div>
    </div> 
    <div id="overlay"></div>
  </body>
</html>



