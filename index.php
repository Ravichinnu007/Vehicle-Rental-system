<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    

    <title>Vehicle Rental Management System - Home Page</title>

    <!--=== Bootstrap CSS ===-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="assets/css/plugins/slicknav.min.css" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="assets/css/plugins/magnific-popup.css" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="assets/css/plugins/owl.carousel.min.css" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="assets/css/plugins/gijgo.css" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="assets/css/reset.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="style.css" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="assets/css/responsive.css" rel="stylesheet">


    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="loader-active">

    <!--== Preloader Area Start ==-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="assets/img/preloader.gif" alt="JSOFT">
            </div>
        </div>
    </div>
    <!--== Preloader Area End ==-->

    <?php include_once('includes/header.php');?>
    <!--== Header Area End ==-->

    <!--== Slider Area Start ==-->
    <section id="slider-area">
        <!--== slide Item One ==-->
        <div class="single-slide-item overlay">
            <div class="container">
                <div class="row" style="margin-top:15%">
             

                    <div class="col-lg-12 text-right">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <div class="slider-right-text">
                                    <h1>BOOK A Vehicle TODAY!</h1>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--== slide Item One ==-->
    </section>
    <!--== Slider Area End ==-->

    <!--== About Us Area Start ==-->
    <section id="about-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <?php 
 $query=mysqli_query($con,"select * from  tblpage where PageType='aboutus'");
 while ($row=mysqli_fetch_array($query)) {


 ?>
                        <h2><?php  echo $row['PageTitle'];?></h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <!-- About Content Start -->
                <div class="col-lg-6">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <div class="about-content">
                                <p><?php  echo $row['PageDescription'];?></p>

                                <div class="about-btn">
                                    <a href="about.php">About Us</a>
                                    <a href="contact.php">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- About Content End -->

                <!-- About Video Start -->
                <div class="col-lg-6">
                    
                        <img src="assets/img/car/cars-two-wheeler-launching-july-2018.jpg" alt="JSOFT">
                   
                </div>
                
            </div>
        </div>
    </section>
    <!--== About Us Area End ==-->

    

    <!--== Fun Fact Area Start ==-->
    <section id="funfact-area" class="overlay section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 col-md-12 m-auto">
                    <div class="funfact-content-wrap">
                        <div class="row">
                            <!-- Single FunFact Start -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-funfact">
                                    <div class="funfact-icon">
                                        <i class="fa fa-smile-o"></i>
                                    </div>
                                    <div class="funfact-content">
                                        <?php $query1=mysqli_query($con,"Select * from tblvehicle");
$totaltwowheeler=mysqli_num_rows($query1);
?>
                                        <p><span class="counter"><?php echo $totaltwowheeler;?></span>+</p>
                                        <h4>Total Two Wheeler</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Single FunFact End -->

                            <!-- Single FunFact Start -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-funfact">
                                    <div class="funfact-icon">
                                        <i class="fa fa-car"></i>
                                    </div>
                                    <div class="funfact-content">
                                        <?php $query6=mysqli_query($con,"Select * from tblvehiclecar");
$totalfw=mysqli_num_rows($query6);
?>
                                        <p><span class="counter"><?php echo $totalfw;?></span>+</p>
                                        <h4>Total Four Wheeler</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Single FunFact End -->

                            <!-- Single FunFact Start -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-funfact">
                                    <div class="funfact-icon">
                                        <i class="fa fa-bank"></i>
                                    </div>
                                    <div class="funfact-content">
                                        <?php $query3=mysqli_query($con,"Select * from tblbrand");
$totbrand=mysqli_num_rows($query3);
?>
                                        <p><span class="counter"><?php echo $totbrand;?></span>+</p>
                                        <h4>Total Brands</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Single FunFact End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Fun Fact Area End ==-->

    <!--== Choose Car Area Start ==-->
    <section id="choose-car" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Choose your Vehicle</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <!-- Choose Area Content Start -->
                <div class="col-lg-12">
                    <div class="choose-content-wrap">
                        <!-- Choose Area Tab Menu -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#popular_cars" role="tab" aria-selected="true">Four Wheeler</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#newest_cars" role="tab" aria-selected="false">Two Wheeler</a>
                            </li>
                            
                        </ul>
                        <!-- Choose Area Tab Menu -->

                        <!-- Choose Area Tab content -->
                        <div class="tab-content" id="myTabContent">
                            <!-- Four Wheelers Tab Start -->

                            <div class="tab-pane fade show active" id="popular_cars" role="tabpanel" aria-labelledby="home-tab">
                               
                                <!-- Popular Cars Content Wrapper Start -->
                                <div class="popular-cars-wrap">
                                     
                                    <!-- PopularCars Tab Content Start -->
                                    <div class="row popular-car-gird" style="padding-top: 20px">
                                        <?php
                                $query=mysqli_query($con,"select * from tblvehiclecar");
 while ($row=mysqli_fetch_array($query)) {


 ?>
                                        <div class="col-lg-4 col-md-6 con suv mpv">

                                            <div class="single-popular-car">
                                                <div class="p-car-thumbnails">
                                                    <a class="car-hover" href="admin/images/<?php echo $row['Image'];?>">
                                                      <img src="admin/images/<?php echo $row['Image'];?>" alt="JSOFT">
                                                   </a>
                                                </div>

                                                <div class="p-car-content">
                                                    <h3>
                                                        <a href="single-car-details.php?viewid=<?php echo $row['ID'];?>"><?php echo $row['VehicleName'];?></a>
                                                        <span class="price"><i class="fa fa-tag"></i> <?php echo $row['RentalPrice'];?>/day</span>
                                                    </h3>

                                                    <h5><?php echo substr($row['VehicleDescription'],0,100);?></h5>

                                                    <div class="p-car-feature">
                                                        <ul class="car-info-list">
<li>Seating Capacity:<?php echo $row['SeatingCapacity'];?></li>
<li>Fuel:<?php echo $row['Fuel'];?></li>
 
                                                </ul>
                                                <a href="single-car-details.php?viewid=<?php echo $row['ID'];?>" class="rent-btn">More info</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Four Wheeler End -->

                              <?php } ?>
                                       
                                    </div>
                                    
                                </div>
                                
                            </div>
                           
                            <!-- Two Wheeler Tab Start -->
                            <div class="tab-pane fade" id="newest_cars" role="tabpanel" aria-labelledby="profile-tab">
                                <!-- Newest Cars Content Wrapper Start -->
                                <div class="popular-cars-wrap">
                                   
                                   
                                    <div class="row newest-car-gird" style="padding-top: 20px">
                                       <?php
                                       $query=mysqli_query($con,"select * from tblvehicle");
 while ($row=mysqli_fetch_array($query)) {


 ?>
                                        <div class="col-lg-4 col-md-6 tata audi">
                                            <div class="single-new-car">
                                                <div class="p-car-thumbnails">
                                                    <a class="car-hover" href="admin/images/<?php echo $row['Image'];?>">
                                                      <img src="admin/images/<?php echo $row['Image'];?>" alt="JSOFT">
                                                   </a>
                                                </div>

                                                <div class="p-car-content">
                                                    <h3>
                                                        <a href="single-twowheeler-details.php?viewid=<?php echo $row['ID'];?>"><?php echo $row['VehicleName'];?></a>
                                                        <span class="price"><i class="fa fa-tag"></i> <?php echo $row['RentalPrice'];?>/day</span>
                                                    </h3>

                                                    <h5><?php echo substr($row['VehicleDescription'],0,200);?></h5>

                                                    <div class="p-car-feature">
                                                       <a href="single-twowheeler-details.php?viewid=<?php echo $row['ID'];?>" class="rent-btn">More info</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       

                                       <?php } ?>
                                    </div>
                                    
                                </div>
                             
                            </div>
                            

                        </div>
                       
                    </div>
                </div>
                <!-- Choose Area Content End -->
            </div>
        </div>
    </section>
    <!--== Choose Car Area End ==-->



   <?php include_once('includes/footer.php');?>
    <!--== Scroll Top Area Start ==-->
    <div class="scroll-top">
        <img src="assets/img/scroll-top.png" alt="JSOFT">
    </div>
    <!--== Scroll Top Area End ==-->

    <!--=======================Javascript============================-->
    <!--=== Jquery Min Js ===-->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <!--=== Jquery Migrate Min Js ===-->
    <script src="assets/js/jquery-migrate.min.js"></script>
    <!--=== Popper Min Js ===-->
    <script src="assets/js/popper.min.js"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--=== Gijgo Min Js ===-->
    <script src="assets/js/plugins/gijgo.js"></script>
    <!--=== Vegas Min Js ===-->
    <script src="assets/js/plugins/vegas.min.js"></script>
    <!--=== Isotope Min Js ===-->
    <script src="assets/js/plugins/isotope.min.js"></script>
    <!--=== Owl Caousel Min Js ===-->
    <script src="assets/js/plugins/owl.carousel.min.js"></script>
    <!--=== Waypoint Min Js ===-->
    <script src="assets/js/plugins/waypoints.min.js"></script>
    <!--=== CounTotop Min Js ===-->
    <script src="assets/js/plugins/counterup.min.js"></script>
    <!--=== YtPlayer Min Js ===-->
    <script src="assets/js/plugins/mb.YTPlayer.js"></script>
    <!--=== Magnific Popup Min Js ===-->
    <script src="assets/js/plugins/magnific-popup.min.js"></script>
    <!--=== Slicknav Min Js ===-->
    <script src="assets/js/plugins/slicknav.min.js"></script>

    <!--=== Mian Js ===-->
    <script src="assets/js/main.js"></script>

</body>

</html>