<?php
include("connection.php");

$sql="create table if not exists buy
(
	srno int not null auto_increment,
	name text,
	photo text, 
	price text,
	primary key(srno)
);";
$conn->query($sql);

if(isset($_POST['buy']))
{
	$product_name=$_POST['name'];
	$product_photo=$_POST['photo'];
	$product_price=$_POST['price'];

	$sql1="insert into buy(name,photo,price) values('$product_name','$product_photo','$product_price')";
	$conn->query($sql1);

	$sql2="delete from addtocart where photo='$product_photo'";
	$conn->query($sql2);

	header("location:addtocart.php");
	exit;
}

if(isset($_POST['delete']))
{
	$product_photo=$_POST['photo'];

	$sql2="delete from addtocart where photo='$product_photo'";
	$conn->query($sql2);

	header("location:addtocart.php");
	exit;
}

if(isset($_POST['deletefrom_buytable']))
{
	$product_photo=$_POST['photo'];

	$sql2="delete from buy where photo='$product_photo'";
	$conn->query($sql2);

	header("location:yourproduct.php");
	exit;
}
?>