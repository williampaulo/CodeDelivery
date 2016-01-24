<?php

use Illuminate\Database\Seeder;

class OAuthClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\CodeDelivery\Models\OAuthClient::class)->create([
            'id' => 'appid01',
            'secret' => 'secret',
            'name' => 'Minha App Mobile',
        ]);
    }
}
