<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $userid=$_SESSION['vrmsuid'];
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $mobilenumber=$_POST['mobnum'];
    $location=$_POST['location'];
    $bdate=$_POST['bookingdate'];
    $rdate=$_POST['returndate'];
$vid=$_GET['viewid'];
  $query2=mysqli_query($con,"SELECT * FROM `tblbookingcar` where ('$bdate' BETWEEN date(BookingDate) and date(ReturnDate) || '$rdate' BETWEEN date(BookingDate) and date(ReturnDate) || date(BookingDate) BETWEEN '$bdate' and '$rdate') and VehicleID='$vid'");
$num=mysqli_num_rows($query2);
if($num==0){
$bookingnumber = mt_rand(100000000, 999999999);
$query1=mysqli_query($con,"insert into  tblbookingcar(VehicleID,Userid,FullName,Email,MobileNumber,Location,BookingDate,ReturnDate,BookingNumber) value('$vid','$userid','$fullname','$email','$mobilenumber','$location','$bdate','$rdate','$bookingnumber')");
        if ($query1) {
 echo '<script>alert("Your vehicle hsa been book successfully . Your Booking number is "+"'.$bookingnumber.'")</script>';
echo "<script>window.location.href='car-details.php'</script>";
  }
  else
    {
echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
} else {
echo '<script>alert("Vehicle not available on these days")</script>';

}


  
}

?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    
    <title>Vehicle Rental Management System - Car Detail</title>

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

    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Our Cars</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                <?php
 $cid=$_GET['viewid'];
