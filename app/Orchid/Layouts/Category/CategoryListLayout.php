<?php

namespace App\Orchid\Layouts\Category;

use App\Models\Category;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CategoryListLayout extends Table
{
    protected $target = 'categories';

    protected function columns(): array
    {
        return [
            TD::make('Название')->render(function (Category $category) {
                return Link::make($category->name)
                    ->href(route('platform.categories.edit', $category->id));
            }),
        ];
    }
}
