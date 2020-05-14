@extends('backend.master.master')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm Mã Coupon</h1>
        </div>
    </div>
    <!--/.row-->
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fas fa-user"></i> Thêm mã coupon</div>
                <form action="" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="row justify-content-center" style="margin-bottom:40px">
    
                            <div class="col-md-8 col-lg-8 col-lg-offset-2">
                             
                                <div class="form-group">
                                    <label class="control-label">Mã coupon</label>
                                    <input name="couponCode" required type="text" class="form-control"> </div>
                                    
                                <div class="form-group">
                                    <label class="control-label">Giảm</label>
                                    <input name="sale" required type="text" class="form-control"> </div>
                                    
                                <div class="form-group">
                                    <label class="control-label">Kiểu giảm</label>
                                    <select name="type" id="" class="form-control">
                                        <option value="0" selected>-- Chọn kiểu --</option>
                                        <option value="percent">Phần trăm</option>
                                        <option value="discount">Giảm tiền</option>
                                    </select>
                                        
                                <div class="form-group">
                                    <label class="control-label">Số lượng mã</label>
                                    <input name="totalCoupon" required type="text" class="form-control"> </div>  
                                    
                               
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">
                                  
                                    <button type="submit" class="btn btn-success">Thêm</button>
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