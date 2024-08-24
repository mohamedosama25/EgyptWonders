<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title id="title"></title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <nav id="navbar"></nav>
    <div id="loading-screen"></div>

    <div id="detail-container">
      <div id="namediv">
        <div id="duo">
          <div id="zorar">
            <h1 id="place-name"></h1>
        
            <label class="container-bookmark">
              <input type="checkbox" id="bookmark-checkbox">
              <svg class="save-regular" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><path d="M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z"></path></svg>
              <svg class="save-solid" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><path d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"></path></svg>
            </label>
            
          </div>
          
          <p id="place-description"></p>
          <h4 id="place-hours"></h4>
        </div>
        <div class="cardtany">
          <div class="bg"></div>
          <div class="blob"></div>
          <img id="place-image" src="" alt="Place Image" />
        </div>
      </div>

      <div id="hotelsAndPrices">
      <div id="place-prices"></div>
      <div id="place-hotels"></div>
    </div>
    </div>
    <script src="js/navbar.js"></script>
    <script src="js/pageDetails.js"></script>
  </body>
</html>
