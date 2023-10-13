<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="initial-scale=1, width=device-width"/>
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="img/title-icon.png">
    <link rel="stylesheet" href="css/global.css"/>
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/signin.css"/>
    <link rel="stylesheet" href="css/signup.css"/>
    <link rel="stylesheet" href="css/global.css"/>
    <link rel="stylesheet" href="css/bets__carousel-module.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <title>BETMORE</title>
</head>
<body>

@include('modal')

<div class="page-home-wrapper">
    <div class="page-home">
        <header class="page-home__header">
            <nav class="page-home__header__content navbar">
                <span class="navbar__brand">
                    <img class="brand__name" alt="" src="img/logos/site-logo.svg"/>
                </span>

                <nav class="navbar navbar__collapse navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                        <ul class="collapse__nav__content h6">
                            <li class="nav-link" id="page-home">
                                <a href="{{ route('home.index') }}" id="nav-link-home" class="link link--current">Home</a>
                            </li>
                            <li class="nav-link" id="page-home">
                                <a href="{{ route('matches.load') }}" id="nav-link-home" class="link link--current">Load</a>
                            </li>
                            <li class="nav-link d-none" id="page-profile">
                                <a href="profile.html" class="link">Profile</a>
                            </li>
                            <li class="nav-link d-none" id="page-deposit">
                                <a href="deposit.html" class="link">Deposit</a>
                            </li>
                            <li class="nav-link d-none" id="page-withdraw">
                                <a href="withdraw.html" class="link">Withdraw</a>
                            </li>
                            <li class="nav-link" id="page-aboutus">
                                <a href="about.html" class="link">About Us</a>
                            </li>
                            <li class="nav-link" id="page-aboutus">
                                <a href="{{ route('withdraw_approval.index') }}" class="link">Approve</a>
                            </li>
                            @guest
                                <li class="nav-link" id="page-signIn">
                                    <a href="{{ route('session.create') }}" class="link">Sign-In</a>
                                </li>
                                <li class="nav-link" id="page-signUp">
                                    <a href="{{ route('register.create') }}" class="link">Sign-Up</a>
                                </li>
                            @else
                                <li class="nav-link" id="page-signOut">
                                    <a href="{{ route('session.destroy') }}" class="link">Sign-Out</a>
                                </li>
                                <img src="{{ asset('storage/'.Auth::user()->avatar) }}" style="height: 50px;width:100px;">
                            @endguest
                        </ul>
                    </div>
                </nav>
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

    </div>
</div>

<!--Scripts-->
<script type="module" src="js/global.mjs"></script>
<script type="module" src="js/index.js"></script>
<script type="module" src="js/signin.js"></script>
<script type="module" src="js/signup.js"></script>

<!--Libraries-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
