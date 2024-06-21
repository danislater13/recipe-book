<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Http\Request;

class Recipe extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'img1',
        'img2',
        'img3',
        'img4',
    ];
    public function scopeFilter($query, Request $request)
    {
        if ($request->filled('search')) {
            $query->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('ingredients', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('preptime')) {
            $query->where('preptime', '<=', $request->preptime);
        }

        return $query;
    }

    public function scopeOrderByCustom($query, Request $request)
    {
        if ($request->filled('orderby')) {
            switch ($request->orderby) {
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'preptime':
                    $query->orderBy('preptime', 'asc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc'); // Default ordering
                    break;
            }
        } else {
            $query->orderBy('created_at', 'desc'); // Default ordering
        }

        return $query;
    }


    public function scopeName($query, Request $request)
    {
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        return $query;
    }

    public function scopeIngredients($query, Request $request)
    {
        if ($request->has('search')) {
            $query->orwhere('ingredients', 'like', '%' . $request->search . '%');
        }

        return $query;
    }
    public function scopePreptime($query, Request $request)
    {
        if ($request->has('preptime')) {
            $query->where('preptime', '=', $request->preptime)
                ->orwhere('preptime', '>', $request->preptime);
        }

        return $query;
    }
}
