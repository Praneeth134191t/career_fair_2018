<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i = 0; $i< 30; $i++){
            factory(App\Company::class)->create([
                'logo' => '/logo/'.$i.'.jpg'
            ]);
        }

        factory(App\User::class, 260)->create()->each(function($u) {
            $u->profile()->save(factory(App\Profile::class)->make());
        });
    }
}
