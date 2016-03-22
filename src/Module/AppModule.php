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
use Ray\CakeDbModule\CakeDbModule;
use Ray\AuraSqlModule\AuraSqlModule;

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
        $dbConfig = [
            'driver' => 'Cake\Database\Driver\Sqlite',
            'database' => dirname(dirname(__DIR__)) . '/var/db/todo.sqlite3'
        ];
        $this->install(new CakeDbModule($dbConfig));
        $dbConfig = 'sqlite:' . dirname(dirname(__DIR__)). '/var/db/post.sqlite3';
        $this->install(new AuraSqlModule($dbConfig));
    }
}
