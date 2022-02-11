<?php

namespace App\Orchid\Screens\Order;

use App\Models\Order;
use App\Traits\EditScreenTrait;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;

class OrderEditScreen extends Screen
{
    use EditScreenTrait;

    private string $nameCreate = 'Добавить категорию';
    private string $nameEdit = 'Изменить заказ';

    public function query(Order $order): array
    {
        return $this->traitQuery($order);
    }

    public function save(Order $order, Request $request)
    {
        $request->validate([
            'order.status' => 'required|string|max:255'
        ]);

        $order->fill($request->order)->save();
        return redirect()->route('platform.orders');
    }
}
