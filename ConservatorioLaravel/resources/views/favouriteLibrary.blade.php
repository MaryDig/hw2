<html>
    <head>
        <link rel="stylesheet" href='{{url("css/book.css")}}'>
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
                <a href='{{url("book")}}'>Libri</a>
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

        <header>
            <h1>La tua libreria</h1>
        </header>
        <section>
            <div id="bookContainer">
            </div>
        </section>
       <footer>Mary Di Gregorio matricola O46001623</footer>
        
    </body>
    <script src='{{url("js/library.js")}}'></script>
</html>