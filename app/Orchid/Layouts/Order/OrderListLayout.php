<?php

namespace App\Orchid\Layouts\Order;

use App\Models\Category;
use App\Models\Order;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class OrderListLayout extends Table
{
    protected $target = 'orders';

    protected function columns(): array
    {
        return [
            TD::make('ID')->render(function (Order $order) {
                return Link::make($order->id)->href(route('platform.orders.edit', $order->id));
            }),

            TD::make('Компания')->render(function (Order $order) {
                return $order->company->name;
            }),

            TD::make('Адрес доставки')->render(function (Order $order) {
                return $order->delivery_address;
            }),

            TD::make('Способ оплаты')->render(function (Order $order) {
                return $order->payment_method;
            }),

            TD::make('Статус')->render(function (Order $order) {
                $color = 'white';
                $text = '';

                switch ($order->status) {
                    case 'waiting':
                        $color = 'blue';
                        $text = 'В обработке';
                        break;
                    case 'confirmed':
                        $color = 'green';
                        $text = 'Подтверждён';
                        break;
                    case 'rejected':
                        $color = 'red';
                        $text = 'Отклонён';
                        break;
                }

                return "<div style='color: $color'>$text</div>";
            }),
        ];
    }
}
