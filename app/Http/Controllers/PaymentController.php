<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\Project;
use PDF;

class PaymentController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()?->id;

        $payments = Payment::where([
                ['user_id', $user_id]
            ])
            ->orderBy('id', 'asc')->get();
        // $payments = Project::orderBy('id', 'asc')->get();
        return view('payment.payment', ['payments' => $payments]);
        // $payments = Project::orderBy('id', 'asc')->get();
        // return view('payment.payment', ['payments' => $payments]);
    }

    public function add()
    {
        $user_id = Auth::user()?->id;

        $project = Project::where([
                ['user_id', $user_id]
            ])
            ->orderBy('id', 'asc')
            ->get()
            ->where('remain_payment', '>', 0);
        // $payment = Payment::where([
        //     ['user_id', $user_id]
        // ])
        //     ->orderBy('id', 'asc')->get();
        // return view('payment.tambah_payment', ['project' => $project, 'payment' => $payment]);
        return view('payment.tambah_payment', ['project' => $project]);
        // $project = Project::all();
        // return view('payment.tambah_payment', ['project' => $project]);
    }

    public function store(Request $request)
    {
        // $total = Payment::all();
        // $remaining = $total->remainingAmount();

        $project = Project::findOrFail($request->project_id);
        $remaining = $project->remain_payment;

		if($request->amount_payment >= $remaining ) {
			$status = 1;
		} else {
			$status = 0;
		}

        $payments = [
            'user_id' => Auth::user()?->id,
            'project_id' => $request->project_id,
            // 'name_project' => $request->name_project,
            // 'price' => $request->price,
            'date' => $request->date,
            'amount_payment' => $request->amount_payment,
            'ket' => $request->ket
        ];
        Payment::create($payments);
        $project->update([
            'status_payment' => $status
        ]);
        return redirect('payment')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function deletepayment($id)
    {
        Payment::where('id', $id)->delete();
        return redirect('payment')->with('success', 'Delete Success');
    }

    public function detail($id)
    {
        $payment = Payment::find($id);
        $project = Project::find($id);
        return view('payment.detail_payment', ['payment' => $payment, 'project' => $project]);
    }

    // public function detailproject($id)
    // {
    //     // $garansi = Garansi::all();
    //     $project = Project::find($id);
    //     return view('project.detail_project', ['project' => $project]);
    // }

    public function export_pdf($id)
    {
        // $project = Project::find($id);
        // $detail = $project->detail_project->load('client');
        // $pdf = PDF::loadview('project.export-pdf', ['project' => $project, 'detail' => $detail]);
        // return $pdf->stream('export-pdf');

        $data = Payment::find($id);
        $pdf = PDF::loadView('payment.export-pdf', ['data' => $data]);
        return $pdf->stream('detail-project.pdf');
    }
}
