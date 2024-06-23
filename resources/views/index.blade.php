@extends('layouts.app')
@section('links')
<link rel="stylesheet" href="{{asset('css/front-page/styles.css')}}">

@endsection

@section('content')
<form id="search-recipes" method="GET" action="{{ route('recipes.index') }}">
    <input type="search" placeholder="Search (name, ingredients)" aria-label="Search" name="search" id="search" value="{{ old('search', $old['search'] ?? '') }}">
    <div class="form-group">
        <label for="preptime">Preparation time</label>
        <input type="number" id="preptime" name="preptime" placeholder="15 min" value="{{ old('preptime', $old['preptime'] ?? '') }}">
    </div>
    <div class="form-group">
        <label for="orderby">Order by</label>
        <select name="orderby" id="orderby">
            <option value="newest" {{ old('orderby', $old['orderby'] ?? '') == 'newest' ? 'selected' : '' }}>newest</option>
            <option value="preptime" {{ old('orderby', $old['orderby'] ?? '') == 'preptime' ? 'selected' : '' }}>preparation time</option>
            <option value="oldest" {{ old('orderby', $old['orderby'] ?? '') == 'oldest' ? 'selected' : '' }}>oldest</option>
        </select>
    </div>
    <div id="buttons">
        <button type="submit" id="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
        <a href="{{route('recipes.index')}}" id="delete-filters"><i class="fa-solid fa-trash-can"></i>Delete Filters</a>
        <a href="{{ route('recipes.create') }}" id="new-recipe"><i class="fa-solid fa-plus"></i>New recipe</a>
    </div>
</form>


    <div id="pagination">
        {{ $recipes->links() }}
    </div>
    <div id="recipes">
        @foreach ($recipes as $recipe)
            {{-- <a class="recipe" href="#" id="{{$recipe->id}}"> --}}
                <div class="recipe">
                    <div class="created-at"> {{$recipe->created_at->diffForHumans()}} </div>
                    <img src="{{'img/recipes/'.$recipe->img}}" alt="recipe-{{$recipe->name}}">
                    <div class="info">
                        <div class="info-top name">
                            {{$recipe->name}}
                            <hr>
                        </div>
                        <div class="info-mid">
                            <div class="preptime"><strong><i class="fa-regular fa-clock"></i></strong> {{$recipe->preptime}} min  </div>
                            <a href="{{route('recipe.show',['recipe'=>$recipe->id,'recipename'=>$recipe->name])}}" class="view-recipe">View Recipe</a>
                            <a href="{{route('recipe.pdf',$recipe->id)}}" class="pdf-button"><i class="fa-solid fa-file-pdf fa-lg"></i></a>
                        </div>
                    </div>
                </div>

                
            {{-- </a> --}}
        @endforeach
    </div>

    {{-- <div class="bottom">
        <div class="bottom-lang"></div>
        <div class="bottom-mode">
            <i class="fas fa-moon bottom-mode-icon" onclick="toggleMode('dark')"></i>
            <i class="fas fa-sun bottom-mode-icon" onclick="toggleMode('light')"></i>
        </div>
        
    </div> --}}

@endsection

@section('scripts')
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
@endsection