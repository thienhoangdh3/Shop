@extends('master')

@section('title', 'Trang Chủ')
@section('content')
    @include('layouts.header')
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 ">
                @if($datas->count() > 0)
                     @foreach($datas as $data)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Sale badge-->
                                <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>

                                <!-- Product image-->
                                @php
                                    $img = json_decode($data->images, true);
                                @endphp
                                <a href="{{ route('home.view', $data->id) }}"><img class="card-img-top" src="{{asset('storage/nick/' . $img[0])}}" alt=""></a>

                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{$data->ingame}}</h5>
                                        <div class="row">
                                            @if($data->clan == 1)
                                                <div class="col-6 d-flex justify-content-center small text-secondary mb-2">
                                                    TTGT: Có
                                                </div>
                                            @else
                                                <div class="col-6 d-flex justify-content-center small text-secondary mb-2">
                                                    TTGT: Không
                                                </div>
                                            @endif
                                            <div class="col-6 d-flex justify-content-center small text-secondary mb-2">
                                                    Class: {{$data->nick_class->class}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 d-flex justify-content-center small text-secondary mb-2">
                                                    Sv: {{$data->nick_sv->sv_name}}
                                            </div>
                                            <div class="col-6 d-flex justify-content-center small text-secondary mb-2">
                                                    Cấp: {{$data->level}}
                                            </div>
                                        </div>
                                        
                                        
                                        <!-- Product reviews
                                        <div class="d-flex justify-content-center small text-warning mb-2">
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                        </div>

                                         Product price-->
                                        <span class="text-danger text-decoration-line-through">Giá: {{ number_format($data->price,0,",",".") }}.000 VNĐ</span>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer px-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-danger mt-auto" href="{{ route('home.view', $data->id) }}">Chi tiết</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                
            </div>
        </div>
        {{ $datas->links() }}
        @endif
    </section>
@endsection
