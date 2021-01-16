<?php

namespace App\Interfaces;
use App\Models\Meal;


interface MealDatabaseInterface {
    public function getAll();
    public function createMeal(Meal $meal);
    public function deleteMeal($id);
    public function updateMeal($id, array $data);
    public function getAllBeforeDate($date);
}