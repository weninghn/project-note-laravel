<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()?->id;
        // $user_id = Auth::user()?->id;
        $clients = Client::where([
                ['user_id', $user_id]
            ])
            ->orderBy('id', 'asc')->get();
        return view('client.client', ['clients' => $clients]);
        // $user_id = Auth::user()?->id;
        // $client = Client::orderBy('id', 'asc')->get();
        // return view('client.client', ['client' => $client]);
    }

    public function add()
    {
        // $user_id = Auth::user()?->id;

        // $client = Client::where([
        //         ['user_id', $user_id]
        //     ])
        //     ->orderBy('id', 'asc')->get();
        // return view('client.tambah_client', ['client' => $client]);
        return view('client.tambah_client');
    }

    public function store(Request $request)
    {
        $client = [
            'user_id' => Auth::user()?->id,
            'name_client' => $request->name_client,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
        Client::create($client);
        return redirect('client')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('client.edit_client', compact('client'));
    }

    public function update(Request $request, $id)
    {
        // $client = Client::find($id);
        $client = Client::where('id', $id)->first();
        $client->update($request->all());
        return redirect()->route('client')->with('success', 'Data Berhasil Di Update');
    }

    public function deleteclient($id)
    {
        Client::where('id', $id)->delete();
        return redirect('client')->with('success', 'Delete Success');
    }
}
