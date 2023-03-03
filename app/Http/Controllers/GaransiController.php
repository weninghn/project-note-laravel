<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Garansi;
use App\Models\Picture;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use File;

class GaransiController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()?->id;

        $garansi = Garansi::where([
                ['user_id', $user_id]
            ])
            ->orderBy('id', 'asc')->get();
        return view('garansi.garansi', ['garansi' => $garansi]);
    }

    public function add()
    {
        $user_id = Auth::user()?->id;

        $project = Project::where([
                ['user_id', $user_id]
            ])
            ->orderBy('id', 'asc')->get();
            // $clients = Client::where([
            //     ['user_id', $user_id]
            // ])
            // ->orderBy('id', 'asc')->get();
        return view('garansi.tambah_garansi', ['project' => $project]);
        // $project = Project::all();
        // return view('garansi.tambah_garansi', ['project' => $project]);
    }

    public function store(Request $request)
    {
        $garansi = Garansi::create([
            'user_id' => Auth::user()?->id,
            'project_id' => $request->project_id,
            'client_id' => $request->client_id,
            'start_project' => $request->start_project,
            'end_project' => $request->end_project,
            'start_garansi' => $request->start_garansi,
            'end_garansi' => $request->end_garansi,
        ]);

        foreach ($request->file as $file)
        {
            $filename = time() . '-' .$file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            Picture::create([
                'garansi_id' => $garansi->id,
                'file' => $filename
            ]);
        }

        return redirect('garansi')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit(Garansi $garansi)
    {
        $client = Client::all();
        $project = Project::all();
        return view('garansi.edit_garansi', [
            'garansi' => $garansi,
            'project' => $project,
            'client' => $client,
        ]);
    }

    public function update(Request $request, $id)
    {
        $garansi = Garansi::find($id);
        $garansi->update($request->all());
        return redirect()->route('garansi')->with('success', 'Update Data Success');
    }

    public function deletegaransi($id)
    {
        Garansi::where('id', $id)->delete();
        return redirect()->route('garansi')->with('success', 'Delete Success');
    }

    public function detail($id)
    {
        // $garansi = Garansi::all();
        $garansi = Garansi::find($id);
        return view('garansi.detail_garansi', ['garansi' => $garansi]);
    }

    // public function download(Garansi $garansi)
    // {
    //     return response()->download(public_path($garansi->file));
    // }

    // public function view($id)
	// {
	// 	$garansi = Garansi::find($id);
	// 	return view('garansi.view', compact('garansi'));
	// }

    public function export_pdf($id)
    {
        // $project = Project::find($id);
        // $detail = $project->detail_project->load('client');
        // $pdf = PDF::loadview('project.export-pdf', ['project' => $project, 'detail' => $detail]);
        // return $pdf->stream('export-pdf');

        $data = Garansi::find($id);
        $pdf = PDF::loadView('garansi.export-pdf', ['data' => $data]);
        return $pdf->stream('detail-project.pdf');
    }

    public function view($id)
	{
		$garansi = Garansi::find($id);
		return view('garansi.view', compact('garansi'));
	}

    public function download(Request $request, Garansi $garansi)
	{
		return response()->download(public_path('images'));
		// return $offer->download('tugasss');
	}
}
