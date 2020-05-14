@extends('backend.master.master')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm Thành viên</h1>
        </div>
    </div>
    <!--/.row-->
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fas fa-user"></i> Thêm thành viên</div>
                <form action="" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="row justify-content-center" style="margin-bottom:40px">
    
                            <div class="col-md-8 col-lg-8 col-lg-offset-2">
                             
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control">
                                  {{ showErrors($errors, 'email') }}
                                </div>
                                <div class="form-group">
                                    <label>password</label>
                                    <input type="text" name="password" class="form-control">
                                    {{ showErrors($errors, 'password') }}
                                </div>
                                <div class="form-group">
                                    <label>Full name</label>
                                    <input type="fullname" name="fullname" class="form-control">
                                    {{ showErrors($errors, 'fullname') }}
                                </div>
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="age" name="age" class="form-control">
                                    {{ showErrors($errors, 'age') }}
                                </div>
                                <div class="form-group">
                                    <label>sex</label>
                                    <input type="sex" name="sex" class="form-control">
                                    {{ showErrors($errors, 'sex') }}
                                </div>
                              
                                <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" class="form-control">
                                        @if (auth()->user()->level == 1)
                                        <option value="1">SupperAdmin</option>
                                        <option value="2">Admin</option>
                                        <option selected value="3">User</option>
                                        @else
                                        <option value="2">Admin</option>
                                        <option selected value="3">User</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">
                                  
                                    <button class="btn btn-success"  type="submit">Thêm thành viên</button>
                                    <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
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