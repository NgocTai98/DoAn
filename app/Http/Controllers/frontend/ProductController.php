<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\models\Category;
use App\models\Product;
use App\models\ProductSizeColor;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getShop(request $r){
        // if ($r->category) {
        //     $data['products']=Category::find($r->category)->product()->paginate(12);
        // }
        // else if($r->start){
        //     $data['products']=Product::whereBetween('productPrice',[$r->start,$r->end])->paginate(12);

        // }
        // else if($r->value){
          
        //     $data['products']=values::find($r->value)->product()->where('img','<>','no-img.jpg')->where('state',1)->orderby('updated_at','DESC')->paginate(12);
        //     // dd($data);
        // }
        // else{
        //     $data['products']=product::where('img','<>','no-img.jpg')->where('state',1)->orderby('updated_at','DESC')->paginate(12);

        // }
        // $data['attrs'] = attribute::all();
        // $data['category'] = category::get();
        return view('frontend.product.shop');
        
    }
    public function getDetail($id){
        $data['product'] = product::find($id);
        $data['xs'] = ProductSizeColor::where('size_id',1)->get();
        // foreach ($data['xs'] as  $value) {
        //     dd($value->quantity);
        //     # code...
        // }
        $data['product_new']=product::take(4)->get();
        return view('frontend.product.detail', $data);
    }
}
