<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Garansi;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class ProjectController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()?->id;

        $projects = Project::where([
                ['user_id', $user_id]
            ])
            ->orderBy('id', 'asc')->get();
        return view('project.project', ['projects' => $projects]);
    }

    public function add()
    {
        $user_id = Auth::user()?->id;

        $client = Client::where([
                ['user_id', $user_id]
            ])
            ->orderBy('id', 'asc')->get();
        return view('project.tambah_project', ['client' => $client]);
        // $client = Client::all();
        // return view('project.tambah_project', ['client' => $client]);
    }

    public function store(Request $request)
    {
        // $project = [
        //     'user_id' => Auth::user()?->id,
        //     'client_id' => $request->client_id,
        //     'status_project' => $request->status_project,
        //     'name_project' => $request->name_project,
        //     'spk' => $request->spk,
        //     'work' => $request->work,
        //     'status_note' => $request->status_note,
        //     'price' => $request->price,
        //     'start_project' => $request->start_project,
        //     'end_project' => $request->end_project,
        //     'start_garansi' => $request->start_garansi,
        //     'end_garansi' => $request->end_garansi,
        //     'user_id' => Auth::user()?->id
        // ];
        // Project::create($project);

        $project = Project::create([
            'user_id' => Auth::user()?->id,
            'client_id' => $request->client_id,
            'status_project' => $request->status_project,
            'name_project' => $request->name_project,
            'spk' => $request->spk,
            'work' => $request->work,
            'status_note' => $request->status_note,
            'price' => $request->price,
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
                'project_id' => $project->id,
                'file' => $filename
            ]);
        }
        return redirect('project')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit(Project $project)
    {
        $client = Client::all();
        return view('project.edit_project', [
            'client' => $client,
            'project' => $project
        ]);
    }

    public function update(Request $request, $id)
    {
        // $project = Project::where('id', $id)->first();
        $project = Project::find($id);
        $project->update($request->all());
        return redirect()->route('project')->with('success', 'Data Berhasil Di Update');
    }

    public function deleteproject($id)
    {
        Project::where('id', $id)->delete();
        return redirect('project')->with('success', 'Delete Success');
    }

    public function detail($id)
    {
        $payment = Payment::find($id);
        // $garansi = Garansi::all();
        $project = Project::find($id);
        // $garansi = Garansi::find($id);
        return view('project.detail_project', ['project' => $project, 'payment' => $payment]);
    }

    public function export_pdf($id)
    {
        // $project = Project::find($id);
        // $detail = $project->detail_project->load('client');
        // $pdf = PDF::loadview('project.export-pdf', ['project' => $project, 'detail' => $detail]);
        // return $pdf->stream('export-pdf');

        $data = Project::find($id);
        $payment = $data->payments->load('project');
        $garansi = $data->garansi->load('projects');
        // $payment = Payment::find($id);
        $pdf = PDF::loadView('project.export-pdf', ['data' => $data, 'payment' => $payment, 'garansi' => $garansi]);
        return $pdf->stream('detail-project.pdf');
    }
}
