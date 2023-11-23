<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="initial-scale=1, width=device-width"/>

    <!--Libraries-->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="img/title-icon.png">

    <!--Styles-->
    <link rel="stylesheet" href="{{asset('css/global.css')}}"/>

    @yield('links')
    @yield('title')

</head>
<body>
<div class="page__wrapper">
    <div class="page">
        <header class="page__header">
            <nav class="page__navbar navbar">
                <span class="navbar__brand">
                    <img class="brand__name" alt="" src="img/logos/site-logo.svg"/>
                </span>

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                        <ul class="collapse__nav__content h6">
                            @can('browse_admin')
                                <li class="nav-link" id="page-home">
                                    <a href="{{route('voyager.dashboard')}}" id="nav-link-home" class="link link--current">Admin</a>
                                </li>
                            @endcan
                            <li class="nav-link" id="page-home">
                                <a href="{{route('home.index')}}" id="nav-link-home" class="link link--current">Home</a>
                            </li>
                            @guest
                                <li class="nav-link" id="page-aboutus">
                                    <a href="{{route('home.about')}}" class="link">About Us</a>
                                </li>
                                <li class="nav-link" id="page-signIn">
                                    <a href="{{route('session.create')}}" class="link">Sign-In</a>
                                </li>
                                <li class="nav-link" id="page-signUp">
                                    <a href="{{route('register.create')}}" class="link">Sign-Up</a>
                                </li>
                            @else
                                <li class="nav-link" id="page-profile">
                                    <a href="{{route('home.index')}}" class="link">Profile</a>
                                </li>
                                <li class="nav-link" id="page-deposit">
                                    <a href="{{route('deposit.index')}}" class="link">Deposit</a>
                                </li>
                                <li class="nav-link" id="page-withdraw">
                                    <a href="{{route('withdraw.index')}}" class="link">Withdraw</a>
                                </li>
                                <li class="nav-link" id="page-signOut">
                                    <a href="{{route('session.destroy')}}" class="link">Sign-Out</a>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
                @guest
                @else
                    <div class="user-info h6">
                            <span class="user-info__coins">
                                <img src="img/logos/coin.svg" class="user__money" alt="">
                                <span id="user-coins">{{Auth::user()->coins}}</span>
                            </span>
                        <span class="user-info__gems">
                                <img src="img/logos/nolos.svg" class="user__money" alt="">
                                <span id="user-gems">{{Auth::user()->noloses}}</span>
                             </span>
                    </div>
                @endguest
                <div class="navbar__search h6">
                    <form class="form-inline navbar__search__content">
                        <input class="form-control mr-sm-2 search__input" type="search" placeholder="Search..."
                               aria-label="Search">
                        <button class="search__button"></button>
                    </form>
                </div>
            </nav>
        </header>

        @yield('content')

        @section('footer')
            @if (trim($__env->yieldContent('footer')))
                @yield('footer')
            @else
                <footer class="page__footer">
                    <div class="footer__copy">
                        2023-2023 © Copyright BETMORE.com
                        <br>
                        BETMORE ESPORT betting developed as student project in BSUIR, and operates in compliance with the laws of tax policy of the Republic of Belarus.

                    </div>
                    <div class="footer__payment">
                        <a href="https://freekassa.ru" target="_blank" rel="noopener noreferrer">
                            <img class="footer__payment__logo" src="https://cdn.freekassa.ru/banners/big-white-2.png"
                                 title="Прием платежей на сайте для физических лиц и т.д." alt="">
                        </a>
                    </div>
                </footer>
            @endif
        @show
    </div>
</div>


<!--Libraries-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>


<!--Scripts-->
@yield('scripts')
</body>
</html>
