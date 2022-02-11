<?php

namespace App\Orchid\Layouts\Company;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class CompanyEditLayout extends Rows
{
    protected function fields(): array
    {
        return [
            Input::make('company.name')->title('Название')->required(),
        ];
    }
}
