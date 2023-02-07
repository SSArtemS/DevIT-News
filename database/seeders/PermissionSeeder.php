<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $sections = [
        'user',
        'role',
        'permission',
        'article'
    ];

    public function run()
    {
        foreach ($this->sections as $section)
        {
            Permission::upsert([
                [
                    'name' => $section . '-list',
                    'display_name' => ucfirst($section) . ' list'
                ],
                [
                    'name' => $section . '-create',
                    'display_name' => ucfirst($section) . ' create'
                ],
                [
                    'name' => $section . '-edit',
                    'display_name' => ucfirst($section) . ' edit'
                ],
                [
                    'name' => $section . '-delete',
                    'display_name' => ucfirst($section) . ' delete'
                ]
            ], ['name']);
        }
    }
}
