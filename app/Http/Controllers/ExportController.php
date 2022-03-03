<?php

namespace App\Http\Controllers;

use App\Exports\ActiveSubscriptionExport;
use App\Exports\DepositsHistoryExport;
use App\Exports\DepositsRequestExport;
use App\Exports\PendingSubscriptionExport;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Exports\WithdrawalHistoryExport;
use App\Exports\WithdrawalRequestExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    //

    public function users()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
        // return back()->with('success', 'Users Exported');
    }

    public function depositHistory()
    {
        return Excel::download(new DepositsHistoryExport, 'deposit_history.xlsx');
    }

    public function depositRequests()
    {
        return Excel::download(new DepositsRequestExport, 'deposit_requests.xlsx');
    }

    public function withdrawalHistory()
    {
        return Excel::download(new WithdrawalHistoryExport, 'withdrawal_history.xlsx');
    }

    public function withdrawalRequests()
    {
        return Excel::download(new WithdrawalRequestExport, 'withdrawal_request.xlsx');
    }

    public function activeSubscriptions()
    {
        return Excel::download(new ActiveSubscriptionExport, 'active_subscriptions.xlsx');
    }

    public function pendingSubscriptions()
    {
        return Excel::download(new PendingSubscriptionExport, 'pending_subscriptions.xlsx');
    }
}
