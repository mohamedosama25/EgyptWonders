function addNav() {
  var nav = document.getElementById('navbar');

  // Fetch authentication status
  fetch('checkAuth.php')
    .then(response => response.json())
    .then(data => {
      let navContent = `
      <div>
        <a href="index.php">Egypt Wonders</a>
        <div class="search">
          <input type="text" placeholder="Search" name="text" class="input" id="searchInput" />
          <svg style="cursor:pointer;" id="searchIcon" fill="#000000" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
            <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z" fill-rule="evenodd"></path>
          </svg>
        </div>
      </div> 
      <div class="hamburger">☰</div>
      <div>
        <ul>`;
      
      if (data.loggedIn) {
        navContent += `<li><a href="saved.php">Saved Places</a></li>`;
      }

      navContent += `
      <li><a href="cairo.html">Cairo</a></li>
      <li><a href="alex.html">Alexandria</a></li>
      <li><a href="luxor.html">Luxor</a></li>
      <li><a href="aswan.html">Aswan</a></li>
      <li><a href="sharm.html">Sharm El Sheikh</a></li>
      <li><a href="siwa.html">Siwa</a></li>
      <li><a href="fayoum.html">Fayoum</a></li>
      <li class="dropdown">
        <a href="#" class="dropbtn">Hotels
          <svg class="dropdown-arrow" width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
            <polygon points="0,0 10,0 5,5" fill="white" />
          </svg>
        </a>
        <div class="dropdown-content">
          <a href="hotels.html?city=cairo">Cairo Hotels</a>
          <a href="hotels.html?city=alexandria">Alexandria Hotels</a>
          <a href="hotels.html?city=luxor">Luxor Hotels</a>
          <a href="hotels.html?city=aswan">Aswan Hotels</a>
          <a href="hotels.html?city=sharm">Sharm El Sheikh Hotels</a>
          <a href="hotels.html?city=siwa">Siwa Hotels</a>
          <a href="hotels.html?city=fayoum">Fayoum Hotels</a>
        </div>
      </li>
      </ul>
   `;

    if (data.loggedIn) {
      navContent += `
      <a href='logout.php'>
              <button class='Btn'>
                  <div class='sign'>
                      <svg viewBox='0 0 512 512'>
                          <path d='M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32z'></path>
                      </svg>
                  </div>
                  <div class='text'>Logout</div>
              </button>
            </a> 
          </div>`;
    }

      nav.innerHTML = navContent;

      // Make SVG icon clickable
      document.getElementById('searchIcon').addEventListener('click', function() {
        const query = document.getElementById('searchInput').value;
        if (query) {
          window.location.href = `searchResults.html?query=${encodeURIComponent(query)}`;
        }
      });
    })
    .catch(error => {
      console.error('Error fetching authentication status:', error);
    });
}

addNav();

function addLoadingScreen() {
  const loadingScreenHTML = `
  <div class="outer-wrapper">
  <div class="pyramid-loader">
    <div class="wrapper">
      <span class="side side1"></span>
      <span class="side side2"></span>
      <span class="side side3"></span>
      <span class="side side4"></span>
      <span class="shadow"></span>
    </div>
  </div>
  </div>
  `;
  document.getElementById("loading-screen").innerHTML = loadingScreenHTML;
}

addLoadingScreen();

function hideLoadingScreen() {
  document.getElementById("loading-screen").style.display = "none";
}

window.addEventListener('load', hideLoadingScreen);

document.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
      const query = document.getElementById('searchInput').value;
      if (query) {
        window.location.href = `searchResults.html?query=${encodeURIComponent(query)}`;
      }}
    
});
