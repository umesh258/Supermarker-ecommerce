<?php

session_start();

require './connection.php';
if(!isset($_SESSION['id']))
{
	header("location:login.php");
}
if(isset($_POST['osubmit']))
{
    $date = date("d-m-Y");
    $uid = $_SESSION['id'];
    $name = $_POST['name'];
    $mob = $_POST['mob'];
    $address = $_POST['address'];

    $oiq = mysqli_query($con,"insert into tbl_order (order_date,order_status,user_id,shippingname,shippingmobile,shippingaddress)
     values('{$date}','Pending','{$uid}','{$name}','{$mob}','{$address}')")or die("Oiq".mysqli_error($con));

     $orderid=mysqli_insert_id($con);

     foreach($_SESSION['productcart'] as $key => $value)
     {
         $psq = mysqli_query($con,"select * from tbl_product where product_id='{$value}'")or die("error PSQ".mysqli_error($con));
         $pfr = mysqli_fetch_array($psq);
         $qty = $_SESSION['qtycart'][$key]; 
         
         $orderiq = mysqli_query($con,"insert into tbl_order_details(order_id,product_id,product_qty,product_price) 
         values('{$orderid}','{$value}','{$qty}','{$pfr['product_price']}')")or die("Error OrderIq".mysqli_error($con));

         
     }

     unset($_SESSION['productcart']);
     unset($_SESSION['qtycart']);
     unset($_SESSION['counter']);

     echo "<script>alert('Thanks For shopping with us!');window.location='checkout.php';</script>";
}

?>

<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Super Market an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Login :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->

<?php
    require './themeportion/header.php';
	

?>
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Shipping Info</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>Shipping Info</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form method = "post">
					<input type="text" name="name" placeholder="Name" required=" " >
					<input type="text" name = "mob" placeholder="Mobile" required=" " >
                    <textarea  name="address" placeholder="Address" required=" "></textarea>
						<input type="submit" name="osubmit" value="Order">
				</form>
			</div>
			
		</div>
	</div>
<!-- //login -->
<?php
	require './themeportion/footer.php';
?>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- top-header and slider -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
<!-- main slider-banner -->
<script src="js/skdslider.min.js"></script>
<link href="css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>	
<!-- //main slider-banner --> 

</body>
</html>