<?php

namespace Ray\Di\Compiler;

$instance = new \BEAR\Package\Provide\Representation\HalRenderer($prototype('Doctrine\\Common\\Annotations\\Reader-'), $singleton('BEAR\\Sunday\\Extension\\Router\\RouterInterface-'));
return $instance;