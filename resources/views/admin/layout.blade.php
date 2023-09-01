<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin</title>
{{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
{{-- icons bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body style="width: 100vw; height: 100vh; overflow-y: hidden; overflow-x:hidden; background-color: #F8F8F8;">
  <nav class="navbar navbar-expand-lg bg-body-tertiary" style="margin: 0!important; padding: 1rem!important; background-color: white!important;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('img/logo.png') }}" alt="">
      </a>
      <div>
        <button class="d-flex justify-content-center align-items-center border-0" style="background-color: transparent; font-family: 'Poppins', sans-serif;" type="button">
          <div class="me-2">
            <div style="font-size: 10px; text-align:right; color: #41A0E4">
              Hallo Admin,
            </div>
            <div style="font-size: 14px; text-align:right;">
              Aden S. Putra
            </div>
          </div>
          <div>
            <img src="{{ asset('img/avatar.png') }}" alt="" style="border-radius: 50%; width: 40px">
          </div>
        </button>
      </div>
    </div>
  </nav>
  <div class="d-flex" style="height: 100%">
    <div class="d-flex flex-column flex-shrink-0 p-3 h-100" style="width: 280px; background-color: white;">
        <ul class="nav nav-pills flex-column mb-auto">
          <li @if(Request::is('admin/dashboard')) style="background-color: #41A0E4" @endif class="menu">
            <a href="{{ route('admin.dashboard') }}" class="nav-link link-dark d-flex align-items-center" @if(Request::is('admin/dashboard')) style="color:white!important; font-weight: 600" @endif>
              @if(Request::is('admin/dashboard'))
                <img src="{{ asset('img/House-white.svg') }}" alt="">
              @else
                <img src="{{ asset('img/House.svg') }}" alt="">
              @endif
              <div class="ms-2">
                Dashboard
              </div>
            </a>
          </li>
          <li @if(Request::is('admin/user_management')) style="background-color: #41A0E4" @endif class="menu">
            <a href="{{ route('admin.user_management') }}" class="nav-link link-dark d-flex align-items-center" @if(Request::is('admin/user_management')) style="color:white!important; font-weight: 600" @endif>
              @if(Request::is('admin/user_management'))
                <img src="{{ asset('img/User-white.svg') }}" alt="">
              @else
                <img src="{{ asset('img/User.svg') }}" alt="">
              @endif
              <div class="ms-2">
                Manajemen User
              </div>
            </a>
          </li>
          <li @if(Request::is('admin/product_management')) style="background-color: #41A0E4" @endif class="menu">
            <a href="{{ route('admin.product_management') }}" class="nav-link link-dark d-flex align-items-center" @if(Request::is('admin/product_management')) style="color:white!important; font-weight: 600" @endif>
              @if(Request::is('admin/product_management'))
                <img src="{{ asset('img/Notebook.svg') }}" alt="">
              @else
                <img src="{{ asset('img/Notebook.svg') }}" alt="">
              @endif
              <div class="ms-2">
                Manajemen Produk
              </div>
            </a>
          </li>
        </ul>
    </div>

      @yield('content')
    </div>

    <style>
      .menu {
        margin-top: 0.7rem;
      }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>