<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionsSeeder extends Seeder
{
    public function run()
    {
        DB::table('transactions')->insert([
            [
                'id' => 33,
                'payerName' => 'ABDALLAH MAJIDI',
                'amount' => '1000.00',
                'amountType' => 'flexible',
                'currency' => 'TZS',
                'paymentReference' => 'NS0772/0099/2025',
                'paymentType' => '001',
                'payerMobile' => null,
                'paymentDesc' => 'Tuition fee for (Ordinary Diploma in Medical Laboratory Sciences)',
                'payerID' => 'NS0772/0099/2025',
                'transactionRef' => '53163448661',
                'transactionChannel' => 'TIGO_C2B',
                'receipt' => 'K5PWRXQ',
                'transactionDate' => '2023-11-30',
                'created_at' => '2023-11-30 10:31:24',
                'updated_at' => '2023-11-30 10:32:01',
                'year_id' => 17,
                'account_year' => '2022/2023',
                'debt_status' => 1,
            ],
            [
                'id' => 34,
                'payerName' => 'ABDALLAH MAJIDI',
                'amount' => '1000.00',
                'amountType' => 'flexible',
                'currency' => 'TZS',
                'paymentReference' => 'NS0772/0099/2025',
                'paymentType' => '001',
                'payerMobile' => null,
                'paymentDesc' => 'Tuition fee for (Ordinary Diploma in Medical Laboratory Sciences)',
                'payerID' => 'NS0772/0099/2025',
                'transactionRef' => '77421876663',
                'transactionChannel' => 'TIGO_C2B',
                'receipt' => '0C5IXLA',
                'transactionDate' => '2023-12-02',
                'created_at' => '2023-12-02 13:25:06',
                'updated_at' => '2023-12-02 13:26:01',
                'year_id' => 17,
                'account_year' => '2022/2023',
                'debt_status' => 1,
            ],
        ]);
    }
}
