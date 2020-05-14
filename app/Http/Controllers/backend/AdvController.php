<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Mail\advMail;
use App\models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdvController extends Controller
{
    public function Adv(){
        $data['customer'] = customer::get();
        $data['total'] = customer::count();
        return view('backend.adv',$data);
    }
    public function postAdv(Request $r){
        $data= $r->email;
        $adv = customer::get();
        foreach ($adv  as $value) {
            Mail::to($value)->send(new advMail($data));
        }
        return redirect()->back()->with('thongbao', 'Đã gửi email');
    }
}
