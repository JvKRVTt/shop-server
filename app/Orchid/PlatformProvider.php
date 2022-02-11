<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        return [
//            Menu::make(__('Users'))
//                ->icon('user')
//                ->route('platform.systems.users')
//                ->permission('platform.systems.users')
//                ->title(__('Access rights')),

            Menu::make('Товары')
                ->icon('module')
                ->route('platform.products'),

            Menu::make('Компании')
                ->icon('briefcase')
                ->route('platform.companies'),

            Menu::make('Адреса')
                ->icon('map')
                ->route('platform.addresses'),

            Menu::make('Объявления')
                ->icon('monitor')
                ->route('platform.ads'),

            Menu::make('Категории')
                ->icon('grid')
                ->route('platform.categories'),

            Menu::make('Подкатегории')
                ->icon('table')
                ->route('platform.subcategories'),

            Menu::make('Клиенты')
                ->icon('user')
                ->route('platform.clients'),

            Menu::make('Заказы')
                ->icon('list')
                ->route('platform.orders'),
        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make('Profile')
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
