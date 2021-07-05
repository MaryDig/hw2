<html>
    <head>  
        <link rel="stylesheet" href='{{url("css/areaStudenti.css")}}'> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <meta charset="UTF-8">
    </head>
    <body>
        <nav>
            <div id="logo">
                <img src='{{url("css/logo.png")}}'>
            </div>
            <div id="bottoni">
                <a href='{{url("home")}}'>Home</a>
                <a href='{{url("book")}}'>Libri</a>
                <a href='{{url("favouriteLibrary")}}'>La mia libreria</a>
                <a href='{{url("video")}}'>Video</a>
                <a href="">Contatti</a>
                @if(session()->has('user_id'))
                <a href='{{url("logout")}}'>Logout</a>
                @endif
            </div>

        </nav>

        @if(session()->has('user_id'))
          <h3>Benvenuto,{{$nome}}!</h3>
        @endif

        </nav>
        <header>
            <div class="barraricerca">
                <p class="testo">Cerca</p>
                <input id="searchbar" type="text" />
            </div>
            
            <div class="preferiti">
                <h1>Esami prenotati</h1>
            </div>
                    
        </header>
        
        <section>  
            <h1>Esami Prenotabili</h1>
            <div id="ricercati"> </div>

            
            <div id="cont"></div>
        </section>
        <footer>Mary Di Gregorio matr.O46001623</footer>
        <script src='{{url("js/fetchStudentArea.js")}}'defer></script>
        <script src='{{url("js/contents.js")}}'defer></script>
    </body>
    
</html>