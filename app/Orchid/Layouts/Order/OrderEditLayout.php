<?php

namespace App\Orchid\Layouts\Order;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class OrderEditLayout extends Rows
{
    protected function fields(): array
    {
        return [
            Input::make('order.user.name')->title('Пользователь')->readonly(),

            Input::make('order.company.name')->title('Компания')->readonly(),

            Input::make('order.delivery_address')->title('Адрес доставки')->readonly(),

            Input::make('order.payment_method')->title('Способ оплаты')->readonly(),

            Select::make('order.status')->options([
                'waiting' => 'В обработке',
                'confirmed' => 'Подтверждён',
                'rejected' => 'Отклонен',
            ])->title('Статус')->required()
        ];
    }
}
