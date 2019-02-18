@extends('shop.view')

@section('title', '| GroceryShop')

@section('content')

		<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<div class="item-slick3" data-thumb="../images/{{ $products->image }}">
							<div class="wrap-pic-w">
								{{ Html::image('images/'. $products->image, 'alt IMG-PRODUCT',  array('class' => 'img')) }}
							</div>
						</div>

						<div class="item-slick3" data-thumb="../images/{{ $products->image }}">
							<div class="wrap-pic-w">
								{{ Html::image('images/'. $products->image, 'alt IMG-PRODUCT',  array('class' => 'img')) }}
							</div>
						</div>

						<div class="item-slick3" data-thumb="../images/{{ $products->image }}">
							<div class="wrap-pic-w">
								{{ Html::image('images/'. $products->image, 'alt IMG-PRODUCT',  array('class' => 'img')) }}
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					{{ $products->title }}
				</h4>

				<span class="m-text17">
					${{ $products->list_price }}
				</span>

				<p class="s-text8 p-t-10">
					{{ $products->description }}
				</p>

				<!--  -->
				<div class="p-t-33 p-b-60">

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							{{-- {!! Form::open(array('route' => ['cart.store', $products->id], 'data-parsley-validate' => '')) !!} --}}
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">

							{{-- 	<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button> --}}

								<input type="number" id="addcart" name="addCart" class="form-control" required max="{{ $products->sizes }}" value="" min="1">

								{{-- <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button> --}}
								<input type="text" hidden id="id" value="{{ $products->id }}">
								<input type="text" hidden id="title" value="{{ $products->title }}">
								<input type="text" hidden id="list_price" value="{{ $products->list_price }}">
								<input type="text" hidden id="image" value="{{ $products->image }}">

							</div>

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
							
								<button onclick="addcart()" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">Add to cart</button>
							</div>
							{{-- {!! FORM::close() !!} --}}
						</div>
					</div>
				</div>

				<div class="p-b-45">
					<span class="s-text8 m-r-35">SKU: GROC-{{ $products->id }}</span>
					<span class="s-text8">Categories: {{ $products->categories }}</span>
				</div>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							{{ $products->description }}
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Additional information
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Reviews (0)
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
							function addcart(){
										  var add_cart = $('#addcart').val();
										  var id = $('#id').val();
										  var title = $('#title').val();
										  var list_price = $('#list_price').val();
										  var image = $('#image').val();
										  jQuery.ajax({
											url:'{{ route('cart.addcart') }}',
											method:"POST",
											data:{id : id, title : title, add_cart : add_cart, list_price : list_price, image : image, _token: '{{csrf_token()}}', },
											success:function(result)
											{
												swal(result, "has been added !", "success");
											},
											error : function(){alert("Something Went Wrong.");},
										});
										}
	</script>

@endsection