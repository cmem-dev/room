<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\Resource\Module\SchemeCollectionProvider('Cmem\\Room', $injector());
return $instance->get();