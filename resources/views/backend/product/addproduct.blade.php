@extends('backend.master.master')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm sản phẩm</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-xs-6 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Thêm sản phẩm</div>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="panel-body">
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-7">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>Danh mục</label>
                                            <select name="category" class="form-control">
                                                <option value="0" selected>-- Chọn danh mục sản phẩm --</option>
                                                {{ getCategory($category,0,"",0) }}
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mã sản phẩm</label>
                                            <input  type="text" name="productCode" class="form-control">
                                            {{ showErrors($errors,'productCode') }}
                                        </div>
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input  type="text" name="productName" class="form-control">
                                            {{ showErrors($errors,'productName') }}
                                        </div>
                                        <div class="form-group">
                                            <label>Giá sản phẩm</label>
                                            <input  type="number" name="productPrice" class="form-control">
                                            {{ showErrors($errors,'productPrice') }}
                                        </div>
                                        <div class="form-group">
                                            <label>Nhà cung cấp</label>
                                            <select name="provider" class="form-control">
                                                <option value="0" selected>-- Chọn nhà cung cấp --</option>
                                                @foreach ($provider as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
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
                                <div class="form-group">
                                    <label>Thông tin</label>
                                    <textarea name="info" style="width: 100%;height: 100px;"></textarea>
                                </div>
    
                            </div>
                            <div class="col-xs-5">
    
                                <div class="panel panel-default">
                                    <div class="panel-body tabs">
                                                <label for="">Các thuộc tính</label>
                                        <ul class="nav nav-tabs">
                                            <li class='active'><a href="#tab17" data-toggle="tab">size</a></li>
                                            <li><a href="#tab18" data-toggle="tab">Màu sắc</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade  active  in" id="tab17">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            @foreach ($size as $item)
                                                            <th>{{ $item->value }}</th>
                                                            @endforeach
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            @foreach ($size as $item)
                                                            <td> <input class="form-check-input" type="checkbox" name="size[]"
                                                                value="{{ $item->id }}"> </td>
                                                            @endforeach
                                                        </tr>
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <label>Chọn size và số lượng theo từng size</label>
                                                            @foreach ($size as $item)
                                                                <td>
                                                                    <input type="text" class="form-control" name="quantity[]" style="width: 45px; height: 30px; border: solid 1px">
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <hr>
                                               
                                            </div>
                                            <div class="tab-pane fade  in" id="tab18">
                                                <table class="table">
                                                   
                                                    <select name="color" id="" class="form-control">
                                                        @foreach ($color as $item)
                                                        <option value="{{ $item->id }}">{{ $item->value }}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                </table>
                                                <hr>
                                              
                                            </div>
    
    
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
    
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <p></p>
    
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Miêu tả</label>
                                        <textarea id="editor" name="description" style="width: 100%;height: 100px;"></textarea>
                                    </div>
                                    <button class="btn btn-success" name="add-product" type="submit">Thêm sản phẩm</button>
                                    <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                </div>
                            </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!--/.row-->
</div>

@endsection
@section('script')
    @parent
    <script>
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