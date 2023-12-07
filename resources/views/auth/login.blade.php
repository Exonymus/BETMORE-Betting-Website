@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="{{asset('css/signin.css')}}"/>
@endsection

@section('title')
    <title>Sign In - BETMORE</title>
@endsection

@section('scripts')
    <script type="module" src="{{asset('js/counter.js')}}"></script>
@endsection

@section('content')
    <main class="page__main page-signin__main">
        <section class="main__auth-data">
            <header class="auth-data__header">
                <b>SIGN IN</b>
            </header>
            <main class="auth-data__main">
                <form class="main__form" action="/login" method="post" id="authForm" name="signin">
                    @csrf
                    <input
                        class="form__input-field"
                        id="email"
                        type="email"
                        name="email"
                        placeholder="Email"
                        required/>
                    <input
                        class="form__input-field"
                        id="pass"
                        type="password"
                        name="password"
                        placeholder="Password"
                        minlength="8"
                        required/>
                    <button class="form__submit-btn" type="submit">
                        <b class="submit-btn__text">Sign In</b>
                    </button>
                </form>
            </main>
            <footer class="auth-data__footer">
                <a class="auth-data__footer__link" href="signup.html">
                    Still not a JukeBox user? Sign Up
                </a>
            </footer>
        </section>
        <img class="auth__logo logo" alt="" src="img/logos/signin-logo.svg" id="sign-in__img"/>
    </main>
@endsection

@section('footer')
    <footer class="page-signin__footer">
        <div class="footer__user-statistics">
            <div class="statistics__info">
                <img src="img/logos/default-user.svg" alt="" class="footer__logo">
                <div class="users-statistics">
                    <p class="number-count" id="users-registered-count">10000</p>
                    <h3>Users</h3>
                </div>
            </div>
            <div class="statistics__info">
                <img src="img/logos/bet.svg" alt="" class="footer__logo">
                <div class="users-statistics">
                    <p class="number-count" id="bets-made-count">1000</p>
                    <h3>Bets Made</h3>
                </div>
            </div>
        </div>
        <div class="page__footer">
            <div class="footer__copy">
                2023-2023 © Copyright BETMORE.com
                <br>
                BETMORE ESPORT betting developed as student project in BSUIR, and operates in compliance with the
                laws of tax policy of the Republic of Belarus.

            </div>
            <div class="footer__payment">
                <a href="https://freekassa.ru" target="_blank" rel="noopener noreferrer">
                    <img class="footer__payment__logo" src="https://cdn.freekassa.ru/banners/big-white-2.png"
                         title="Прием платежей на сайте для физических лиц и т.д." alt="">
                </a>
            </div>
        </div>
    </footer>
@endsection
