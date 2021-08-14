<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blueprint::macro('thingFields', function () {
            /** @var Blueprint $this */
            $this->id();
            $this->string('slug')->unique();
            $this->string('name');
            $this->string('description')->nullable();
            $this->json('additional_attributes')->nullable();
            $this->timestamps();
            $this->softDeletes();
        });
    }
}
