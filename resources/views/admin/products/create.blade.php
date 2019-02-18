@extends('admin.main')

@section('title', '|Admin products')

@section('content')

<div class="content-wrapper">
	<section class="content container-fluid" style="padding-top: 75px;">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create new product</h1>
			<hr>
			{!! Form::open(array('route' => 'products.store', 'data-parsley-validate' => '', 'files' => true)) !!}
				
				<div class="row">
					<div class="col-md-4">
						{{ Form::label('title', 'Title*:') }}
						{{ Form::text('title', null, ['class' => 'form-group', 'required', 'maxlength' => '100']) }}

						{{ Form::label('quantity', 'Quantity*:') }}
						{{ Form::number('quantity', null, ['class' => 'form-control', 'required', 'maxlength' => '10']) }}
					</div>
					<div class="col-md-4">
						{{ Form::label('brand', 'Brand*:') }}
						<select class="form-control" id="parent" required name="brand">
							<option class="form-control" ></option>
							@foreach($brands as $brand)
							<option class="form-control" value="{{ $brand->id }}" >{{ $brand->brand }}</option>
							@endforeach
						</select>

						{{ Form::label('price', 'Price*:') }}
						{{ Form::text('price', null, ['class' => 'form-control', 'required', 'maxlength' => '10']) }}

						{{ Form::label('offer', 'Offer*:') }}
						<select name="offer" class="form-control" required>
							<option class="form-control"></option>
							<option class="form-control">None</option>
							<option class="form-control">1 days</option>
							<option class="form-control">2 days</option>
							<option class="form-control">3 days</option>
						</select>
					</div>
					<div class="col-md-4">
						{{ Form::label('parent', 'Parent Category*:') }}
						<select name="parent" id="child"  class="form-control" required data-dependent="id">
							<option class="form-control"></option>
						</select>
						{{ Form::label('list_price', 'List_Price*:') }}
						{{ Form::text('list_price', null, ['class' => 'form-control', 'required', 'maxlength' => '10']) }}
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						{{ Form::label('featured_image', 'Upload Featured image*:') }}
						{{ Form::file('featured_image', null, ['class' => 'form-control']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('description', 'Description*:') }}
						{{ Form::textarea('description', null, ['class' => 'form-control', 'required', 'maxlength' => '255']) }}
					</div>
				</div>

				{{ Form::submit('Create Product', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;')) }}
			{!! FORM::close() !!}
		</div>
	</div>
	</section>
</div>
<script>
	$(document).ready(function(){

		$('#parent').change(function(){
			if ($(this).val() != '') {
				var select = $(this).attr("id");
				var value = $(this).val();
				var dependent = $(this).data('dependent');
				var _token = $('input[name="_token"]').val();

				$.ajax({
					url:"{{ route('products.fetch') }}",
					method:"POST",
					data:{select:select, value:value, _token:_token, dependent:dependent},
					success:function(result)
					{
						$('#child').html(result);
					}
				});
			}
		});
	});
</script>

@endsection