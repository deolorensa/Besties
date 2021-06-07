<?php
session_start();
include 'dbconnect.php';

$idproduct=0;

if(!empty($_GET['idproduct']))
{
	$idproduct=$_GET['idproduct'];
}

if(isset($_POST['addtoCart']))
	{
		$idproduk = $_POST['idproduk'];
		$qty = $_POST['qtyProduct'];
			  
        $query="select * from cart where userid=".$_SESSION['id']." and status='Cart'";
        $tblCart=mysqli_query($conn,$query);

        $idCart=0;
        $orderid='';

        while($p=mysqli_fetch_array($tblCart)){                                
            $idCart=$p['idcart'];
            $orderid=$p['orderid'];
        }

        if($idCart==0)
        {

            $orderid=uniqid();

            $addCart=mysqli_query($conn,"insert into cart (userid, orderid, tglorder, status) 
            values('".$_SESSION['id']."','$orderid',now(),'Cart')");

            if($addCart)
            {
                $addItems=mysqli_query($conn,"insert into detailorder (orderid, idproduk, qty) values('$orderid','$idproduk','$qty')");

                if ($addItems){

                }

            }else
            {



            }
		
	    }else
        {
            $query="select * from detailorder where orderid='$orderid' and idproduk='$idproduk'";
            $itemCart=mysqli_query($conn,$query);

            $detailid=0;

            while($p=mysqli_fetch_array($itemCart)){                                
                $detailid=$p['detailid'];
            }

            if($detailid==0)
            {                
                $query="insert into detailorder(orderid,idproduk,qty) values('$orderid','$idproduk','$qty')";
                $insertCart=mysqli_query($conn,$query);
            }else
            {
                $query="update detailorder set qty=qty+$qty where orderid='$orderid' and idproduk='$idproduk'";
                $updateCart=mysqli_query($conn,$query);

            }
        }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>BESTIES Shop - Product Detail Page</title>
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

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
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
					
					        if($_SESSION['role']=='Member'){
					        echo '
					        <li class="nav-item"><a class="nav-link" href="logout.php">Keluar?</a></li>
				        	';
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

    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <?php

                $idproduct=0;

                if(!empty($_GET['idproduct']))
                {
                    $idproduct=$_GET['idproduct'];
                }else{
                    
                }

                $query='SELECT * from produk where idproduk='.$idproduct.'';
                $brgs=mysqli_query($conn,$query);
                while($p=mysqli_fetch_array($brgs)){
                ?>
                    <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="<?php echo $p['gambar']?>" alt="Card image cap" id="product-detail">
                    </div>
                </div>
                <div class="col-lg-7 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="h2"><?php echo $p['namaproduk']?></h1>
                                    <p class="h3 py-2">Rp<?php echo number_format($p['hargabefore']) ?></p>
                                    <p class="py-2">
                                        <?php
                                        $ratenya=$p['rate'];

                                        for($n=1;$n<=$ratenya;$n++){
                                            echo '<i class="fa fa-star text-warning"></i>';
                                        };

                                        for($n=1;$n<=5-$ratenya;$n++){
                                            echo '<i class="fa fa-star text-secondary"></i>';
                                        };
                                        ?>
                                        
                                        
                                        <span class="list-inline-item text-dark">Rating <?php echo $ratenya; ?></span>
                                    </p>

                                    <h6>Description:</h6>
                                    <p><?php echo $p['deskripsi']?></p>

                            <form action="" method="POST">
                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Quantity
                                                <input name="qtyProduct" id="qtyProduct" value="1">
                                                <input type="hidden" id="idproduk" name="idproduk" value="<?php echo $idproduct;?>">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button type="submit" name="addtoCart" class="btn btn-lg">Add To Cart</button>
                                        
                                    </div>
                                </div>
                            </form>

                        </div>
                <?php }
                ?>
                
            </div>
        </div>
    </section>
    <!-- Close Content -->

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
    <script src="assets/js/berhasil.js"></script>
    <!-- End Script -->

    <!-- Start Slider Script -->
    <script src="assets/js/slick.min.js"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>
    <!-- End Slider Script -->

</body>

</html>