@extends('admin.main')

@section('title', '|Admin brands')

@section('content')

	<div class="content-wrapper">
		<section class="content-header">
			<h1>Brands</h1>
		</section>

		
		<div class="row container">
		<div class="col-md-8">
			<h1>All Brands</h1>
		</div>
		<div class="col-md-3">
			<a href="{{ route('brands.create') }}" class="btn btn-block btn-primary btn-spacing"> Create New Brands</a>
		</div>
		<div class="col-md-1"></div>
		</div>

		<section class="content container-fluid">

      		<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Brand Name</th>
					<th>Brand Icon</th>
					<th>Created At</th>
					<th></th>
				</thead>

				 <tbody>
				 	
				 	@foreach ($brands as $brand)

				 	<tr>
				 		<th>{{ $brand->id }}</th>
				 		<td>{{ $brand->brand }}</td>
				 		<td>{{ Html::image('icons/'. $brand->icon, 'alt IMG-PRODUCT',  array('class' => 'img', 'width' => '50', 'height' => '50')) }}</td>
				 		<td>{{ date('M j, Y',strtotime($brand->created_at)) }}</td>
				 		<td><a href="{{ route('brands.show', $brand->id) }}" class="btn btn-info btn-sm">View</a> <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-success btn-sm">Edit</a></td>
				 	</tr>

				 	@endforeach
				 </tbody>
			</table>

			<div class="text-center">
				{!! $brands->links(); !!}
			</div>
		</div>
	</div>

    	</section>
	</div>

@endsection