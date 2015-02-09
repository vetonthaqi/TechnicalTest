@extends('layouts.master')

@section('head')
	@parent
	<title>Products</title>
@stop

@section('content')

@if(Auth::check() && Auth::user()->isAdmin())

<div>
	<a href="#" class="btn btn-default" data-toggle="modal" data-target="#product_form">Add Product</a>
</div>

@endif

@foreach($products as $product)
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="clearfix">
				<h3 class="panel-title pull-left"> Product No: {{$product->id}} </h3>
				<a id="{{ $product->id }}" href="#" data-toggle="modal" data-target="#product_delete" class="btn btn-danger btn-xs pull-right delete_product">Delete</a>
			</div>
		</div>
		
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<td>Name</td>
					<td>Description</td>
					<td>Quantity</td>
					<td>Buying Price</td>
					<td>Selling Price</td>
				</tr>
			</thead>
			
			<tbody>
				<tr>
					<td> {{$product->product_name}} </td>
					<td> {{$product->description}} </td>
					<td> {{$product->quantity}} </td>
					<td> {{$product->buying_price}} </td>
					<td> {{$product->selling_price}} </td>
				</tr>
			</tbody>

		</table>
	</div>
@endforeach

@if(Auth::check() && Auth::user()->isAdmin())

<div class="modal fade" id="product_form" tabindex="-1" role="dialog" aria-hidden="true">
	<div class ="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">New Product</h4>
			</div>
			<div class="modal-body">
				<form id="target_form" method="post" action=" {{URL::route('it-store-product')}} ">
					<div class="form-group {{($errors->has('product_name')) ? ' has-error' : ''}} ">
						<label for="product_name">Product Name</label>
						<input type="text" id="product_name" name="product_name" class="form-control">
						@if($errors->has('product_name'))
							<p> {{ $errors->first('product_name') }} </p>
						@endif
					</div>
					<div class="form-group {{($errors->has('description')) ? ' has-error' : ''}}">
						<label for="description">Description</label>
						<input type="text" id="description" name="description" class="form-control">
						@if($errors->has('description'))
							<p> {{ $errors->first('description') }} </p>
						@endif
					</div>
					<div class="form-group {{($errors->has('quantity')) ? ' has-error' : ''}}">
						<label for="quantity">Quantity</label>
						<input type="text" id="quantity" name="quantity" class="form-control">
						@if($errors->has('quantity'))
							<p> {{ $errors->first('quantity') }} </p>
						@endif
					</div>
					<div class="form-group {{($errors->has('buying_price')) ? ' has-error' : ''}}">
						<label for="buying_price">Buying Price</label>
						<input type="text" id="buying_price" name="buying_price" class="form-control">
						@if($errors->has('buying_price'))
							<p> {{ $errors->first('buying_price') }} </p>
						@endif
					</div>
					<div class="form-group {{($errors->has('selling_price')) ? ' has-error' : ''}}">
						<label for="selling_price">Selling Price</label>
						<input type="text" id="selling_price" name="selling_price" class="form-control">
						@if($errors->has('selling_price'))
							<p> {{ $errors->first('selling_price') }} </p>
						@endif
					</div>
					{{Form::token()}}
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="form_submit">Save</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="product_delete" tabindex="-1" role="dialog" aria-hidden="true">
	<div class ="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Delete Product</h4>
			</div>
			<div class="modal-body">
				<h3>Are you sure you want to delete this product?</h3>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a href="#" type="button" class="btn btn-primary" id="btn_delete_product">Delete</a>
			</div>
		</div>
	</div>
</div>

@endif

@stop

@section('javascript')
	@parent
	<script type="text/javascript" src="/js/app.js"></script>
	@if(Session::has('modal'))
		<script type="text/javascript">
			$("{{Session::get('modal')}}").modal('show');
		</script>
	@endif
@stop
