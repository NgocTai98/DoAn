<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function getListProvider(){
        $data['provider'] = Provider::paginate(5);
        return view('backend.provide.listprovider',$data);
    }
    public function getAddProvider(){
        return view('backend.provide.addprovider');
    }
    public function postAddProvider(Request $r){
        $provider = new Provider();
        $provider->name = $r->name;
        $provider->phone = $r->phone;
        $provider->address = $r->address;
        $provider->info = $r->info;
        $provider->save();
        return redirect('/admin/provider')->with('thongbao','Đã thêm thành công')->withInput();
    }
    public function getEditProvider($id){
        $data['provider'] = Provider::find($id);
        return view('backend.provide.editprovider',$data);
    }
    public function postEditProvider(Request $r,$id){
        $provider = Provider::find($id);
        $provider->name = $r->name;
        $provider->phone = $r->phone;
        $provider->address = $r->address;
        $provider->info = $r->info;
        $provider->save();
        return redirect('/admin/provider')->with('thongbao','Đã sửa thành công')->withInput();
    }
    public function getDelProvider($id){
        $provider = Provider::destroy($id);
        return redirect('/admin/provider')->with('thongbao','Đã xóa thành công')->withInput();
    }
}
