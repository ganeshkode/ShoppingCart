<!DOCTYPE html>
<html>
<head>
	<title>Admin page</title>
</head>
<body>
	<fieldset>
		<legend>Add Product to HomePage</legend>
		<form method="post" action="allproduct.php" enctype="multipart/form-data">
			<label>Product Name</label>
			<input type="text" name="name">
			<br>
			<br>
			<label>Product Image</label>
			<input type="file" name="photo" accept="image/*"/>
			<br>
			<br>
			<label>Product Price</label>
			<input type="text" name="price">
			<br>
			<br>
			<button type="post" name="add_tohomepage">Add to HomePage</button>
		</form>
	</fieldset>
</body>
</html>