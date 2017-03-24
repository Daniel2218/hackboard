<?php

include_once("REST/REST.php");

$myapp = new REST\app;
$myapp->get("/test/{1}", function(REST\Request $req, REST\Response $res) {
    echo "1<pre>";
    var_dump($req);
    echo "</pre>";
});
$myapp->get("/test/{1}/{2}", function(REST\Request $req, REST\Response $res) {
    echo "2<pre>";
    var_dump($req);
    echo "</pre>";
});
$myapp->post("/test2", function(REST\Request $req, REST\Response $res) {
    $req->body["columnName"];

    $res->json($req->body);
});
$myapp->start();

?>
