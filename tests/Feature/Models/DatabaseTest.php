<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Database;
use App\Models\Meal;
use Tests\TestCase;


class DatabaseTest extends TestCase
{
    use DatabaseTransactions;
    public function testGetAllMeals()
    {
        $meal = factory(Meal::class)->create();

        $database = new Database;

        $meals = $database->getAll();

        $this->assertEquals(6, count($meals));
    }

    public function testCreateMeal()
    {
        $database = new Database;
        $meal = factory(Meal::class)->make();

        $mealCurrent = $database->getAll();

        $meal = $database->createMeal($meal);

        $meals = $database->getAll();

        $this->assertEquals(5, count($mealCurrent));
        $this->assertEquals(6, count($meals));
    }

}