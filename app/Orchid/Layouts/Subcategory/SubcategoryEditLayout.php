<?php

namespace App\Orchid\Layouts\Subcategory;

use App\Models\Category;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class SubcategoryEditLayout extends Rows
{
    protected function fields(): array
    {
        return [
            Input::make('subcategory.name')->title('Название')->required(),

            Select::make('subcategory.category_id')
                ->fromModel(Category::class, 'name')
                ->required()
        ];
    }
}
