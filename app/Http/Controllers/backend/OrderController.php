<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\Order;
use App\models\UserInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrder(){
        $data['order'] = Order::where('state',0)->paginate(5);
        return view('backend.order.order',$data);
    }
    public function getDetailOrder($id){
       $data['order'] = Order::find($id);
        return view('backend.order.detailorder',$data);
    }
    public function activeOrder($id){
        $order = Order::find($id);
        $order->state = 1;
        $order->save();
        return redirect('/admin/order')->with('thongbao','Đơn hàng đã được xử lý thành công');
         
     }
    public function getOrderProcessed(){
        $data['order'] = Order::where('state',1)->paginate(5);
        return view('backend.order.orderprocessed',$data);
    }
    public function getBill($id){
        $data['order'] = Order::find($id);
        $data['time'] = Carbon::now('Asia/Ho_Chi_Minh');
        return view('backend.order.bill',$data);
    }
}
