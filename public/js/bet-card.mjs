// Function to open the bet overlay
function openBetOverlay() {
    // TODO: Change answer
    if (document.querySelector('.bet-coef.selected') == null)
    {
        alert('Select coefficient to bet u idiot')
        return;
    }

    // Get float coef
    let selectedCoef = parseFloat(document.querySelector('.bet-coef.selected').innerText);

    // Send a message to the parent frame (carousel.html)
    window.parent.postMessage({
        action: 'openBetOverlay',
        bet_id: 'testid',
        bet_coef: selectedCoef
    }, '*');
}

function handleMessage(event) {
    // Check if the message is from the parent frame (carousel.html)
    if (event.source === window.parent) {
        // Check the action and perform the corresponding task
        if (event.data.action === 'unselectCoefficients') {
            // Unselect the coefficient
            unselectCoefficients();
            switchPlaceBetButton(false);
        }
    }
}

function  unselectCoefficients() {
    betOptions.forEach(function (opt) {
        opt.classList.remove('selected');
    });
}

function switchPlaceBetButton(on) {
    const betSubmitBtn = document.querySelector('.bet-button');
    if (betSubmitBtn && on) {
        betSubmitBtn.removeAttribute('disabled');
    } else {
        betSubmitBtn.setAttribute('disabled', 'true');
    }
}

// Listen for messages from the parent frame
window.addEventListener('message', handleMessage);
const betButton = document.querySelector('.bet-button');
betButton.addEventListener('click', openBetOverlay);

const betOptions = document.querySelectorAll('.bet-coef');
betOptions.forEach(function (option) {
    option.addEventListener('click', function () {
        // Remove the 'selected' class from all options
        betOptions.forEach(function (opt) {
            opt.classList.remove('selected');
        });

        // Add the 'selected' class to the clicked option
        option.classList.add('selected');
        switchPlaceBetButton(true);

        // Send coefSelected message
        window.parent.postMessage({
            action: 'coefSelected',
        }, '*');
    });
});

function updateScores(newTeam1Score, newTeam2Score) {
    const team1Score = document.getElementById('team1-score');
    const team2Score = document.getElementById('team2-score');

    // Check for score change and apply animation
    if (team1Score.innerText !== newTeam1Score) {
        team1Score.classList.add('score-change');
    }
    if (team2Score.innerText !== newTeam2Score) {
        team2Score.classList.add('score-change');
    }

    // Update scores
    team1Score.innerText = newTeam1Score;
    team2Score.innerText = newTeam2Score;

    // Apply leading change animation
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

    // Remove the score change class after the animation
    setTimeout(() => {
        team1Score.classList.remove('score-change');
        team2Score.classList.remove('score-change');
    }, 500);
}

// Simulate score change
// setTimeout(() => {
//     updateScores('1', '0'); // Call the function to update scores and apply animation
//     setTimeout(() => {
//         updateScores('2', '0'); // Call the function to update scores and apply animation
//         setTimeout(() => {
//             updateScores('2', '1'); // Call the function to update scores and apply animation
//             setTimeout(() => {
//                 updateScores('2', '2'); // Call the function to update scores and apply animation
//                 setTimeout(() => {
//                     updateScores('2', '3'); // Call the function to update scores and apply animation
//                 }, 3000);
//             }, 3000);
//         }, 3000);
//     }, 3000);
// }, 3000);
