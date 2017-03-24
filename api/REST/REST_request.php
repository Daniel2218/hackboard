<?php

namespace REST {
    class Request {
        public $vars;
        public $body;

        public function __construct($vars) {
            $this->vars = $vars;
            $this->body = array_merge($_GET, $_POST, $_PUT, $_DELETE, $_UPDATE);
        }
    }
}

?>
