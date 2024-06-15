@extends('layouts.app')

@section('links')
<link rel="stylesheet" href="{{asset('css/create-recipe.css')}}">
@endsection

@section('content')
<div id="container">
    <form id="recipe-form">
        <div id="recipe-form-top">
            <div class="form-group file-input-container">
                <input type="file" id="image1" name="image1" accept="image/*" required>
                <label for="image1" class="file-label-front-image">
                    <i class="fas fa-plus"></i>
                    <img id="preview1" class="preview-front-image" src="#" alt="Previsualización de Imagen" style="display: none;">
                </label>
            </div>
            <div id="recipe-form-top-right">
                <div class="form-group">
                    <input type="text" class="recipe-form-top-right-name" id="name" name="name" required>
                </div>
                <div id="recipe-form-top-right-under">
                    <div class="form-group" id="preptime-block">
                        <label for="prep-time">Cooking time<i class="fa-regular fa-clock"></i></label>
                        <input type="number" name="preptime" id="preptime" required>
                    </div>
                    <div class="form-group" id="ingredients-block">
                        <label for="ingredients">Ingredients<i class="fa-solid fa-utensils"></i></label>
                        <textarea id="ingredients" name="ingredients" required placeholder="-100ml of milk"></textarea>
                    </div>
                </div>
                
            </div>

        </div>
        
        <div class="form-group" id="recipe-form-bottom">
            <label for="description">Description<i class="fa-solid fa-mortar-pestle"></i></label>
            <textarea id="description" name="description" required></textarea>
        </div>
    
        <button type="submit" id="create-recipe">Create Recipe</button>
    </form>
</div>

@endsection

@section('scripts')
<script src="{{asset('js/create-recipe.js')}}"></script>
@endsection
