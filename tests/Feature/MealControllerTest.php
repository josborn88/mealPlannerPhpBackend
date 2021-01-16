<?php

namespace Tests\Feature;

use App\Http\Controllers\MealController;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Meal;
use Illuminate\Http\Request;
use Tests\TestCase;

class MealControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testGetRandomMealByDate()
    {
        $meal = factory(Meal::class)->create(
            [
                'lastMade' => '2020-12-20'
            ]
            );
        $mealController = new MealController();
        $allMeals = $mealController->getAllMealsFromDatabase();
        $date = '2019-12-10';

        $meal = $mealController->getRandomMealLastMadeBefore($date);

        $this->assertInstanceOf(Meal::class, $meal);
        $this->assertTrue($meal->title === 'Tacos' || $meal->title === "Chicken Parm");
    }

    public function testGetRandomMealByDateWhenNoResults()
    {

        $mealController = new MealController();
        $date = '1900-01-01';

        $meal = $mealController->getRandomMealLastMadeBefore($date);
        $expectedMessage = "You get NOTHING";

        $this->assertEquals($expectedMessage, $meal['title']);
        
    }

    public function testCookMealUpdatesLastMade()
    {
        $meal = factory(Meal::class)->create([
            'lastMade' => '1988-06-29 00:00:00'
        ]);
        
        $mealController = new MealController();
        $date = date("Y-m-d") . ' 00:00:00';
        $mealController->cookMeal($meal->id);
        $meal->refresh();

        $this->assertEquals($date, $meal->lastMade);
    }

    public function testMakeMealFromRequest()
    {
        $request = new Request(
            [
                'title' => 'salmon',
                'prepTime' => '20',
                'cookTime' => '234',
                'genre' => 'fish',
                'ingredients' => 'fish, maple',  
            ]
            );
            

            $mealController = new MealController();

            $mealController->makeMealFromRequest($request);

            $allMeals = $mealController->getAllMealsFromDatabase();

            $this->assertEquals(6, count($allMeals));

    }

}
