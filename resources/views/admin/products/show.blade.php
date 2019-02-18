@extends('admin.main')

@section('title', '|Admin products')

@section('content')

<div class="content-wrapper">
	<section class="content container-fluid" >
		 <div class="container">
  	<div class="row">
  		<div class="col-md-6">
			<h1>{{ $product->title }}</h1>

				{{ Html::image('images/'. $product->image, 'alt text',  array('class' => 'img', 'width' => '500px', 'height' => '400px')) }}
				<p class="lead">{{ $product->title }}</p>
				<p class="lead">{{ '$'. $product->price }}</p>
				<p class="lead">{{ '$'. $product->list_price }}</p>
				<p class="lead">{{ $product->categories }}</p>
				<p class="lead">{{ $product->description }}</p>
				<p class="lead">{{ $product->brand }}</p>
				<p class="lead">{{ $product->offer }}</p>

			</div>
			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<label>Created At:</label>
						<p>{{ date('M j, Y h:i A', strtotime($product->created_at)) }}</p>
					</dl>

					<dl class="dl-horizontal">
						<label>Last Updated:</label>
						<p>{{ date( 'M j, Y h:i A', strtotime($product->updated_at)) }}</p>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{!! Html::linkRoute('products.edit', 'Edit', array($product->id), array('class' => 'btn btn-info btn-block')) !!}
						</div>
						<div class="col-sm-6">
							{!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'DELETE']) !!}

							{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

							{!! Form::close() !!}


						</div>
						<div class="col-sm-12">
							<a href="{{ route('products.index') }}" class="btn btn-default btn-block top"> << see all products</a>
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