<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\models\Category;
use App\models\Color;
use App\models\Image;
use App\models\Product;
use App\models\ProductSizeColor;
use App\models\Provider;
use App\models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function getListProduct(){
        $data['product'] = Product::paginate(5);
        return view('backend.product.listproduct',$data);
    }
    public function getAddProduct(){
        $data['category'] = Category::get();
        $data['size'] = Size::get();
        $data['color'] = Color::get();
        $data['provider'] = Provider::get();
        return view('backend.product.addproduct',$data);
    }
    public function postAddProduct(AddProductRequest $r){
        $newProduct = new Product();
        $newProduct->productCode = $r->productCode;
        $newProduct->productName = $r->productName;
        $newProduct->productPrice = $r->productPrice;
        $newProduct->info = $r->info;
        $newProduct->description = $r->description;
        $newProduct->category_id = $r->category;
        $newProduct->provider_id = $r->provider;
        $newProduct->save();
        if($r->hasFile('product_img'))
        {
            foreach ($r->product_img as  $value) {
                $image = new Image();
                $file = $value;
                $filename= str::random(9).'.'.$file->getClientOriginalExtension();
                $file->move('backend/img', $filename);
                $image->img= $filename;
                $image->product_id = $newProduct->id;
                $image->save();
            } 
        }
        $quantity = $r->quantity;
        $quan = [];
        foreach ($quantity as $key => $value) {
            if ($value != null) {
                array_push($quan,$value);
            }
        }
      
        foreach ($r->size as $key => $value) {
            $newproductitem = new ProductSizeColor();
            $newproductitem->size_id = $value;
            $newproductitem->color_id = $r->color;
            $newproductitem->product_id = $newProduct->id;
            $newproductitem->quantity = $quan[$key];
            $newproductitem->save();
        }

        return redirect('/admin/product')->with('thongbao', "Đã thêm mới thành công")->withInput();
    }
    public function getEditProduct($id){
        $data['product'] = Product::find($id);
        $data['category'] = Category::get();
        $data['size'] = Size::get();
        $data['color'] = Color::get();
        $data['provider'] = Provider::get();
        return view('backend.product.editproduct',$data);
    }
    public function postEditProduct(Request $r,$id){
        $product = Product::find($id);
        $product->productCode = $r->productCode;
        $product->productName = $r->productName;
        $product->productPrice = $r->productPrice;
        $product->info = $r->info;
        $product->description = $r->description;
        $product->category_id = $r->category;
        $product->provider_id = $r->provider;
        $product->save();
        if($r->hasFile('product_img'))
        {
            foreach ($r->product_img as  $value) {
                $image = new Image();
                $file = $value;
                $filename= str::random(9).'.'.$file->getClientOriginalExtension();
                $file->move('backend/img', $filename);
                $image->img= $filename;
                $image->product_id = $product->id;
                $image->save();
            } 
        }
        return redirect('/admin/product')->with('thongbao', "Đã sửa thành công")->withInput();
    }
    public function getEditVariant($id){
        $data['product'] = Product::find($id);
        $data['size'] = Size::get();
        return view('backend.product.editvariant',$data);
    }
}
