<?php

namespace App\Orchid\Layouts\Category;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class CategoryEditLayout extends Rows
{
    protected function fields(): array
    {
        return [
            Input::make('category.name')->title('Название')->required(),
        ];
    }
}
