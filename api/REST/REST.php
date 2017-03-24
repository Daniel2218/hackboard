<?php

namespace REST {
    include_once("REST_response.php");
    include_once("REST_request.php");
    include_once("REST_tree.php");

    /**
     * APPLICATION
     * Handles incoming and outgoing traffic
     */
    class App {
        private $TREE_ROOT_GET;
        private $TREE_ROOT_POST;

        public function __construct() {
            // Initialize the parse tree
            $this->TREE_ROOT_GET  = new Tree("TREE_ROOT_GET");
            $this->TREE_ROOT_POST = new Tree("TREE_ROOT_POST");
        }

        /**
         * GET, POST
         * Register a get endpoint passing the endpoint string and an anonymous
         * function to handle the response
         */
        public function get ($_endpoint, $_handler) {
            $this->register($this->TREE_ROOT_GET, $_endpoint, $_handler);
        }

        public function post($_endpoint, $_handler) {
            $this->register($this->TREE_ROOT_POST, $_endpoint, $_handler);
        }

        private function register($_tree_root, $_endpoint, $_handler) {
            // Begin by parsing endpoint
            $_endpoint_string = $_endpoint;
            $_endpoint = explode("/", $_endpoint);

            // Point to tree root for navigation
            $tree_ptr = $_tree_root;

            // Iterate through directories and variables
            for ($i = 0; $i < sizeof($_endpoint); ++$i) {
                // Check for blank points and add errors
                if ($_endpoint[$i] == "") {
                    // The first is blank, that's ok the user just added a
                    // leading slash
                    if ($i == 0 || $i == sizeof($_endpoint) - 1) {
                        continue;
                    }
                    else {
                        die("REST: Invalid endpoint '" . $_endpoint_string . "' has blank directory or variable");
                    }
                }
                else {
                    // Variable to store new pointer;
                    $j = 0;

                    // New tree node
                    $new_node;

                    // Check to see if it's a variable directory
                    if ($_endpoint[$i][0] == "{" && $_endpoint[$i][strlen($_endpoint[$i]) - 1] == "}") {
                        // If this is the last stop, pass the handler
                        if ($i == sizeof($_endpoint) - 1) {
                            $new_node = new Tree($_endpoint[$i], true, $_handler);
                        }
                        else {
                            $new_node = new Tree($_endpoint[$i], true);
                        }
                    }
                    // Parse directory
                    else {
                        // If this is the last stop, pass the handler
                        if ($i == sizeof($_endpoint) - 1) {
                            $new_node = new Tree($_endpoint[$i], false, $_handler);
                        }
                        else {
                            $new_node = new Tree($_endpoint[$i], false);
                        }
                    }

                    // Check to see if this endpoint exists already
                    if (isset($tree_ptr->children[$_endpoint[$i]])) {
                        $registered = false;

                        // Iterate through each endpoint at this one, check for duplicates
                        for (; $j < sizeof($tree_ptr->children[$_endpoint[$i]]); ++$j) {
                            if ($tree_ptr->children[$_endpoint[$i]][$j]->label == $_endpoint[$i]) {
                                // If it's the last endpoint then throw error
                                if ($i == sizeof($_endpoint) - 1 && $tree_ptr->children[$_endpoint[$i]][$j]->handler != false) {
                                    die("REST: Duplicate endpoint registration at '" . $_endpoint_string . "'");
                                }
                                else {
                                    $registered = true;
                                    break;
                                }
                            }
                        }

                        // If the endpoint doesn't exist, create a tree node for it
                        if ($registered == false) {
                            $j = array_push($tree_ptr->children[$_endpoint[$i]], $new_node);
                        }
                    }
                    else {
                        // Unexplored territory, add new list of nodes
                        $tree_ptr->children[$_endpoint[$i]] = array();
                        array_push($tree_ptr->children[$_endpoint[$i]], $new_node);
                    }

                    // Set new ptr to created node
                    $tree_ptr = $tree_ptr->children[$_endpoint[$i]][$j];
                }
            }
        }

	private function find(&$vars, $tree_ptr, $endpoint) {
	  if (isset($tree_ptr->children[$endpoint[0]])) {
	    if (sizeof($endpoint) == 1) {
	      return $tree_ptr->children[$endpoint[0]][0]->handler;
	    }
	    else {
	      return $this->find($vars, $tree_ptr->children[$endpoint[0]][0], array_slice($endpoint,1));
	    }
	  }
	  else {
	    foreach ($tree_ptr->children as $key => $value) {
	      if ($tree_ptr->children[$key][0]->is_var) {
		if (sizeof($endpoint) == 1) {
		  $vars[$tree_ptr->children[$key][0]->label] = $endpoint[0];
		  return $tree_ptr->children[$key][0]->handler;
		}
		else {
		  $handler = $this->find($vars, $tree_ptr->children[$key][0], array_slice($endpoint,1));
		  if ($handler != false) {
		    $vars[$tree_ptr->children[$key][0]->label] = $endpoint[0];
		    return $handler;
		  }
		}
	      }
	    }
	  }
	  return false;
	}

        /**
         * START
         * Main entry point for the class. Must be called from endpoint page.
         */
        public function start() {
            // Check to see if call isn't root
            if (isset($_GET["path"])) {
                $endpoint_string = $_GET["path"];
                $endpoint = explode("/", $_GET["path"]);
                $tree_ptr;

                // Which tree to parse
                switch ($_SERVER["REQUEST_METHOD"]) {
                    case "GET":
                        $tree_ptr = $this->TREE_ROOT_GET;
                        break;
                    case "POST":
                        $tree_ptr = $this->TREE_ROOT_POST;
                        break;
                    default:
                        die("REST: Unsupported request method " . $_SERVER["REQUEST_METHOD"]);
                        break;
                }

        		if ($endpoint[0] == "")                     array_shift($endpoint);
        		if ($endpoint[sizeof($endpoint) - 1] == "") unset($endpoint[$sizeof($endpoint) - 1]);

                // Collect variable data
                $vars = array();
        		$handler = $this->find($vars, $tree_ptr, $endpoint);

        		if ($handler == false)
        		    die("Invalid endpoint");

                unset($_GET["path"]);

                $req = new Request ($vars);
        		$res = new Response();

                call_user_func_array($handler, [$req, $res]);

                $res->send();
            }
            // The call is root
            else {
                echo "Welcome to the API!";
            }
        }
    }
}

?>
