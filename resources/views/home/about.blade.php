@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="{{asset('css/about.css')}}"/>
@endsection

@section('scripts')

@endsection

@section('content')
    <main class="page__main page-about-us__main">
        <!-- About Us Content -->
        <section class="about-us column justify-content-center">
            <div class="about-us-logo__wrapper">
                <div class="about-us-logo__container">
                    <img src="./img/title-icon.png" alt="Logo" class="about-us-logo">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="about-us__heading">ABOUT US</h2>
                    <p class="about-us__text">Welcome to BETMORE, operated by <b>I&I Corp</b>. Our platform is
                        designed to provide you with a
                        thrilling esports betting experience while adhering to the laws and regulations of the
                        Republic of Belarus.</p>
                    <p class="about-us__text">Our mission is to offer a safe and enjoyable environment for
                        esports enthusiasts to
                        engage in responsible betting on their favorite games.</p>
                </div>
            </div>
        </section>

        <!-- Terms & Conditions Section -->
        <section class="terms-and-conditions">
            <div class="card">
                <h2 class="card-header terms-card__header">Terms and Conditions</h2>
                <div class="card-body terms-card__content">
                    <div>
                        <p class="terms-content__header">By using our services, you agree to comply with the following terms and conditions:</p>
                        <ol class="terms-content__list">
                            <li>You must be of legal age in the Republic of Belarus to use our services.</li>
                            <li>You are responsible for ensuring that your use of our services complies with local
                                laws and regulations.
                            </li>
                            <li>You must create an account to use our betting services.</li>
                            <li>You may deposit funds into your account using approved payment methods.</li>
                            <li>You are solely responsible for any fees associated with deposits and withdrawals.
                            </li>
                            <li>We promote responsible gambling practices and offer options to set limits on your
                                deposits, losses, and session time.
                            </li>
                            <li>We may suspend or terminate your account for any violation of these terms.</li>
                            <li>We are not liable for any losses, damages, or expenses resulting from your use of
                                our services.
                            </li>
                            <li>These terms and conditions are governed by the laws of the Republic of Belarus.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
