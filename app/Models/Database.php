<?php

namespace App\Models;

use App\Interfaces\MealDatabaseInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\Meal;

class Database extends Model implements MealDatabaseInterface
{
    public function getAll()
    {
        return Meal::all();
    }

    public function createMeal(Meal $meal)
    {
        $meal->save();   
    }

    public function deleteMeal($id)
    {

    }

    public function updateMeal($id, array $data)
    {

    }

    public function getAllBeforeDate($date)
    {
        $allMeals = Meal::where('lastMade', '<', $date)->get();
        return $allMeals;        
    }

    public function makeMeal($id, $date)
    {
        $meal = Meal::where('id', $id)->get()->first();
        $meal->lastMade = $date;
        $meal->save();
    }
}
