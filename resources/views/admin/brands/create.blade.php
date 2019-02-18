@extends('admin.main')

@section('title', '|Admin brands')

@section('content')

<div class="content-wrapper">
	<section class="content container-fluid" style="padding-top: 75px;">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create new brand</h1>
			<hr>
			{!! Form::open(array('route' => 'brands.store', 'data-parsley-validate' => '', 'files' => true)) !!}
				{{ Form::label('brand', 'Brand Name:') }}
				{{ Form::text('brand', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '100')) }}

				{{ Form::label('brand_icon', 'Upload Brand icon*:') }}
				{{ Form::file('brand_icon', null, ['class' => 'form-control']) }}

				{{ Form::submit('Create Brand', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;')) }}
			{!! FORM::close() !!}
		</div>
	</div>
	</section>
</div>


@endsection