<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'wp_id'             => $this->faker->randomNumber(4),
            'name'              => $name = $this->faker->unique()->words(2, true),
            'slug'              => Str::slug($name),
            'sku'               => $this->faker->unique()->bothify('SKU-#####'),
            'type'              => $this->faker->randomElement(['simple', 'variable']),
            'description'       => $this->faker->paragraph(5),
            'short_description' => $this->faker->sentence(),
            'price'             => $this->faker->randomFloat(2, 100, 1000),
            'regular_price'     => $this->faker->randomFloat(2, 100, 1000),
            'sale_price'        => $this->faker->randomFloat(2, 50, 500),
            'on_sale'           => $this->faker->boolean(),
            'purchasable'       => true,
            'featured'          => $this->faker->boolean(),
            'status'            => true,
            'stock_status'      => $this->faker->randomElement(['instock', 'outofstock']),
            'weight'            => $this->faker->numberBetween(1, 10) . 'kg',
            'dimensions'        => json_encode([
                'length' => $this->faker->numberBetween(10, 100),
                'width'  => $this->faker->numberBetween(10, 100),
                'height' => $this->faker->numberBetween(10, 100),
            ]),
            'brand'             => $this->faker->randomElement(['Sony', 'Apple', 'Samsung', 'Nike', 'Adidas']),
            'preorder_text'     => $this->faker->boolean() ? 'Available on Preorder' : '',
            'product_code'      => $this->faker->unique()->bothify('PC-####'),
            'free_delivery'     => $this->faker->boolean(),
            'image'             => 'uploads/products/sample.jpg', // You can change this path to an existing image
            'categories'        => json_encode([$this->faker->randomElement(['Electronics', 'Furniture', 'Clothing', 'Books', 'Accessories'])]),
            'total_sales'       => $this->faker->numberBetween(0, 500),
        ];
    }
}
