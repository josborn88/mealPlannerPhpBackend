<?php

namespace App\Http\Controllers;

use App\Models\Database;
use Illuminate\Http\Request;
use App\Models\Meal;
use Illuminate\Support\Facades\Log;

class MealController extends Controller
{

    //Get all meals from database
    public function getAllMealsFromDatabase() 
    {
        $database = new Database();
        $meals = $database->getAll();
        return $meals;
    }
    //get specific meal from database

    //get random meal from database that hasn't been made recently
    public function getRandomMealLastMadeBefore($date){
        $database = new Database();
        $allMeals = $database->getAllBeforeDate($date);
        if (empty($allMeals->toArray())) {
            return ['title' => "You get NOTHING"];
       }
        $meal = $allMeals[array_rand($allMeals->toArray())];

        return $meal;
    }

    public function cookMeal($id)
    {
        $date = date("Y-m-d");
        $database = new Database();
        $database->makeMeal($id, $date);
    }
    //delete meal
    public function deleteMeal(Request $request)
    {
        
    }


    //update meal

    //save a new meal
    public function makeMealFromRequest(Request $request)
    {
        $meal = Meal::makeMealFromRequest($request);
        $database = new Database();
        $database->createMeal($meal);
        return $meal;

    }
    //get meals made by lastMade
    

}

