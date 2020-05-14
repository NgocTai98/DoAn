<div id="colorlib-subscribe">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="col-md-6 text-center">
                    <h2><i class="icon-paperplane"></i>Đăng ký nhận bản tin</h2>
                </div>                
                <div class="col-md-6">
                    @if (session('thongbao'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{ session('thongbao') }}</strong>
                        </div>
                    @endif
                    <form class="form-inline qbstp-header-subscribe" method="post" action="/sendmail"> @csrf
                        <div class="row">                           
                            <div class="col-md-12 col-md-offset-0">                                
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" id="email" required placeholder="Nhập email của bạn">
                                    <button type="submit" class="btn btn-primary">Đăng ký</button>                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>