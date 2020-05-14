@extends('backend.master.master')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa Nhà Cung Cấp</h1>
        </div>
    </div>
    <!--/.row-->
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fas fa-user"></i> Sửa nhà cung cấp: {{ $provider->name }}</div>
                <form action="" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="row justify-content-center" style="margin-bottom:40px">
    
                            <div class="col-md-8 col-lg-8 col-lg-offset-2">
                             
                                <div class="form-group">
                                    <label class="control-label">Tên Nhà Cung Cấp</label>
                                    <input name="name" required type="text" class="form-control" value="{{ $provider->name }}"> </div>
                                    
                                <div class="form-group">
                                    <label class="control-label">Số điện thoại</label>
                                    <input name="phone" required type="text" class="form-control" value="{{ $provider->phone }}"> </div>
                                    
                                <div class="form-group">
                                    <label class="control-label">Địa chỉ</label>
                                    <input name="address" required type="text" class="form-control" value="{{ $provider->address }}"> </div>
                                    
                                <div class="form-group">
                                    <label class="control-label">Thông Tin</label>
                                    <input name="info" required type="text" class="form-control" value="{{ $provider->info }}"> </div>  
                                    
                               
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">
                                  
                                    <button type="submit" class="btn btn-success">Sửa</button>
                                        <button class="btn btn-primary" type="reset" >Nhập lại</button>
                                </div>
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