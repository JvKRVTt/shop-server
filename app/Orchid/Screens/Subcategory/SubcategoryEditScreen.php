<?php

namespace App\Orchid\Screens\Subcategory;

use App\Models\Subcategory;
use App\Traits\EditScreenTrait;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;

class SubcategoryEditScreen extends Screen
{
    use EditScreenTrait;

    private string $nameCreate = 'Добавить подкатегорию';
    private string $nameEdit = 'Изменить подкатегорию';

    public function query(Subcategory $subcategory): array
    {
        return $this->traitQuery($subcategory);
    }

    public function save(Subcategory $subcategory, Request $request)
    {
        $request->validate([
            'subcategory.category_id' => 'required|numeric|exists:categories,id',
            'subcategory.name' => 'required|string|max:255',
        ]);

        $subcategory->fill($request->subcategory)->save();
        return redirect()->route('platform.subcategories');
    }
}
