<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name' => 'user',
                'permissions' => json_encode([
                    'view_bidans',
                    'book_services', 
                    'view_own_orders',
                    'chat_with_bidans',
                    'add_favorites',
                    'submit_reviews'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'bidan',
                'permissions' => json_encode([
                    'manage_own_profile',
                    'manage_own_services',
                    'view_assigned_orders',
                    'update_order_status',
                    'chat_with_users',
                    'view_own_analytics'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'admin',
                'permissions' => json_encode([
                    'manage_users',
                    'manage_bidans',
                    'verify_bidans',
                    'manage_services',
                    'view_all_orders',
                    'view_system_analytics',
                    'manage_platform_settings'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('roles')->insert($roles);
    }
}