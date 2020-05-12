<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>HomePage</title>
</head>
<body>
	<h1>Welcome To The Shopping Mart</h1>
<div id="header">
	<span id="page">HomePage</span>
	<button class="button3"><a href="yourproduct.php">Your Product</a></button>
	<button class="button1"><a href="addtocart.php">cart</a></button>
</div>
</body>
</html>

<?php
include("connection.php");

$sql="create table if not exists addtocart
(
	srno int not null auto_increment,
	name text,
	photo text, 
	price text,
	primary key(srno)
);";
$conn->query($sql);

$sql1="create table if not exists buy
(
	srno int not null auto_increment,
	name text,
	photo text, 
	price text,
	primary key(srno)
);";
$conn->query($sql1);

$sql2="create table if not exists allproduct
(
	srno int not null auto_increment,
	name text,
	photo text, 
	price text,
	primary key(srno)
);";
$conn->query($sql2);

$sql="select * from allproduct";
$result=$conn->query($sql);
$count=$result->num_rows;

if($count>0)
{
	while($row=$result->fetch_array())
	{
		$productname[]=$row['name'];
		$productphoto[]=$row['photo'];
		$productprice[]=$row['price'];
	}
	echo "<div id='main'>";
	for($i=0;$i<$count;$i++)
	{
		$product_name=$productname[$i];
		$product_photo=$productphoto[$i];
		$product_price=$productprice[$i];

		echo'
		<div id="product">
		<br>
		<div id="name">
		'.$product_name.'
		</div>
		<br>
		<div id="photo">
		<img src="'.$product_photo.'">
		</div>
		<br>
		<div id="price">
		Price: '.$product_price.'
		</div>
		<br>

		<form method="post" action="addtocart.php">
		<input type="hidden" name="name" value='.$product_name.'>
		<input type="hidden" name="photo" value='.$product_photo.'>
		<input type="hidden" name="price" value='.$product_price.'>
		<button class="button2" type="submit" name="add_tocart">add to cart</button>
		</form>
		</div>
		';
	}
	echo "</div>";
}
?>