@extends('master')

@section('title', 'Thông Tin Cá Nhân')
@section('content')
<div class="container">
    <div class="heading-link m-3">
         <ul class="item">
              <li class="home d-inline">
                   <a href="{{route('home')}}">Trang Chủ</a>
              </li>
              >
              <li class="icon active d-inline">
                   <a href="{{route('user-profile')}}">Thông Tin Cá Nhân</a>
              </li>
         </ul>
    </div>
    <main class="main position-relative">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <form action="{{ route('user-update', $id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header h4"><b>Thông Tin Cá Nhân</b> </div>
                            <div class="card-body row">
                                @include('profile_user.option')
                                <div class="form-group col-6 d-inline">
                                    
                                    @include('alert')
                                    
                                   <div class="form-group row">
                                        <label class="control-label col-sm-2" for="email">Email:</label>
                                        <div class="col-sm-8">
                                            {{$data->email}}
                                        </div>
                                   </div>
                                   <div class="form-group row">
                                        <label class="control-label col-sm-2" for="email">Họ Tên:</label>
                                        <input type="text" class="col-sm-8" value="{{$data->fullname}}" name="fullname">
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2" for="email">Số dư:</label>
                                        <div class="col-sm-8">
                                           {{ number_format($data->money,0,",",".") }}.000 VNĐ
                                        </div>
                                    </div>
                                   <div class="form-group">
                                        <div class="col-sm-offset-2">
                                             <button type="submit" class="btn btn-login bg-primary col-sm-4 text-white">Sửa Thông Tin</button>
                                        </div>
                                   </div>
                                      
                                </div>
                                <div class="form-group col-3">
                                    <div class="profile-avatar bg-warning ml-3">
                                        @if (!isset($data->avatar))
                                            <img src="https://salt.tikicdn.com/ts/upload/67/de/1e/90e54b0a7a59948dd910ba50954c702e.png">
                                        @else
                                            <img class="d-block" src="{{ asset('storage/avatars/' .  $data->avatar) }}">
                                        @endif
                                    </div>
                                    <div class="mt-3">
                                        <label for="avatar" class="btn"> <u> <i> Thay đổi hình đại diện </i>  </u></label>
                                        <input type="file" name="avatar"  accept="image/*" id="avatar" hidden>
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
