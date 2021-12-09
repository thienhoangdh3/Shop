<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> ADMIN </title>
    <link rel="stylesheet" href="{{asset('css/style_admin.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" integrity="sha512-u7ppO4TLg4v6EY8yQ6T6d66inT0daGyTodAi6ycbw9+/AU8KMLAF7Z7YGKPMRA96v7t+c7O1s6YCTGkok6p9ZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
        <img class="icon" src="{{asset('img/TeamShop-logos_white.png')}}" alt="">
        <div class="logo_name">TeamShop</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
        <li>
            <i class='bx bx-search' ></i>
            <input type="text" placeholder="Search...">
            <span class="tooltip">Search</span>
        </li>

        <li>
            <a href="#">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>

        <li>
            <a href="{{route('admin.user.list')}}">
                <i class='bx bx-user' ></i>
                <span class="links_name">User</span>
            </a>
            <span class="tooltip">User</span>
        </li>

        <li>
            <a href="{{ route('nick.index') }}">
                <i class='bx bx-folder' ></i>
                <span class="links_name">Nick</span>
            </a>
            <span class="tooltip">Nick</span>
        </li>

        <!-- <li>
            <a href="#">
                <i class='bx bxs-credit-card-front'></i>
                <span class="links_name">Thẻ cào</span>
            </a>
            <span class="tooltip">Thẻ Cào</span>
        </li> 

        <li>
            <a href="#">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="links_name">Thống Kê</span>
            </a>
            <span class="tooltip">Thống Kê</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-chat' ></i>
                <span class="links_name">Tin Nhắn</span>
            </a>
            <span class="tooltip">Tin Nhắn</span>
        </li>


        <li>
            <a href="#">
                <i class='bx bx-cog' ></i>
                <span class="links_name">Setting</span>
            </a>
            <span class="tooltip">Setting</span>
        </li> -->

        <li class="profile">
            <div class="profile-details">
            {{-- @if (!session('avatar'))
                <img class="profile-icon" src="https://salt.tikicdn.com/ts/upload/67/de/1e/90e54b0a7a59948dd910ba50954c702e.png">
            @else --}}
                <img class="profile-icon" src="../public/img/TeamShop.png">
            {{-- @endif --}}
            <div class="name_job">
                <div class="name">{{session('fullname')}}</div>
                <div class="job">Admin</div>
            </div>
            </div>
            <a href="{{route('logout')}}">
                <i class='bx bx-log-out' id="log_out" ></i>
            </a>
            
        </li>
    </ul>

    </div>
    <section class="home-section">
            @yield('content')
    </section>

    <script src="{{asset('js/admin/script.js')}}"></script>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
</body>
</html>
