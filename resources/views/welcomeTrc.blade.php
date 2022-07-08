<!DOCTYPE html>
<html>
<title>{{ config('app.name') }}</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.CSS">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">-->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<div id="changeTheme"></div>
<?php
    if (!Session::has('colortheme')) {
      Session::put('colortheme', 'black');  
    }
    $linkTheme = "https://www.w3schools.com/lib/w3-theme-".Session::get('colortheme').".css";//Session::get('colortheme')   Config::get('app.colortheme')
?>
<link rel="stylesheet" href={{ $linkTheme }}>

<body>

<!-- Side Navigation -->
<nav class="w3-sidebar w3-bar-block w3-card w3-animate-left w3-center" style="display:none" id="mySidebar">
  <a href="{{ url('/changeTheme/black') }}" class="w3-bar-item w3-button w3-black">Black</a>
  <a href="{{ url('/changeTheme/green') }}" class="w3-bar-item w3-button w3-green">Green</a>
  <a href="{{ url('/changeTheme/red') }}" class="w3-bar-item w3-button w3-red">Red</a>
  <a href="{{ url('/changeTheme/blue') }}" class="w3-bar-item w3-button w3-blue">Blue</a>
  <a href="{{ url('/changeTheme/blue-grey') }}" class="w3-bar-item w3-button w3-blue-grey">Blue Grey</a>
  <a href="{{ url('/changeTheme/teal') }}" class="w3-bar-item w3-button w3-teal">Teal</a>
  <a href="{{ url('/changeTheme/yellow') }}" class="w3-bar-item w3-button w3-yellow">Yellow</a>
  <a href="{{ url('/changeTheme/orange') }}" class="w3-bar-item w3-button w3-orange">Orange</a>
  <a href="{{ url('/changeTheme/indigo') }}" class="w3-bar-item w3-button w3-indigo">Indigo</a>

  <a href="{{ url('/changeTheme/w3-theme-light-blue') }}" class="w3-bar-item w3-button w3-theme-light-blue">w3-theme-light-blue</a>
  <a href="{{ url('/changeTheme/w3-theme-light-green') }}" class="w3-bar-item w3-button w3-theme-light-green">w3-theme-light-green</a>
  <a href="{{ url('/changeTheme/w3-theme-lime') }}" class="w3-bar-item w3-button w3-theme-lime">w3-theme-lime</a>
  <a href="{{ url('/changeTheme/w3-theme-khaki') }}" class="w3-bar-item w3-button w3-theme-khaki">w3-theme-khaki</a>
  <a href="{{ url('/changeTheme/w3-theme-amber') }}" class="w3-bar-item w3-button w3-theme-amber">w3-theme-amber</a>
  <a href="{{ url('/changeTheme/w3-theme-brown') }}" class="w3-bar-item w3-button w3-theme-brown">w3-theme-brown</a>
  <a href="{{ url('/changeTheme/w3-theme-grey') }}" class="w3-bar-item w3-button w3-theme-grey">w3-theme-grey</a>
  <a href="{{ url('/changeTheme/w3-theme-dark-grey') }}" class="w3-bar-item w3-button w3-theme-dark-grey">w3-theme-dark-grey</a>
  <!--<button class="w3-bar-item w3-button w3-text-red" onclick="paintMe('red')">Red</i></button>
  <button class="w3-bar-item w3-button w3-text-blue" onclick="paintMe('blue')">Blue</i></button>
  <button class="w3-bar-item w3-button w3-text-blue-grey" onclick="paintMe('blue-grey')">Blue Grey</i></button>
  <button class="w3-bar-item w3-button w3-text-teal" onclick="paintMe('teal')">Teal</i></button>
  <button class="w3-bar-item w3-button w3-text-yellow" onclick="paintMe('yellow')">Yellow</i></button>
  <button class="w3-bar-item w3-button w3-text-orange" onclick="paintMe('orange')">Orange</i></button>
  <button class="w3-bar-item w3-button w3-text-indigo" onclick="paintMe('indigo')">Indigo</i></button>-->
  <button class="w3-bar-item w3-button w3-theme" onclick="w3_close()">Close <i class="fa fa-remove"></i></button>
</nav>
 <!-- Header -->
