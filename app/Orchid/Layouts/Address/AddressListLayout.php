<?php

namespace App\Orchid\Layouts\Address;

use App\Models\Address;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class AddressListLayout extends Table
{
    protected $target = 'addresses';

    protected function columns(): array
    {
        return [
            TD::make('Адрес')->render(function (Address $address) {
                return Link::make($address->name)
                    ->href(route('platform.addresses.edit', $address->id));
            }),

            TD::make('Компания')->render(function (Address $address) {
                return $address->company->name;
            }),
        ];
    }
}
