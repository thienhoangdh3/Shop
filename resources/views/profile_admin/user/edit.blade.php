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
                @include('alert')
                <form action="{{ route('admin.user.update', $datas->id) }}" method="POST" enctype="multipart/form-data" class="row">
                    @csrf
                    

                    <div class="col-2">
                        <div class="profile-avatar bg-warning">
                            @if (!isset($datas->avatar))
                                <img src="https://salt.tikicdn.com/ts/upload/67/de/1e/90e54b0a7a59948dd910ba50954c702e.png">
                            @else
                                <img class="d-block" src="{{ asset('storage/avatars/' .  $datas->avatar) }}">
                            @endif
                        </div>
                        <div class="mt-3">
                            <label for="avatar" class="btn"> <u> <i> Thay đổi hình đại diện </i>  </u></label>
                            <input type="file" name="avatar"  accept="image/*" id="avatar" hidden>
                        </div>
                    </div>

                    <div class="col-10">
                    <input type="hidden" name="recaptcha" id="recaptcha" required>
                    <div class="form-group row">
                        <label for="fullname" class="col-md-4 col-form-label text-md-right"><b>Họ và tên:</b></label>
                        <div class="col-md-6">
                            <input type="text" id="fullname" class="form-control" placeholder="Họ và tên"
                            value="{{ $datas->fullname }}" name="fullname" required maxlength="60">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right"><b>Email:</b></label>
                        <div class="col-md-6">
                            <input type="email" id="email" class="form-control" placeholder="Email"
                            value="{{ $datas->email }}" name="email" required >
                        </div>
                    </div>

                    <div class="offset-md-5">
                        <button type="submit" class="btn btn-primary">
                            Xác Nhận
                        </button>
                    </div>
                    </div>
                </form>
            </div>
            
        </div>   
    </div>
</div>
@endsection
