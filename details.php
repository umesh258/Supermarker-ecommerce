<?php

session_start();

require './connection.php';

$pid=$_GET['pid'];
$productq=mysqli_query($con,"select * from tbl_product where product_id='{$pid}'")or die(mysqli_error($con));

$productfr=mysqli_fetch_array($productq);

$oldprice=$productfr['product_price']+500;
echo "<h1>{$productfr['product_name']}</h1>";
echo "<img style='width: 150px;' src='{$productfr['product_image']}'>";
echo "<br><del>Rs.$oldprice </del>Rs.<b>{$productfr['product_price']}</b>";
echo "<br><br> <h3>Details:</h3>{$productfr['product_details']}";



?>
<form method="get" action="cart-process.php">
 <input type="hidden" name="pid" value="<?php echo $pid ?>">   
Qty <input type="number" name="qty" min="1" max="10">
<input type="submit" value="Add to cart">
</form>