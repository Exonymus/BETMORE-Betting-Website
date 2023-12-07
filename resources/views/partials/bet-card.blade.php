<!DOCTYPE html>
<html lang="en">
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

    <!-- Page-specific styles -->
    <link rel="stylesheet" href="{{asset('css/bet-card.css')}}">
    <title>Bet-Card</title>
</head>
<body>
<div class="container">
    <div class="match">
        <div class="match-header">
            <div class="match-status" id="match-status">Status</div>
            <div class="match-handler" id="match-handler">Cyberport Match Handler
            </div>
        </div>
        <div class="match-content">
            <div class="column">
                <div class="team team--home">
                    <div class="team-logo">
                        <img src="{{asset("img/title-icon.png")}}" id="team1-logo" />
                    </div>
                    <h2 class="team-name" id="team1-name">Team1</h2>
                </div>
            </div>
            <div class="column">
                <div class="match-details">
                    <div class="match-date" id="match-date">
                        21.12 at <strong>19:00</strong>
                    </div>
                    <div class="match-score">
                        <span class="match-score-number" id="team1-score">0</span>
                        <span class="match-score-divider">:</span>
                        <span class="match-score-number" id="team2-score">0</span>
                    </div>
                    <div class="match-time-lapsed" id="match-time">
                        35 : 10
                    </div>
                    <div class="match-type" id="match-type">
                        Match Type: <strong>BO1</strong>
                    </div>
                    <div class="bet-coef__selection">
                        <button class="bet-coef" id="team1-coef">1.48</button>
                        <button class="bet-coef" id="team2-coef">1.54</button>
                    </div>
                    <button class="bet-button" disabled>
                        <b class="submit-btn__text">Place a Bet</b>
                    </button>
                </div>
            </div>
            <div class="column">
                <div class="team team--away">
                    <div class="team-logo">
                        <img src="{{asset("img/title-icon.png")}}" id="team2-logo"/>
                    </div>
                    <h2 class="team-name" id="team2-name">Team2</h2>
                </div>
            </div>
        </div>
    </div>

</div>

<!--Libraries-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>


<!--Scripts-->
<script type="module" src="{{asset('js/bet-card.js')}}"></script>
</body>
</html>
