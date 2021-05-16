<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Http\Interfaces\IGetTransactions',
            'App\Application\GetTransactions'
        );

        $this->app->bind(
            'App\Http\Interfaces\IGetAmmount',
            'App\Application\GetAmmount'
        );

        $this->app->bind(
            'App\Http\Interfaces\ITransferTransaction',
            'App\Application\TransferTransaction'
        );

        $this->app->bind(
            'App\Http\Interfaces\IReceiveTransaction',
            'App\Application\ReceiveTransaction'
        );

        //repositories

        $this->app->bind(
            'App\Application\Interfaces\IGetAmmountTransaction',
            'App\Infrastructure\Repositories\TransactionRepo'
        );

        $this->app->bind(
            'App\Application\Interfaces\IGetTransaction',
            'App\Infrastructure\Repositories\TransactionRepo'
        );

        $this->app->bind(
            'App\Application\Interfaces\ISaveTransaction',
            'App\Infrastructure\Repositories\TransactionRepo'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
