<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
   
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        @php $lang =  session('locale') @endphp
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#">@lang('lang.text_hello') {{ Auth::user()->name ?? 'Guest' }}</a>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                    @guest
                    <li class="nav-item"> <a href="{{ route('auth.create') }}" class="nav-link">@lang('lang.text_register')</a></li>
                    <a class="nav-link --bs-blue" href="{{route('login')}}">@lang('lang.text_login')</a>
                  @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('index')}}">@lang('lang.text_home')</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('etudiant.create') }}">@lang('lang.text_add_student')</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.list') }}" >@lang('lang.text_list_users')</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('blog.index')}}">Blogs</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('logout')}}">@lang('lang.text_logout')</a></li>
                    @endguest
                    @if($lang == 'en')
                        <a class="flag-icon nav-link text-primary" href="{{route('lang', 'fr')}}">
                            <img src="https://www.countryflags.com/wp-content/uploads/france-flag-png-large.png" alt="French" class="mr-1">
                            Fr
                        </a>
                    @else
                        <a class="flag-icon nav-link text-primary" href="{{route('lang', 'en')}}">
                            <img src="https://www.countryflags.com/wp-content/uploads/united-kingdom-flag-png-large.png" alt="English" class="mr-1">
                            En
                        </a>
                    @endif
                    </ul>
                </div>
            </div>
        </nav>
     
        <section class="about-section text-center" id="about">
            <div class="container px-4 px-lg-5">
            @if(session('success'))
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                    @endif
                @yield('content')
                      
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Your Website 2023</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js')}}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        @yield('js')
    </body>
</html>




