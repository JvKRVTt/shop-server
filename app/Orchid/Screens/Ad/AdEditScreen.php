<?php

namespace App\Orchid\Screens\Ad;

use App\Models\Ad;
use App\Traits\EditScreenTrait;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;

class AdEditScreen extends Screen
{
    use EditScreenTrait;

    private string $nameCreate = 'Добавить объявление';
    private string $nameEdit = 'Изменить объявление';

    public function query(Ad $ad): array
    {
        return $this->traitQuery($ad);
    }

    public function save(Ad $ad, Request $request)
    {
        $request->validate([
            'ad.image' => 'required|string',
            'ad.title' => 'required|string|max:255',
            'ad.text' => 'required|string|max:10000',
        ]);

        $ad->fill($request->ad)->save();
        return redirect()->route('platform.ads');
    }
}
