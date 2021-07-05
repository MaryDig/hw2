<html>
    <head>  
        <link rel="stylesheet" href='{{url("css/mhw1.css")}}'>
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
                @if(session()->has('user_id'))
                <a href='{{url("studentArea")}}'>Area Studenti</a>
                @else
                <a href='{{url("login")}}'>Area Studenti</a>
                @endif
                
                <a href="">Area Docenti</a>
                <a href="">Personale</a>
                <a href="">Contatti</a>
                @if(session()->has('user_id'))
                <a href='{{url("logout")}}'>Logout</a>
                @endif
            </div>

        </nav>

        @if(session()->has('user_id'))
          <h3>Benvenuto,{{$nome}}!</h3>
        @endif
    
        <header>
            <div id="overlay">
                <h1>Istituto Musicale Vincenzo Bellini</h1>
                    <div id="bottoni">
                        <a class="bottone2">Scopri di più</a>
                    </div>
            </div>
            

        </header>
        <section>  
            <div id="flex-container">
                <div class="item">
                    <div class="style-item1">
                        <a class="bottone2">Concorsi</a>
                    </div>
                </div>
                <div class="item">
                    <div class="style-item2">
                        <a class="bottone2">Avvisi</a>
                    </div>
                </div>
                <div class="item">
                    <div class="style-item3">
                        <a class="bottone2">Erasmus</a>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div id="flex-container">
                <div class="item2">
                    <div class="style-item4">
                        <a class="bottone2">Offerta Formativa</a>
                    </div>
                </div>
                <div class="item2">
                    <div class="style-item5">
                        <a class="bottone2">Seminari</a>
                    </div>
                </div>
                <div class="item2">
                    <div class="style-item6">
                        <a class="bottone2">Concerti del bellini</a>
                    </div>
                </div>
            </div> 
        </section>
        <footer>Mary Di Gregorio matricola O46001623</footer>
    </body>
</html>
