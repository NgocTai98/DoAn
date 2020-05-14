<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function getListCoupon(){
        $data['coupon'] = Coupon::paginate(5);
        return view('backend.coupon.listcoupon',$data);
    }
    public function getAddCoupon(){
        return view('backend.coupon.addcoupon');
    }
    public function postAddCoupon(Request $r){
        $coupon = new Coupon();
        $coupon->couponCode = $r->couponCode;
        $coupon->sale = $r->sale;
        $coupon->type = $r->type;
        $coupon->totalCoupon = $r->totalCoupon;
        $coupon->save();
        return redirect('/admin/coupon')->with('thongbao','Đã thêm thành công')->withInput();
    }
    public function getDelCoupon($id){
        $coupon = Coupon::destroy($id);
        return redirect('/admin/coupon')->with('thongbao','Đã xóa thành công')->withInput();
    }
}
