@extends('admin.main')

@section('title', '|Admin products')

@section('content')

	<div class="content-wrapper">
		<section class="content container-fluid">
			<div class="row">
  		{!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'PUT', 'files' => true]) !!}
  		<div class="col-md-8">
  			
  				<div class="row">
					<div class="col-md-4">
						{{ Form::label('title', 'Title*:') }}
						{{ Form::text('title', null, ['class' => 'form-group', 'required', 'maxlength' => '100']) }}

						{{ Form::label('quantity', 'Quantity*:') }}
						{{ Form::number('quantity', $product->sizes,null, ['class' => 'form-control', 'required', 'maxlength' => '10']) }}
					</div>
					<div class="col-md-4">
						{{ Form::label('brand', 'Brand*:') }}
						<select class="form-control" id="parent" required name="brand">
							<option class="form-control" >{{ $brands->brand }}</option>
							@foreach($brands2 as $brand)
							<option class="form-control" value="{{ $brand->id }}" >{{ $brand->brand }}</option>
							@endforeach
						</select>

						{{ Form::label('price', 'Price*:') }}
						{{ Form::text('price', null, ['class' => 'form-control', 'required', 'maxlength' => '10']) }}

						{{ Form::label('offer', 'Offer*:') }}
						<select name="offer" class="form-control" required>
							<option class="form-control">{{ $product->offer }}</option>
							<option class="form-control">None</option>
							<option class="form-control">1 days</option>
							<option class="form-control">2 days</option>
							<option class="form-control">3 days</option>
						</select>
					</div>
					<div class="col-md-4">
						{{ Form::label('parent', 'Parent Category*:') }}
						<select name="parent" id="child" class="form-control" required data-dependent="id">
							<option class="form-control" id="option" value="{{ $product->categories }}" >{{ $product->categories }}</option>
							
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
			</div>
			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<dt>Created At:</dt>
						<dd>{{ date('M j, Y h:i A', strtotime($product->created_at)) }}</dd>
					</dl>

					<dl class="dl-horizontal">
						<dt>Last Updated:</dt>
						<dd>{{ date( 'M j, Y h:i A', strtotime($product->updated_at)) }}</dd>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{!! Html::linkRoute('products.show', 'cancel', array($product->id), array('class' => 'btn btn-danger btn-block')) !!}
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