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
			<form class="form product-form">
		    	{{ csrf_field() }}

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
		<br>
		<br>


		<div class="row">
			<h2>List products</h2>
			<div class="col-md-12">
				<table class="table">
					<thead>
						<th>ID</th>
						<th>Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Total</th>
						<th>Actions</th>
					</thead>
					<tbody>
						@foreach ($products as $product)
							<tr>
							<td>{{$product->id}} </td>
							<td>{{$product->name}} </td>
							<td>{{$product->quantity}} </td>
							<td>{{$product->price }}</td>
							<td>{{$product->total}}</td>
							<td>
								<a href="" class="btn btn-primary">Edit</a>
								<a href="" class="btn btn-danger">Delete</a>
							</td>
							</tr>
						@endforeach
					</tbody>
				</table>

			</div>

		</div>
	</div>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		
		$(function() {
			$(".product-form").submit(function(e) {
				e.preventDefault();
				e.stopPropagation();

				var data = $(this).serialize();

				$.ajax({
					data: data,
					type:'POST',
					success:function(response) {
						alert('Product registered! ');
					}
				});

			})

		})

	</script>
</body>
</html>