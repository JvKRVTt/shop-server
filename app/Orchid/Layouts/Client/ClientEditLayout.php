<?php

namespace App\Orchid\Layouts\Client;

use App\Models\Company;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Password;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class ClientEditLayout extends Rows
{
    protected function fields(): array
    {
        return [
            Select::make('client.company_id')
                ->title('Компания')
                ->fromModel(Company::class, 'name')
                ->required(),

            Input::make('client.name')
                ->title('Имя')
                ->required(),

            Input::make('client.phone')
                ->type('number')
                ->title('Телефон')
                ->required(),

            Password::make('client.password')
                ->placeholder('Оставьте пустым, чтобы сохранить текущий пароль')
                ->title('Пароль')
                ->required(),
        ];
    }
}
