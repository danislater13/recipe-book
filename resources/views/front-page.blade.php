<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Front page</title>
    <link rel="stylesheet" href="{{asset('css/menu.css')}}">
    <link rel="stylesheet" href="{{asset('css/front-page/styles.css')}}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="menu">
        <div id="menu-logo">
            <img src="{{asset('/img/img.jpeg')}}" alt="logo" width="45px">
        </div>
        <div id="menu-buttons"  class="menu-buttons">
            <a href="" class="menu-buttons-button">Profile</a>
            <a href="" class="menu-buttons-button">Recipes</a>
            <a href="" class="menu-buttons-button">Subscribers</a>
            {{-- <form class="menu-buttons-search">
                <input type="search" placeholder="Search" aria-label="Search">
                <button type="submit">Search</button>
            </form> --}}
        </div>
        {{-- <div id="menu-right">
            
        </div> --}}
    </div>
    <div id="content">
        <div id="search">
            <form id="search-recipes">
                <input id="search-recipes-input" type="search" placeholder="Search" aria-label="Search">
                {{-- <button type="submit">Search</button> --}}
            </form>
            {{-- <img src="{{'img/Fp.jpeg'}}" alt="front-page-img"> --}}
        </div>
        <div id="recipes">
            <a class="recipe" href="#"><img src="{{'img/food.jpg'}}" alt="recipe"></a>
            <a class="recipe" href="#"><img src="{{'img/image.png'}}" alt="recipe"></a>
            <a class="recipe" href="#"><img src="{{'img/food.jpg'}}" alt="recipe"></a>
            <a class="recipe" href="#"><img src="{{'img/image.png'}}" alt="recipe"></a>
            <a class="recipe" href="#"><img src="{{'img/food.jpg'}}" alt="recipe"></a>
            <a class="recipe" href="#"><img src="{{'img/image.png'}}" alt="recipe"></a>
            <a class="recipe" href="#"><img src="{{'img/food.jpg'}}" alt="recipe"></a>
            <a class="recipe" href="#"><img src="{{'img/image.png'}}" alt="recipe"></a>
            <a class="recipe" href="#"><img src="{{'img/image.png'}}" alt="recipe"></a>
            <a class="recipe" href="#"><img src="{{'img/food.jpg'}}" alt="recipe"></a>
            <a class="recipe" href="#"><img src="{{'img/food.jpg'}}" alt="recipe"></a>
            <a class="recipe" href="#"><img src="{{'img/image.png'}}" alt="recipe"></a>
            <a class="recipe" href="#"><img src="{{'img/image.png'}}" alt="recipe"></a>
            <a class="recipe" href="#"><img src="{{'img/food.jpg'}}" alt="recipe"></a>
            <a class="recipe" href="#"><img src="{{'img/food.jpg'}}" alt="recipe"></a>

            
        </div>
        {{-- <img class="front-page-img" src="{{'img/food.jpg'}}" alt=""> --}}
    </div>

    <div class="bottom">
        <div class="bottom-lang"></div>
        <div class="bottom-mode">
            <i class="fas fa-moon bottom-mode-icon" onclick="toggleMode('dark')"></i>
            <i class="fas fa-sun bottom-mode-icon" onclick="toggleMode('light')"></i>
        </div>
        
    </div>
</body>
<script>
    function toggleMode(mode) {
        var body = document.body;
        if (mode === 'dark') {
            body.classList.remove('light-mode');
            body.classList.add('dark-mode');
            // Aquí puedes guardar la preferencia del usuario (opcional)
        } else {
            body.classList.remove('dark-mode');
            body.classList.add('light-mode');
            // Aquí puedes guardar la preferencia del usuario (opcional)
        }
    }
</script>

</html>