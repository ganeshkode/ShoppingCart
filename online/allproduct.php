<?php
include("connection.php");

$sql="create table if not exists allproduct
(
	srno int not null auto_increment,
	name text,
	photo text, 
	price text,
	primary key(srno)
);";
$conn->query($sql);

if(isset($_POST['add_tohomepage']))
{
	$product_name=$_POST['name'];
	$product_photo=$_FILES['photo']['name'];
	$product_price=$_POST['price'];

	$name=md5(rand()).'.'.$product_photo;
	$upload="allproduct/".$name;

	move_uploaded_file($_FILES['photo']['tmp_name'],$upload);

	$sql1="insert into allproduct(name,photo,price) values('$product_name','$upload','$product_price')";
	$conn->query($sql1);

	header("location:admin.php");
}
else
{
	echo "error occured";
}
?>