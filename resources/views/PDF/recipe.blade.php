<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF-{{$recipe->name}} </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{'css/PDF/styles.css'}}">
</head>
<body>
    <div class="top">
        <img src="{{'img/recipes/'.$recipe->img}}" alt="recipe-{{$recipe->name}}" class="image">
    </div>
    <hr>
    <div class="bot-info">
            {{-- Name,preptime,ingredients --}}
            <div class="name">{{$recipe->name}}</div>
            <div class="preptime">
                <img src="{{'img/clock.png'}}" width="15px" alt="">
                {{$recipe->preptime}} minutes
            </div>
            <label for="ingredients">
                <strong>Ingredients:</strong>
            </label>
            <div class="ingredients"> {{$recipe->ingredients}} </div>
            <label for="description">
                <strong>Procedure:</strong>
            </label>
            <div class="description"> {{$recipe->description}} </div>
    </div>
    
</body>
</html>