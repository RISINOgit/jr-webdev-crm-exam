<?php

namespace App\Http\Controllers;

use App\Repositories\ClientRepository;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index(Request $request, ClientRepository $clientRepository)
    {
        $status = $request->query('status');
        
        $Clients = $status 
            ? $clientRepository->getStatus($status) 
            : $clientRepository->getAll();

        return view('client.list', compact('Clients'));
    }

    // App\Http\Controllers\ClientController

    public function create()
    {
        return view('client.create');
    }

    public function storeClientCredentials(Request $request, ClientRepository $clientRepository)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:Client',
            'status' => 'required|in:active,inactive',
        ]);

        $client = $clientRepository->create($validated);

        return response()->json([
            'status' => 'success',
            'client' => $client,
        ]);
    }


    // Laravel sees 'Client' and '{client}' in the route and does the search for you
    public function edit(Client $client)
    {
        return view('client.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:Client,email,' . $client->id,
            'status' => 'required|in:active,inactive',
        ]);

        $client->update($validated);

        return redirect()->route('client.index')->with('success', 'Client updated!');
    }
    
    public function delete(Request $request, Client $client)
    {
        $client->delete();

        return redirect()->route('client.index')->with('success', 'Client deleted!');
    }

    
}
