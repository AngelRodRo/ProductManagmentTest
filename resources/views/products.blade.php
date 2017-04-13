<!DOCTYPE html>
<html>
<head>
	<title>Products Management</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	<h1>Products</h1>
	<div class="row">
		<form class="form">
			<div class="col-md-12">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>Quantity</label>
					<input type="number" name="quantity" class="form-control">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>Price</label>
					<input type="number" class="form-control" step="any" name="price">
				</div>
			</div>
			<div class="col-md-12">
				<button class="btn btn-primary" type="submit">Add a new product</button>
			</div>
		</form>
	</div>
	</div>
</body>
</html>