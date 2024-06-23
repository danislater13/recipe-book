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
        @if ($recipes->isNotEmpty())
        @foreach ($recipes as $recipe)
        <div class="recipe">
            <div class="created-at"> {{$recipe->created_at->diffForHumans()}} </div>
            <img src="{{'img/recipes/'.$recipe->img}}" alt="recipe-{{$recipe->name}}" class="recipe-img" data-src="{{'img/recipes/'.$recipe->img}}">
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
        @endforeach
        @else
        <img src="{{ asset('img/no_food.jpeg') }}" alt="no_food" id="no_food">
        @endif
    </div>
    <!-- Modal Structure -->
    <div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modalImage">
    </div>
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

    {{-- Make image bigger --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('imageModal');
            var modalImg = document.getElementById('modalImage');
            var closeBtn = document.getElementsByClassName('close')[0];
        
            document.querySelectorAll('.recipe-img').forEach(function(img) {
                img.addEventListener('click', function() {
                    modalImg.src = this.getAttribute('data-src');
                    modal.classList.add('show');
                });
            });
        
            closeBtn.addEventListener('click', function() {
                modal.classList.remove('show');
                setTimeout(() => { modal.style.display = 'none'; }, 300);
            });
        
            window.addEventListener('click', function(event) {
                if (event.target == modal) {
                    modal.classList.remove('show');
                    // setTimeout(() => { modal.style.display = 'none'; }, 300);
                }
            });
        });
    </script>
@endsection