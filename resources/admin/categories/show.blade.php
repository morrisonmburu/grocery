@extends('admin.main')

@section('title', '|Admin categories')

@section('content')

<div class="content-wrapper">
	<section class="content container-fluid" >
		 <div class="container">
  	<div class="row">
  		<div class="col-md-6">
			<h1>{{ $category->category }}</h1>


				<p class="lead">{{ $category->category }}</p>
				@if ($category->parent == 0)
				<p class="lead">parent</p>
				@else
				<p class="lead">Child Option</p>
				@endif
			</div>
			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<label>Created At:</label>
						<p>{{ date('M j, Y h:i A', strtotime($category->created_at)) }}</p>
					</dl>

					<dl class="dl-horizontal">
						<label>Last Updated:</label>
						<p>{{ date( 'M j, Y h:i A', strtotime($category->updated_at)) }}</p>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{!! Html::linkRoute('categories.edit', 'Edit', array($category->id), array('class' => 'btn btn-info btn-block')) !!}
						</div>
						<div class="col-sm-6">
							{!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}

							{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

							{!! Form::close() !!}


						</div>
						<div class="col-sm-12">
							<a href="{{ route('categories.index') }}" class="btn btn-default btn-block top"> << see all categories</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	</section>
</div>

@endsection