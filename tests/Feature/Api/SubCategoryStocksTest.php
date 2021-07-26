<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Stock;
use App\Models\SubCategory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubCategoryStocksTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_sub_category_stocks()
    {
        $subCategory = SubCategory::factory()->create();
        $stocks = Stock::factory()
            ->count(2)
            ->create([
                'sub_category_id' => $subCategory->id,
            ]);

        $response = $this->getJson(
            route('api.sub-categories.stocks.index', $subCategory)
        );

        $response->assertOk()->assertSee($stocks[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_sub_category_stocks()
    {
        $subCategory = SubCategory::factory()->create();
        $data = Stock::factory()
            ->make([
                'sub_category_id' => $subCategory->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.sub-categories.stocks.store', $subCategory),
            $data
        );

        $this->assertDatabaseHas('stocks', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $stock = Stock::latest('id')->first();

        $this->assertEquals($subCategory->id, $stock->sub_category_id);
    }
}
