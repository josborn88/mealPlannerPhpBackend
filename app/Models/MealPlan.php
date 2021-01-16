<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealPlan extends Model
{
    public $mealPlan = [];

    public $database;
    public function __construct($database)
    {
        $this->database = $database;
    }

    public function planRandomMeals($numberOfMeals)
    {
        $allMeals = $this->database->getAll();

        for($i =1; $i <= $numberOfMeals; $i++){
            $meal = $allMeals[array_rand($allMeals->toArray())]; 
            array_push($this->mealPlan, $meal);
        }
        
        return $this->mealPlan;
    }


}

