var sharedEnv = sharedEnv || {};

// Set default carousel statuses
sharedEnv.carousels = {
    selectedGame: 'cs2',
    live: {
        status: 'Unloaded',
        amount: 0,
        load: () => {
            hideAll();
            showElements(['#loading-screen__ifr']);
            document.querySelector('#loading-screen__ifr').classList.remove('d-none');
            document.getElementById('live-bets__ifr').contentWindow.postMessage({
                action: 'getBets',
                type: 'live',
                game: sharedEnv.carousels.selectedGame
            }, '*');

            // Change carousel status
            sharedEnv.carousels.live.status = 'Loading';
        }
    },
    pre: {
        status: 'Unloaded',
        amount: 0,
        load: () => {
            hideAll();
            showElements(['#loading-screen__ifr']);
            document.getElementById('pre-bets__ifr').contentWindow.postMessage({
                action: 'getBets',
                type: 'pre',
                game: sharedEnv.carousels.selectedGame
            }, '*');

            // Change carousel status
            sharedEnv.carousels.pre.status = 'Loading';
        }
    }
}

// Hide all screens
function hideAll() {
    const screens = ['#loading-screen__ifr', '#sorry-screen__ifr', '#live-bets__ifr', '#pre-bets__ifr'];
    screens.forEach(screen => {
        document.querySelector(screen).classList.add('d-none');
    });
}

// Set default bet coefficient
sharedEnv.bet = {
    coef: NaN,
    place: () => {
        // Hide the bet f-winow
        document.getElementById('bet-container').style.display = 'none';

        // Close the bet overlay after placing the bet
        sharedEnv.overlay.close();

        // Restore future visibility of bet f-window
        document.getElementById('bet-container').style.display = "flow";

        // Thanks toast
        sharedEnv.bet.result();
    },
    recalculate: () => {
        // Get the bet amount and calculate the possible win
        let betAmountVal = parseFloat(document.getElementById('bet-amount').value) || 0;

        if (betAmountVal < 0) {
            betAmount.value = 0;
            betAmountVal = 0;
        } else if (betAmountVal > 10000) {
            betAmount.value = 10000;
            betAmountVal = 10000;
        } else if (betAmountVal === 0 && betAmount.value.length > 1) {
            betAmountVal = 0;
            betAmount.value = 0;
        }

        const possibleWin = betAmountVal * sharedEnv.bet.coef;

        // Update the possible win span with animation
        possibleWinSpan.innerText = possibleWin.toFixed(2);
        possibleWinSpan.classList.add('value-changed');
        setTimeout(() => {
            possibleWinSpan.classList.remove('value-changed');
        }, 500);

    },
    result: () => {
        let toast = document.getElementById("ty-toast__container")
        toast.className = "show";
        setTimeout(() => {
            toast.className = toast.className.replace("show", "");
        }, 5000);
    }
}

// Utility functions for controlling elements present on ui
function showElements(screenList) {
    screenList.forEach(screen => {
        document.querySelector(screen).classList.remove('d-none');
    });
}

function hideElements(screenList) {
    screenList.forEach(screen => {
        document.querySelector(screen).classList.add('d-none');
    });
}

// Loading-carousels controller
function displayFeaturedScreens() {
    if (sharedEnv.carousels.live.status === 'Loaded'
        && sharedEnv.carousels.pre.status === 'Loaded') {
        hideElements(['#loading-screen__ifr']);
        showElements(['#live-bets__ifr', '#pre-bets__ifr']);
    } else if (sharedEnv.carousels.live.status === 'Loaded-0'
        && sharedEnv.carousels.pre.status === 'Loaded') {
        hideElements(['#loading-screen__ifr']);
        showElements(['#sorry-screen__ifr', '#pre-bets__ifr']);
    } else if (sharedEnv.carousels.live.status === 'Loaded-0'
        && sharedEnv.carousels.pre.status === 'Loaded-0') {
        hideElements(['#loading-screen__ifr']);
        showElements(['#sorry-screen__ifr', '#pre-bets__ifr']);
    }
}

