<!DOCTYPE html>
<html lang="en-US">
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

    <!--Styles-->
    <link rel="stylesheet" href="{{asset('css/global.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/bets-carousel.css')}}">

    <title>Bets Carousel</title>
</head>
<body class="module">
<div id="bets-carousel" class="carousel carousel-dark slide">
    <div class="carousel-main">
        <button class="carousel-control-prev" type="button" data-bs-target="#bets-carousel"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <div class="carousel-inner">
            <!-- Place for bets -->
        </div>
        <button class="carousel-control-next" type="button" data-bs-target="#bets-carousel"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="carousel-indicators">
        <!-- Place for bets pages -->
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
            document.querySelector('.carousel-inner').innerHTML = '';
            loadBets(event.data.type, event.data.game);
        }
    }

    // Function to open the bet overlay in the parent iframe (index.html)
    function openBetOverlay(event) {
        window.parent.postMessage(event.data, '*');
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
            game: 'cs2',
            match_handler: 'Cyberport Match Handler',
        },
        team1: {
            name: 'Team1',
            logo: 'http://127.0.0.1:8000/img/title-icon.png',
            coef: 1.48,
            score: 0
        },
        team2: {
            name: 'Team2',
            logo: 'http://127.0.0.1:8000/img/title-icon.png',
            coef: 1.54,
            score: 0
        },
        details: {
            match_date: '21.12 at 19:00',
            match_time: '35 : 10',
            match_type: 'BO1',
        }
    };

    function getData(date, time) {
        // Convert date string to a JavaScript Date object
        const dateObject = new Date(date + ' ' + time);

        // Format the date using Intl.DateTimeFormat
        const formattedDate = new Intl.DateTimeFormat('ru', {
            day: '2-digit',
            month: '2-digit',
        }).format(dateObject);

        // Format the time using Intl.DateTimeFormat
        const formattedTime = new Intl.DateTimeFormat('ru', {
            hour: '2-digit',
            minute: '2-digit',
        }).format(dateObject);

        // Combine formatted date and time
        return `${formattedDate} at ${formattedTime}`;
    }

    function getFormat(full_name) {
        if (full_name === 'Best of 1'){
            return 'BO1';
        } else if (full_name === 'Best of 2') {
            return 'BO2';
        }else if (full_name === 'Best of 3') {
            return 'BO3';
        } else if (full_name === 'Best of 5') {
            return 'BO5';
        }else if (full_name === 'Best of 7') {
            return 'BO7';
        } else return full_name;
    }

    const matches =
    [
        @foreach ($matches->reverse() as $match)
        {
            header: {
                match_status: '{{$match->live == 1 ? 'Live' : 'Scheduled'}}',
                game: '{{$match->team1->game->name}}',
                match_handler: '{{ truncateString($match->tournament, 35) }}',
            },
            team1: {
                name: '{{$match->team1->name}}',
                logo: '{{$match->team1->logo}}',
                coef: {{$match->team1_cef}},
                score: {{$match->team1_points}}
            },
            team2: {
                name: '{{$match->team2->name}}',
                logo: '{{$match->team2->logo}}',
                coef: {{$match->team2_cef}},
                score: {{$match->team2_points}}
            },
            details: {
                match_date: getData('{{$match->date}}', '{{$match->time}}'),
                match_time: '0 : 0',
                match_type: getFormat('{{$match->format}}'),
                match_id: '{{$match->id}}',
            },
        },
        @endforeach
    ];

    function loadBets(type, game) {
        if (type === 'live') {
            matches.forEach(match => {
                if (match.header.match_status === 'Live' && match.header.game === game)
                    addBet(match);
            });
        } else if (type === 'pre') {
            matches.forEach(match => {
                if (match.header.match_status === 'Scheduled' && match.header.game === game)
                    addBet(match);
            });
        }

        updateCarouselIndicators();

        let betsAmount = document.querySelector('.carousel-inner').children.length * 2;

        window.parent.postMessage({
            action: 'carouselLoaded',
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
        newIframe.src = '/partials/bet-card';
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
</script>
</body>
</html>
