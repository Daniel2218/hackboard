<?php

namespace REST {
    class Request {
        public $vars;

        public function __construct($vars) {
            $this->vars = $vars;
        }
    }
}

?>
