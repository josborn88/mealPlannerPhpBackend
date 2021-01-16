<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\MealPlanController;
use app\Models\Meal;
use Tests\TestCase;

class MealPlanControllerTest extends TestCase
{
    public function testMealControllerReturnsMeals()
    {
        $mealPlanController = new MealPlanController();
        $mealPlan = $mealPlanController->createMealPlan(5);

        $this->assertInstanceOf(Meal::class, $mealPlan[0]);
        $this->assertEquals(5, count($mealPlan));
    }
}
