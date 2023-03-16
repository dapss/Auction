<!DOCTYPE html>
<html lang="en">
    <head>

        <title>AUCIFY</title>
        

        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
        <link href="css/fontawesome-all.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
    
    </head>
    <body>
        

        <div class="navbar">
            <div class="container flex">


                @auth
                    <a class="logo-image" href="{{ url('/auction') }}"><img src="logo3.png"></a>
                @else
                    <a class="logo-image"><img src="logo3.png"></a>
                @endauth

                <nav>
                    <ul >
                        @auth
                            <li><a href="{{ url('/auction') }}">Dashboard</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Log in</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                    </ul>
                </nav>
            </div> 
        </div> 

        <header>
            <div class="container">
                <div class="text-container">
                    <h1 class="h1-large">WELCOME TO AUCIFY</h1>
                    <a class="btn-outline-lg" href="{{ route('register') }}">Join Now</a>
                </div>
            </div>
        </header>
    </body>
</html>