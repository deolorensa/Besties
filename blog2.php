<!DOCTYPE html>
<html lang="en">
<head>
<title>Cara menjadikan kucing penurut</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/blog-content 1 .css">

</head>
<body>

<!----header------>
<div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img src="assets/img/logo.png" width="250px">
            </div>
            <nav>
            <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.php">News</a>
                        </li>
                        <?php
				            if(!isset($_SESSION['log'])){
				        	echo '
					        <li class="nav-item"><a class="nav-link" href="registered.php"> Daftar</a></li>
					        <li class="nav-item"><a class="nav-link" href="login.php">Masuk</a></li>
					        ';
				            } else {
					
//<li class="nav-item">Halo, '.$_SESSION["name"].'</li>

					        if($_SESSION['role']=='Member'){
					        echo '<li class="nav-item"><a class="nav-link" href="logout.php">Keluar?</a></li>';
					        } else {
					        echo '
				        	<li class="nav-item"><a class="nav-link" href="admin">Admin Panel</a></li>
					        <li class="nav-item"><a class="nav-link" href="logout.php">Keluar?</a></li>
					        ';
				        	};
					
				            }
				            ?>
                        

                    </ul>
            </nav>
            <img src="images/cart.png" width="30px">
           
        </div>
</div> 

<div class="row">
  <div class="column side" style="background-color:#fff;">
</div>
  <div class="column middle" style="background-color:#fff;">
 <img src= "assets/img/gambar2.jpg">
 <h1>Cara menjadikan kucing penurut</h1>
 <p>Sebenarnya, tidak sulit untuk melatih kucing menjadi penurut. Tapi dengan syarat PetLovers tau tipsnya dan sabar dalam menerapkan tips tersebut. Apa saja yang harus PetLovers lakukan jika ingin membuat kucing jadi penurut?</p>
 <p>Cara melatih kucing yang terakhir adalah dengan menggunakan bunyi-bunyian. PetLovers juga dapat menggunakan bunyi-bunyian ketika mendapati kucing sedang bandel.

    Misalnya ketika kucing menggigit dan menyakar, gunakan suara nyaring seperti misalnya tepukan tangan yang keras atau suara mendesis agar kucing menjadi kaget dan berhenti. Dengan melakukan hal ini, kucing akan mengerti konsekuensi bandel dan tidak melakukannya lagi di kemudian hari.</p>
 <p>Jika kucing melakukan hal yang PetLovers benci, ada baiknya melatih kucing untuk menghindari perilaku tersebut. Contohnya ialah ketika kucing menggaruk furnitur di rumah hingga rusak. Hal pertama yang harus PetLovers lakukan ialah menemukan alasan mengapa kucing melakukan perilaku tersebut.
</p>
</div>
  <div class="column side" style="background-color:#fff;"></div>
</div>
</div>

<div class="footer">
    <p>Bestie</p>
    <p>Contact-081909087877</p>
    <p>Sawonggiling, Surabaya, Jawa Timur, Indonesia</p>
</div>

</body>
</html>
