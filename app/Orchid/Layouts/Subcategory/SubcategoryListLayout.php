<?php

namespace App\Orchid\Layouts\Subcategory;

use App\Models\Subcategory;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class SubcategoryListLayout extends Table
{
    protected $target = 'subcategories';

    protected function columns(): array
    {
        return [
            TD::make('Название')->render(function (Subcategory $subcategory) {
                return Link::make($subcategory->name)
                    ->href(route('platform.subcategories.edit', $subcategory->id));
            }),

            TD::make('Категория')->render(function (Subcategory $subcategory) {
                return $subcategory->category->name;
            }),
        ];
    }
}
