<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Front page</title>
    <link rel="stylesheet" href="{{asset('css/menu.css')}}">
    @yield('links')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <style>
        #content{
            background-image: url({{asset('img/food.jpg')}});
        }
    </style>
    <div id="menu">
        <div id="menu-logo">
            <img src="{{asset('/img/img.jpeg')}}" alt="logo" width="45px">
        </div>
        <div id="menu-buttons"  class="menu-buttons">
            {{-- <a href="" class="menu-buttons-button">Profile</a> --}}
            <a href="{{route('recipes.index')}}" class="menu-buttons-button">Recipes</a>
            {{-- <a href="" class="menu-buttons-button">Subscribers</a> --}}
        </div>
        {{-- <div id="menu-right">
            
        </div> --}}
    </div>
    <div id="content">
        @yield('content')
    </div>
</body>
@yield('scripts')
</html>