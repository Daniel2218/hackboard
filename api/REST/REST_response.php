<?php

namespace REST {
    class Response {
        private $content    = false;
        private $type       = "text/html";
        private $status     = 200;
        private $sent       = false;

        public function json($object) {
            $this->content = json_encode($object);
            $this->type = 'application/json';
        }

        public function html($object) {
            $this->content = $object;
            $this->type = 'text/html';
        }
        
        public function text($object) {
            $this->html($object);
        }

        public function status($num) {
            $this->status = $num;
        }

        public function send() {
            if (!$this->sent) {
                header('HTTP/1.1 ' . $this->status . ' OK');
                header('Content-Type: ' . $this->type);

                if ($this->content)
                    echo $this->content;

                $this->sent = true;
            }
        }
    }
}

?>
