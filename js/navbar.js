function addNav() {
    var nav = document.getElementById('navbar');
   
    navbar.innerHTML = `
    <div>
        <a href="index.html">Egypt Wonders</a>
        <div class="search">
            <input type="text" placeholder="Search" name="text" class="input" />
            <svg
              fill="#000000"
              width="20px"
              height="20px"
              viewBox="0 0 1920 1920"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z"
                fill-rule="evenodd"
              ></path>
            </svg>
          </div>
      </div>
      <div>
        
        
        <ul>
          <li><a href="cairo.html">Cairo</a></li>
          <li><a href="alex.html">Alexandria</a></li>
          <li><a href="luxor.html">Luxor</a></li>
          <li><a href="aswan.html">Aswan</a></li>
          <li><a href="sharm.html">Sharm El Sheikh</a></li>
          <li><a href="siwa.html">Siwa</a></li>
          <li><a href="fayoum.html">Fayoum</a></li>
        </ul>
      </div>
      
  
`;
    nav.appendChild(navbar);

    

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


    `;
    document.getElementById("loading-screen").innerHTML = loadingScreenHTML;
  }
addLoadingScreen();
function hideLoadingScreen() {
    //make the loading screen invisible after 2 seconds
    setTimeout(() => {
        document.getElementById("loading-screen").style.display = "none";
    }, 500);
}

window.addEventListener('load', hideLoadingScreen);

