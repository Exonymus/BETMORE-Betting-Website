const carousel = document.querySelector('.carousel');
const liveBetsButton = document.getElementById('live-bets-button');
const preBetsButton = document.getElementById('pre-bets-button');
const carouselDots = document.querySelector('.carousel-dots');
const prevButton = document.querySelector('.prev-button');
const nextButton = document.querySelector('.next-button');

let currentCategory = 'live-bets'; // Default category
let currentPage = 0; // Current page index
let betsPerPage = 3; // Number of bets per page

// Function to update the displayed category
function updateCategory(category) {
    currentCategory = category;
    document.querySelectorAll('.carousel-inner').forEach(inner => {
        inner.style.display = inner.id === category ? 'flex' : 'none';
    });
    currentPage = 0; // Reset the page index when changing the category
    updateDots(category);
    showCurrentPage(category);
}

// Function to update dots based on the number of bets
function updateDots(category) {
    const cards = document.querySelectorAll(`#${category} .carousel-card`);
    const totalPages = Math.ceil(cards.length / betsPerPage);

    carouselDots.innerHTML = [...Array(totalPages).keys()].map(index =>
        `<div class="carousel-dot${index === currentPage ? ' active' : ''}" data-index="${index}"></div>`
    ).join('');
}

// Function to show the current page of bets
function showCurrentPage(category) {
    const cards = document.querySelectorAll(`#${category} .carousel-card`);
    const startIndex = currentPage * betsPerPage;
    const endIndex = startIndex + betsPerPage;

    cards.forEach((card, index) => {
        if (index >= startIndex && index < endIndex) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

// Function to navigate to the next page
function nextPage(category) {
    const cards = document.querySelectorAll(`#${category} .carousel-card`);
    const totalPages = Math.ceil(cards.length / betsPerPage);

    if (currentPage < totalPages - 1) {
        currentPage++;
        showCurrentPage(category);
        updateDots(category);
    }
}

// Function to navigate to the previous page
function prevPage(category) {
    if (currentPage > 0) {
        currentPage--;
        showCurrentPage(category);
        updateDots(category);
    }
}

// Event listeners for category buttons
liveBetsButton.addEventListener('click', () => {
    updateCategory('live-bets');
});

preBetsButton.addEventListener('click', () => {
    updateCategory('pre-bets');
});

// Event listeners for navigation buttons
nextButton.addEventListener('click', () => {
    nextPage(currentCategory);
});

prevButton.addEventListener('click', () => {
    prevPage(currentCategory);
});

// Initialize the category and dots
updateCategory(currentCategory);
