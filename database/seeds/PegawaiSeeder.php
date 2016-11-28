<?php

use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Pegawai::class)->create([
                'kode_pegawai' => 'PG001',
                'name' => 'wahyu dhira ashandy',
                'gender' => 'male',
                'phone' => '085728669878',
                'level' => 'administrator'
                ]);
    }
}
