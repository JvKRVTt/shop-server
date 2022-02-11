<?php

namespace App\Orchid\Screens\Category;

use App\Models\Category;
use App\Traits\EditScreenTrait;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;

class CategoryEditScreen extends Screen
{
    use EditScreenTrait;

    private string $nameCreate = 'Добавить категорию';
    private string $nameEdit = 'Изменить категорию';

    public function query(Category $category): array
    {
        return $this->traitQuery($category);
    }

    public function save(Category $category, Request $request)
    {
        $request->validate([
            'category.name' => 'required|string|max:255'
        ]);

        $category->fill($request->category)->save();
        return redirect()->route('platform.categories');
    }
}
