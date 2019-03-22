@extends('admin.main')

@section('title', '|Admin products')

@section('content')

	<div class="content-wrapper">
		<section class="content-header">
			<h1>products</h1>
		</section>

		
		<div class="row container">
		<div class="col-md-8">
			<h1>All products</h1>
		</div>
		<div class="col-md-3">
			<a href="{{ route('products.create') }}" class="btn btn-block btn-primary btn-spacing"> Create New products</a>
		</div>
		<div class="col-md-1"></div>
		</div>

		<section class="content container-fluid">

      		<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>title</th>
					<th>Price </th>
					<th>List_price </th>
					<th>Description </th>
					<th>Quantity </th>
					<th>Brand </th>
					<th>Created At</th>
					<th></th>
				</thead>

				 <tbody>
				 	
				 	@foreach ($product as $products)

				 	<tr>
				 		<th>{{ $products->id }}</th>
				 		<td>{{ $products->title }}</td>
				 		<td>{{ '$ '.$products->price  }}</td>
				 		<td>{{ '$ '.$products->list_price }}</td>
				 		<td>{{ $products->description }}</td>
				 		<td>{{ $products->sizes }}</td>
				 		<td>{{ $products->brand }}</td>
				 		<td>{{ date('M j, Y',strtotime($products->created_at)) }}</td>
				 		<td><a href="{{ route('products.show', $products->id) }}" class="btn btn-info btn-sm">View</a> <a id="get" href="{{ route('products.edit', $products->id) }}" class="btn btn-success btn-sm">Edit</a></td>
				 	</tr>

				 	@endforeach
				 </tbody>
			</table>

			<div class="text-center">
				{!! $product->links(); !!}
			</div>
		</div>
	</div>

    	</section>
	</div>

@endsection