<?php

session_start();
require './connection.php';

if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        unset($_SESSION['productcart'][$id]);
        unset($_SESSION['qtycart'][$id]);

    }
    
if(isset($_SESSION['productcart']) && !empty($_SESSION['productcart']))
{
    
    
echo "<table border='1'>";
echo "<h1>Add To Cart Items</h1>";
echo "<tr>";
echo "<th>#</th>";
echo "<th>Name</th>";
echo "<th>Qty</th>";
echo "<th>Price</th>";
echo "<th>Image</th>";
echo "<th>Subtotal</th>";
echo "<th>Action</th>";
echo "</tr>";
$i=0;
$grandtotal=array();
foreach($_SESSION['productcart'] as $key=>$value){
    $i++;
    $productq=mysqli_query($con,"select * from tbl_product where product_id='{$value}'")or die(mysqli_error($con));

    $productfr=mysqli_fetch_array($productq);
    $qty=$_SESSION['qtycart'][$key];
    $subtotal = $productfr['product_price']*$qty;
    echo "<tr>";
    echo "<td>$i</td>";
    echo "<td>{$productfr['product_name']}</td>";
    echo "<td>$qty</td>";
    echo "<td>Rs .{$productfr['product_price']}</td>";
    echo "<td><img style='width:50px;' src='{$productfr['product_image']}'></td>";
    echo "<td>$subtotal</td>";
    echo "<td><a href='?id={$key}'>Remove</a></td>";
    echo "</tr>";
    $grandtotal[]=$subtotal;
}
$finalsum=array_sum($grandtotal);
echo "<tr>";
echo "<td colspan='7' align='right'>Total : <b>{$finalsum}</b></td>";
echo "</tr>"; 
echo "</table>";
echo "<a href='home.php'>Buy Products</a>";
}else
{
    echo "<a href='home.php'>Buy Products</a>";
    echo "Cart Is Empty";
}
if(isset($_SESSION['id']))
{
    echo " | <a href='shippinginfo.php'>CheckOut</a>";
}else
{
    echo "<a href='login.php'>Please Login</a>";
}
?>