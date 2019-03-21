<?php

namespace NiBurkin\Serializer\Providers;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use NiBurkin\Serializer\Commands\SerializerMakeCommand;
use NiBurkin\Serializer\Contracts\SerializerFacadeInterface;
use NiBurkin\Serializer\Facades\Serializer;

class SerializerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->tag(config("serializer.serializers"), 'serializers');

        $this->app->singleton(Serializer::class, function (Application $app) {
            $serializers = $app->tagged('serializers');
            $facade = new Serializer();
            $facade->setSerializers($serializers->getIterator());
            return $facade;
        });

        $this->app->bind(SerializerFacadeInterface::class, Serializer::class);

        $this->commands([
            SerializerMakeCommand::class
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([$this->configPath() => config_path('serializer.php')]);
    }

    protected function configPath()
    {
        return __DIR__ . '/../../config/serializer.php';
    }
}