<header class="w3-container w3-theme w3-padding" id="myHeader">
  <div class="w3-cell-row w3-theme">
    <div class="w3-cell ">
      <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button "></i> 
    </div>
    <div class="w3-cell w3-right">
       @if (Route::has('login'))
              @if (Auth::check())
                   <div class="w3-dropdown-hover">
                            <button class="w3-button w3-theme ">
                              {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                                <a href="{{ route('logout') }}" class="w3-bar-item w3-button w3-theme" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Вихід </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                            {{ csrf_field() }}
                                </form>
                            </div>
                   </div>
                @else
                  <a href="{{ url('/login') }}">Увійти</a>
                  <a href="{{ url('/register') }}">Зареєструватись</a>
              @endif
        @endif 
    </div>
  </div>  
  <div class="w3-center">
  <h4>{{ config('app.company') }}</h4>
  <h1 class="w3-xxxlarge w3-animate-bottom">Контроль автотранспорту</h1>
    <div class="w3-padding-0">
      <!--<button class="w3-btn w3-xlarge w3-dark-grey w3-hover-light-grey" onclick="document.getElementById('id01').style.display='block'" style="font-weight:100;">Завантаження даних</button>-->
      <!--<a href="/import-export-csv-excel" class="w3-btn w3-xlarge w3-dark-grey w3-hover-light-grey" style="font-weight:100;">Завантаження даних </a>-->
    </div>
    <div class="w3-padding-0 w3-display-container" style="height:200px;">
        <input class="w3-input w3-border w3-round w3-display-middle" name="first" type="text" placeholder="оберіть авто" style="width:30%"> 
        <input name="key" type="search" placeholder="Назва послуги або життєва ситуація" class="input form-search_input" autocomplete="off"> 
        <!--<a class="w3-button w3-large w3-circle w3-xlarge w3-ripple w3-black" style="z-index:0">></a>-->
    </div>
    <div class="input-group">
            <input class="form-control border-end-0 border rounded-pill" type="text" value="search" id="example-search-input">
            <span class="input-group-append">
                <button class="btn btn-outline-secondary bg-white border-start-0 border rounded-pill ms-n3" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </span>
     </div>
  </div>
</header>

<!-- Modal -->
<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-top">
      <header class="w3-container w3-theme-l1"> 
        <span onclick="document.getElementById('id01').style.display='none'"
        class="w3-button w3-display-topright">×</span>
        <h4>Oh snap! We just showed you a modal..</h4>
        <h5>Because we can <i class="fa fa-smile-o"></i></h5>
      </header>
      <div class="w3-padding">
        <p>Cool huh? Ok, enough teasing around..</p>
        <p>Go to our <a class="w3-btn" href="/w3css/default.asp">W3.CSS Tutorial</a> to learn more!</p>
      </div>
      <footer class="w3-container w3-theme-l1">
        <p>Modal footer</p>
      </footer>
    </div>
</div>

<div class="w3-row-padding w3-center w3-margin-top">
<div class="w3-quarter">
  <div class="w3-card w3-container" style="min-height:460px">
  
  <h3>Технічні характеристики</h3><br>
  <a href="/catalog" class="fa fa-gears w3-margin-bottom w3-text-theme w3-button" style="font-size:120px"></a>
  <p>Детальна інформація щодо</p>
  <p>характеристик та поточного </p>
  <p>стану транспортного</p>
  <p>засобу</p>
  </div>
</div>    
<div class="w3-quarter">
  <div class="w3-card w3-container" style="min-height:460px">
  <h3>Паливо та пробіг</h3><br> 
  <a href="/graf/" class="fa fa-eye w3-margin-bottom w3-text-theme w3-button" style="font-size:120px"></a>
  <!--<i class="fa fa-eye w3-margin-bottom w3-text-theme" style="font-size:120px"></i>-->
  <p>Витрати палива та кілометраж</p>
  <p>згідно даних системи SAP</p>
  <p>та системи GPS Vialon</p>
  </div>
</div>

<div class="w3-quarter">
  <div class="w3-card w3-container" style="min-height:460px">
  <h3>Використання</h3><br>
  <a href="/maket" class="fa fa-download w3-margin-bottom w3-text-theme w3-button" style="font-size:120px"></a>
  <p>Замовлення та подорожі</p>
  <p>згідно системи "Заявки на транспорт"</p>
  <p>та системи SAP</p>
  <p></p>
  </div>
</div>

<div class="w3-quarter">
  <div class="w3-card w3-container" style="min-height:460px">
  <h3>Сервісне обслуговування</h3><br>
  <a href="/instruction" class="fa fa-book w3-margin-bottom w3-text-theme w3-button" style="font-size:120px"></a>
  <!--<a href="/instruction.pdf" target="_blank" class="fa fa-book w3-margin-bottom w3-text-theme w3-button" style="font-size:120px"></a> -->
  <p>Витрати на ремонт, технічне </p>
  <p>обслуговування та послуги </p>
  <p>з оформлення документації</p>
  <p></p>
  </div>
</div>

</div>

<!-- Script for Sidebar, Tabs, Accordions, Progress bars and slideshows -->
<script>
// Side navigation
function w3_open() {
  var x = document.getElementById("mySidebar");
  x.style.width = "100%";
  x.style.fontSize = "40px";
  x.style.paddingTop = "10%";
  x.style.display = "block";
}
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
function paintMe(color) {
    //document.getElementById("themeasset").style.display = "none";
  //document.getElementById("ct").innerHTML = "Paragraph changed!";
  var a = document.getElementById('changeTheme');
      a.innerHTML = '<link id="ct" rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-'+color+'.css">';
      //a.href = "https://www.w3schools.com/lib/w3-theme-blue.css";
      //localStorage.setItem('colortheme', color);
  }

// Tabs
function openCity(evt, cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  var activebtn = document.getElementsByClassName("testbtn");
  for (i = 0; i < x.length; i++) {
    activebtn[i].className = activebtn[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-dark-grey";
}

var mybtn = document.getElementsByClassName("testbtn")[0];
mybtn.click();

// Accordions
function myAccFunc(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

// Slideshows
var slideIndex = 1;

function plusDivs(n) {
  slideIndex = slideIndex + n;
  showDivs(slideIndex);
}

function showDivs(n) {
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

showDivs(1);

// Progress Bars
function move() {
  var elem = document.getElementById("myBar");   
  var width = 5;
  var id = setInterval(frame, 10);
  function frame() {
    if (width == 100) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
      elem.innerHTML = width * 1  + '%';
    }
  }
}
</script>

</body>
</html>
