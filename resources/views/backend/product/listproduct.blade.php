@extends('backend.master.master')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Danh sách sản phẩm</li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Danh sách sản phẩm</h1>
		</div>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">

			<div class="panel panel-primary">

				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							@if (session('thongbao'))
							<div class="alert bg-success" role="alert">
								<svg class="glyph stroked checkmark">
									<use xlink:href="#stroked-checkmark"></use>
								</svg>{{ session('thongbao') }}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
							</div>
							@endif
							<a href="/admin/product/add" class="btn btn-primary">Thêm sản phẩm</a>
							<table class="table table-bordered" style="margin-top:20px;">

								<thead>
									<tr class="bg-primary">
										<th>ID</th>
										<th>Thông tin sản phẩm</th>
										<th>Giá sản phẩm</th>
										<th>Tình trạng</th>
										<th>Danh mục</th>
										<th>Tùy chọn</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($product as $row)
									<tr>
										<td>{{ $row->id }}</td>
										<td>
											<div class="row">
												@foreach ($row->image as $item)
												@if (!$item)
												<div class="col-md-3"><img src="img/no-img.jpg" alt="Áo đẹp" width="100px" height="100px" class="thumbnail"></div>
												@else
												<div class="col-md-3"><img src="img/{{ $item->img }}" alt="Áo đẹp" width="100px" height="100px" class="thumbnail"></div>
												@endif
												@break
												@endforeach
												
												<div class="col-md-9">
													<p><strong>Mã sản phẩm : {{ $row->productCode }}</strong></p>
													<p>Tên sản phẩm :{{ $row->productName }}</p>
													<p>Danh mục:{{ $row->category->name }}</p>
													<p>size:
														@foreach ($row->product_size_color as $item)
															{{ $item->size->value }},
														@endforeach
														
													</p>
													<div class="group-color">Màu sản phẩm:
														@foreach ($row->product_size_color as $item)
														<div class="product-color" style="background-color: {{ $item->color->value }}; border: solid 1px" ></div>
														@break
														@endforeach
													</div>

												</div>
											</div>
										</td>
										<td>{{ number_format($row->productPrice)}} VND</td>
										<td>
											<?php
												$total = 0;	
											?>
											@foreach ($row->product_size_color as $item)
												<?php
													$total += $item->quantity
												?>
											@endforeach
											@if ($total > 0)
												<a name="" id="" class="btn btn-success" href="#" role="button">Còn hàng</a>
												<br>
												<label> Số lượng: <br>
													@foreach ($row->product_size_color as $item)
														{{ $item->size->value }}: {{ $item->quantity }}<br>
													@endforeach
													
												</label>
											@else
											<a name="" id="" class="btn btn-danger" href="#" role="button">Hết hàng</a>
											@endif
											
										</td>
										<td>{{ $row->category->name }}</td>
										<td>
											<a href="/admin/product/edit/{{ $row->id }}" class="btn btn-warning"><i class="fa fa-edit" aria-hidden="true"></i> Sửa</a>
											<a href="/admin/product/del/{{ $row->id }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
										</td>
									</tr>
									@endforeach

								</tbody>
							</table>
							<div align='right'>
								<ul class="pagination">
									{{ $product->links() }}
								</ul>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>

				</div>
			</div>
			<!--/.row-->


		</div>
@endsection