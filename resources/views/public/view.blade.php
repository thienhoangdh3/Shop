@extends('master')

@section('title', 'Nick ')
@section('content')
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h2 class="text-info"><b>TÀI KHOẢN SỐ #{{ $datas->id }}</b></h2>
          <a href="{{ route('home') }}" class="btn btn-secondary mt-4"><i class="fas fa-long-arrow-alt-left"></i> Trở lại</a>
        </div>

        <div class="col-md-4 text-center">
        <h2 class="text-danger mt-2"><b>{{ $datas->ingame }}</b></h2>
          <h2 class="text-danger mt-2"><b>{{ $datas->price }}.000 VNĐ</b></h2>
        </div>

        <div class="col-md-4 text-right">
          @if($datas->status == 1)
              <a href="{{ route('home.buy', $datas->id) }}" class="btn btn-success"><h5 class="pt-2 py-2" id="buy"><b<i class="fas fa-shopping-cart"></i> MUA NGAY </b></h3></a>
          @endif
        </div>
      </div>

      <div class="c-content-divider">
        <i class="icon-dot"></i>
      </div>

      <div class="row">
        <div class="col-md-4">
          <h5 class="mt-3"><b>Phái: <span class="text-danger">{{ $datas->nick_class->class }}</span></b></h5>
          <h5 class="mt-3">
            <b>TTGT: 
              @if ($datas->clan == 0 ) 
                <span class="text-danger">Không</span> 
              @else
                <span class="text-danger">Có</span> 
              @endif
            </b>
          </h5>
        </div>

        <div class="col-md-4 text-center">
          <h5 class="mt-3"><b>Server: <span class="text-danger">{{ $datas->nick_sv->sv_name }}</span></b></h5>
          <h5 class="mt-3"><b>Level: <span class="text-danger">{{ $datas->level }}</span></b></h5>
        </div>

        <div class="col-md-4 text-center">
          <h5 class="mt-3"><b>Thông tin khác: <span class="text-danger">{!! $datas->notes !!}</span></b></h5>
        </div>
      </div>

      <div class="c-content-divider">
        <i class="icon-dot"></i>
      </div>

      <div class="container-img">
        <p class="text-center text-primary"><b> 1 Số hình ảnh của tài khoản:</b></p>

        <div class="img ">
          @php
              $img = json_decode($datas->images, true);
          @endphp
          @foreach ($img as $img)
              <img src="{{asset('storage/nick/'.$img)}}" alt="{{ $datas->ingame }}">
          @endforeach
        </div>
      </div>
    </div>
  </section>

  <script src="{{ asset('js/app.js') }}"></script>
@endsection
