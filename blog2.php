<!DOCTYPE html>
<html lang="en">
<head>
<title>Cara menjadikan kucing penurut</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/blog-content 1 .css">

</head>
<body>

<!-- Start Top Nav -->
<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">besties@gmail.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">085746431180</a>
                    <?php
				            if(!isset($_SESSION['log'])){
				        	echo '';
				            } else {
                            echo '
                                <i class="fa fa-user mx-2"></i>
                                <a class="navbar-sm-brand text-light text-decoration-none" href="">Hi, <b>'.$_SESSION["name"].'</b></a>
                            ';
					        					
				            }
				    ?>

                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.php">
                <img src="assets/img/logo.png" width="250px">
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
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
                        <li class="nav-item">
                            <a class="nav-link" href="daftarorder.php">Daftar Order</a>
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
                </div>

                <?php

                            $totalItems=0;
                            
				            if(isset($_SESSION['log'])){

                            $query="select SUM(qty) totalitems from cart inner join detailorder on detailorder.orderid=cart.orderid INNER JOIN produk ON produk.idproduk=detailorder.idproduk where userid='".$_SESSION['id']."' and status='Cart'";
                            
                            $items = mysqli_query($conn,$query);

                            while($p=mysqli_fetch_array($items)){
                                
                                    $totalItems=$p['totalitems'];
                                }

				        	
				            } 
				    ?>
                    <div class="navbar align-self-center d-flex">
                    <a class="nav-icon position-relative text-decoration-none" href="cart.php">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <?php

                        if($totalItems>0)
                        {
                            echo '
                            <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">'.$totalItems.'</span>
                            ';
                        }

                        ?>
                    </a>
                </div>
                
            </div>

        </div>
    </nav>
    <!-- Close Header -->
<div>
        <div>
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
