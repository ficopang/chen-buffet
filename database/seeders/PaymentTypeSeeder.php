<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment_types = [
            'Cash',
            'GoPay',
            'OVO',
            'QRis',
            'DANA',
            'Debit BCA',
        ];

        foreach ($payment_types as $p) {
            DB::table('payment_types')->insert([
                'name' => $p,
            ]);
           
        }
    }
}
