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
                <a href="{{route('my-order', $id )}}">Đơn hàng của tôi</a>
            </li>
        </ul>
    </div>
    <main class="main position-relative">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header h4"><b>Đơn hàng của tôi</b> </div>
                        <div class="card-body row">
                            @include('profile_user.option')

                            <div class="form-group col-9">
                                <table class="table text-center">
                                    <thead class="thead-dark ">
                                        <tr>
                                            <th scope="col">Mã</th>
                                            <th scope="col">Ingame</th>
                                            <th scope="col">Tài khoản</th>
                                            <th scope="col">Mật Khẩu</th>
                                            <th scope="col">Giá (VNĐ)</th>
                                            <th scope="col">Ngày mua</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $data)
                                            <tr>
                                                <th scope="row"><a href="{{ route('home.view', $data->nick_id) }}">{{ $data->code }}</a></th>
                                                <td>{{ $data->ingame }}</td>
                                                <td>{{ $data->username }}</td>
                                                <td>{{ $data->password }}</td>
                                                <td>{{ number_format($data->price,0,",",".") }}.000</td>
                                                <td>{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</div>
@endsection
