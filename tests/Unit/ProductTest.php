<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Services\ProductService;
use Tests\TestCase;

class ProductTest extends TestCase
{
    protected $productService;
    protected $faker;

    public function setUp(): void
    {
        parent::setUp();

        $this->faker = \Faker\Factory::create();
        $this->productService = new ProductService(new ProductRepository());
    }

    /** @test */
    public function it_can_create_a_product()
    {
        $data = [
            'title'       => $this->faker->realText(20),
            'description' => $this->faker->realText(200),
            'image'       => $this->faker->image('public/storage/images', 400, 300, null, false),
        ];

        $product = $this->productService->create($data);
        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($data['title'], $product->title);
        $this->assertEquals($data['description'], $product->description);
        $this->assertEquals($data['image'], $product->image);
    }

    /** @test */
    public function it_can_update_a_product()
    {
        $data = [
            // we can use factory to seed 1 product and use its ID here instead of selecting random one
            'id'          => Product::inRandomOrder()->first()->id,
            'title'       => $this->faker->realText(20),
            'description' => $this->faker->realText(200),
            'image'       => $this->faker->image('public/storage/images', 400, 300, null, false),
        ];

        $product = $this->productService->edit($data);

        $this->assertEquals($product, true);
    }

    /** @test */
    public function it_can_show_a_product()
    {
        $product = Product::factory()->create();
        $found = $this->productService->getProduct($product->id);

        $this->assertInstanceOf(Product::class, $found);
        $this->assertEquals($found->title, $product->title);
        $this->assertEquals($found->image, $product->image);
        $this->assertEquals($found->description, $product->description);
    }

    /** @test */
    public function it_can_destroy_a_product()
    {
        $product = Product::factory()->create();
        $delete = $this->productService->delete($product->id);

        $this->assertEquals($delete, true);
    }
}
