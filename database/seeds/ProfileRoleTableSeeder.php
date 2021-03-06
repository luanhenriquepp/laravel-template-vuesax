<?php

use Illuminate\Database\Seeder;

class ProfileRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile_roles = [
            //DASHBOARD
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 6, 'profile_id' => 1],

//            //ADMIN
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 1, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 2, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 3, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 4, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 5, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 6, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 7, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 8, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 9, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 10, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 11, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 12, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 13, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 14, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 15, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 16, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 17, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 18, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 19, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 20, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 21, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 22, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 23, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 24, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 25, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 26, 'profile_id' => 1],
            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 27, 'profile_id' => 1],

            //USER
//            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 1, 'profile_id' => 2],
//            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 3, 'profile_id' => 2],
//            ['uuid' => \Ramsey\Uuid\Uuid::uuid4(), 'role_id' => 6, 'profile_id' => 2],
        ];

        foreach ($profile_roles as $profile_role) {
            \App\Models\ProfileRole::create($profile_role);
        }
    }
}
