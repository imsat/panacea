<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Category;
use App\Product;
use App\WarrantyProduct;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        Category::truncate();
        Product::truncate();
        WarrantyProduct::truncate();

        factory(User::class, 200)->create();

        factory(Category::class, 10)->create()->each(
            function ($category){
                factory(Product::class, mt_rand(8,15))->create(['category_id' => $category->id])->each(
                    function ($product){
                        factory(WarrantyProduct::class, mt_rand(2, 3))->create(['product_id' => $product->id]);
                    }
                );
            }
        );

    }
}
