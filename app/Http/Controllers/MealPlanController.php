<?php

namespace App\Http\Controllers;

use App\Models\MealPlan;
use App\Models\Database;

class MealPlanController extends Controller
{
    public function createMealPlan($numberOfDays)
    {
        $database = new Database();
        $mealPlanMaker = new MealPlan($database);

        return $mealPlanMaker->planRandomMeals($numberOfDays);
    }
}
