@extends('frontend.master.master')
@section('content')
<div class="colorlib-shop">
	<div class="container">
		<div class="row row-pb-lg">
			<div class="col-md-10 col-md-offset-1">
				<div class="product-detail-wrap">
					<div class="row">
						<div class="col-md-5">
							<div class="product-entry">
								@foreach ($product->image as $item)
								{{-- <div class="product-img" style="background-image: url(/backend/img/{{ $item->img }});"></div> --}}
								<img src="/backend/img/{{ $item->img }}" alt="" style="width: 200px; height: 200px">
								@endforeach
							</div>
						</div>
						<div class="col-md-7">
							<form action="product/AddCart" method="post">

								<div class="desc">
									<h3>{{ $product->productName }}</h3>
									<p class="price">
										<span>{{ number_format($product->productPrice) }} VND</span>
									</p>
									<p>{{ $product->info }}</p>
									<div class="size-wrap">
										<p class="size-desc">
											size:
											@foreach ($product->product_size_color as $item)
											<a class="size">{{ $item->size->value }}</a>
											@endforeach
										</p>
									</div>
									<div class="size-wrap">
										<?php
											$total = 0;	
										?>
										@foreach ($product->product_size_color as $item)
											<?php
												$total += $item->quantity
											?>
										@endforeach
										@if ($total > 0)
										<p class="size-desc">
											Số lượng còn:
											@foreach ($product->product_size_color as $item)
											<a class="size">{{ $item->quantity }}</a>
											@endforeach
										</p>
										@else
											<a class="size"><span style="color: red">Hết Hàng</span></a>
										@endif
										
									</div>
									<div class="size-wrap">
										<p class="size-desc">
											Màu sắc:
											@foreach ($product->product_size_color as $item)
											<a class="size" style="background-color: {{ $item->color->value }}; border: solid 1px; width: 30px; height: 30px; margin-left: 10px; "></a>
											@break
											@endforeach

										</p>
									</div>
									<h4>Lựa chọn</h4>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label>size:</label>
												<select class="form-control " name="size" id="">
													@foreach ($product->product_size_color as $item)
													<option value="{{ $item->size->id }}"> {{ $item->size->value }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Màu sắc:</label>
												<select class="form-control " name="color" id="">
													@foreach ($product->product_size_color as $item)
													<option value="{{ $item->color->id }}"> {{ $item->color->value }}</option>
													@break
													@endforeach
												</select>
											</div>
										</div>


									</div>
									<div class="row row-pb-sm">
										<div class="col-md-4">
											<div class="input-group">
												<span class="input-group-btn">
													<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
														<i class="icon-minus2"></i>
													</button>
												</span>
												<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
												<span class="input-group-btn">
													<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
														<i class="icon-plus2"></i>
													</button>
												</span>
											</div>
										</div>
									</div>
									<input type="hidden" name="id_product" value="1">
									@if ($total == 0)
									<p><button class="btn btn-primary btn-addtocart" disabled type="submit"> Thêm vào giỏ hàng</button></p>
									@else
									<p><button class="btn btn-primary btn-addtocart" type="submit"> Thêm vào giỏ hàng</button></p>
									@endif
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
					<div class="col-md-12 tabulation">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#description">Mô tả</a></li>
						</ul>
						
						<div class="tab-content">
							<div id="description" class="tab-pane fade in active">
								{{ $product->description }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script_detail')
	<script>
		$(document).ready(function () {
	
	var quantitiy = 0;
	$('.quantity-right-plus').click(function (e) {

		// Stop acting like a button
		e.preventDefault();
		// Get the field name
		var quantity = parseInt($('#quantity').val());

		// If is not undefined

		$('#quantity').val(quantity + 1);


		// Increment

	});

	$('.quantity-left-minus').click(function (e) {
		// Stop acting like a button
		e.preventDefault();
		// Get the field name
		var quantity = parseInt($('#quantity').val());

		if (quantity > 0) {
			$('#quantity').val(quantity - 1);
		}
	});

});	
	</script>	

@endsection