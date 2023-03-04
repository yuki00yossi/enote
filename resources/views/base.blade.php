<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <link rel="icon" href="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="apple-touch-icon" href="%PUBLIC_URL%/logo192.png" />
        <title>@yield('title') | e-Note</title> 
        <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic" rel="stylesheet">
        <link rel="stylesheet" href="/css/style.css">
        @section('somehead')
        @show
    </head>

    <body>
        <noscript>You need to enable JavaScript to run this app.</noscript>
        <div id="root">
            <div class="header">
                <div class='header-cnt'>
                    <div class='header-item'>
                        <a href="{{ route('index') }}" style="text-decoration: none; color: var(--main-bg-font-color)"><h1 class="header-title">e-Note</h1></a>
                    </div>
                    @auth
                    <div class='header-item header-link test'>
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                        <a id="logoutBtn" onclick="return confirmLogout(event);" href="#">Logout</a>
                    </div>
                    <div class='header-item header-link'>
                        <a href="{{ route('user.edit') }}">Settings</a>
                    </div>
                    <div class='header-item header-link'>
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    @endauth

                    @guest
                    <div class='header-item header-link test'>
                        <a href="{{ route('login') }}">Login</a>
                    </div>
                    <div class='header-item header-link'>
                        <a href="{{ route('register') }}">Register</a>
                    </div>
                    @endguest
                </div>                
            </div>
            @if(Request::is('note/*'))
            <div class='contents'  style="width: 100%; max-width: 100%;">
                @yield('contents')
            </div>
            @else
            <div class='contents'>
                @yield('contents')
            </div>
            @endif
            <div class='footer'>
                <div class='footer-cnt'>
                    <p class='footer-copy'>
                        世の中をもっと楽しく、便利に<br/>
                        <a class='footer-title' href="https://studio-babe.com">Studio Babe</a>
                        <br><br>
                        <small>©Studio Babe all rights reserve</small>
                    </p>
                </div>
            </div>
        </div>
        @yield('endbody')
        <script>
            // ログアウトボタンクリック時の処理
            function confirmLogout(e)
            {
                e.preventDefault();
                const logoutForm = document.getElementById('logout');
                const logoutBtn = document.getElementById('logoutBtn');
                
                if (confirm('logout?'))
                {
                    logoutForm.submit();
                } else {
                    return false;
                }
            }
            
            // dashboarの時はcontentsの横幅をマックスにする
        </script>
    </body>
</html>