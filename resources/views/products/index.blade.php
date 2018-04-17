<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	
	<meta name="csrf_token" content="{{ csrf_token()}}"> 
	
	<link rel="stylesheet" href="">
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<button data-toggle="modal" data-target="#add" class="btn btn-primary" style="margin-top: 30px;">Add new</button>
		@yield('nam')
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Price</th>
						<th>Created_at</th>
						<th>Updated_at</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($products as $product )
					<tr>
						<td>{{ $product->id }}</td>
						<td>{{ $product->name }}</td>
						<td>{{ $product->price }}</td>
						<td>{{ $product->created_at->diffForHumans() }}</td>
						<td>{{ $product->updated_at->diffForHumans()  }}</td>
						<td>
							<button class="btn btn-xs btn-info" nam="{{ $product->id }}">Show</button>
							
							<button class="btn btn-xs btn-warning" data-toggle="modal" data-target='#edit-{{ $product->id }}'>Edit</button>
							
							<form onsubmit="return confirm('Do you really want to delete?')"; style="display: inline-block;" action="products/{{ $product->id }}" method="post" >

								{{csrf_field()}}
								{{method_field('delete')}}

								<button class="btn btn-xs btn-danger" type="submit">Delete</button>
								
							</form>
							
		<div class="modal fade" id="edit-{{ $product->id }}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Modal title</h4>
					</div>
					<div class="modal-body">
						<form action="{{asset('products/'.$product->id)}}" method="POST" role="form">
							
							{{csrf_field()}};
							{{method_field('put')}};
						
							<div class="form-group">
								<label for="">Name</label>
								<input type="text" class="form-control"  placeholder="name" value="{{$product->name}}" name="name">
							</div>

							<div class="form-group">
								<label for="">Price</label>
								<input type="text" class="form-control"  placeholder="Input field" value="{{$product->price}}" name="price">
							</div>
						
							<button type="submit" class="btn btn-primary">Update</button>
						</form>
					</div>
					
				</div>
			</div>
		</div>
		<div class="modal fade" id="add">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Add new</h4>
						</div>
						<div class="modal-body">
							<form id="add-new" role="form" method="post">
								
								{{csrf_field()}}
								<div class="form-group">
									<label for="">Name</label>
									<input type="text" class="form-control" id="name" placeholder="Name" name="name">
								</div>

								<div class="form-group">
									<label for="">Price</label>
									<input type="text" class="form-control" id="price" placeholder="price" name="price">
								</div>
								<button type="submit" id="remover" class="btn btn-primary">Save</button>
							</form>
						</div>
					</div>
				</div>
			</div>
					@endforeach
				</tbody>
			</table>
		</div>

		<div class="modal fade" id="show">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" style="text-align: center;">Chi tiết sản phẩm</h4>
					</div>
					<div class="modal-body">
						<div>
							<div class="table-responsive">
								<table class="table table-hover">
									<tbody>
										<tr>
											<td class="id-head">ID</td>
											<td class="td-content" id="product-id"></td>
										</tr>
										<tr>
											<td class="id-head">Name</td>	
											<td class="td-content" id="product-name"></td>
										</tr>
										<tr>									
											<td class="id-head">Price</td>	
											<td class="td-content" id="product-price"></td>
										</tr>
										<tr>
											<td class="id-head">Created_at</td>
											<td class="td-content" id="product-created-at"></td>
										</tr>
										<tr>
											<td class="id-head">Updated_at</td>
											<td class="td-content" id="product-updated-at"></td>
										</tr>
									</tbody>		
								</table>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

					
		</div>

	<script type="text/javascript">
		$(function() {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
				}
			});

			$('#add-new').on('submit', function(e){
				e.preventDefault();

				$.ajax({
					type: 'post',
					url: '{{route("products.store")}}',
					data: {
						name: $('#name').val(),
						price: $('#price').val()
					},
					success: function(response){
						console.log(response);
					},
					error: function (error) {
						console.log(error);
					},			
				})
			});
			$("#remover").on('click',function(){
				$('#add').modal('hide');
			});
			$(document).on('click', '.btn-info', function(){
				$('#show').modal('show');

				var id = $(this).attr('nam');

				$.ajax({
					type: 'get',
					url: '{{asset("")}}products/' + id,
					success: function(response){
						$('#product-id').text(response.id);
						$('#product-name').text(response.name);
						$('#product-price').text(response.price);
						$('#product-created-at').text(response.created_at);
						$('#product-updated-at').text(response.updated_at);
					}
				})	
			})

		})
	</script>
</body>
</html>