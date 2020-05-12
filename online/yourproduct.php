<!DOCTYPE html>
<html>
<head>
	<title>Your Product</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Proceed to buy</title>
</head>
<body>
<h1>Welcome To The Shopping Mart</h1>
<div id="header">
	<span id="page">Proceed to buy</span>
	<button class="button1"><a href="index.php">Home</a></button>
</div>
</body>
</html>
<?php
include("connection.php");

$sql="select * from buy";
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
		<input type="hidden" name="photo" value='.$product_photo.'>
		<button id="button3" type="submit" name="deletefrom_buytable">delete product</button>
		<button id="button4" disabled>buy</button>
		</form>
		</div>
		';
	}
	echo "</div>";
}
?>
