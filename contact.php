<?php
session_start();
include 'dbconnect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>BESTIES - Blog</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="assets/css/style.css">
   
    


-->
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

    <!-----content----->
    <div class="content">
        <div class="welcome">
        <div class="container">
          <div class="rowblog">
              <div class="text-content">
                <h1>Blog Bestie</h1>
                <h3>Temukan artikel favoritmu </h3>
              </div>
            </div>
          </div>
        </div>
      </div>

          <!-----offer----->
    <div class="offer">
        <div class="small-container">
            <div class="rowblog">
                <div class="col-2">
                    <img src="assets/img/kucing2.png" class="offer-img">
                </div>
                <div class="col-2">
                    <p><strong>Menjaga kesehatan hewan peliharaan</strong></p>
                    <h1><strong> Kucing Persia</strong></h1>
                    <small>Sebenarnya, tidak sulit untuk melatih kucing menjadi penurut. Tapi dengan syarat PetLovers tau tipsnya dan sabar dalam menerapkan tips tersebut. Apa saja yang harus PetLovers lakukan jika ingin membuat kucing jadi penurut?
                    </small>
                    <br>
                    <br>
                    <a href="" class="btn">Read More &#8594;</a>
                </div>
            </div>
        </div>
    </div>
      

        <!-------Blog------>
<div class="small-container">
    <h2 class="title">Blog Bestie</h2>
    <div class="row">
        <div class="col-4">
            <img src="assets/img/gambar1.jpg">
        </div>
        <div class="col-4">
            <h4><b>Anjing menjadi akrab dengan majikan</b></h4>
            <p>Anjing menjadi akrab dengan majikan</h1>
                <p>Jika anjing peliharaan tampak ketakutan atau enggan berada di dekat Anda,
                fokuskan diri untuk memperbaiki hubungan Anda dengannya. Pastikan ia berada di lingkungan 
                yang aman dengan membangun ruang yang aman dan nyaman untuknya di rumah. </p>
        </div>
        <a href="blog content.html" class="btn">Read More &#8594;</a>
    </div>

    <div class="row">
        <div class="col-4">
            <img src="assets/img/gambar2.jpg">
        </div>
        <div class="col-4">
            <h4><b>Cara menjadikan kucing penurut</b></h4>
            <p>Sebenarnya, tidak sulit untuk melatih kucing menjadi penurut. Tapi dengan syarat PetLovers tau tipsnya dan sabar dalam menerapkan tips tersebut. Apa saja yang harus PetLovers lakukan jika ingin membuat kucing jadi penurut?</p>
        </div>
        <a href="blog content2.html" class="btn">Read More &#8594;</a>
    </div>
    <br>
    <br>
</div>

    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Become Our Bestie!</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Surabaya, Indonesia
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">085746431180</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">besties@gmail.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Shop</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Semua</a></li>
                        <li><a class="text-decoration-none" href="#">Kucing</a></li>
                        <li><a class="text-decoration-none" href="#">Anjing</a></li>
                        
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Info</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Home</a></li>
                        <li><a class="text-decoration-none" href="#">About Us</a></li>
                        <li><a class="text-decoration-none" href="#">Shop</a></li>
                        <li><a class="text-decoration-none" href="#">News</a></li>
                        
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        
                    </ul>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">Email address</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email address">
                        <div class="input-group-text btn-success text-light">Subscribe</div>
                    </div>
                </div>
            </div>
        </div>

        
    </footer>
    <!-- End Footer -->

<!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>