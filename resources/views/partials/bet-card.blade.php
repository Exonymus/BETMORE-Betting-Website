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
                    <div style="display: none" id="match-id">0</div>
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
<script>
    // Event listener for messages from the parent frame
    window.addEventListener('message', handleMessage);

    // Event listener for the 'Place a Bet' button
    const betButton = document.querySelector('.bet-button');
    betButton.addEventListener('click', openBetOverlay);

    // Event listeners for coefficient selection
    const betOptions = document.querySelectorAll('.bet-coef');
    betOptions.forEach(function (option) {
        option.addEventListener('click', handleCoefficientSelection);
    });

    // Function to open the bet overlay
    function openBetOverlay() {
        const selectedCoefficient = document.querySelector('.bet-coef.selected');
        const matchId = document.querySelector('#match-id').innerText;

        if (!selectedCoefficient) {
            alert('Select a coefficient to place a bet.');
            return;
        }

        const selectedCoefValue = parseFloat(selectedCoefficient.innerText);

        // Send a message to the parent frame (carousel.html)
        window.parent.postMessage({
            action: 'openBetOverlay',
            bet_coef: selectedCoefValue,
            match_id: matchId,
            team_id: selectedCoefficient.id.substring(0, 5)
        }, '*');
    }

    // Function to handle messages from the parent frame
    function handleMessage(event) {
        if (event.source === window.parent) {
            if (event.data.action === 'unselectCoefficients') {
                unselectCoefficients();
                switchPlaceBetButton(false);
            }
            if (event.data.action === 'setBetInfo') {
                setBetInfo(event.data.betInfo);
            }
        }
    }

    // Function to unselect coefficients
    function unselectCoefficients() {
        betOptions.forEach(function (opt) {
            opt.classList.remove('selected');
        });
    }

    // Function to switch the 'Place a Bet' button state
    function switchPlaceBetButton(on) {
        const betSubmitBtn = document.querySelector('.bet-button');

        if (betSubmitBtn) {
            on ? betSubmitBtn.removeAttribute('disabled') :
                betSubmitBtn.setAttribute('disabled', 'true');
        }
    }

    // Set up data from the bet-info
    function setBetInfo(betInfoStr) {
        const betInfo = JSON.parse(betInfoStr);

        // Update the match-header content
        // Status
        document.getElementById('match-status').innerHTML = betInfo.header.match_status;
        document.getElementById('match-status').classList.add(
            betInfo.header.match_status === 'Live' ? 'live' : 'scheduled');

        // Handler
        document.getElementById('match-handler').innerHTML = betInfo.header.match_handler;
        document.getElementById('match-id').innerHTML = betInfo.details.match_id;


        // Update the main match content
        // Team1
        document.getElementById('team1-logo').src = betInfo.team1.logo;
        document.getElementById('team1-name').innerHTML = betInfo.team1.name;
        document.getElementById('team1-coef').innerHTML = betInfo.team1.coef;
        document.getElementById('team1-score').innerHTML = betInfo.team1.score;

        // Team2
        document.getElementById('team2-logo').src = betInfo.team2.logo;
        document.getElementById('team2-name').innerHTML = betInfo.team2.name;
        document.getElementById('team2-coef').innerHTML = betInfo.team2.coef;
        document.getElementById('team2-score').innerHTML = betInfo.team2.score;

        // Match Info
        document.getElementById('match-date').innerHTML = betInfo.details.match_date;
        document.getElementById('match-time').innerHTML = betInfo.details.match_time;
        document.getElementById('match-type').innerHTML = `Match Type: <strong>${betInfo.details.match_type}</strong>`;
    }

    // Function to handle coefficient selection
    function handleCoefficientSelection() {
        betOptions.forEach(function (opt) {
            opt.classList.remove('selected');
        });

        this.classList.add('selected');
        switchPlaceBetButton(true);

        // Send coefSelected message
        window.parent.postMessage({
            action: 'coefSelected',
        }, '*');
    }

    // Function to update scores and apply animations
    function updateScores(newTeam1Score, newTeam2Score) {
        const team1Score = document.getElementById('team1-score');
        const team2Score = document.getElementById('team2-score');

        if (team1Score.innerText !== newTeam1Score) {
            team1Score.classList.add('score-change');
        }
        if (team2Score.innerText !== newTeam2Score) {
            team2Score.classList.add('score-change');
        }

        team1Score.innerText = newTeam1Score;
        team2Score.innerText = newTeam2Score;

        if (newTeam1Score > newTeam2Score) {
            team1Score.classList.add('leading-score');
            team2Score.classList.remove('leading-score');
        } else if (newTeam2Score > newTeam1Score) {
            team2Score.classList.add('leading-score');
            team1Score.classList.remove('leading-score');
        } else {
            team1Score.classList.remove('leading-score');
            team2Score.classList.remove('leading-score');
        }

        setTimeout(() => {
            team1Score.classList.remove('score-change');
            team2Score.classList.remove('score-change');
        }, 500);
    }
</script>
</body>
</html>
