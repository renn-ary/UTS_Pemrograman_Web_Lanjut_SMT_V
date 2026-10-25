<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InventorySeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@inventaris.test'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('Admin123!'),
            ]
        );

        $categories = [
            'Aksesori',
            'Perangkat Komputer',
            'Penyimpanan',
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate(['name' => $name]);
        }

        $categoryIds = Category::whereIn('name', $categories)
            ->pluck('id', 'name');

        $items = [
            [
                'category' => 'Aksesori',
                'name' => 'Keyboard',
                'price' => 150000,
                'stock' => 10,
            ],
            [
                'category' => 'Aksesori',
                'name' => 'Mouse',
                'price' => 75000,
                'stock' => 20,
            ],
            [
                'category' => 'Perangkat Komputer',
                'name' => 'Monitor',
                'price' => 1500000,
                'stock' => 5,
            ],
            [
                'category' => 'Aksesori',
                'name' => 'Headset',
                'price' => 250000,
                'stock' => 8,
            ],
            [
                'category' => 'Penyimpanan',
                'name' => 'Flashdisk',
                'price' => 85000,
                'stock' => 15,
            ],
        ];

        foreach ($items as $data) {
            Item::updateOrCreate(
                ['name' => $data['name']],
                [
                    'category_id' => $categoryIds[$data['category']],
                    'price' => $data['price'],
                    'stock' => $data['stock'],
                ]
            );
        }
    }
}