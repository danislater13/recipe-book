<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Exception;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string',
            'preptime' => 'nullable|integer',
            'orderby' => 'nullable|string|in:preptime,newest,oldest',
        ]);

        // Aplicar los filtros y ordenamiento, y paginar los resultados
        $recipes = Recipe::query()
            ->filter($request)
            ->orderByCustom($request)
            ->paginate(12)
            ->appends($request->except('page'));
        // $recipes = Recipe::query();
        return view('index', [
            'recipes' => $recipes,
            'old' => $request->all()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipe-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //image,name,prep-time,ingredients,description
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'name' => 'required|string|max:255',
            'preptime' => 'required|integer|min:1',
            'ingredients' => 'required|string',
            'description' => 'nullable|string',
        ]);

        try {
            //save variables
            $recipe = new Recipe();
            $recipe->name = $request->name;
            $recipe->preptime = $request->preptime;
            $recipe->ingredients = $request->ingredients;

            if ($request->has('description')) {
                $recipe->description = $request->description;
            }

            $recipe->save();
            $image = $request->file('image');
            if ($image) {
                $image_name = $recipe->id . "-" . $recipe->name . "." . $request->file('image')->getClientOriginalExtension();
                $recipe->img = $image_name;
                $recipe->save();
                $image->storeAs('/recipes', $image_name, 'img');
            } else {
                $recipe->img = "no_image_recipe.jpg";
                $recipe->save();
            }
            toastr()->success('Recipe Created', 'New Recipe');
            return redirect()->back();
        } catch (Exception $e) {
            // dd($e->getMessage());
            dd(['errorCode' => $e->getCode(), 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