// Make bet-overlay utility
sharedEnv.overlay = {
    open: (bet_coef) => {
        // Save selected coef
        sharedEnv.bet.coef = bet_coef

        // Shadow outer screen
        document.getElementById("bet-overlay").style.display = "flex";
        setTimeout(() => {
            document.getElementById("bet-overlay").style.opacity = '1';
            document.querySelector(".bet-container").style.opacity = '1';
            document.querySelector(".bet-container").style.transform = "translateY(0)";
        }, 50);
    },
    close: () => {
        document.getElementById("bet-overlay").style.opacity = '0';
        document.querySelector(".bet-container").style.opacity = '0';
        document.querySelector(".bet-container").style.transform = "translateY(-20px)";

        betAmount.value = '';
        possibleWinSpan.innerText = '0.00';
        sharedEnv.bet.coef = 1.0;
        document.getElementById('insurance').checked = false;

        document.getElementById('live-bets__ifr').contentWindow
            .postMessage({action: 'closeBetOverlay'}, '*');
        document.getElementById('pre-bets__ifr').contentWindow
            .postMessage({action: 'closeBetOverlay'}, '*');

        setTimeout(() => {
            document.getElementById("bet-overlay").style.display = "none";
        }, 500);
    }
}

//  Manage category buttons
const betGames = document.querySelectorAll(".bet-game");
for (let i = 0; i < betGames.length; i++) {
    betGames[i].addEventListener("click", function () {
        for (let i = 0; i < betGames.length; i++) {
            betGames[i].classList.remove("active-game");
        }
        this.classList.add("active-game");
        sharedEnv.carousels.selectedGame
            = document.querySelector(".active-game").children[0].id.split('-')[0];

        sharedEnv.carousels.live.load();
        sharedEnv.carousels.pre.load();
    });
}

// Iframes' message handler
function handleMessage(event) {
    // Case 1: Bets laoded => display featured screens
    if (event.data.action === 'carouselLoaded') {
        switch (event.data.type) {
            case 'live':
                // Save carousel data
                sharedEnv.carousels.live.amount = event.data.count;

                // Display featured screens
                if (event.data.count !== 0) {
                    sharedEnv.carousels.live.status = 'Loaded';
                    displayFeaturedScreens();
                } else {
                    sharedEnv.carousels.live.status = 'Loaded-0';
                    displayFeaturedScreens();
                }
                break;
            case 'pre':
                // Save carousel data
                sharedEnv.carousels.pre.amount = event.data.count;

                // Display featured screens
                if (event.data.count !== 0) {
                    sharedEnv.carousels.pre.status = 'Loaded';
                    displayFeaturedScreens();
                } else {
                    sharedEnv.carousels.pre.status = 'Loaded-0';
                    displayFeaturedScreens();
                }
        }
    }

    // Case 2: User selected bet, the coefficient => overlay opened
    if (event.data.action === 'openBetOverlay') {
        switch (document.getElementById('live-bets').classList.contains('active')) {
            case true:
                document.getElementById('insurance').setAttribute('disabled', '');
                break;
            case false:
                document.getElementById('insurance').removeAttribute('disabled');
                break;
        }
        sharedEnv.overlay.open(event.data.bet_coef);
    }

    // Case 3: Refresh live bets requested => new bets loaded
    if (event.data.action === 'reloadBets') {
        sharedEnv.carousels.live.load();
        document.getElementById('live-bets__ifr').contentWindow.postMessage({
            action: 'getBets',
            type: 'live'
        }, '*');
        sharedEnv.carousels.live.status = 'Loading';
    }
}

// Apply listener
window.addEventListener('message', handleMessage);

// Load default bets on page load
window.addEventListener('load', () => {
    sharedEnv.carousels.live.load();
    sharedEnv.carousels.pre.load();
});


// Links to bet submission fields
const betAmount = document.getElementById('bet-amount');
const possibleWinSpan = document.getElementById('possible-win');


// Change possible win on bet input
const betInput = document.getElementById('bet-amount');
betInput.addEventListener('input', sharedEnv.bet.recalculate);

// Submit bet on button
const submitBetButton = document.getElementById('bet-submit-btn');
submitBetButton.addEventListener('click', sharedEnv.bet.place);

// Close overlay on cross
const closeBetButton = document.querySelector('.close-btn');
closeBetButton.addEventListener('click', sharedEnv.overlay.close);

// Close overlay on outer click
const closeOuterOverlay = document.querySelector('.bet-overlay');
closeOuterOverlay.addEventListener('click', sharedEnv.overlay.close);


