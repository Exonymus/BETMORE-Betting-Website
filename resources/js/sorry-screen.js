var refreshButton = document.getElementById('refresh-btn');
refreshButton.addEventListener('click', () => {
    window.parent.postMessage({
        action: 'reloadBets',
    }, '*');
});