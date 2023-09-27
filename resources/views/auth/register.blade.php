@extends('layouts.app')

@section('content')
        <main class="page-signup__main">
            <section class="main__auth-data">
                <header class="auth-data__header">
                    <b>SIGN UP</b>
                </header>
                <main class="auth-data__main">
                    <form class="main__form" method="POST" action="/register" id="authForm" name="signup" enctype="multipart/form-data">
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

                        <button class="form__submit-btn" type="submit">
                            <b class="submit-btn__text">Sign Up</b>
                        </button>
                        @if($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
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
        <footer class="page-signup__footer">
            <div class="footer-content">
                <img src="img/logos/default-user.webp" alt="" class="footer__logo">
                <div class="users-statistics">
                    <p class="users-count">10000</p>
                    <h3>Users Registered</h3>
                </div>
            </div>
        </footer>
@endsection
