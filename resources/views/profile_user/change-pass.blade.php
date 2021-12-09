@extends('master')

@section('title', 'Thay đổi mật khẩu')
@section('content')
<div class="container">
    <div class="heading-link m-3">
         <ul class="item">
              <li class="home d-inline">
                   <a href="{{route('home')}}">Trang Chủ</a>
              </li>
              >
              <li class="icon active d-inline">
                   <a href="{{ route('user.change.pass') }}">Thay đổi mật khẩu</a>
              </li>
         </ul>
    </div>
    <main class="main position-relative">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <form action="{{ route('user.post.pass', $id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header h4"><b>Thay đổi mật khẩu</b> </div>
                            <div class="card-body row">
                                @include('profile_user.option')
                                <div class="form-group col-9 d-inline">
                                    
                                    @include('alert')
                                    
                                   <div class="form-group row">
                                        <label class="control-label col-sm-3" for="password_old">Mật khẩu cũ:</label>
                                        <input type="password" class="col-sm-6" name="password_old" id="password_id" required>
                                   </div>
                                   <div class="form-group row">
                                        <label class="control-label col-sm-3" for="password_new">Mật khẩu mới:</label>
                                        <input type="password" class="col-sm-6" name="password_new" id="password_new" required>
                                   </div>
                                   <div class="form-group row">
                                        <label class="control-label col-sm-3" for="password_confirm">Nhập lại mật khẩu:</label>
                                        <input type="password" class="col-sm-6" name="password_confirm" id="password_confirm" required>
                                   </div>
                                   <div class="form-group">
                                        <div class="col-sm-offset-4">
                                             <button type="submit" class="btn btn-login bg-primary col-sm-3 text-white">Xác nhận </button>
                                        </div>
                                   </div>
                                      
                                </div>
                            </div> 
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
