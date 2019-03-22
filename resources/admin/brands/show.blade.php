@extends('admin.main')

@section('title', '|Admin brands')

@section('content')

<div class="content-wrapper">
	<section class="content container-fluid" >
		 <div class="container">
  	<div class="row">
  		<div class="col-md-6">
			<h1>{{ $brand->brand }}</h1>


				<p class="lead">{{ $brand->brand }}</p>
			</div>
			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<label>Created At:</label>
						<p>{{ date('M j, Y h:i A', strtotime($brand->created_at)) }}</p>
					</dl>

					<dl class="dl-horizontal">
						<label>Last Updated:</label>
						<p>{{ date( 'M j, Y h:i A', strtotime($brand->updated_at)) }}</p>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{!! Html::linkRoute('brands.edit', 'Edit', array($brand->id), array('class' => 'btn btn-info btn-block')) !!}
						</div>
						<div class="col-sm-6">
							{!! Form::open(['route' => ['brands.destroy', $brand->id], 'method' => 'DELETE']) !!}

							{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

							{!! Form::close() !!}


						</div>
						<div class="col-sm-12">
							<a href="{{ route('brands.index') }}" class="btn btn-default btn-block top"> << see all brands</a>
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