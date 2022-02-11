<?php

namespace App\Orchid\Layouts\Ad;

use App\Models\Ad;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class AdListLayout extends Table
{
    protected $target = 'ads';

    protected function columns(): array
    {
        return [
            TD::make('Фотография')->render(function (Ad $ad) {
                return '<img width="50" height="50" src="' . $ad->image .'">';
            }),

            TD::make('Название')->render(function (Ad $ad) {
                return Link::make($ad->title)
                    ->href(route('platform.ads.edit', $ad->id));
            }),
        ];
    }
}
