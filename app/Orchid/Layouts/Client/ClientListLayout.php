<?php

namespace App\Orchid\Layouts\Client;

use App\Models\Client;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ClientListLayout extends Table
{
    protected $target = 'clients';

    protected function columns(): array
    {
        return [
            TD::make('Имя')->render(function (Client $company) {
                return Link::make($company->name)
                    ->href(route('platform.clients.edit', $company->id));
            }),

            TD::make('Телефон')->render(function (Client $company) {
                return $company->phone;
            }),

            TD::make('Компания')->render(function (Client $company) {
                return $company->company->name;
            }),
        ];
    }
}
