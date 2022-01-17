<?php

session_start();

$qty=$_GET['qty'];
$pid=$_GET['pid'];

if(isset($_SESSION['productcart']))
{

    $currentno=$_SESSION['counter']+1;
    $_SESSION['qtycart'][$currentno]=$qty;
    $_SESSION['productcart'][$currentno]=$pid;
    $_SESSION['counter']=$currentno;
}else
{
    $qtycart=array();
    $productcart=array();

    $_SESSION['qtycart'][0]=$qty;
    $_SESSION['productcart'][0]=$pid;

    $_SESSION['counter']=0;
}
header('location:viewcart.php');

?>