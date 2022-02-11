<?php

namespace App\Traits;

use App\Orchid\Layouts\Product\ProductListLayout;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Link;

trait ListScreenTrait
{
    private string $class;
    private string $plural;

    public function __construct()
    {
        $this->class = explode(' ', Str::headline(class_basename($this)))[0];
        $this->plural = Str::plural(Str::lower($this->class));
    }

    public function query()
    {
        $class = "\App\Models\\$this->class";
        return [
            $this->plural => $class::filters()->paginate()
        ];
    }

    public function commandBar(): array
    {
        return [
            Link::make('Добавить')
                ->icon('plus')
                ->href(route("platform.$this->plural.create"))
        ];
    }

    public function layout(): array
    {
        return [
            "App\Orchid\Layouts\\$this->class\\{$this->class}ListLayout",
        ];
    }
}
