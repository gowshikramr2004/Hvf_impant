
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


    <title>Document</title>
</head>
<body>
<main class='wrapper'>
  <header class='header'>
    <div class='header__logo'>HVF</div>
    <div class='header__right'>
      <p>
        <a href='https://github.com/hvf-dev/hvf'>
          <img  class='header__logo-img' src='https://cracku.in/latest-govt-jobs/wp-content/uploads/2022/06/HVF-Logo.jpg'>
        </a>
        <span class='header__language'> CHECKER</span>
      </p>
      <div class='header__diamond'></div>
    </div>
  </header>
  <nav class='menu'>
    <ul>
      <a href='display.php'>Main </a>
      <a href='pkg_details.php'>Package </a>
      <a href='veh_details.php'>Vehicle </a>
      <a href='escrt_details.php'>Escort </a>
    </ul>
  </nav>
  <div class='bg__pattern'></div>
  <div class='bg__image'></div>
</main>
</body>
</html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=League+Gothic&display=swap');

:root {
  --bg: rgb(39,37,47);
  --text: rgba(255,255,255,.5);
  --active: rgba(255,255,255,.8);
  --logo: rgba(255,255,255,.85);
  --menu: rgba(255,255,255,.75);
}
.header__logo-img {
    width: 50px; /* Adjust the width as per your requirement */
  height: 50px; /* Adjust the height as per your requirement */
  border-radius: 50%; /* Make the logo image round */
}
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html,body {
  width: 100%;
  height: 100%;
  font-size: 100%;
}

.wrapper {
  position: relative;
  width: 100%;
  height: 100%;
  background-color: var(--bg);
  overflow: hidden;
}

.header {
  width: 100%;
  position: absolute;
  z-index: 5;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1.25rem;
}

.header__logo {
  font: 900 1.25rem 'arial-black',sans-serif;
  color: var(--logo);
}

.header__right { display: flex; }

.header__language {
  font: 100 .7rem helvetica,sans-serif;
  color: var(--text);
  margin: 0 .15rem;
}

.header__active { 
  font-weight: 900;
  color: var(--active); 
}

.header__diamond {
  width: 1.25rem;
  height: 1.25rem;
  border: .5px solid var(--text);
  transform: rotate(45deg);
  margin-left: .75rem;
}

.menu {
  position: absolute;
  top: 50%;
  left: 15%;
  transform: translateY(-50%);
  z-index: 10;
  width: min-content;
}

.menu a {
  display: block;
  font-family: 'league gothic',helvetica,serif;
  font-size: 5vmin;
  text-decoration: none;
  text-transform: uppercase;
  color: var(--menu);
  padding: .5rem 0;
  transform: scale(.95);
  opacity: .25;
  transition: scale 550ms linear, opacity 250ms linear;
}

.menu a:first-of-type {
  transform: scale(1);
  opacity: 1;
}

.menu:hover a:not(:hover) {
  transform: scale(.95);
  opacity: .25;
}

.menu a:hover {
  transform: scale(1);
  opacity: 1;
}

.bg__pattern {
  position: absolute;
  top: 0;
  width: 100vw;
  height: 130vh;
  background: radial-gradient(rgba(255,255,255,.1) 9%, transparent 9%);
  background-position: 0% 0%;
  background-size: 6vmin 6vmin;
  transform: translateY(0);
  transition: 
    background-size 800ms ease, 
    opacity 800ms linear,
    transform 800ms ease;
}

.menu:hover ~ .bg__pattern {
  background-size: 5vmin 5vmin;
  opacity: .75;
} 

.menu[data-index='0'] ~ .bg__pattern { transform: translateY(-2%); }
.menu[data-index='1'] ~ .bg__pattern { transform: translateY(-10%); }
.menu[data-index='2'] ~ .bg__pattern { transform: translateY(-15%); }
.menu[data-index='3'] ~ .bg__pattern { transform: translateY(-20%); }

.bg__image {
  width: 100vw;
  height: 115vh;
  background: url('https://plus.unsplash.com/premium_photo-1661875576496-01a57a1f13a6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80');
  /*  possible image #2  */
  /* background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3wAIjFb2OQM_XeBvPoWLPV37AxGzk4hpRPw&usqp=CAU'); */
  background-size: cover;
  background-position: center;
  opacity: .3;
  transition:
    transform 800ms ease,
    height 800ms ease;
}

.menu:hover ~ .bg__image { height: 110vh; }

.menu[data-index='0'] ~ .bg__image { transform: translateY(-0%); }
.menu[data-index='1'] ~ .bg__image { transform: translateY(-2%); }
.menu[data-index='2'] ~ .bg__image { transform: translateY(-4%); }
.menu[data-index='3'] ~ .bg__image { transform: translateY(-6%); }
</style>
<script>
    const menu = document.querySelector('.menu');
const links = document.querySelectorAll('.menu a');

function activateParallax() {
  links.forEach((link,i) => {
    link.addEventListener('mouseover',() => {
      menu.dataset.index = i
    },false);
  });
}

window.addEventListener('load',activateParallax,false);
</script>