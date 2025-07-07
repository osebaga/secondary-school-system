<?php

namespace Database\Seeders;
use Bouncer;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BouncerFacade::allow('SuperAdmin')->to('users-manage');

    }
}
