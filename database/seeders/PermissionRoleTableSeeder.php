<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($permissions->pluck('id'));
        Role::findOrFail(2)->permissions()->sync($permissions->pluck('id'));
    }
}
