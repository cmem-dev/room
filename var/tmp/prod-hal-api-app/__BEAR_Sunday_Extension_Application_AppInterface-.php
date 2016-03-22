<?php

namespace Ray\Di\Compiler;

$instance = new \Cmem\Room\Module\App($singleton('BEAR\\Sunday\\Extension\\Router\\RouterInterface-'), $prototype('BEAR\\Sunday\\Extension\\Transfer\\TransferInterface-'), $singleton('BEAR\\Resource\\ResourceInterface-'), $prototype('BEAR\\Sunday\\Extension\\Error\\ErrorInterface-'));
return $instance;