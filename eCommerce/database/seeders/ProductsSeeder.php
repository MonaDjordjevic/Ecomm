<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
        [
            'name'=>'Huawei P40',
            'price'=>'882',
            'description'=>'A smartphone with 8gb RAM, 6.1 inches display and HiSilicon Kirin 990 5G processor.',
            'category'=>'mobile phone',
            'gallery'=>'https://fdn2.gsmarena.com/vv/pics/huawei/huawei-p40-01.jpg',
        ],
        [
            'name'=>'Samsung S20',
            'price'=>'999',
            'description'=>'A smartphone with 8gb RAM, 6.2 inches display and Samsung Exynos 990 processor.',
            'category'=>'mobile phone',
            'gallery'=>'https://www.gizmochina.com/wp-content/uploads/2020/02/Samsung-Galaxy-S20-Plus-500x500.jpg',
        ],
        [
            'name'=>'Xiaomi Mi 10 5G',
            'price'=>'699',
            'description'=>'A smartphone with 12 RAM, 6.67 inches display and Qualcomm Snapdragon 865 processor.',
            'category'=>'mobile phone',
            'gallery'=>'https://fdn2.gsmarena.com/vv/bigpic/xiaomi-mi-10-5g.jpg',
        ],
        [
            'name'=>'Samsung Q80 QLED',
            'price'=>'1800',
            'description'=>'A 65-inch smart TV with Samsung Quantum Processor 4K',
            'category'=>'TV',
            'gallery'=>'https://thegoodguys.sirv.com/products/50064897/50064897_622126.PNG',
        ],
        [
            'name'=>'Sony A8H OLED',
            'price'=>'2846',
            'description'=>'A 65-inch smart TV with Sony X1 Ultimate processor',
            'category'=>'TV',
            'gallery'=>'https://www.sony.com/image/4443c62f0da678f768c11b44a3f045fc?fmt=pjpeg&wid=330&bgcolor=FFFFFF&bgc=FFFFFF',
        ],
        
        ]);
    }
}
