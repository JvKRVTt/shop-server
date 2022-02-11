<?php

namespace App\Orchid\Layouts\Company;

use App\Models\Company;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CompanyListLayout extends Table
{
    protected $target = 'companies';

    protected function columns(): array
    {
        return [
            TD::make('Название')->render(function (Company $company) {
                return Link::make($company->name)
                    ->href(route('platform.companies.edit', $company->id));
            }),
        ];
    }
}
