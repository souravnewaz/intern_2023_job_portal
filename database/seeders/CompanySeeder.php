<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run()
    {
        Company::create([
            'name' => 'TEAM Group',
            'image' => 'images/companies/F5_networks.png'
        ]);

        Company::create([
            'name' => 'Uttara Motors Ltd.',
            'image' => 'images/companies/man_group.png'
        ]);

        Company::create([
            'name' => 'CodeCloud Technology Ltd.',
            'image' => 'images/companies/monzo.png'
        ]);

        Company::create([
            'name' => 'Sydney Consultancy',
            'image' => 'images/companies/pcc.png'
        ]);

        Company::create([
            'name' => 'Smart Technologies (BD) Ltd.',
            'image' => 'images/companies/rbc.png'
        ]);
    }
}
