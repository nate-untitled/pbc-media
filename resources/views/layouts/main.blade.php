<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale = 1, maximum-scale=1, user-scalable=no" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('description')
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
        <link rel="icon" href="" type="image/x-icon">
        <link rel="shortcut icon" href="" type="image/x-icon" />
    </head>

    <body>

    <div class="page-container" id="app" v-cloak>

        <div class="menu-bar">
            <div class="menu-bar-inner">
                <a href="https://pitbarrelcooker.com"><img src="/images/PBC_Logo.png"></a>
                <a style="color: #fff; font-size: 1.3rem; float: right; line-height: 52px;" href="/logout">Log Out</a>
            </div>
        </div>

        @yield('content')

    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
