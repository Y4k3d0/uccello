<?php

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::name('uccello.')->group(function () {

    // Adapt params if we use or not multi domains
    if (!uccello()->useMultiDomains()) {
        $domainParam = '';
        $domainAndModuleParams = '{module}';
    } else {
        $domainParam = '{domain}';
        $domainAndModuleParams = '{domain}/{module}';
    }

    // Overrided routes
    Route::get($domainParam.'/api/doc', 'Core\SwaggerController@api')
        ->name('api.doc');

    // Overrided routes
    Route::get($domainParam.'/role/edit', 'Role\EditController@process')
        ->defaults('module', 'role')
        ->name('role.edit');

    Route::get($domainParam.'/user/edit', 'User\EditController@process')
        ->defaults('module', 'user')
        ->name('user.edit');

    Route::post($domainParam . '/domain', 'Domain\EditController@save')
        ->defaults('module', 'domain')
        ->name('domain.save');

    // Settings
    Route::get($domainParam.'/settings', 'Settings\SettingsController@dashboard')
        ->defaults('module', 'settings')
        ->name('settings.dashboard');

    Route::get($domainParam.'/settings/module/manager', 'Settings\SettingsController@moduleManager')
        ->defaults('module', 'settings')
        ->name('settings.module.manager');

    Route::get($domainParam.'/settings/module/activation', 'Settings\SettingsController@moduleActivation')
        ->defaults('module', 'settings')
        ->name('settings.module.activation');

    Route::get($domainParam.'/settings/menu/manager', 'Settings\MenuController@index')
        ->defaults('module', 'settings')
        ->name('settings.menu.manager');

    Route::post($domainParam.'/settings/menu/store', 'Settings\MenuController@store')
        ->defaults('module', 'settings')
        ->name('settings.menu.store');


    // Default routes
    Route::get($domainParam.'/home', 'Core\IndexController@process')
        ->defaults('module', 'home')
        ->name('home');

    Route::get($domainAndModuleParams, 'Core\IndexController@process')->name('index');
    Route::get($domainAndModuleParams.'/list', 'Core\ListController@process')->name('list');
    Route::post($domainAndModuleParams.'/list/datatable', 'Core\ListController@processForDatatable')->name('datatable');
    Route::get($domainAndModuleParams.'/detail', 'Core\DetailController@process')->name('detail');
    Route::get($domainAndModuleParams.'/edit', 'Core\EditController@process')->name('edit');
    Route::get($domainAndModuleParams.'/delete', 'Core\DeleteController@process')->name('delete');
    Route::post($domainAndModuleParams, 'Core\EditController@save')->name('save');
});