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
                                        <div class="col-sm-8">
                                            {{$data->fullname}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2" for="email">Số dư:</label>
                                        <div class="col-sm-8">
                                           {{ number_format($data->money,0,",",".") }}.000 VNĐ
                                        </div>
                                    </div>
                                   <div class="form-group">
                                        <div class="col-sm-offset-2">
                                             <a href="{{ route('user-edit') }}" class="btn btn-login bg-primary col-sm-4 text-white">Sửa Thông Tin</a>
                                        </div>
                                   </div>
                            </div>
                            <div class="form-group col-3">
                                <div class="profile-avatar bg-warning ml-3">
                                    @if ($data->avatar == 'NULL')
                                    <img src="https://salt.tikicdn.com/ts/upload/67/de/1e/90e54b0a7a59948dd910ba50954c702e.png">
                                @else
                                    <img class="d-block" src="{{ asset('storage/avatars/'.$data->avatar) }}">
                                @endif
                                </div>
                            </div>
                        </div> 
                         
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
