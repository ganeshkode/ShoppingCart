<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>cart</title>
</head>
<body>
	<h1>Welcome To The Shopping Mart</h1>
<div id="header">
	<span id="page">Your Cart Products</span>
	<button class="button1"><a href="index.php">Home</a></button>
	<button class="button3"><a href="yourproduct.php">Your Product</a></button>
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

if(isset($_POST['add_tocart']))
{
	$product_name=$_POST['name'];
	$product_photo=$_POST['photo'];
	$product_price=$_POST['price'];

	$sql1="insert into addtocart(name,photo,price) values('$product_name','$product_photo','$product_price')";
	$conn->query($sql1);

	//header("location:index.php");
	exit;
}

$sql="select * from addtocart";
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

		<form method="post" action="decision.php">
		<input type="hidden" name="name" value='.$product_name.'>
		<input type="hidden" name="photo" value='.$product_photo.'>
		<input type="hidden" name="price" value='.$product_price.'>
		<button class="button2" type="submit" name="buy">buy</button>
		<button class="button2" type="submit" name="delete">delete</button>		
		</form>
		</div>
		';
	}
	echo "</div>";
}
?>