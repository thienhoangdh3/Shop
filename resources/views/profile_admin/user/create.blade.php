@extends('profile_admin.index')
@section('content')
<div class="justify-content-center">
    <div class="card">
        <div class="card-header h2">
          <b>Thêm quản trị viên</b> 
          <a href="{{ route('admin.user.list') }}" class="btn btn-dark text-light float-right ">
            <i class="far fa-list-alt"></i>  Danh Sách
          </a>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('alert')

                    <input type="hidden" name="recaptcha" id="recaptcha" required>
                    <div class="form-group row">
                        <label for="fullname" class="col-md-4 col-form-label text-md-right pt-4"><b>Họ và tên:</b></label>
                        <div class="col-md-6">
                            <em class="text-danger small">Yêu cầu nhập tất cả các trường ở dưới</em>
                            <input type="text" id="fullname" class="form-control" placeholder="Họ và tên"
                            value="{{ old('fullname') }}" name="fullname" required maxlength="60">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right"><b>Email:</b></label>
                        <div class="col-md-6">
                            <input type="email" id="email" class="form-control" placeholder="Email"
                            value="{{ old('email') }}" name="email" required >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right"><b>Mật khẩu:</b></label>
                        <div class="col-md-6">
                            <input type="password" id="password" class="form-control" placeholder="Mật khẩu"
                            value="{{ old('password') }}" name="password" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password_confirm" class="col-md-4 col-form-label text-md-right"><b>Nhập lại mật khẩu:</b></label>
                        <div class="col-md-6">
                            <input type="password" id="password_confirm" class="form-control" placeholder="Nhập lại mật khẩu"
                            value="{{ old('password_confirm') }}" name="password_confirm" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="avatar"><b>Ảnh Đại Diện:</b> </label>
                        <div class="col-md-6 ">
                            <input type="file" class="btn border col-sm-12" id="avatar" name="avatar" accept="image/*" >
                        </div>
                    </div>

                    <div class="offset-md-5">
                        <button type="submit" class="btn btn-primary">
                            Xác Nhận
                        </button>
                    </div>
                    
                    
                </form>
            </div>
            
        </div>   
    </div>
</div>
@endsection
