// Event listener for messages from iframes
window.addEventListener('message', handleMessage);

// Function to handle messages from iframes
function handleMessage(event) {
    if (event.data.action === 'openBetOverlay') {
        openBetOverlay(event);
    }
    if (event.data.action === 'coefSelected') {
        unselectAllCoefficients(event.source);
    }
    if (event.data.action === 'closeBetOverlay') {
        unselectAllCoefficients();
    }
    if (event.data.action === 'getBets') {
        loadBets(event.data.type);
    }
}

// Function to open the bet overlay in the parent iframe (index.html)
function openBetOverlay(event) {
    window.parent.postMessage({
        action: event.data.action,
        bet_id: event.data.bet_id,
        bet_coef: event.data.bet_coef
    }, '*');
}

// Function to unselect coefficients in iframes
function unselectAllCoefficients(sourceIframe = null) {
    document.querySelectorAll('iframe').forEach(function (iframe) {
        if (iframe.contentWindow !== sourceIframe || sourceIframe == null) {
            iframe.contentWindow.postMessage({action: 'unselectCoefficients'}, '*');
        }
    });
}

// Example betInfo json
const betInfoExample = {
    header: {
        match_status: 'Live',
        match_handler: 'Cyberport Match Handler',
    },
    team1: {
        name: 'Team1',
        logo: 'img/title-icon.png',
        coef: 1.48,
        score: 0
    },
    team2: {
        name: 'Team2',
        logo: 'img/title-icon.png',
        coef: 1.54,
        score: 0
    },
    details: {
        match_date: '21.12 at 19:00',
        match_time: '35 : 10',
        match_type: 'BO1',
    }
};

// Function to load bets and answer to index page
function loadBets(type) {
    if (type === 'live') {
        // Add live bets here
        for (let i = 0; i < 12; i++) {
            addBet(betInfoExample);
        }
    } else if (type === 'pre') {
        betInfoExample.header.match_status = 'Scheduled';
        // Add pre bets here
        for (let i = 0; i < 36; i++) {
            addBet(betInfoExample);
        }
    }

    updateCarouselIndicators();

    let betsAmount = document.querySelector('.carousel-inner').children.length * 2;

    window.parent.postMessage({
        action: 'betsLoaded',
        type: type,
        count: betsAmount
    }, '*');
}


// Function to add new bets to bets-carousel
function addBet(betInfo) {
    // Get the carousel container
    const carouselContainer = document.querySelector('.carousel-inner');

    // Check if there are any half-empty carousel items
    let halfEmptyItem = Array.from(carouselContainer.children).find(item => {
        const iframes = item.querySelectorAll('iframe');
        return iframes.length === 1; // Check for half-empty item
    });

    const newIframe = document.createElement('iframe');
    newIframe.src = 'bet-card.html';
    newIframe.style.opacity = '0';

    if (halfEmptyItem) {
        // If a half-empty item exists, append the iframe to it
        halfEmptyItem.querySelector('.bets-page').appendChild(newIframe);
    } else {
        // If no half-empty item exists, create a new carousel item
        const newBetsPage = document.createElement('div');
        newBetsPage.classList.add('bets-page');
        newBetsPage.appendChild(newIframe);

        const newCarouselItem = document.createElement('div');
        newCarouselItem.classList.add('carousel-item');
        newCarouselItem.appendChild(newBetsPage)

        // Append the new carousel item to the carousel container
        carouselContainer.appendChild(newCarouselItem);

        // Add 'active' class to the first carousel item
        if (carouselContainer.children.length === 1) {
            newCarouselItem.classList.add('active');
            newCarouselItem.setAttribute('data-bs-interval', '10000')
        } else {
            newCarouselItem.setAttribute('data-bs-interval', '2000')
        }
    }
    // Wait for the iframe to load
    newIframe.addEventListener('load', function () {
        // Send the betInfo to the iframe
        newIframe.contentWindow.postMessage({
            action: 'setBetInfo',
            betInfo: JSON.stringify(betInfo)
        }, '*');

        // Apply the fade-in animation
        newIframe.style.opacity = '1';
    });

}

// Function to update carousel indicators
function updateCarouselIndicators() {
    const carouselIndicatorsContainer = document.querySelector('.carousel-indicators');
    const numIndicators = document.querySelectorAll('.carousel-item').length;

    // Apply the fade-out animation to the container
    carouselIndicatorsContainer.style.transition = 'opacity 0.5s ease-in-out';
    carouselIndicatorsContainer.style.opacity = '0';

    // Remove existing indicators after the transition
    setTimeout(() => {
        carouselIndicatorsContainer.innerHTML = '';

        // Create new indicators with a fade-in animation
        for (let i = 0; i < numIndicators; i++) {
            const indicator = document.createElement('button');
            indicator.type = 'button';
            indicator.setAttribute('data-bs-target', '#bets-carousel');
            indicator.setAttribute('data-bs-slide-to', i.toString());
            if (i === 0) {
                indicator.classList.add('active');
                indicator.setAttribute('aria-current', 'true');
            }

            carouselIndicatorsContainer.appendChild(indicator);
        }

        // Apply the fade-in animation to the container
        carouselIndicatorsContainer.style.opacity = '1';
    }, 500);
}


// Test bet-add animations
// setTimeout(() => {
//     addBet(betInfoExample);
//     setTimeout(() => {
//         addBet(betInfoExample);
//         setTimeout(() => {
//             addBet(betInfoExample);
//             setTimeout(() => {
//                 addBet(betInfoExample);
//                 setTimeout(() => {
//                     addBet(betInfoExample);
//                 }, 3000);
//             }, 3000);
//         }, 3000);
//     }, 3000);
// }, 3000);
