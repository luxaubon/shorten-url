<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([

            'name' => 'admin',

            'lname' => 'admin',

            'email' => 'admin@hotmail.com',

            'password' => '$2y$10$AYGJxYwuu0WoJpgIr6aJ2OsY9lqyqHuokYOfh51AoKwzbcg6c2BXu',

            'is_admin' => '1',
        
            'created_at' => '2024-02-13 15:33:06',

        ]);

        DB::table('settings')->insert([

            'email' => '[{"email":"","host":"","user":"","password":"","port":"","secure":""}]',

            'social' => '[{"fb":"","ig":"","gg":"","yt":"www.youtube.com","twt":"":""}]',

            'seo' => '[{"fb_id":"","title":"","keyword":""}]',

            'address_th' => '[{"company_th":"Company_YH","address_th":"Address_TH","tel_th":"Tel_TH","fax_th":"Fqax_Th","phone_th":"Phone_th","ifram_th":"iFram_TH"}]',

            'address_en' => '[{"company_en":"COmpany EN","address_en":"Address EN","tel_en":"Tel EN","fax_en":"Fax EN","phone_en":"`Phone EN","ifram_en":"iFram EN"}]',

            'payment' => '[{"pompay":"","opk":"","osk":"","merchant_id":"","secret_key":"","payment_url":""}]',

        ]);

    }
}
