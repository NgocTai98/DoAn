<link rel="stylesheet" href="/backend/css/bill/css/bill.css">
<div class="content">
    <h1  class="clearfix"> HÓA ĐƠN <small><span> DATE</span><br />{{ $time }}</small></h1>
      <p>
        <b>Tên khách hàng: {{ $order->user_info->fullname }}</b><br>
        <b>Điện thoại: {{ $order->phone }}</b> <br>
        <b>Địa chỉ: {{ $order->address }}</b> <br>
        <b>Email: {{ $order->user_info->email }}</b> <br>
       </p>
      <form action="" method="post" >
        <table>
            <thead>
            <tr>
                <th class="desc">TÊN SẢN PHẨM</th>
                <th>SỐ LƯỢNG</th>
                <th>GIÁ</th>
                <th>TỔNG TIỀN</th>
            </tr>
            </thead>
            <tbody>
            
            @foreach ($order->order_item as $item)
            <tr>
                <td class="desc" style="width:464px" >{{ $item->product_size_color->product->productName }}(size: {{ $item->product_size_color->size->value }}, màu: {{ $item->product_size_color->color->value }})</td>
                <td class="unit">{{ $item->total }}</td>
                <td class="qty">{{ number_format($item->price) }}đ</td>
                <td class="total">{{ number_format($item->total*$item->price) }}đ</td>
            </tr>
            @endforeach
            
        
        
            <tr>
                <td colspan="3" class="sub">Thành Tiền</td>
                <td class="sub total"> {{ number_format($order->total) }}đ</td>
            </tr>
            <tr>
                <td colspan="3">Giảm giá</td>
                <td class="total"> {{ number_format($order->couponSale) }}đ </td>
            </tr>
            <tr>
                <td colspan="3">Thanh Toán</td>
                <td class="total"> {{ number_format($order->total-$order->couponSale) }}đ </td>
            </tr>
            
            
            </tbody>
        </table>
      </form>
</div>