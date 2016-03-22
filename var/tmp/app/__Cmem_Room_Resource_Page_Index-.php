<?php

namespace Ray\Di\Compiler;

$instance = new \Cmem\Room\Resource\Page\Index();
$instance->setRenderer($singleton('BEAR\\Resource\\RenderInterface-', array('BEAR\\Resource\\ResourceObject', 'setRenderer', 'renderer')));
return $instance;