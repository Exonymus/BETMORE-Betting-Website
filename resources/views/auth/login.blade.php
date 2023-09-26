@extends('layouts.app')

@section('content')
        <main class="page-signin__main">
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
        <footer class="page-signin__footer">
            <div class="footer-content">
                <img src="img/logos/default-user.webp" alt="" class="footer__logo">
                <div class="users-statistics">
                    <p class="users-count">10000</p>
                    <h3>Users Registered</h3>
                </div>
            </div>
        </footer>
@endsection
