<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;

class WithdrawalHistoryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaction::where([
            'category' => 'withdraw',
            'status' => 'completed'
        ])->get();
    }
}
