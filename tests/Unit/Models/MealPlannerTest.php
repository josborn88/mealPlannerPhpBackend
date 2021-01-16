<?php

namespace Tests\Unit\Models;

use App\Models\Meal;
use App\Models\MealPlan;
use Mockery;
use Tests\TestCase;


class MealPlannerTest extends TestCase
{

    public function testMealPlanMakesOneMeal()
    {
        $databaseMock = Mockery::mock('database');
        $databaseMock->shouldReceive('getRandomMeal')
        ->andReturn(factory(Meal::class));

        $mealPlanner = new MealPlan($databaseMock);
        $mealPlanner->planRandomMeals(1);
        $mealPlan = $mealPlanner->mealPlan;
        $this->assertEquals(1, count($mealPlan));

    }

    public function testMealPlanMakesFiveMeals()
    {
        $databaseMock = Mockery::mock('database');
        $databaseMock->shouldReceive('getRandomMeal')
        ->andReturn(factory(Meal::class));
        $mealPlanner = new MealPlan($databaseMock);
        $mealPlanner->planRandomMeals(5);
        $mealPlan = $mealPlanner->mealPlan;
        
        $this->assertEquals(5, count($mealPlan));
    }

    
}
