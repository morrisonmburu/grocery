@extends('admin.main')

@section('title', '|Admin categories')

@section('content')

	<div class="content-wrapper">
		<section class="content-header">
			<h1>categories</h1>
		</section>

		
		<div class="row container">
		<div class="col-md-8">
			<h1>All categories</h1>
		</div>
		<div class="col-md-3">
			<a href="{{ route('categories.create') }}" class="btn btn-block btn-primary btn-spacing"> Create New categories</a>
		</div>
		<div class="col-md-1"></div>
		</div>

		<section class="content container-fluid">

      		<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>category Name</th>
					<th>Status </th>
					<th>Category Icon</th>
					<th>Created At</th>
					<th></th>
				</thead>

				 <tbody>
				 	
				 	@foreach ($category as $categories)

				 	<tr>
				 		<th>{{ $categories->id }}</th>
				 		<td>{{ $categories->category }}</td>
				 		<td>{{ Html::image('icons/'. $categories->icon, 'alt IMG-PRODUCT',  array('class' => 'img', 'width' => '50', 'height' => '50')) }}</td>
				 		@if ($categories->parent == 0)
				 		<td>parent</td>
				 		@else
				 		<td>Child option</td>
				 		@endif
				 		<td>{{ date('M j, Y',strtotime($categories->created_at)) }}</td>
				 		<td><a href="{{ route('categories.show', $categories->id) }}" class="btn btn-info btn-sm">View</a> <a href="{{ route('categories.edit', $categories->id) }}" class="btn btn-success btn-sm">Edit</a></td>
				 	</tr>

				 	@endforeach
				 </tbody>
			</table>

			<div class="text-center">
				{!! $category->links(); !!}
			</div>
		</div>
	</div>

    	</section>
	</div>

@endsection