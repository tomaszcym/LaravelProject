<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    {!! SEOMeta::generate() !!}


    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


    <link rel="shortcut icon" type="image/png" href="{{asset('image/favicon.png')}}"/>


    <link rel="stylesheet" href="{{asset('css/bootstrap_front.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/simple-lightbox.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>--}}
{{--    <script src="{{asset('js/snap-scroll.js')}}"></script>--}}
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/slick.js')}}"></script>
    <script src="{{asset('js/simple-lightbox.js')}}"></script>
    <script src="{{asset('js/frontend.js')}}"></script>

</head>
<body>



{{--<header class="header-global">--}}
{{--    <section class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-auto d-flex align-items-center">--}}
{{--                <div class="logo">--}}
{{--                    <a href="{{route('page.show.home')}}" title="{{GetConstField('page_name')}}">--}}
{{--                        <img src="{{asset('image/logo.png')}}" alt="{{GetConstField('page_name')}}">--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md">--}}
{{--                <a href="#" class="scroll-down arrow"><i class="fas fa-long-arrow-alt-down"></i></a>--}}
{{--                <div class="content">--}}
{{--                    <div class="search">--}}
{{--                        <input id="search_input" type="text" class="form-control" placeholder="Wyszukaj">--}}
{{--                        <a href="#" class="icon">--}}
{{--                            <i class="fas fa-search"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="contact">--}}
{{--                        <span><i class="fas fa-phone"></i> Zadzwoń teraz</span>--}}
{{--                        <a href="tel:{{GetConstField('phone_1')}}" title="Telefon kontaktowy">{{GetConstField('phone_1')}}</a>--}}
{{--                        <button class="menu-toggle-button"><i class="fa fa-bars"></i></button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--</header>--}}



<section class="nav-global">
    <div class="container">
        <div class="row">
            <div class="col-lg">
                <a href="{{route('page.show.home')}}" title="{{GetConstField('page_name')}}" class="logo">
                    <img src="{{asset('image/logo.png')}}" alt="{{GetConstField('page_name')}}">
                    <button class="menu-toggle-button"><i class="fa fa-bars"></i></button>
                </a>
            </div>
            <div class="col-lg-auto">
                <nav class="menu">
                    <ul>
                        <li class="{{ request()->routeIs('page.show.home') ? 'active' : '' }}">
                            <a href="{{route('page.show.home')}}"><i class="fa fa-home mr-2"></i>Strona główna</a>
                        </li>
                        <li class="{{ request()->routeIs('offer.*') ? 'active' : '' }}">
                            <a href="{{route('offer.index')}}"><i class="far fa-list-alt mr-2"></i>Oferta</a>
                        </li>
                        <li class="{{ request()->routeIs('page.show.galeria') ? 'active' : '' }}">
                            <a href="{{route('page.show.galeria')}}"><i class="far fa-images mr-2"></i>Galeria</a>
                        </li>
                        <li class="{{ request()->routeIs('page.show.dostawa-kostki') ? 'active' : '' }}">
                            <a href="{{route('page.show.dostawa-kostki')}}"><i class="fas fa-truck mr-2"></i>Dostawa kostki</a>
                        </li>
                        <li>
                            <a href="https://www.bruk-bet.pl/do-pobrania" target="_blank"><i class="fas fa-donate mr-2"></i>Cennik</a>
                        </li>
                        <li class="{{ request()->routeIs('page.show.kontakt') ? 'active' : '' }}">
                            <a href="{{route('page.show.kontakt')}}"><i class="far fa-address-card mr-2"></i>Kontakt</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>



@yield('content')



{{--<footer class="footer-global">--}}
{{--    <section class="copyright-section">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md">--}}
{{--                    <p class="par-1 text">Wszystkie prawa zastrzeżone <a href="www.markub.eu">www.markub.eu</a></p>--}}
{{--                </div>--}}
{{--                <div class="col-md-auto">--}}
{{--                    <div class="content">--}}
{{--                        <p class="text"><i class="fa fa-phone mr-2"></i>Telefon: <a href="tel:{{GetConstField('phone_1')}}" title="Telefon kontaktowy">{{GetConstField('phone_1')}}</a></p>--}}
{{--                        <p class="text"><i class="fa fa-envelope mr-2"></i>E-mail: <a href="mailto:{{GetConstField('email_1')}}" title="Adres email">{{GetConstField('email_1')}}</a></p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md">--}}
{{--                    <p class="par-1 code-by"><a href="https://www.palmax.com.pl">palmax.com.pl</a></p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--</footer>--}}
<footer class="footer-global">
    <section class="container info-container">
        <div class="row">
            <div class="col-md-6">
                <div class="content">
                    <a href="{{route('page.show.home')}}" title="{{GetConstField('page_name')}}" class="logo">
                        <img src="{{asset('image/logo.png')}}" alt="{{GetConstField('page_name')}}">
                    </a>
                    <div class="company">
                        {!! GetConstField('address') !!}
                    </div>
                    <p class="text"><i class="fa fa-phone mr-2"></i>Telefon: <a href="tel:{{GetConstField('phone_1')}}" title="Telefon kontaktowy">{{GetConstField('phone_1')}}</a></p>
                    <p class="text"><i class="fa fa-envelope mr-2"></i>E-mail: <a href="mailto:{{GetConstField('email_1')}}" title="Adres email">{{GetConstField('email_1')}}</a></p>
                </div>
            </div>
            <div class="col-md-6 position-unset p-0">
                <div class="map">
                    <iframe src="{{GetConstField('map_link')}}"
                            frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </section>


    <section class="copyright-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="par-1 text">Wszystkie prawa zastrzeżone <a href="www.markub.eu">www.markub.eu</a></p>
                </div>
                <div class="col-md-6">
                    <p class="par-1 code-by"><a href="https://www.palmax.com.pl">palmax.com.pl</a></p>
                </div>
            </div>
        </div>
    </section>
</footer>


<div hidden>Icons made by <a href="https://www.flaticon.com/authors/itim2101" title="itim2101">itim2101</a> from <a
        href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>



</body>
</html>
