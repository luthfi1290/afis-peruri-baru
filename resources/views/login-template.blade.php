<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PERURI | Login</title>
    @include('login-partials.header-link')
    @stack('page.style')
</head>
<body class=" login">
    <div class="logo">
        <a href="@stack('link-image')">
            <img src="/assets/pages/img/logo-137.png" alt="Logo Peruri" /> 
        </a>
    </div>
    <div class="content">
        @yield('form-login')
    </div>
    <div class="copyright"> 2017 © Perusahaan Umum Percetakan Uang Republik Indonesia (PERURI).</div>
    @stack('page.js')
    @include('login-partials.bottom-scripts')
</body>
</html>