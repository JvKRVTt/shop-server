<?php

namespace App\Orchid\Screens\Product;

use App\Models\Product;
use App\Orchid\Layouts\Product\ProductEditLayout;
use App\Traits\EditScreenTrait;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use function __;
use function redirect;

class ProductEditScreen extends Screen
{
    use EditScreenTrait;

    private string $nameCreate = 'Добавить товар';
    private string $nameEdit = 'Изменить товар';

    public function query(Product $product): array
    {
        return $this->traitQuery($product);
    }

    public function save(Product $product, Request $request)
    {
        $request->validate([
            'product.image' => 'required|string',
            'product.title' => 'required|string|max:255',
            'product.description' => 'required|string|max:4096',
            'product.price' => 'required|numeric',
            'product.weight' => 'required|numeric',
            'product.categories.*' => 'nullable|numeric|exists:categories,id',
            'product.subcategories.*' => 'nullable|numeric|exists:subcategories,id',
        ]);

        $product->fill($request->product)->save();
        $product->categories()->sync($request->product['categories']);
        $product->subcategories()->sync($request->product['subcategories']);

        return redirect()->route('platform.products');
    }
}
