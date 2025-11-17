<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Season;

class ProductSeasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        $data =[
            1=>[3,4],
            2=>[1],
            3=>[4],
            4=>[2],
            5=>[2],
            6=>[2,3],
            7=>[1,2],
            8=>[2,3],
            9=>[2],
            10=>[1,2],
        ];
        foreach($data as $productId => $seasonIds){
            $product = Product::find($productId);
            $product->seasons()->attach($seasonIds);
        }
    }
}