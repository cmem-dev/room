<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\QueryRepository\StorageProvider($singleton('Doctrine\\Common\\Cache\\CacheProvider-BEAR\\RepositoryModule\\Annotation\\Storage'));
$instance->setAppName('Cmem\\Room');
return $instance->get();