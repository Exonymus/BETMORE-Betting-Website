@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="{{asset('css/index.css')}}"/>

@endsection

@section('title')
    <title>Home - BETMORE</title>
@endsection

@section('scripts')


    <script>
        // Simulate loading delay (For Ignat to check loading screen)
        setTimeout(function () {
            // Remove the loading screen when content is ready
            document.querySelector('#loading-screen__ifr').classList.add('d-none');
            document.querySelector('#sorry-screen__ifr').classList.remove('d-none');
            // document.querySelector('#live-bets__ifr').classList.remove('d-none');
            document.querySelector('#pre-bets__ifr').classList.remove('d-none');
        }, 1500); // 2000 milliseconds (2 seconds) delay for demonstration purposes
    </script>
@endsection

@section('content')
    <main class="page__main page-home__main">
        <section class="betting-carousel__bet-zone">
            <header>
                <div class="sport-buttons">
                    <!--Здесь переключая кнопки - переключаешь классы btn-primary на btn-outline-primary и btn-lg-->
                    <button id="cs-go-button" type="button" class="btn btn-primary btn-lg btn-floating">
                        <img src="img/logos/csgo.svg" alt="">
                        <b>CS:GO</b>
                    </button>
                    <button id="dota2-button" type="button" class="btn btn-outline-primary btn-floating">
                        <img src="img/logos/dota2.svg" alt="">
                        <b>DOTA2</b>
                    </button>
                    <button id="lol-button" type="button" class="btn btn-outline-primary btn-floating">
                        <img src="img/logos/lol.svg" alt="">
                        <b>LOL</b>
                    </button>
                    <button id="valorant-button" type="button" class="btn btn-outline-primary btn-floating">
                        <img src="img/logos/valorant.svg" alt="">
                        <b>VALORANT</b>
                    </button>
                </div>
            </header>
            <main>
                <div id="carousels" class="carousel-container">
                    <!--                    Bets Categories-->
                    <div class="nav nav-tabs carousel-category" id="nav-tab" role="tablist">
                        <button class="nav-link active bet-category"
                                id="live-bets__tab"
                                data-bs-toggle="tab" data-bs-target="#live-bets"
                                type="button" role="tab"
                                aria-controls="live-bets"
                                aria-selected="true">Live Bets
                        </button>
                        <button class="nav-link bet-category"
                                id="pre-bets__tab"
                                data-bs-toggle="tab" data-bs-target="#pre-bets"
                                type="button" role="tab"
                                aria-controls="pre-bets"
                                aria-selected="false">Pre-Bets
                        </button>
                    </div>
                    <!--                    Loading Screen-->
                    <iframe
                        id="loading-screen__ifr"
                        src="{{ route('partials.loading__screen') }}"
                        class="bets__carousel-module">
                    </iframe>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active"
                             id="live-bets"
                             role="tabpanel"
                             aria-labelledby="live-bets__tab">
                            <!--                    Live Bets Carousel-->
                            <iframe
                                id="live-bets__ifr"
                                src="{{ route('partials.bets__carousel') }}"
                                class="bets__carousel-module d-none">
                            </iframe>
                            <!--                    No Live Bets Screen-->
                            <iframe
                                id="sorry-screen__ifr"
                                src="{{ route('partials.sorry__screen') }}"
                                class="bets__carousel-module d-none">
                            </iframe>
                        </div>
                        <div class="tab-pane fade"
                             id="pre-bets"
                             role="tabpanel"
                             aria-labelledby="pre-bets__tab">
                            <!--                    Pre-Bets Carousel-->
                            <iframe
                                id="pre-bets__ifr"
                                src="{{ route('partials.bets__carousel') }}"
                                class="bets__carousel-module d-none">
                            </iframe>
                        </div>
                    </div>
                </div>
            </main>
        </section>

        <!--        Chat-->
        <iframe
            src="{{ route('partials.chat') }}" class="chat-module"
            frameborder="0">
        </iframe>
    </main>
@endsection
