@extends('admin.main')

@section('title', '|Admin categories')

@section('content')

	<div class="content-wrapper">
	<section class="content container-fluid" style="padding-top: 75px;">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create new category</h1>
			<hr>
			{!! Form::open(array('route' => 'categories.store', 'data-parsley-validate' => '', 'files' => true)) !!}
				{{ Form::label('select', 'Select Brand') }}
				<select type="text" name="select" required class="form-control" >
					<option class="form-control"></option>
					@foreach ($category as $categories)
					<option class="form-control" value="{{ $categories->id }}" >{{ $categories->brand }}</option>
					@endforeach
				</select>

				{{ Form::label('category', 'Category Name:') }}
				{{ Form::text('category', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '100')) }}

				{{ Form::label('category_icon', 'Upload category icon*:') }}
				{{ Form::file('category_icon', null, ['class' => 'form-control']) }}

				{{ Form::submit('Create Category', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;')) }}
			{!! FORM::close() !!}
		</div>
	</div>
	</section>
</div>

@endsection