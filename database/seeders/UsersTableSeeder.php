<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'                => 1,
                'username'          => 'Admin',
                'email'             => 'admin@admin.com',
                'email_verified_at' => null,
                'password'          => '$2y$10$Uhe3/biAz6AEJlyTS555M.TF9SvTsqVx2ndcLGt6O1okij/.emkve',
                'remember_token'    => null,
                'created_at'        => '2021-04-11 10:07:44',
                'updated_at'        => '2021-04-11 10:07:44',
            ],
            [
                'id'                => 2,
                'username'          => 'User',
                'email'             => 'user@user.com',
                'email_verified_at' => null,
                'password'          => '$2y$10$kzKa0u1YwaikWk089X5gZ.SxMchfPGH1iBe.TVkd/fL76fVTrX5/W',
                'remember_token'    => null,
                'created_at'        => '2021-04-11 10:08:16',
                'updated_at'        => '2021-04-11 10:08:16',
            ],
        ];

        User::insert($users);
    }
}
