<?php

use App\Modules\Users\Models\Group;
use App\Modules\Users\Models\Session;
use App\Modules\Users\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        self::seedGroups();
        self::seedUsers();

    }

    private static function seedUsers()
    {
        $adminUser = User::updateOrCreate([
            'name' => 'Administrator User',
            'email' => 'admin@beit.ro',
            'password' => bcrypt('password'),
            'type' => 'ADMIN'
        ]);


        //TODO remove this
        Session::updateOrCreate([
            'user_id' => $adminUser->id,
            'token' => 'admin',
            'expire_at' => (new DateTime())->setDate(2030, 12, 21)
        ]);
    }

    private static function seedGroups()
    {
        $groups = [

        ];

        foreach ($groups as $group) {
            Group::create($group);
        }
    }





}
