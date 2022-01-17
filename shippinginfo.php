<?php

session_start();

require './connection.php';

if($_POST)
{
    $name=$_POST['name'];
    $mb=$_POST['mb'];
    $address=$_POST['address'];
    $currentdate=date("d-m-Y");
    $uid=$_SESSION['id'];

    $orderq=mysqli_query($con,"insert into tbl_order (order_date,order_status,user_id,shippingname,shippingmobile,shippingaddress) values('{$currentdate}','pending','{$uid}','{$name}','{$mb}','{$address}')")or die(mysqli_error($con));

    $orderid=mysqli_insert_id($con);

    foreach($_SESSION['productcart'] as $key=>$value){

        $productq=mysqli_query($con,"select * from tbl_product where product_id='{$value}'")or die(mysqli_error($con));

        $productfr=mysqli_fetch_array($productq);
        $qty=$_SESSION['qtycart'][$key];

        $orderdetailsq=mysqli_query($con,"insert into tbl_order_details (order_id,product_id,product_qty,product_price) values('{$orderid}','{$value}','{$qty}','{$productfr['product_price']}')")or die(mysqli($con));
    }

    echo "<script>alert('Thanks For Order !');window.location='viewcart.php';</script>";

    unset($_SESSION['productcart']);
    unset($_SESSION['qtycart']);
    unset($_SESSION['counter']);

}


?>
<html>
<body>
    <form method="post">
    Name <input type="text" name="name">
    <br>
    Mobile <input type="number" name="mb">
    <br>
    Address <textarea name="address"></textarea>
    <br>
    <input type="submit">
</form>
</body>
</html>