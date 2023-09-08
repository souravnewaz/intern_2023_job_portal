<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Accounting', 'Agro', 'Bank', 'Commercial', 'Data Entry', 'Designer',
            'Engineer', 'Garments/Textile', 'Hospitality/Travel', 'HR/Admin', 'Marketing/Sales',
            'IT/Telecommunication', 'Medical/Pharma', 'NGO', 'Media', 'Research/Consultancy', 'Security', 'Supply Chain', 'Teacher', 'Production'
        ];

        foreach($categories as $category) {
            
            Category::create(['name' => $category]);
        }
    }
}
