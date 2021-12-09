@extends('profile_admin.index')
@section('content')
    <div class="justify-content-center">
            <div class="card">
                <div class="card-header h2">
                  <b>Quản Lí Nick</b> 
                  <a href="{{route('nick.create')}}" class="btn btn-dark text-light float-right ">
                    <i class="fas fa-plus pr-1"></i>  Thêm 
                  </a>
                </div>
                <nav class="navbar navbar-light bg-light justify-content-between">
                  <form action="{{route('nick.index')}}" method="get" class="form-inline">
                    <div class="border mr-5 select-box" >
                      <span class="p-2 border-right" for="servers">Server</span>
                      <select class="btn text-left" name="servers" id="servers">
                        <option active >Server</option>
                        @foreach ($sv as $sv)
                          <option value="{{$sv->id}}" >{{$sv->sv_name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="border mr-5 select-box">
                      <span class="p-2 border-right">Class</span>
                      <select class="btn text-left" name="class_acc" id="class_acc">
                        <option active >Class</option>
                        @foreach ($class as $class)
                          <option value="{{$class->id}}" >{{$class->class}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="border mr-5 select-box">
                      <span class="p-2 border-right">TTGT</span>
                      <select class="btn text-left" name="ttgt" id="ttgt" >
                        <option active>TTGT</option>
                        <option value="0" >Không</option>
                        <option value="1">Có</option>
                      </select>
                    </div>

                    <div class="border mr-5 select-box">
                      <span class="p-2 border-right">Status</span>
                      <select class="btn text-left" name="status" id="status" >
                        <option active>Tất Cả</option>
                        <option value="0" >Chưa bán</option>
                        <option value="1">Đã Bán</option>
                      </select>
                    </div>
                    
                    <div class="">
                      <input class="form-control mr-sm-2" name="query" type="search" placeholder="Tìm Kiếm" aria-label="Search">
                      <button class="btn btn-outline-success my-2 my-sm-0 " ><i class="fas fa-search"></i></button>
                    </div>
                      
                    </form>
                  </nav>
                <div class="card-body">
                    <table class="table table-hover text-center">
                        <em class="text-danger small">Đơn vị: x.000 VNĐ</em>
                        <thead>
                          <tr>
                            <th width="5%" >STT</th>
                            <th width="10%" >Ingame</th>
                            <th width="10%" >Level</th>
                            <th width="10%" >Server</th>
                            <th width="10%" >Class</th>
                            <th width="20%" >Thông Tin</th>
                            <th width="10%" >Giá Bán</th>
                            <th width="10%" >Status</th>
                            <th width="15%" > Action </th>
                          </tr>
                        </thead>
                        <tbody>
                        @php
                            $stt = 0
                        @endphp
                          @if (count($datas) > 0)
                            @foreach ( $datas as $data)
                                <tr>
                                    <th width="5%" class="align-middle">{{++$stt}}</th>
                                    <td width="10%" class="align-middle" >{{$data->ingame}}</td>
                                    <td width="10%" class="align-middle ">{{$data->level}}</td>
                                    <td width="10%" class="align-middle ">{{$data->nick_sv->sv_name}}</td>
                                    <td width="10%" class="align-middle ">{{$data->nick_class->class}}</td>
                                    <td width="40%" class="align-middle">{!!$data->notes!!}</td>
                                    <td width="10%" class="align-middle">{{$data->price}}</td>
                                    <td width="10%" class="align-middle">
                                      @if ($data->status == 0)
                                          <li class="text-success" style="list-style: none"><i class="fas fa-circle"></i></li>
                                      @else
                                          <li style="list-style: none"><i class="fas fa-circle"></i></li>
                                      @endif
                                    </td>
                                    <td width="10%" class="align-middle">
               
                                        <button value="{{$data->id}}" type="button" class="btn btn-outline-primary btn-view"
                                            data-toggle="modal" data-target="#view" > <i class="fas fa-eye" ></i>  </button>
                                        <a href="{{ route('nick.edit', $data->id) }}" class="btn btn-outline-warning"><i class="fas fa-pen"></i></a>
                                        <button value="{{ route('nick.delete', $data->id)}}" type="button" class="btn btn-outline-danger btn-delete"> 
                                            <i class="fas fa-trash-alt"></i> </button>
                                    </td>
                                </tr>
                            @endforeach
                          @else
                            <tr>
                                <th colspan="10" class="text-center">Không có kết quả</th>
                            </tr>
                          @endif  
                          
                        </tbody>
                      </table>
                      {!! $datas->render() !!}
                </div>   
            </div> 
    </div>

@include('profile_admin.nick.view')    



<script src="{{asset('js/admin/nick.js')}}"></script>
@endsection
