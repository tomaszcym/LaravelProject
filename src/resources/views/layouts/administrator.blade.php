<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TS CMS</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">

{{--    {{ HTML::script('assets/js/plugins/ckeditor/ckeditor.js') }}--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
    <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>

</head>
<body>



<header class="container-fluid shadow sticky-top">
    <div class="row">
        <div class="col-lg-4 bar-left d-flex align-items-center justify-content-between p-2">
            <a href="{{route('administrator.index')}}">
                <h1>palmax.com.pl</h1>
            </a>
            <button id="toggle-menu" class="btn btn-link text-primary" onclick="toggleMenu()"><i
                    class="fas fa-bars"></i></button>
        </div>
        <div class="col-lg">
            <div class="row h-100">
                <div class="col-lg-8 d-flex align-items-center p-2">
                    @if(Session::has('status'))
                        <div class="alert alert-{{Session::get('alert-class')}}" role="alert">
                            {{Session::get('status')}}
                        </div>
                    @endif
                </div>
                <div class="col-lg-4 d-flex align-items-center justify-content-md-end ">
                    <ul id="top-menu-user" class="menu p-2">
                        <li>
                            <a href="{{route('page.show.home')}}" target="_blank">
                                <i class="fas fa-link"></i>
                                Strona główna serwisu
                            </a>
                        </li>
                        <li>
                            <span>
                                <i class="fas fa-user"></i>
                                {{Auth::user()->name}}
                            </span>
                        </li>
                        <li>
                            <a href="{{route('logout')}}" data-toggle="tooltip" data-placement="bottom" title="Wyloguj">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>


<section class="container-fluid">
    <div class="row">
        <div class="col-lg-4 bar-left p-0">
            <nav id="menu" class="shadow">
                <ul class="menu">
                    <li>
                        <a href="{{route('administrator.index')}}">
                            <i class="fas fa-home"></i>
                            Strona główna
                        </a>
                    </li>
                    <li>
                        <a href="{{route('administrator.const-field.edit')}}">
                            <i class="far fa-file-alt"></i>
                            Dane serwisu
                        </a>
                    </li>
                    <li>
                        <a href="{{route('administrator.page.index')}}">
                            <i class="fas fa-th-list"></i>
                            Strony
                        </a>
                    </li>
                    <li>
                        <a href="{{route('administrator.offer.index')}}">
                            <i class="fab fa-buffer"></i>
                            Oferta
                        </a>
                    </li>
                    <li>
                        <a href="{{route('administrator.realization.index')}}">
                            <i class="fab fa-buffer"></i>
                            Referencje
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="{{route('administrator.user.edit')}}">
                            <i class="fas fa-user"></i>
                            Użytkownik
                        </a>
                    </li>
                    <ul id="main-menu-user">
                        <li>
                            <hr>
                        </li>
                        <li>
                            <span>
                                <i class="fas fa-user"></i>
                                {{Auth::user()->name}}
                            </span>
                        </li>
                        <li>
                            <a href="{{route('logout')}}">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                        </li>
                    </ul>
                </ul>
            </nav>
        </div>
        <main class="col-lg">
            @yield('content')
        </main>
    </div>
</section>


<footer class="container-fluid shadow">
    <div class="row">
        <div class="col d-flex flex-column justify-content-center align-items-center p-2">
            <span>Wszystkie prawa zastrzeżone</span>
            <a href="http://palmax.com.pl/">palmax.com.pl</a>
        </div>
    </div>
</footer>




</body>
</html>
