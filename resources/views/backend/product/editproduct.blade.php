@extends('backend.master.master')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa sản phẩm</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-xs-6 col-md-12 col-lg-12">
        <form action="" method="post" enctype="multipart/form-data">@csrf
                <div class="panel panel-primary">
                    <div class="panel-heading">Sửa sản phẩm {{$product->productName}} ({{$product->productCode}})</div>
                    @if (session('thongbao'))
                        <div class="alert alert-success" role="alert">
                        <strong>{{session('thongbao')}}</strong>
                        </div>
                    @endif
                    <div class="panel-body">
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>Danh mục</label>
                                            <select name="category" class="form-control">
                                               {{ getCategory($category,0,'',$product->category_id) }}
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mã sản phẩm</label>
                                            <input type="text" name="productCode" class="form-control"
                                            value="{{$product->productCode}}">
                                                {{ showErrors($errors,'productCode') }}
                                        </div>
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input type="text" name="productName" class="form-control"
                                                value="{{$product->productName}}">
                                                {{ showErrors($errors,'productName') }}
                                        </div>
                                        <div class="form-group">
                                        <label>Giá sản phẩm</label> 
                                            <input type="number" name="productPrice" class="form-control"
                                                value="{{$product->productPrice}}">
                                                {{ showErrors($errors,'productPrice') }}
                                        </div>
                                        <div class="form-group">
                                            <label>Nhà cung cấp</label>
                                            <select name="provider" class="form-control">
                                                {{ getProvider($provider,$product->provider_id) }}
                                            </select>
                                        </div>
                                        <div class="imgPro">
                                            @foreach ($product->image as $item)
                                            <span class="img-item">
                                                <img src="img/{{ $item->img }}" alt="" style="height: 100px; width: 100px">
                                                <a onclick="return delImg()" href="/admin/product/del-image/{{ $item->id }}"><i class="fa fa-trash-alt" style="position: absolute;
                                                    margin-left: -20px;
                                                    color: #c11010;
                                                    margin-top: 5px;"></i></a>
                                            </span>
                                            @endforeach
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Ảnh sản phẩm</label>
                                            <input id="img" type="file" name="product_img[]" class="form-control hidden"
                                                onchange="changeImg(this)" multiple>
                                            <img id="avatar" class="thumbnail" width="100%" height="350px" src="img/import-img.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-xs-4">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- <div class="edit-variant" style="margin-bottom: 10px">
                                                <a href="/admin/product/edit/{{ $product->id }}/variant"><span class="glyphicon glyphicon-cog"></span>
                                                    Sửa các thuộc tính</a>
                                            </div> --}}
                                            <div class="form-group">
                                                <label>Thông tin</label>
                                                <textarea name="info" style="width: 100%;height: 100px;">{{$product->info}}</textarea>
                                                {{ showErrors($errors,'info') }}
                                            </div>
                                            <div class="form-group">
                                                <label>Miêu tả</label>
                                                <textarea id="editor" name="description" style="width: 100%;height: 100px;">{{$product->description}}</textarea>
                                                {{ showErrors($errors,'description') }}
                                            </div>
                        
                                            <button class="btn btn-success" name="add-product" type="submit">Sửa sản phẩm</button>
                                            <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
    @parent
    <script>

        function delImg() {
            return confirm("Bạn có thực sự muốn xóa ảnh này");
        }

        function changeImg(input) {
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function (e) {
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function () {
            $('#avatar').click(function () {
                $('#img').click();
            });
        });
    
    </script>
@endsection

    
