@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="{{asset('css/signup.css')}}"/>
@endsection

@section('title')
    <title>Sign Up - BETMORE</title>
@endsection

@section('scripts')
    <script type="module" src="{{asset('js/counter.js')}}"></script>
    @if ($errors->any())
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Display the toast
            var toast = new bootstrap.Toast(document.getElementById('error-toast'));
            toast.show();

            // Hide the toast after 15 seconds
            setTimeout(function () {
                toast.hide();
            }, 15000);
        });
    </script>
    @endif
@endsection

@section('content')
    <main class="page__main page-signup__main">
        <section class="main__auth-data">
            <header class="auth-data__header">
                <b>SIGN UP</b>
            </header>
            <main class="auth-data__main">
                <form class="main__form" method="POST" action="/register" id="authForm" name="signup" enctype="multipart/form-data">
                    @csrf
                    <input
                        class="form__input-field"
                        id="name"
                        type="text"
                        name="name"
                        placeholder="Nickname"
                        required/>
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
                    <input
                        class="form__input-field"
                        id="pass--repeat"
                        type="password"
                        name="password_confirmation"
                        placeholder="Repeat password"
                        minlength="8"
                        required/>
                    <input class="hidden" type="file" id="avatar" name="image"/>
                    <label class="paragraph form__input-file" for="avatar">Click to upload the avatar</label>
                    <label class="form-check-label terms-check align-items-center" for="acceptTerms">
                        <input type="checkbox" class="form-check-input" id="acceptTerms" name="acceptTerms" required>
                        I accept the <a href="{{route('home.about')}}" class="link terms-link" target="_blank">Terms and Conditions</a>
                    </label>
                    <button class="form__submit-btn" type="submit">
                        <b class="submit-btn__text">Sign Up</b>
                    </button>
                </form>
            </main>
            <footer class="auth-data__footer">
                <a class="auth-data__footer__link" href="signin.html">
                    Already a JukeBox user? Sign In
                </a>
            </footer>
        </section>
        <img class="auth__logo logo" alt="" src="img/logos/signup-logo.svg" id="sign-up__img"/>
    </main>
@endsection

@section('footer')
    <footer class="page-signup__footer">
        <div class="footer__user-statistics">
            <div class="statistics__info">
                <img src="{{asset("img/logos/users.svg")}}" alt="" class="footer__logo">
                <div class="users-statistics">
                    <p class="number-count" id="users-registered-count">10000</p>
                    <h3>Users</h3>
                </div>
            </div>
            <div class="statistics__info">
                <img src="{{asset("img/logos/bet.svg")}}" alt="" class="footer__logo">
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
                BETMORE ESPORT betting developed as student project in BSUIR, and operates in compliance with the laws of tax policy of the Republic of Belarus.

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

@section('toast')
    @if ($errors->any())
        <div id="error-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body" style="background-color: darkred;">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div style="color: white;">{{ $error }}</div>
                    @endforeach
                @endif
            </div>
        </div>
    @endif
@endsection
