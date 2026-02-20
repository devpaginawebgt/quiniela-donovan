<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            ['name' => 'Sucursal 1', 'company_id' => 1],
            ['name' => 'Sucursal 2', 'company_id' => 1],

            ['name' => 'Sucursal 3', 'company_id' => 2],
            ['name' => 'Sucursal 4', 'company_id' => 2],
        ];

        foreach($branches as $branch) {
            Branch::create($branch);
        }
    }
}
