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

    if (!selectedCoefficient) {
        alert('Select a coefficient to place a bet.');
        return;
    }

    const selectedCoefValue = parseFloat(selectedCoefficient.innerText);

    // Send a message to the parent frame (carousel.html)
    window.parent.postMessage({
        action: 'openBetOverlay',
        bet_coef: selectedCoefValue,
        match_id: 1,
        team_id: selectedCoefficient.id
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

// Simulate score change (commented out for actual usage)
/*
setTimeout(() => {
    updateScores('1', '0');
    setTimeout(() => {
        updateScores('2', '0');
        setTimeout(() => {
            updateScores('2', '1');
            setTimeout(() => {
                updateScores('2', '2');
                setTimeout(() => {
                    updateScores('2', '3');
                }, 3000);
            }, 3000);
        }, 3000);
    }, 3000);
}, 3000);
*/
