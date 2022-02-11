<?php

declare(strict_types=1);

use App\Orchid\Screens\Ad\AdEditScreen;
use App\Orchid\Screens\Ad\AdListScreen;
use App\Orchid\Screens\Address\AddressEditScreen;
use App\Orchid\Screens\Address\AddressListScreen;
use App\Orchid\Screens\Category\CategoryEditScreen;
use App\Orchid\Screens\Category\CategoryListScreen;
use App\Orchid\Screens\Client\ClientEditScreen;
use App\Orchid\Screens\Client\ClientListScreen;
use App\Orchid\Screens\Company\CompanyEditScreen;
use App\Orchid\Screens\Company\CompanyListScreen;
use App\Orchid\Screens\Order\OrderEditScreen;
use App\Orchid\Screens\Order\OrderListScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Product\ProductEditScreen;
use App\Orchid\Screens\Product\ProductListScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\Subcategory\SubcategoryEditScreen;
use App\Orchid\Screens\Subcategory\SubcategoryListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Profile'), route('platform.profile'));
    });

// Platform > System > Users
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(function (Trail $trail, $user) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('User'), route('platform.systems.users.edit', $user));
    });

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('Create'), route('platform.systems.users.create'));
    });

// Platform > System > Users > User
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Users'), route('platform.systems.users'));
    });

Route::screen('products/{product}/edit', ProductEditScreen::class)->name('platform.products.edit');
Route::screen('products/create', ProductEditScreen::class)->name('platform.products.create');
Route::screen('products', ProductListScreen::class)->name('platform.products');

Route::screen('companies/{company}/edit', CompanyEditScreen::class)->name('platform.companies.edit');
Route::screen('companies/create', CompanyEditScreen::class)->name('platform.companies.create');
Route::screen('companies', CompanyListScreen::class)->name('platform.companies');

Route::screen('addresses/{address}/edit', AddressEditScreen::class)->name('platform.addresses.edit');
Route::screen('addresses/create', AddressEditScreen::class)->name('platform.addresses.create');
Route::screen('addresses', AddressListScreen::class)->name('platform.addresses');

Route::screen('ads/{ad}/edit', AdEditScreen::class)->name('platform.ads.edit');
Route::screen('ads/create', AdEditScreen::class)->name('platform.ads.create');
Route::screen('ads', AdListScreen::class)->name('platform.ads');

Route::screen('categories/{category}/edit', CategoryEditScreen::class)->name('platform.categories.edit');
Route::screen('categories/create', CategoryEditScreen::class)->name('platform.categories.create');
Route::screen('categories', CategoryListScreen::class)->name('platform.categories');

Route::screen('subcategories/{subcategory}/edit', SubcategoryEditScreen::class)->name('platform.subcategories.edit');
Route::screen('subcategories/create', SubcategoryEditScreen::class)->name('platform.subcategories.create');
Route::screen('subcategories', SubcategoryListScreen::class)->name('platform.subcategories');

Route::screen('clients/{subcategory}/edit', ClientEditScreen::class)->name('platform.clients.edit');
Route::screen('clients/create', ClientEditScreen::class)->name('platform.clients.create');
Route::screen('clients', ClientListScreen::class)->name('platform.clients');

Route::screen('orders/{subcategory}/edit', OrderEditScreen::class)->name('platform.orders.edit');
Route::screen('orders/create', OrderEditScreen::class)->name('platform.orders.create');
Route::screen('orders', OrderListScreen::class)->name('platform.orders');

// Platform > System > Roles > Role
Route::screen('roles/{roles}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(function (Trail $trail, $role) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Role'), route('platform.systems.roles.edit', $role));
    });

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Create'), route('platform.systems.roles.create'));
    });

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Roles'), route('platform.systems.roles'));
    });
