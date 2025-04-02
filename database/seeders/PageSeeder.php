<?php

namespace Database\Seeders;

use App\Models\Footer;
use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding Pages...\n";
        Page::create([
            'title' =>[
                'uz'=>'Biz haqimizda',
                'en'=>'About us',
                'ru'=>'О нас',
            ],
            'description' =>[
                'uz'=>'Biz haqimizda',
                'en'=>'About us',
                'ru'=>'О нас',
            ],
            'keywords' =>'Biz haqimizda,About us,About,О нас',
            'slug'=>'about-us',
        ]);
        Footer::create([
            'title'=>[
                'uz'=>'AGN TRAVEL',
                'en'=>'AGN TRAVEL',
                'ru'=>'AGN TRAVEL',
            ],
            'description' =>[
                'uz'=>'',
                'en'=>'',
                'ru'=>'',
            ],
            'address'=>[
                'uz'=>'',
                'en'=>'',
                'ru'=>'',
            ],
            'phone'=>'',
            'email'=>'',
        ]);
    }
}