$ret=mysqli_query($con,"select * from tblvehiclecar where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <div class="col-lg-8">
                    <div class="car-details-content">
                        <h2><?php echo $row['VehicleName'];?><span class="price">Rent: <b><?php echo $row['RentalPrice'];?>/day</b></span></h2>
                        <div class="car-preview-crousel">
                            <div class="single-car-preview">
                                <img src="assets/img/car/car-5.jpg" alt="JSOFT">
                            </div>
                            <div class="single-car-preview">
                                <img src="admin/images/<?php echo $row['Image'];?>" width="400" height='100'>
                            </div>
                            <div class="single-car-preview">
                                <img src="admin/images/<?php echo $row['Image1'];?>" width="400" height='100'>
                            </div>
                        </div>
                        <div class="car-details-info">
                            <h4>Additional Info</h4>
                            <p><?php echo $row['VehicleDescription'];?>.</p>

                            <div class="technical-info">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="tech-info-table">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Class</th>
                                                    <td><?php echo $row['Class'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Fuel</th>
                                                    <td><?php echo $row['Fuel'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Doors</th>
                                                    <td><?php echo $row['Doors'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>GearBox</th>
                                                    <td><?php echo $row['GearBox'];?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="tech-info-list">
                                            <ul>
                                                <li><?php if($row['ABS']=='Yes'){?>
<img src="assets/img/check.png" width="12" height="12">
<?php } else { ?>
    <img src="assets/img/close.png" width="12" height="12">               
<?php } ?>    ABS</li>
                                                <li><?php if($row['AirBags']=='Yes'){?>
<img src="assets/img/check.png" width="12" height="12">
<?php } else { ?>
    <img src="assets/img/close.png" width="12" height="12">               
<?php } ?>Air Bags</li>
                                                <li><?php if($row['Bluetooth']=='Yes'){?>
<img src="assets/img/check.png" width="12" height="12">
<?php } else { ?>
    <img src="assets/img/close.png" width="12" height="12">               
<?php } ?> Bluetooth</li>
                                                <li><?php if($row['CarKit']=='Yes'){?>
<img src="assets/img/check.png" width="12" height="12">
<?php } else { ?>
    <img src="assets/img/close.png" width="12" height="12">               
<?php } ?>Car Kit</li>
                                                <li><?php if($row['GPS']=='Yes'){?>
<img src="assets/img/check.png" width="12" height="12">
<?php } else { ?>
    <img src="assets/img/close.png" width="12" height="12">               
<?php } ?> GPS</li>
<li><?php if($row['Music']=='Yes'){?>
<img src="assets/img/check.png" width="12" height="12">
<?php } else { ?>
    <img src="assets/img/close.png" width="12" height="12">               
<?php } ?> Music</li>
                                                <li><?php if($row['Bluetooth']=='Yes'){?>
<img src="assets/img/check.png" width="12" height="12">
<?php } else { ?>
    <img src="assets/img/close.png" width="12" height="12">               
<?php } ?> Bluetooth</li>
                                                <li><?php if($row['ABS']=='Yes'){?>
<img src="assets/img/check.png" width="12" height="12">
<?php } else { ?>
    <img src="assets/img/close.png" width="12" height="12">               
<?php } ?>ABS</li>
                                                <li> <?php if($row['GPS']=='Yes'){?>
<img src="assets/img/check.png" width="12" height="12">
<?php } else { ?>
    <img src="assets/img/close.png" width="12" height="12">               
<?php } ?> GPS</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- Car List Content End -->

                <!-- Sidebar Area Start -->
                <div class="col-lg-4">
                    <div class="sidebar-content-wrap m-t-50">
                        <!-- Single Sidebar Start -->
                        <div class="single-sidebar">
                            <h3>For More Informations</h3>

                            <?php 
 $query=mysqli_query($con,"select * from  tblpage where PageType='contactus'");
 while ($row=mysqli_fetch_array($query)) {


 ?>
                            <div class="sidebar-body">
                                <p><i class="fa fa-mobile"></i> +<?php  echo $row['MobileNumber'];?></p>
                                <p><i class="fa fa-envelope"></i> <?php  echo $row['Email'];?></p>
                            </div>
                        </div>
                         <?php } ?>
                        <!-- Single Sidebar End -->


                        <!-- Single Sidebar Start -->
                        <div class="single-sidebar">
                            <h3>Connect with Us</h3>

                            <div class="sidebar-body">
                                <div class="social-icons text-center">
                                    <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <a href="#" target="_blank"><i class="fa fa-behance"></i></a>
                                    <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                                    <a href="#" target="_blank"><i class="fa fa-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php if($_SESSION['vrmsuid']==0)
{ ?>
                        <div class="single-sidebar">
                            <h3>Book Now</h3>

                            <div class="sidebar-body">
                                <div class="social-icons text-center">
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="name-input">
                                    <input type="text" placeholder="Full Name" required="true" name="fullname" class="form-control">
                                                </div>
                                            </div>

                                            
                                        </div>
                                        <div class="row">
                                        <div class="col-lg-12 col-md-12" style="padding-top: 20px">
  <div class="email-input">
 <input type="email" placeholder="Email Address"required="true" name="email" class="form-control">
 </div>
</div>
</div>
        <div class="row">
<div class="col-lg-12 col-md-6" style="padding-top: 20px">
<div class="email-input">
<input type="text" placeholder="Mobile Number" maxlength="10" pattern="[0-9]+" required="true" name="mobnum" class="form-control">
</div>
</div>
 </div>

<div class="row">
<div class="col-lg-12 col-md-6" style="padding-top: 20px">
<div class="email-input">
<textarea type="text" placeholder="Pick Up Location" required="true" name="location" class="form-control"></textarea>
</div>
</div>
</div>
  
<div class="pick-up-date book-item" style="padding-top: 10px">
From Date    
<input type="date" id="startDate" placeholder="Pick Up Date" name="bookingdate" required="true" />

<div class="return-car">
To Date
<input type="date" id="endDate" placeholder="Return Date" name="returndate" required="true" />
</div>
</div>
 
 <div class="input-submit">
<?php if($_SESSION['vrmsuid']==""){?>
<button type="submit" name="submit"><a href="login.php">Book Now</a></button>
<?php } else {?>


                                            <button type="submit" name="submit">Book Now</button>
                                         <?php }?>
                                            <button type="reset">Clear</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php } else {
                            //If user is logged in
$uid=$_SESSION['vrmsuid'];
$sqlq=mysqli_query($con,"select * from tbluser where ID='$uid'");
while($ret=mysqli_fetch_array($sqlq))
{
$fname=$ret['FirstName'];
$lname=$ret['LastName'];
$uemail=$ret['Email'];
$mnumebr=$ret['MobileNumber'];
} 
?>
<div class="single-sidebar">
                            <h3>Book Now</h3>

                            <div class="sidebar-body">
                                <div class="social-icons text-center">
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="name-input">
                                                    <input type="text" required="true" name="fullname" value="<?php echo $fname;?> <?php echo $lname;?>" class="form-control">
                                                </div>
                                            </div>

                                            
                                        </div>
                                        <div class="row">
                                        <div class="col-lg-12 col-md-12" style="padding-top: 20px">
                                                <div class="email-input">
                                                    <input type="email" required="true" name="email" value="<?php echo $uemail;?>" class="form-control">
                                                </div>
                                            </div>

                                           </div>

                                      <div class="row">
                                        <div class="col-lg-12 col-md-6" style="padding-top: 20px">
                                                <div class="email-input">
                                                    <input type="text" value="<?php echo $mnumebr;?>" maxlength="10" pattern="[0-9]+" required="true" name="mobnum" class="form-control">
                                                </div>
                                            </div>
                                         </div>
                                          <div class="row">
                                        <div class="col-lg-12 col-md-6" style="padding-top: 20px">
                                                <div class="email-input">
                                                    <textarea type="text" placeholder="Pick Up Location" required="true" name="location" class="form-control"></textarea>
                                                </div>
                                            </div>
                                           </div>
                            <div class="datepicker" style="padding-top: 10px">
From Date                                     
<input type="date" id="startDate" placeholder="Pick Up Date" name="bookingdate" date-format="yyyy-mm-dd" required="true" />

<div class="return-car">
To Date    
<input type="date" id="endDate" placeholder="Return Date" name="returndate" date-format="yyyy-mm-dd" required="true" />
</div>
</div>
                                        <div class="input-submit">
<?php if($_SESSION['vrmsuid']==""){?>
<button type="submit" name="submit"><a href="login.php">Book Now</a></button>
<?php } else {?>


                                            <button type="submit" name="submit">Book Now</button>
                                         <?php }?>
                                            <button type="reset">Clear</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- Single Sidebar End -->
                    </div>
                </div>
                <!-- Sidebar Area End -->
            </div>
        </div>
    </section>
    <!--== Car List Area End ==-->

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