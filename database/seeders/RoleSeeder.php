<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $administratorRoles = ['system_admin'];

        $centerStaffRoles = [
            'director', 'deputy_director', 'general_affairs',
            'needs_listener', 'volunteer_reception', 'orientation_officer',
            'matching_officer', 'materials_officer', 'vehicle_manager',
            'public_relations_officer', 'first_aid_officer',
        ];

        $roles = array_merge($administratorRoles, $centerStaffRoles);

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
