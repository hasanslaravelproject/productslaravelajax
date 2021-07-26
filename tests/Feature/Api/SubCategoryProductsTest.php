<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Product;
use App\Models\SubCategory;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubCategoryProductsTest extends TestCase
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
    public function it_gets_sub_category_products()
    {
        $subCategory = SubCategory::factory()->create();
        $products = Product::factory()
            ->count(2)
            ->create([
                'sub_category_id' => $subCategory->id,
            ]);

        $response = $this->getJson(
            route('api.sub-categories.products.index', $subCategory)
        );

        $response->assertOk()->assertSee($products[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_sub_category_products()
    {
        $subCategory = SubCategory::factory()->create();
        $data = Product::factory()
            ->make([
                'sub_category_id' => $subCategory->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.sub-categories.products.store', $subCategory),
            $data
        );

        $this->assertDatabaseHas('products', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $product = Product::latest('id')->first();

        $this->assertEquals($subCategory->id, $product->sub_category_id);
    }
}
