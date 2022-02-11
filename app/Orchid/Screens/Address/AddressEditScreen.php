<?php

namespace App\Orchid\Screens\Address;

use App\Models\Address;
use App\Traits\EditScreenTrait;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;

class AddressEditScreen extends Screen
{
    use EditScreenTrait;

    private string $nameCreate = 'Добавить адрес';
    private string $nameEdit = 'Изменить адрес';

    public function query(Address $address): array
    {
        return $this->traitQuery($address);
    }

    public function save(Address $address, Request $request)
    {
        $request->validate([
            'address.company_id' => 'required|numeric|exists:companies,id',
            'address.name' => 'required|string|max:255',
        ]);

        $address->fill($request->address)->save();
        return redirect()->route('platform.addresses');
    }
}
