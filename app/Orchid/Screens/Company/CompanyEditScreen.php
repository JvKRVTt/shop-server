<?php

namespace App\Orchid\Screens\Company;

use App\Models\Company;
use App\Orchid\Layouts\Company\CompanyEditLayout;
use App\Traits\EditScreenTrait;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;

class CompanyEditScreen extends Screen
{
    use EditScreenTrait;

    private string $nameCreate = 'Добавить компанию';
    private string $nameEdit = 'Изменить компанию';

    public function query(Company $company): array
    {
        return $this->traitQuery($company);
    }

    public function save(Company $company, Request $request)
    {
        $request->validate([
            'company.name' => 'required|string|max:255'
        ]);

        $company->fill($request->company)->save();
        return redirect()->route('platform.companies');
    }
}
