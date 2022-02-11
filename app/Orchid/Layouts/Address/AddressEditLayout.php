<?php

namespace App\Orchid\Layouts\Address;

use App\Models\Company;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class AddressEditLayout extends Rows
{
    protected function fields(): array
    {
        return [
            Input::make('address.name')->title('Адрес')->required(),

            Select::make('address.company_id')
                ->fromModel(Company::class, 'name')
                ->required()
        ];
    }
}
