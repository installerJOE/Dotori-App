<?php

namespace App\Exports;

use App\Models\SubscribedUser;
use Maatwebsite\Excel\Concerns\FromCollection;

class PendingSubscriptionExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SubscribedUser::where('status', 'pending')->get();
    }
}
