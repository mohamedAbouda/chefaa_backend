<?php

namespace App\Console\Commands\Products;

use App\Models\Product;
use Illuminate\Console\Command;

class ProductCheapestPharmacies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:cheapes-pharmacies
                            {--product-id= : the product id to search for the cheapest pharmacies}
                            {--pharmacies-limit= : the number of pharmacies you want to return}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'return 5 cheapest pharmacies for the given product';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $productId = (int) $this->option('product-id');
        $pharmaciesLimit = (int) $this->option('pharmacies-limit') ;

        if (empty($productId)) {
            $this->info('Please provide Product Id');
            return;
        }

        $product = Product::where('id', $productId)->with('pharmacies',function($query) use($pharmaciesLimit) {
            $query->where('quantity', '>=', 1)
            ->orderBy('price')->limit(!empty($pharmaciesLimit) ? $pharmaciesLimit : config('app.pharmacy_default_count_command'))
            ->select('id', 'name', 'price', 'quantity');
        })->first();

        if (!$product) {
            $this->info('No product found with this id');
            return;
        }

        $pharmacies = json_encode(['pharmacies' => $product->pharmacies->makeHidden('pivot')]);
        // add any logic here that uses this variable.
        $this->info($pharmacies);
    }
}
