<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['vrmsuid']==0)) {
  header('location:logout.php');
  } else{

  
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    
    <title>Vehicle Rental Management System || Four Wheeler Booking Detail</title>

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
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+700+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
    
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
                        <h2>Booking Deatails of #<?php echo $bid=$_GET['bookingid'];?></h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>

                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Contact Page Area Start ==-->
    <div class="contact-page-wrao section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="contact-form">
<?php  $bid=$_GET['bookingid'];?> 



 <div class="row">
 <div class="col-lg-12">
<?php
//Getting Url


// Getting order Details
$userid= $_SESSION['vrmsuid'];
$ret=mysqli_query($con,"select BookingDate,Status,CreationDate from tblbookingcar where UserId='$userid' and BookingNumber='$bid'");
while($result=mysqli_fetch_array($ret)) {
?>

<table class="table table-bordered" >
<tr>
<th>Booking Number</th>
<td><?php echo $bid?></td>
</tr>

<tr>
<th>Booking Date</th>
<td><?php echo $od=$result['CreationDate'];?></td>
</tr>

<tr>
<th>Booking Status</th>
<td><?php if($result['Status']==""){
    echo "Not Response Yet";
} else {
echo $result['Status'];
}?> </td>
</tr>
</table>




<?php } ?>

<p>
 <a href="javascript:void(0);" onClick="popUpWindow('fw-invoice.php?invid=<?php echo $bid;?>');" title="Booking Invoice"  class="btn btn-primary btn-sm">  Invoice</a></p>


 </div>
 </div> 

<div class="row" style="margin-top:1%">
 <div class="col-lg-12">

        <?php 
 $query=mysqli_query($con,"select DATEDIFF(tblbookingcar.ReturnDate,tblbookingcar.BookingDate) as ddf,tblvehiclecar.Image,tblvehiclecar.VehicleName,tblvehiclecar.RentalPrice,tblbookingcar.FullName,tblbookingcar.BookingNumber,tblbookingcar.BookingDate,tblbookingcar.ReturnDate,tblbookingcar.TotalCost,tblbookingcar.Remark,tblbookingcar.Status,tblbookingcar.RemarkDate,tblbookingcar.CreationDate from tblvehiclecar join tblbookingcar on tblvehiclecar.ID=tblbookingcar.VehicleID where tblbookingcar.Userid='$userid' and tblbookingcar.BookingNumber=$bid");
$num=mysqli_num_rows($query);
if($num>0){
    $cnt=1;

?>
<table class="table table-bordered" >

    <?php   
while ($row=mysqli_fetch_array($query)) {
    ?>
    <tr>

<th>From  Date</th>
<td><?php echo $row['BookingDate'];?></td>
<th>To  Date</th>
<td><?php echo $row['ReturnDate'];?></td>





</tr>




<tr>
<th>Vehicle Name</th>    
<td><?php echo $row['VehicleName'];?></td>  

<th>Vehicle Image</th>  
<td>
<img class="b-goods-f__img img-scale" src="admin/images/<?php echo $row['Image'];?>" alt="<?php echo $row['Image'];?>" width='300' height='250'></td>

</tr>
<tr>
<th>Rental Price</th>  
<td><?php echo $rpice=$row['RentalPrice'];?>  </td> 
<th>Total Price</th>  
<td>Rs. <?php
$d1=$row['ddf'];;

 echo $total=$d1*$rpice;?></td>
 <?php 
                    }        
 ?> 
</td>
    
</tr>
<?php } ?>

</table>

<p>


 
    <p style="color:red">
        <a href="four-wheeler-booking.php" title="Back" style="color:red">Back </a>
    </p>


                </div>
            </div>         </div>
                </div>
            </div>
        </div>
    </div>
    <!--== Contact Page Area End ==-->

   
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
<?php }  ?>