<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;

trait EditScreenTrait
{
    private string $class;

    public function __construct()
    {
        $this->class = explode(' ', Str::headline(class_basename($this)))[0];
    }

    private function traitQuery($model): array
    {
        $this->name = $model->exists ? $this->nameEdit : $this->nameCreate;

        return [
            Str::lower($this->class) => $model
        ];
    }

    public function commandBar(): array
    {
        return [
            Button::make(__('Сохранить'))
                ->icon('check')
                ->method('save'),
        ];
    }

    public function layout(): array
    {
        return [
            "App\Orchid\Layouts\\$this->class\\{$this->class}EditLayout"
        ];
    }
}
