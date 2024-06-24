// scroll-background.js

window.addEventListener('scroll', function() {
    const landingPage = document.getElementById('landing-page');
    if (window.scrollY > landingPage.offsetHeight) {
      document.body.style.backgroundColor = '#DDCAB5'; // Change this to your desired color
      landingPage.style.backgroundImage = 'none';
    } else {
      document.body.style.backgroundColor = 'transparent';
      landingPage.style.backgroundImage = 'url("../images/mainpage.png")';
    }
  });
  