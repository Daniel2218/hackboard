<?php
    class Model {
        private function __construct(){}
        private function __clone(){}
        private function __wakeup(){}

        public static function getInstance() {
            static $instance = null;
            if (null === $instance) {
                $instance = new self(); // change to static if you want subclass
            }
            return $instance;
        }

        public function get($endpoint, $feilds = array()) {
            $params = http_build_query($feilds);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://localhost/hackboard/api/$endpoint");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            $output = json_decode($output, true);
            curl_close($ch);
            return $output;
        }

        public function post() {

        }

        public function delete() {

        }

        public function update() {

        }

        public function put() {

        }
    }
?>
