<?php
namespace Peac36\Explorer;

use Peac36\Explorer\Commands\Bindings;
use Peac36\Explorer\Commands\Commands;
use Illuminate\Support\ServiceProvider;

class Provider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->commands([
            Bindings::class,
            Commands::class,
        ]);
    }
}
