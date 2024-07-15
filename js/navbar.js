// function addNav() {
//     var nav = document.getElementById('nav');
//     var navbar = document.createElement('div');
//     navbar.innerHTML = `
  
// `;
//     nav.appendChild(navbar);

    

// }
// addNav();
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

