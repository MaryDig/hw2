<html>
    <head>  
        <link rel="stylesheet" href='{{url("css/HM1.css")}}'>
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
                <a href="">Contatti</a>
            </div>

        </nav>
        <header>
            <h1 id="header">Portale Studenti istituto bellini</h1>
        </header>
        <section> 
            <div id="cont">
                <div class="item">
                    <form method="post" class="register-form" id="loginForm" action="{{url('login')}}">
                        @csrf
                        <input type='hidden' name='_token' value='{{$csrf_token}}'>
                        <h1 class="firstTitle">Login</h1>
                        <p class="paragraph">Email</p>
                        <input type="email" value="{{old('email')}}" class="textBox" name='email' id="textBoxEmailLog">
                        <p class="paragraph">Password</p>
                        <input type="password" class="textBox" name='password' id="textBoxPasswordLog">
                        <input type="submit" value="Enter" class="enter" name="entra">
                        <p class="paragraph">Non sei ancora registrato? <a class="linkword">clicca qui</a></p>
                    </form>
                </div>
                <div class="item hidden">
                    <form method="post" class="register-form" id="registerForm" action="{{url('sign-in')}}" >
                        @csrf
                        <input id="_token2" type='hidden' name='_token2' value='{{$csrf_token}}'>

                        <h1 class="firstTitle">Registrati</h1>
                        <p class="paragraph">Matricola</p>
                        <input type="text" class="textBox" name="matricola">
                        <p class="paragraph">Nome</p>
                        <input type="text" class="textBox" name="nome">
                        <p class="paragraph">Cognome</p>
                        <input type="text" class="textBox" name="cognome">
                        <p class="paragraph">Strumento</p>
                        <input type="text" class="textBox" name="strumento">
                        <p class="paragraph">Email</p>
                        <input type="email" class="textBox" name="email" id="textBoxEmail">
                        <div id="textBoxIdEmail" class="hidden"><p> Email già in uso! Ritenta </p></div>
                        <p class="paragraph">Password</p>
                        <input type="password" class="textBox" name="password" id="textBoxPassword">
                    
                        <input type="submit" value="Registrati" class="enter" name="registrati">
                        <div id="textBoxId" class="hidden"><p> Password troppo lunga o troppo corta ritenta </p></div>
                        <div id="errorMessage" class="hidden"><p> Non possono essere inseriti caratteri speciali</p></div>
                        <p class="paragraph"> <a class="linkword">Ritorna al login</a></p>
                    </form>
                </div>
            </div>
        </section>
        <footer>Mary Di Gregorio matricola O46001623</footer>
        <script src='{{url("js/loginControls2.js")}}'defer></script>
        <script src='{{url("js/loginStudenteFetches.js")}}'defer></script>
    </body>
</html>