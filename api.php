<?php

/**
 * METHOD CLASS
 * Seperates endpoints by request method and url. The idea is to provide simple
 * syntax when defining endpoints. If the content type of the endpoints vary,
 * this class should handle formatting and returning the desired content type.
 */
class Method {
    public $request_method;
    public $request_url;

    public function __construct($request_method, $request_url) {
        $request_method = strtoupper($request_method);
        $_REQUEST = $this->_cleanInputs($_REQUEST);
        $request_url = $this->_cleanInputs($request_url);

        switch($request_method) {
            case "GET":
                break;
            case "POST":
                break;
            case "DELETE": break;
            case "PUT": break;
            case "UPDATE": break;
            // Invalid request method
            default:
                die("Method specified is invalid for endpoint " . $request_url);
                break;
        }

        $this->request_method = $request_method;
        $this->request_url    = $request_url;
    }

    private function _cleanInputs($data) {
       $clean_input = Array();
       if (is_array($data)) {
           foreach ($data as $k => $v) {
               $clean_input[$k] = $this->_cleanInputs($v);
           }
       } else {
           $clean_input = addslashes(trim(strip_tags($data)));
       }
       return $clean_input;
   }
}

/**
 * ENDPOINT Class
 * Stores all endpoints and provides simple syntax when declaring endpoints.
 * Addition features would include error handling
 */
class Endpoint {
    private static $endpoints = array();
    public $action;
    public $methods;

    public function __construct($methods, $action) {
        if (is_array($methods)) {
            foreach ($methods as $method) {
                if ($method instanceof Method == false) {
                    die("Array methods does not have method types");
                }
            }
        }
        else {
            die("parameter 1 is not an array");
        }

        $this->methods = $methods;
        $this->action  = $action;

        array_push(Endpoint::$endpoints, $this);
    }

    // TODO
    // Find endpoint from list and call it
    public static function call($request_method, $request_url) {
        header("Content-Type: application/json");
        foreach (Endpoint::$endpoints as $endpoint) {
            foreach($endpoint->methods as $method) {
                if($method->request_method == $request_method AND $method->request_url == $request_url) {
                    $invoke = $endpoint->action;
                    return $invoke();
                }
            }
        }
        die("Endpoint doed not exsist");
    }
}

// Sample endpoint definitions
// $args: array of argruments passed by the request
// $method: method
new Endpoint(
    array(
        new Method("GET", "login")
        // new Method("POST", "login")
    ),
    function($args, $method) {

        $obj = array(
            'Success'=>'true'
        );
        return json_encode($obj);
    }
);

// new Endpoint(
//     array(
//         new Method("POST", "/"),
//         new Method("UPDATE", "/door")
//     ),
//     function($args, $method) {
//         return "{'door':'chair'}";
//     }
// );

// Called on page load, passes request to handlers. ALL! information an Endpoint
// should ever need must be passed through this function. It helps when
// debugging!
 Endpoint::call($_SERVER['REQUEST_METHOD'], $_REQUEST['request']);
?>
