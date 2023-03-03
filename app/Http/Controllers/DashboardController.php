<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Garansi;
use App\Models\Project;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()?->id;

        // $garansi = Garansi::where([
        //         ['user_id', $user_id]
        //     ])
        //     ->orderBy('id', 'asc')->get();
        // return view('garansi.garansi', ['garansi' => $garansi]);

        $client = Client::count();
        $project = Project::count();
        $payment = Payment::sum('amount_payment');
        $garansi = Garansi::count();

        // $client = Client::count([
        //     ['user_id', $user_id]
        // ]);
        // $project = Project::count([
        //     ['user_id', $user_id]
        // ]);
        // $payment = Payment::sum('amount_payment'[
        //     ['user_id', $user_id]
        // ]);
        // $garansi = Garansi::count([
        //     ['user_id', $user_id]
        // ]);

        // return view('dashboard', ['client' => $client, 'project' => $project, 'payment' => $payment, 'garansi' => $garansi]);
        return view('dashboard', compact('client', 'project', 'payment', 'garansi'));
    }
}
