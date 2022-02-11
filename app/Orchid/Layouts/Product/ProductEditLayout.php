<?php

namespace App\Orchid\Layouts\Product;

use App\Models\Category;
use App\Models\Subcategory;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;

class ProductEditLayout extends Rows
{
    protected function fields(): array
    {
        return [
            Picture::make('product.image')
                ->title('Фотография')
                ->targetRelativeUrl()
                ->required(),

            Input::make('product.title')
                ->title('Название')
                ->required(),

            TextArea::make('product.description')
                ->title('Описание')
                ->required(),

            Input::make('product.price')
                ->title('Цена')
                ->type('number')
                ->required(),

            Input::make('product.weight')
                ->title('Вес')
                ->type('number')
                ->required(),

            Select::make('product.categories')
                ->fromModel(Category::class, 'name')
                ->title('Категория')
                ->multiple(),

            Select::make('product.subcategories')
                ->fromModel(Subcategory::class, 'name')
                ->title('Подкатегория')
                ->multiple(),
        ];
    }
}
