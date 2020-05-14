@extends('backend.master.master')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Đơn hàng</li>
		</ol>
	</div>
	<!--/.row-->
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">

			<div class="panel panel-primary">
				<div class="panel-heading">Danh sách đơn đặt hàng đã xử lý</div>
				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							<a href="/admin/order" class="btn btn-warning"><span class="glyphicon glyphicon-gift"></span>Đơn Chưa xử lý</a>
							<a href="/admin/excel" class="btn btn-success">
								<i class="fa fa-download"></i> Xuất file Excel
								</a>
							<table class="table table-bordered" style="margin-top:20px;">				
								<thead>
									<tr class="bg-primary">
										<th>ID</th>
										<th>Mã đơn hàng</th>
										<th>Tên khách</th>
										<th>Sđt</th>
										<th>Địa chỉ</th>
										<th>Mã khuyến mãi</th>
										<th>Khuyến mãi</th>
										<th>Tổng tiền</th>
										<th>Thời gian</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($order as $item)
									<tr>
										<td>{{ $item->id }}</td>
										<td> <a href="/admin/order/detail/{{ $item->id }}">{{ $item->code }}</a></td>
										<td>{{ $item->user_info->fullname }}</td>
										<td>{{ $item->phone }}</td>
										<td>{{ $item->address }}</td>
										<td>{{ $item->couponCode }}</td>
										<td>{{ number_format($item->couponSale) }} VND</td>
										<th>{{ number_format($item->total) }} VND</th>
										<td>{{ $item->user_info->created_at }}</td>
									</tr>
									@endforeach
									
								</tbody>
							</table>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!--/.row-->


</div>
@endsection