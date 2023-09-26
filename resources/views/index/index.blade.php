@extends('layouts.app')

@section('content')
    <main class="page-home__betting-carousel">
        <section class="betting-carousel__bet-zone">
            <header>
                <div class="sport-buttons">
                    <button id="cs-go-button">CS:GO</button>
                    <button id="dota2-button">DOTA2</button>
                    <button id="lol-button">LOL</button>
                    <button id="valorant-button">Valorant</button>
                </div>
            </header>
            <main>
                <div class="carousel-container">
                    <div class="carousel-category">
                        <button id="live-bets-button" class="category-button">Live Bets</button>
                        <button id="pre-bets-button" class="category-button">Pre Bets</button>
                    </div>
                    <div class="carousel">
                        <div class="carousel-inner" id="live-bets">
                            <!-- Sample Live Bets Cards -->
                            <div class="carousel-card">
                                <h3>Team 1 vs Team 2</h3>
                                <p>Bet Coefficients: 2.0 - 1.5</p>
                                <p>Tournament: Sample Tournament</p>
                                <p>Match Type: Live</p>
                                <p>Time Till Match: 45 mins</p>
                                <button class="bet-button">Make a Bet</button>
                            </div>
                            <div class="carousel-card">
                                <h3>Team A vs Team B</h3>
                                <p>Bet Coefficients: 1.8 - 1.6</p>
                                <p>Tournament: Another Tournament</p>
                                <p>Match Type: Live</p>
                                <p>Time Till Match: 30 mins</p>
                                <button class="bet-button">Make a Bet</button>
                            </div>
                            <div class="carousel-card">
                                <h3>Team 1 vs Team 2</h3>
                                <p>Bet Coefficients: 2.0 - 1.5</p>
                                <p>Tournament: Sample Tournament</p>
                                <p>Match Type: Live</p>
                                <p>Time Till Match: 45 mins</p>
                                <button class="bet-button">Make a Bet</button>
                            </div>
                            <div class="carousel-card">
                                <h3>Team A vs Team B</h3>
                                <p>Bet Coefficients: 1.8 - 1.6</p>
                                <p>Tournament: Another Tournament</p>
                                <p>Match Type: Live</p>
                                <p>Time Till Match: 30 mins</p>
                                <button class="bet-button">Make a Bet</button>
                            </div>
                            <div class="carousel-card">
                                <h3>Team A vs Team B</h3>
                                <p>Bet Coefficients: 1.8 - 1.6</p>
                                <p>Tournament: Another Tournament</p>
                                <p>Match Type: Live</p>
                                <p>Time Till Match: 30 mins</p>
                                <button class="bet-button">Make a Bet</button>
                            </div>
                        </div>
                        <div class="carousel-inner" id="pre-bets">
                            <!-- Sample Pre Bets Cards -->
                            <div class="carousel-card">
                                <h3>Team A vs Team B</h3>
                                <p>Bet Coefficients: 1.8 - 1.6</p>
                                <p>Tournament: Another Tournament</p>
                                <p>Match Type: Live</p>
                                <p>Time Till Match: 30 mins</p>
                                <button class="bet-button">Make a Bet</button>
                            </div>
                            <div class="carousel-card">
                                <h3>Team 1 vs Team 2</h3>
                                <p>Bet Coefficients: 2.0 - 1.5</p>
                                <p>Tournament: Sample Tournament</p>
                                <p>Match Type: Live</p>
                                <p>Time Till Match: 45 mins</p>
                                <button class="bet-button">Make a Bet</button>
                            </div>
                            <div class="carousel-card">
                                <h3>Team A vs Team B</h3>
                                <p>Bet Coefficients: 1.8 - 1.6</p>
                                <p>Tournament: Another Tournament</p>
                                <p>Match Type: Live</p>
                                <p>Time Till Match: 30 mins</p>
                                <button class="bet-button">Make a Bet</button>
                            </div>
                            <div class="carousel-card">
                                <h3>Team A vs Team B</h3>
                                <p>Bet Coefficients: 1.8 - 1.6</p>
                                <p>Tournament: Another Tournament</p>
                                <p>Match Type: Live</p>
                                <p>Time Till Match: 30 sss</p>
                                <button class="bet-button">Make a Bet</button>
                            </div>
                            <div class="carousel-card">
                                <h3>Team 1 vs Team 2</h3>
                                <p>Bet Coefficients: 2.0 - 1.5</p>
                                <p>Tournament: Sample Tournament</p>
                                <p>Match Type: Live</p>
                                <p>Time Till Match: 45 mins</p>
                                <button class="bet-button">Make a Bet</button>
                            </div>
                            <div class="carousel-card">
                                <h3>Team A vs Team B</h3>
                                <p>Bet Coefficients: 1.8 - 1.6</p>
                                <p>Tournament: Another Tournament</p>
                                <p>Match Type: Live</p>
                                <p>Time Till Match: 30 sss</p>
                                <button class="bet-button">Make a Bet</button>
                            </div>
                            <div class="carousel-card">
                                <h3>Team A vs Team B</h3>
                                <p>Bet Coefficients: 1.8 - 1.6</p>
                                <p>Tournament: Another Tournament</p>
                                <p>Match Type: Live</p>
                                <p>Time Till Match: 30 miasdns</p>
                                <button class="bet-button">Make a Bet</button>
                            </div>
                            <div class="carousel-card">
                                <h3>Team 1 vs Team 2</h3>
                                <p>Bet Coefficients: 2.0 - 1.5</p>
                                <p>Tournament: Sample Tournament</p>
                                <p>Match Type: Live</p>
                                <p>Time Till Match: 45 masdins</p>
                                <button class="bet-button">Make a Bet</button>
                            </div>
                            <div class="carousel-card">
                                <h3>Team A vs Team B</h3>
                                <p>Bet Coefficients: 1.8 - 1.6</p>
                                <p>Tournament: Another Tournament</p>
                                <p>Match Type: Live</p>
                                <p>Time Till Match: 30 asdmins</p>
                                <button class="bet-button">Make a Bet</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer>
                <div class="carousel-dots"></div>
                <div class="carousel-control">
                    <br>
                    <button class="prev-button">Prev</button>
                    <button class="next-button">Next</button>
                </div>
            </footer>
        </section>
    </main>
@endsection
