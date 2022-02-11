<?php

namespace App\Orchid\Layouts\Ad;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;

class AdEditLayout extends Rows
{
    protected function fields(): array
    {
        return [
            Picture::make('ad.image')->title('Фотография')->targetRelativeUrl()->required(),
            Input::make('ad.title')->title('Название')->required(),
            TextArea::make('ad.text')->title('Текст')->required(),
        ];
    }
}
