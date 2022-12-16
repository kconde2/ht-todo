<?php

namespace App\Providers;

use App\Todo\Domain\Repository\TodoRepositoryInterface;
use App\Todo\Infrastructure\DataProvider\Api\TodoApiDataProvider;
use Illuminate\Support\Facades\Http;
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
        $this->app->bind(TodoRepositoryInterface::class, TodoApiDataProvider::class);

        Http::macro('todoApi', function () {
            return Http::baseUrl(config('app.todo_api.url'));
        });
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
