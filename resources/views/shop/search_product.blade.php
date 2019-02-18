@extends('shop.view')

@section('title', '| GroceryShop_Products')

@section('content')

<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(../images/img2.jpg);">
		<h2 class="l-text2 t-center">
			Groceries
		</h2>
		<p class="m-text13 t-center">
			New Arrivals Grocery Shop 2019
		</p>
	</section>

	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categories
						</h4>
						@foreach($brand as $brands)
						<ul>
							<li>
								<a href="{{ route('category', $brands->id) }}">
									{{ $brands->brand }}
								</a>
							</li>
						</ul>
						@endforeach
						<!--  -->
						<h4 class="m-text14 p-b-32">
							Filters
						</h4>

						<div class="filter-price p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-17">
								Price
							</div>

							<div class="wra-filter-bar">
								<div id="filter-bar"></div>
							</div>

							<div class="flex-sb-m flex-w p-t-16">
								<div class="w-size11">
									<!-- Button -->
									<button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
										Filter
									</button>
								</div>

								<div class="s-text3 p-t-10 p-b-10">
									Range: $<span id="value-lower">610</span> - $<span id="value-upper">980</span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						{{-- <div class="flex-w">
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting">
									<option>Default Sorting</option>
									<option>Popularity</option>
									<option>Price: low to high</option>
									<option>Price: high to low</option>
								</select>
							</div>

							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting">
									<option>Price</option>
									<option>$0.00 - $50.00</option>
									<option>$50.00 - $100.00</option>
									<option>$100.00 - $150.00</option>
									<option>$150.00 - $200.00</option>
									<option>$200.00+</option>

								</select>
							</div>
						</div>
 --}}
						{{-- <span class="s-text8 p-t-5 p-b-5">
							Showing 1–12 of 16 results
						</span> --}}
						<div class="row">
							<div class="col-md-6">
							<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search" id="search" placeholder="Search Products...">

							

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
							</div>
							<div class="col-md-9">
								<div class="jumbotron" >
								<ul id="output">
									
								</ul>
							</div>
							</div>
						</div>
					</div>

					<!-- Product -->
					<div class="sec-title p-b-60">
						<h3 class="m-text5 t-center">
							@if ($products == '')
							No products Available
							@endif
						</h3>
					</div>
					<div class="row">
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">


									
									{{ Html::image('images/'. $products->image, 'alt IMG-PRODUCT',  array('class' => 'img', 'height' => '320')) }}
									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<a href="{{ route('view', $products->id) }}" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												view Product
											</a>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
										{{ $products->title }}
									</a>

									<span class="block2-price m-text6 p-r-5">
										{{ '$'.$products->list_price }}
									</span>
								</div>
							</div>
						</div>
					</div>

					<!-- Pagination -->
					<div class="text-center">
						{{-- {!! $product->links(); !!} --}}
					</div>
				</div>
			</div>
		</div>
	</section>


@endsection