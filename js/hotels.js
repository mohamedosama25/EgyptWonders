function loadHotelsContent() {
    const urlParams = new URLSearchParams(window.location.search);
    const placeId = urlParams.get('id');
    const pageTitle = document.getElementById('page-title');
    const hotelsContent = document.getElementById('hotels-content');

    let content = '';

    switch (placeId) {
        case 'cairo':
            pageTitle.innerText = 'Cairo Hotels';
            content = '<p>Welcome to Cairo Hotels!</p>';
            break;
        case 'alex':
            pageTitle.innerText = 'Alexandria Hotels';
            content = '<p>Welcome to Alexandria Hotels!</p>';
            break;
        case 'luxor':
            pageTitle.innerText = 'Luxor Hotels';
            content = '<p>Welcome to Luxor Hotels!</p>';
            break;
        case 'aswan':
            pageTitle.innerText = 'Aswan Hotels';
            content = '<p>Welcome to Aswan Hotels!</p>';
            break;
        case 'sharm':
            pageTitle.innerText = 'Sharm El Sheikh Hotels';
            content = '<p>Welcome to Sharm El Sheikh Hotels!</p>';
            break;
        case 'siwa':
            pageTitle.innerText = 'Siwa Hotels';
            content = '<p>Welcome to Siwa Hotels!</p>';
            break;
        case 'fayoum':
            pageTitle.innerText = 'Fayoum Hotels';
            content = '<p>Welcome to Fayoum Hotels!</p>';
            break;
        default:
            pageTitle.innerText = 'Hotels';
            content = '<p>Please select a location from the Hotels dropdown menu.</p>';
            break;
    }

    hotelsContent.innerHTML = content;
}

// Call the function to load content based on URL parameters
loadHotelsContent();