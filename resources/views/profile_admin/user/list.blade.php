@extends('profile_admin.index')
@section('content')
    <div class="justify-content-center">
            <div class="card">
                <div class="card-header h5"><b>Quản Lí Người Dùng</b> </div>
                <nav class="navbar navbar-light bg-light justify-content-between">
                    <a href="{{ route('admin.user.create') }}" class="btn btn-dark text-light"><i class="fas fa-plus pr-1"></i>Thêm quản trị viên</a>
                    <form action="" method="get" class="form-inline">
                      <input class="form-control mr-sm-2" name="query" type="search" placeholder="Tìm Kiếm" aria-label="Search">
                      <button class="btn btn-outline-success my-2 my-sm-0 " ><i class="fas fa-search"></i></button>
                    </form>
                  </nav>
                <div class="card-body">
                    <table class="table table-hover text-center">
                        <thead>
                          <tr>
                            <th width="5%" >STT</th>
                            <th width="20%" class="text-left">Họ Tên</th>
                            <th width="20%" class="text-left">Email</th>
                            <th width="10%" >Avatar</th>
                            <th width="20%" >Số tiền</th>
                            <th width="10%" >Admin</th>
                            <th width="15%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @php
                            $stt = 0
                        @endphp
                          @if ($datas)
                            @foreach ( $datas as $data)
                                <tr>
                                    <th width="5%" class="align-middle">{{++$stt}}</th>
                                    <td width="20%" class="align-middle text-left" >{{$data->fullname}}</td>
                                    <td width="20%" class="align-middle text-left">{{$data->email}}</td>
                                    @if ($data->avatar)
                                      <td width="20%" class="align-middle"><img style="width:45px" src="{{ asset('storage/avatars/' .  $data->avatar) }}" alt="avatar"></td>
                                    @else
                                      <td width="20%" class="align-middle"> <img class="bg-dark" style="width:45px" src="https://salt.tikicdn.com/ts/upload/67/de/1e/90e54b0a7a59948dd910ba50954c702e.png"></td>
                                   
                                    @endif
                                    
                                    <td width="20%" class="align-middle">{{$data->money}}</td>
                                    <td width="10%" class="align-middle">
                                        @if ($data->admin == 0)
                                            <li class="text-success" style="list-style: none"><i class="fas fa-circle"></i></li>
                                        @else
                                            <li style="list-style: none"><i class="fas fa-circle"></i></li>
                                        @endif
                                    </td>
                                    <td width="15%" class="align-middle">
                                    <a href="{{ route('admin.user.edit', $data->id) }}" class="btn btn-outline-warning"><i class="fas fa-pen"></i></a>
                                        <button value="{{$data->id}}" type="button" 
                                            class="btn btn-outline-danger btn-delete"> <i class="fas fa-trash-alt"></i> </button>
                                    </td>
                                </tr>
                            @endforeach
                          @else
                            <tr>
                                <th colspan="10">Không có kết quả</th>
                            </tr>
                          @endif  
                          
                        </tbody>
                      </table>
                      {!! $datas->render() !!}
                </div>   
            </div>
    </div>
@endsection
