<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Http\Requests\CreateClientRequest;


class ClientController extends Controller
{
    public function getClients(Request $request)
    {
        return ClientResource::collection(Client::with('wallet')->get());
    }

    public function createClient(CreateClientRequest $request)
    {
        $validated = $request->validated();

        $client = Client::create([
            'first_name' => $validated['name'],
        ]);

        $client->wallet()->create([
            'number' => time()
        ]);

        return response('OK');
    }

    public function deleteClient(int $id)
    {
        Client::destroy($id);
        return response('OK');
    }
}
