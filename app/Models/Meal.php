<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Meal extends Model
{

    protected $fillable = [
        'title', 'lastMade', 'genre', 'cookTime', 'prepTime', 'ingredients'
    ];
    
    static function makeMealFromRequest(Request $request)
    {
    
        $ingredients = explode(',', $request['ingredients']);
        $meal = new Meal();
        
        $meal->title = $request['title'];
        $meal->ingredients = json_encode($ingredients);
        $meal->genre = $request['genre'];
        $meal->prepTime = $request['prepTime'];
        $meal->cookTime = $request['cookTime'];
        $meal->lastMade = '2020-01-01';

        return $meal;
    }
    
}
