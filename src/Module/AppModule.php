<?php

namespace Cmem\Room\Module;

use BEAR\Package\PackageModule;
use Ray\Di\AbstractModule;
use josegonzalez\Dotenv\Loader as Dotenv;
use BEAR\Package\Provide\Router\AuraRouterModule;
use Psr\Log\LoggerInterface;
use Ray\Di\Scope;
use Cmem\Room\Annotation\BenchMark;
use Cmem\Room\Interceptor\BenchMarker;

class AppModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        Dotenv::load([
            'filepath' => dirname(dirname(__DIR__)) . '/.env',
            'toEnv' => true
        ]);
        $this->install(new PackageModule);
        $this->override(new AuraRouterModule);
        $this->bind(LoggerInterface::class)->toProvider(MonologLoggerProvider::class)->in(Scope::SINGLETON);
        $this->bindInterceptor(
            $this->matcher->any(),
            $this->matcher->annotatedWith(BenchMark::class),
            [BenchMarker::class]
        );
    }
}
