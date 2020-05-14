<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getListCategory()
    {
        $data['category'] = category::all();
        return view('backend.category.category',$data);
    }
    public function postAddCategory(CategoryRequest $r){
       
        $cate=new category;
        $cate->name=$r->name;
        $cate->parent=$r->category;
        $cate->save();
        return redirect()->back()->with('thongbao','Đã thêm thành công');
    }
    public function getEditCategory($idCate)
    {
        $data['category']=Category::all();
        $data['cate']=Category::find($idCate);
        return view('backend.category.editcategory',$data);
    }
    function postEditCategory($idCate, EditCategoryRequest $r){
        $category = Category::find($idCate);
        $category->name = $r->name;
        $category->parent = $r->parent;
        $category->save();

        return redirect()->back()->with('thongbao','Đã sửa thành công');
    }
    function delCategory($idCate)
    {
        $category = Category::destroy($idCate);
        return redirect()->back()->with('thongbao','Đã xóa thành công');
    }
}
