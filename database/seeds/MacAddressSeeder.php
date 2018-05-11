<?php

use Illuminate\Database\Seeder;

class MacAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\MacAddress::create([
            'mac_address'   => \Afis::macAddressWindows(),
            'nama_komputer' => \Afis::namaKomputer(),
        ]);
    }
}
