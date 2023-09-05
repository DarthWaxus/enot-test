<?php

namespace App\Providers;

use App\Contracts\ConfirmationProviderServiceInterface;
use App\Services\Confirmation\EmailConfirmationProviderService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $confirmationServiceClassName = request()->user()->confirmationType->service_class ?? EmailConfirmationProviderService::class;
        App::bind(ConfirmationProviderServiceInterface::class, $confirmationServiceClassName);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
