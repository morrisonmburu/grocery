@extends('admin.main')

@section('title', '|Admin brands')

@section('content')

	<div class="content-wrapper">
		<section class="content container-fluid">
			<div class="row">
  		{!! Form::model($brand, ['route' => ['brands.update', $brand->id], 'method' => 'PUT', 'files' => true]) !!}
  		<div class="col-md-8">
  			{{ Form::label('brand', 'Brand:') }}
			{{ Form::text('brand', null, ["class" => 'form-control input-lg']) }}

			{{ Form::label('brand_icon', 'Upload Brand icon*:') }}
			{{ Form::file('brand_icon', null, ['class' => 'form-control']) }}
			</div>
			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<dt>Created At:</dt>
						<dd>{{ date('M j, Y h:i A', strtotime($brand->created_at)) }}</dd>
					</dl>

					<dl class="dl-horizontal">
						<dt>Last Updated:</dt>
						<dd>{{ date( 'M j, Y h:i A', strtotime($brand->updated_at)) }}</dd>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{!! Html::linkRoute('brands.show', 'cancel', array($brand->id), array('class' => 'btn btn-danger btn-block')) !!}
						</div>
						<div class="col-sm-6">
							{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
						</div>
					</div>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
		</section>
	</div>

@endsection