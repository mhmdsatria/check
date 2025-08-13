<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bidang;

class BidangSeeder extends Seeder
{
    public function run()
    {
        Bidang::create(['nama_bidang' => 'Teknologi Informasi']);
        Bidang::create(['nama_bidang' => 'Keuangan']);
        Bidang::create(['nama_bidang' => 'Sumber Daya Manusia']);
    }
}
