<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<title>{{ config('app.name') }}</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<?php
    if (!Session::has('colortheme')) {
      Session::put('colortheme', 'black');  
    }
    $linkTheme = "https://www.w3schools.com/lib/w3-theme-".Session::get('colortheme').".css";
?>
<link rel="stylesheet" href={{ $linkTheme }}>

<body>
    <header class="w3-container w3-theme w3-padding">
        <div class="w3-cell-row w3-theme">
            <div class="w3-cell">
                <h2><a href="/" class="w3-btn w3-tooltip">{{ config('app.name') }} <span class="w3-text w3-tag w3-grey w3-small" style="position:absolute;left:0;top:1px">на головну</span></a></h2>
             </div>
             <div class="w3-cell w3-right">
               @if (Route::has('login'))
                      @if (Auth::check())
                         <a href="{{ url('/') }}">На головну</a>
                        @else
                          <a href="{{ url('/login') }}">Увійти</a>
                          <a href="{{ url('/register') }}">Зареєструватись</a>
                      @endif
                @endif 
            </div>
        </div>    
    </header>
    
    <!--1вариант <div class="w3-cell-row w3-white w3-display-container" style="min-height:860px">--> <!--      style="min-height:460px"-->
      <div class="w3-container w3-responsive" style="min-height:860px"> 
     
      <!--<span onclick="this.parentElement.style.display='none'" class="w3-button w3-display-topright"><i class="fa fa-remove"></i></span>
      <h2>London</h2>                              style="min-height:460px"
      <p>London is the capital city of England. It is the most populous city in the United Kingdom</p>
      -->
      @yield('content')
     
      </div>
     
    <footer class="w3-container w3-theme">
      <h5>{{ config('app.company') }}</h5>
      <p class="w3-opacity">{{ config('app.subtitle') }}</p>
    </footer>

    <!--  ************************************************************************************************************************-->
        
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/FileSaver.js') }}"></script>
    <!--<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script> -->
    <!--<script type="text/javascript" src="<?php echo asset('assets/js/jquery-3.1.1.min.js'); ?>"></script> -->
    <script>
     $(document).ready (function(){
            $("#success-alert").fadeTo(1000, 0.4).slideUp(500, function(){
            $("#success-alert").slideUp(500);
            });
     }); 
     $("#save-btn").click(function() { 
          var blob = new Blob([$("#saveHtml")[0].innerHTML], {type: "text/plain;charset=utf-8"});
          saveAs(blob, "maket.html");
     }); 
     function saveMaket(date, type) {
          alert('eee');
          var blob = new Blob([date + ' ' + type + ' ' + $("#rrt")[0].innerHTML], {type: "text/plain;charset=utf-8"});
          saveAs(blob, "testfile1.html");

     }    

    </script>
</body>
</html>
 <!--var blob = new Blob([$("#rrt")[0].innerText], {type: "text/plain;charset=utf-8"});
          saveAs(blob, "testfile1.txt"); -->
<!--  alert ($(this));
         console.log($(this).html);
         console.log($("#rrt")[0].innerText);-->


          <!--var blob = new Blob([$("#rrt")[0].innerHTML], {type: "text/plain;charset=utf-8"});
          saveAs(blob, "testfile1.txt"); -->

         <!-- $(document).on('click','.delete',function(){
         let id = $(this).attr('data-id');
         $('#id').val(id);
    });-->


