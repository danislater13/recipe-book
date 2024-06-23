@extends('layouts.app')

@section('links')
<link rel="stylesheet" href="{{asset('css/front-page/styles.css')}}">

<link rel="stylesheet" href="{{asset('css/create-recipe.css')}}">
@endsection

@section('content')
<div id="container">
    <form id="recipe-form" action="{{route('recipe.update',$recipe->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- @method('PUT') --}}
        <div id="recipe-form-top">
            <div class="form-group file-input-container">
                <input type="file" id="image" name="image" accept="image/*" >
                <label for="image" class="file-label-front-image">
                    <i class="fas fa-plus"></i>
                    <img id="preview1" class="preview-front-image" src="{{asset('img/recipes/'.$recipe->img)}}" alt="recipe-{{$recipe->name}}" >
                </label>
            </div>
            <div id="recipe-form-top-right">
                <div class="form-group">
                    <input type="text" class="recipe-form-top-right-name" id="name" name="name" value="{{$recipe->name}}">
                    @error('name')
                        <div class="error name">
                            <div>Name needed</div>
                        </div>
                    @enderror
                </div>
                <div id="recipe-form-top-right-under">
                    <div class="form-group" id="preptime-block">
                        <label for="prep-time">Cooking time<i class="fa-regular fa-clock"></i></label>
                        <input type="number" name="preptime" id="preptime" value="{{$recipe->preptime}}" >
                    </div>
                    @error('preptime')
                        <div class="error preptime" style="margin-top: 30px;margin-left:10px">
                            <div>Cooking time needed</div>
                        </div>
                    @enderror
                    <div class="form-group" id="ingredients-block">
                        <label for="ingredients">Ingredients<i class="fa-solid fa-utensils"></i></label>
                        @error('ingredients')
                            <div class="error ingredients">
                                <div>Ingredients needed</div>
                            </div>
                        @enderror
                        <textarea id="ingredients" name="ingredients"  placeholder="-100ml of milk">{{$recipe->ingredients}}</textarea>
                    </div>
                </div>
                
            </div>

        </div>
        
        <div class="form-group" id="recipe-form-bottom">
            <label for="description">Description<i class="fa-solid fa-mortar-pestle"></i></label>
            <textarea id="description" name="description" >{{$recipe->description}}</textarea>
        </div>
    
        <button type="submit" id="create-recipe">Update Recipe</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/create-recipe.js')}}"></script>
@endsection
