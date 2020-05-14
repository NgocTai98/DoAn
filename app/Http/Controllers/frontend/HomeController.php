<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\models\customer;
use App\models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getIndex() {
        $data['product_new'] = Product::take(12)->get();
        return view('frontend.index',$data);
    }
    public function getContact(){
        return view('frontend.contact');
    }
    public function getAbout(){
        return view('frontend.about');
    }
    function sendMail(Request $r){
       $adv = new customer();
       $adv->email = $r->email;
       $adv->password = mt_rand(1000, 9000);
       $adv->save();
       return redirect()->back()->with('thongbao', 'Đã đăng ký thành công');       
    }
}
