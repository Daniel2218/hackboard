<?php

namespace REST {
    /**
     * TREE
     * For building endpoint parse tree on page load
     */
    class Tree {
        public $label;
        public $handler;
        public $is_var;
        public $children = array();

        // Constructor for directories
        public function __construct($label, $is_var = false, $handler = false) {
            $this->label = $label;
            $this->handler = $handler;
            $this->is_var = $is_var;
        }
    }
}

?>
