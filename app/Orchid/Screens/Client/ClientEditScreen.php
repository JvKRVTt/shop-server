<?php

namespace App\Orchid\Screens\Client;

use App\Models\Category;
use App\Models\Client;
use App\Traits\EditScreenTrait;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;

class ClientEditScreen extends Screen
{
    use EditScreenTrait;

    private string $nameCreate = 'Добавить клиента';
    private string $nameEdit = 'Изменить клиента';

    public function query(Client $client): array
    {
        return $this->traitQuery($client);
    }

    public function save(Client $client, Request $request)
    {
        $request->validate([
            'client.company_id' => 'required|numeric|exists:companies,id',
            'client.name' => 'required|string|max:255',
            'client.phone' => "required|numeric|unique:clients,phone,$client->id",
            'client.password' => (is_null($client->id) ? 'required' : 'nullable') . '|string',
        ]);

        $clientData = $request->get('client');

        if ($client->exists && $clientData['password'] === '') {
            unset($clientData['password']);
        }

        $client->fill($request->client)->save();
        return redirect()->route('platform.clients');
    }
}
