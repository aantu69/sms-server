<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UserActionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \App\Models\Institute::observe(new \App\Observers\UserActionsObserver);
        \App\Models\MediumGlobal::observe(new \App\Observers\UserActionsObserver);
        \App\Models\ShiftGlobal::observe(new \App\Observers\UserActionsObserver);
        \App\Models\FormatGlobal::observe(new \App\Observers\UserActionsObserver);
        \App\Models\ClassGlobal::observe(new \App\Observers\UserActionsObserver);
        \App\Models\User::observe(new \App\Observers\UserActionsObserver);
        \App\Models\Role::observe(new \App\Observers\UserActionsObserver);
        \App\Models\Permission::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
