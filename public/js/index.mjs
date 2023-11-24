// TODO: Refactor and check scripts

function displayAnswerScreen(answer) {
    switch (answer) {
        case 'sorry':
            liveStatus = 'Loaded-0';
            break;
        case 'live-loaded':
            liveStatus = 'Loaded';
            break;
        case 'pre-loaded':
            preStatus = 'Loaded';
            break;
    }
    if (liveStatus === 'Loaded' && preStatus === 'Loaded') {
        document.querySelector('#loading-screen__ifr').classList.add('d-none');
        document.querySelector('#live-bets__ifr').classList.remove('d-none');
        document.querySelector('#pre-bets__ifr').classList.remove('d-none');
    }
    else if (liveStatus === 'Loaded-0' && preStatus === 'Loaded') {
        document.querySelector('#loading-screen__ifr').classList.add('d-none');
        document.querySelector('#sorry-screen__ifr').classList.remove('d-none');
        document.querySelector('#pre-bets__ifr').classList.remove('d-none');
    }
}

function hideAll() {
    document.querySelector('#loading-screen__ifr').classList.add('d-none');
    document.querySelector('#sorry-screen__ifr').classList.add('d-none');
    document.querySelector('#live-bets__ifr').classList.add('d-none');
    document.querySelector('#pre-bets__ifr').classList.add('d-none');
}

// Function to handle messages from iframes
function handleMessage(event) {
    // Check if the message is from the bet card iframe
    if (event.data.action === 'openBetOverlay') {
        // Open the bet overlay in the index.html
        openBetOverlay(event.data.bet_id, event.data.bet_coef);
    }
    if (event.data.action === 'betsLoaded') {
        switch (event.data.type) {
            case 'live':
                if (event.data.count !== 0) {
                    displayAnswerScreen('live-loaded');
                } else {
                    displayAnswerScreen('sorry');
                }
                break;
            case 'pre':
                if (event.data.count !== 0) {
                    displayAnswerScreen('pre-loaded');
                } else {
                    displayAnswerScreen('sorry');
                }
        }
    }
    if (event.data.action === 'reloadBets') {
        document.querySelector('#sorry-screen__ifr').classList.add('d-none');
        document.querySelector('#loading-screen__ifr').classList.remove('d-none');
        document.querySelector('#live-bets__ifr').classList.add('d-none');
        document.querySelector('#pre-bets__ifr').classList.add('d-none');
        document.getElementById('live-bets__ifr').contentWindow.postMessage({
            action: 'getBets',
            type: 'live'
        }, '*');
        liveStatus = 'Loading';
    }
}

var actualCoef = 1.0;

var liveStatus = 'None';
var preStatus = 'None';

function openBetOverlay(bet_id, bet_coef) {
    if (bet_coef == null) {
        alert("Coefficient lost")
        return;
    }

    actualCoef = bet_coef

    document.getElementById("bet-overlay").style.display = "flex";
    setTimeout(() => {
        document.getElementById("bet-overlay").style.opacity = 1;
        document.querySelector(".bet-container").style.opacity = 1;
        document.querySelector(".bet-container").style.transform = "translateY(0)";
    }, 50);
}

function closeBetOverlay() {
    document.getElementById("bet-overlay").style.opacity = 0;
    document.querySelector(".bet-container").style.opacity = 0;
    document.querySelector(".bet-container").style.transform = "translateY(-20px)";

    betAmount.value = '';
    possibleWinSpan.innerText = '0.00';
    actualCoef = 1.0;

    document.getElementById('live-bets__ifr').contentWindow
        .postMessage({action: 'closeBetOverlay'}, '*');
    document.getElementById('pre-bets__ifr').contentWindow
        .postMessage({action: 'closeBetOverlay'}, '*');

    setTimeout(() => {
        document.getElementById("bet-overlay").style.display = "none";
    }, 500);
}

function placeBet() {
    // Add your logic to handle the bet placement here
    document.querySelector('.bet-container').style.display = 'none';
    document.getElementById('thank-you-container').style.display = 'block';
    // Close the bet overlay after placing the bet
    setTimeout(() => {
        closeBetOverlay();
        document.querySelector('.bet-container').style.display = "flow";
        document.getElementById('thank-you-container').style.display = 'none';
    }, 3000);
}

const betAmount = document.getElementById('bet-amount');
const possibleWinSpan = document.getElementById('possible-win');

function calculatePossibleWin() {
    // Get the bet amount and calculate the possible win
    let betAmountVal = parseFloat(document.getElementById('bet-amount').value) || 0;

    if (betAmountVal < 0) {
        betAmount.value = 0;
        betAmountVal = 0;
    } else if (betAmountVal > 10000) {
        betAmount.value = 10000;
    } else if (betAmountVal === 0 && betAmount.value.length > 1) {
        betAmountVal = 0;
        betAmount.value = 0;
    }

    const possibleWin = betAmountVal * actualCoef;

    // Update the possible win span with animation
    possibleWinSpan.innerText = possibleWin.toFixed(2);
    possibleWinSpan.classList.add('value-changed');
    setTimeout(() => {
        possibleWinSpan.classList.remove('value-changed');
    }, 500);
}

// Listen for messages from iframes
window.addEventListener('message', handleMessage);

// Attach click event listener to the "Place Bet" button
var closeBetButton = document.querySelector('.close-btn');
closeBetButton.addEventListener('click', closeBetOverlay);
window.addEventListener('load', function () {
    document.getElementById('live-bets__ifr').contentWindow.postMessage({
        action: 'getBets',
        type: 'live'
    }, '*');
    liveStatus = 'Loading';

    document.getElementById('pre-bets__ifr').contentWindow.postMessage({
        action: 'getBets',
        type: 'pre'
    }, '*');
    preStatus = 'Loading';
});

document.getElementById('bet-amount').addEventListener('input', calculatePossibleWin);
document.getElementById('bet-submit-btn').addEventListener('click', placeBet);

var submitOverlay = document.querySelector('.bet-overlay');
submitOverlay.addEventListener('click', closeBetOverlay);