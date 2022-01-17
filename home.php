<?php

session_start();

require './connection.php';

if(!isset($_SESSION['id']))
{
    header("location:login.php");
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
<title>Super Market an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
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
<!-- header -->
<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p>SALE UP TO 70% OFF. USE CODE "SALE70%" . <a href="home.php">SHOP NOW</a></p>
			</div>
			<div class="agile-login">
				<ul>
					<li><a href="changepassword.php">Change password</a></li>
					<li><a href="logout.php">Logout</a></li>
					<li><a href="contact.php">Help</a></li>
					
				</ul>
			</div>
			<div class="product_list_header">  
					<form action="#" method="post" class="last"> 
						<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="display" value="1">
						<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
					</form>  
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
		<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : (079) 398 30 134</li>
					
				</ul>
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="home.php">super Market</a></h1>
			</div>
		<div class="w3l_search">
			<form method="get">
				<input type="search" name="search" placeholder="Search for a Product..." required="">
				<button type="submit" class="btn btn-default search" aria-label="Left Align">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
				<div class="clearfix"></div>
			</form>
		</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->

<!-- navigation -->
<!-- navigation -->
<?php
	require './themeportion/menu.php';

?>
<!-- //header -->
	
	<!-- //top-header and slider -->
	<!-- top-brands -->
							<?php
							if(isset($_GET['cid']))
								{
                                    $cid=$_GET['cid'];
                                    $psq = mysqli_query($con,"select * from tbl_product where category_id='{$cid}'")or die("error PSQ".mysqli_error($con));
                                }elseif(isset($_GET['search']))
								{
									$search = $_GET['search'];
									$psq = mysqli_query($con,"select * from tbl_product where product_name like '%{$search}%'")or die("error PSQ".mysqli_error($con));
								}
								else
                                {
                                    $psq = mysqli_query($con,"select * from tbl_product")or die("error PSQ".mysqli_error($con));
                                }
									$count = mysqli_num_rows($psq);
									
                                   ?>
	<div class="top-brands">
		<div class="container">
		<h2><?php echo "$count Items Display"; ?></h2>
			<div class="grid_3 grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
							
							<div class="agile_top_brands_grids">
                                <?php

                                    while($pfr = mysqli_fetch_array($psq))
                                    {

                                    
                                
                                ?>
								<div class="col-md-4 top_brand_left">
									<div class="hover14 column">
										<div class="agile_top_brand_left_grid">
											
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<?php echo "<a href=''><img style='width: 100px; height: 100px;' src='{$pfr['product_image']}'></a>";?>		
															<p><?php echo $pfr['product_name'] ?></p>
															<div class="stars">
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<i class="fa fa-star gray-star" aria-hidden="true"></i>
															</div>
															<h4><?php 
                                                            $oldprice = $pfr['product_price']+300;
                                                            echo "<del>Rs .{$oldprice}</del><h4>Rs .{$pfr['product_price']}</h4>";
                                                            ?>
														</div>
														<div class="snipcart-details top_brand_home_details">
															<form method="get" action="singleprodisplay.php">
																<fieldset>
																	<input type="hidden" name="pid" value="<?php echo $pfr['product_id'] ?>">
																<input type="submit" value="More Info" class="button" />
																</fieldset>
															</form>
														</div>
													</div>
												</figure>
											</div>
										</div>
									</div>
								</div>
								<?php   }  ?>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //top-brands -->

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