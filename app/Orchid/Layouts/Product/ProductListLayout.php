<?php

namespace App\Orchid\Layouts\Product;

use App\Models\Product;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use function route;

class ProductListLayout extends Table
{
    protected $target = 'products';

    protected function columns(): array
    {
        return [
            TD::make('Фотография')->render(function (Product $product) {
                return '<img width="50" height="50" src="' . $product->image .'">';
            }),

            TD::make('Название')->render(function (Product $product) {
                return Link::make($product->title)
                    ->href(route('platform.products.edit', $product->id));
            }),

            TD::make('Цена')->render(function (Product $product) {
                return $product->price;
            }),

            TD::make('Вес')->render(function (Product $product) {
                return $product->weight;
            }),
        ];
    }
}
