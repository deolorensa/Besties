<?php
session_start();
include 'dbconnect.php';


$idkategori='';

if(!empty($_GET['idkategori']))
{
	$idkategori=$_GET['idkategori'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>BESTIES Shop - Product Listing Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<!--
    

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

    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4">Categories</h1>
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Animals
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul class="collapse show list-unstyled pl-3">
                            <?php 
                                    $kat=mysqli_query($conn,"SELECT * from kategori order by idkategori ASC");
                                    while($p=mysqli_fetch_array($kat)){

                            ?>
                                    <li><a class="text-decoration-none" href="shop.php?idkategori=<?php echo $p['idkategori'] ?>"><?php echo $p['namakategori'] ?></a></li>
                                                                            
                            <?php
                            }
                            ?>
                            
                        </ul>
                    
                </ul>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                </div>
                <div class="row">
                    <?php 
                    
                    $query='SELECT * from produk where idkategori='.$idkategori.' order by idproduk ASC';
                    if (strlen($idkategori)==0) {
                        $query='SELECT * from produk order by idproduk ASC';
                      }        

                    $brgs=mysqli_query($conn,$query);
                    while($p=mysqli_fetch_array($brgs)){
                    ?>
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <a href="shop.php?idproduk=<?php echo $p['idproduk'] ?>"> <img class="card-img rounded-0 img-fluid" src="<?php echo $p['gambar']?>"></a>
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                            <li><a class="btn btn-success text-white mt-2" href="shop-single.php?idproduct=<?php echo $p['idproduk'] ?>"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="shop-single.php?idproduct=<?php echo $p['idproduk'] ?>" class="h3 text-decoration-none"><?php echo $p['namaproduk'] ?></a>
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                        <div class="rating1">
                                            <span class="starRating">
                                                <?php
                                                    $bintang = '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
                                                    $rate = $p['rate'];
                                        
                                                    for($n=1;$n<=$rate;$n++){
                                                        echo '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
                                                    };
                                                ?>
                                            </span>
                                        </div>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-center mb-1">
                                        <li></li>
                                    </ul>
                                    <h4><span>Rp<?php echo number_format($p['hargabefore']) ?></span></h4>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>                   
                </div>
<!--                 
                <div class="row">
                    <ul class="pagination pagination-lg justify-content-pages">
                        <li class="page-item disabled">
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">3</a>
                        </li>
                    </ul>
                </div> -->
            </div>

        </div>
    </div>
    <!-- End Content -->

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
                        <li><a class="text-decoration-none" href="shop.php">Semua</a></li>
                        <li><a class="text-decoration-none" href="shop.php">Kucing</a></li>
                        <li><a class="text-decoration-none" href="shop.php">Anjing</a></li>
                        
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Info</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="index.php">Home</a></li>
                        <li><a class="text-decoration-none" href="about.php">About Us</a></li>
                        <li><a class="text-decoration-none" href="shop.php">Shop</a></li>
                        <li><a class="text-decoration-none" href="blog.php">News</a></li>
                        
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

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>