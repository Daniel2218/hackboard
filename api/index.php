<?php

include_once("REST/REST.php");
$myapp = new REST\app('localhost','hackboard','root','root');

function select(tableName){
	$sql = "SELECT * FROM {$tableName}";
	return $sql;
});

$myapp->get("/applicants", function(REST\Request $req, REST\Response $res) {
    $sql = select("applicants"); //Gathers all information of applicants
    
});

$myapp->get("/applicants?{aid}", function(REST\Request $req, REST\Response $res) {
    $sql = "SELECT * FROM applications where aid = {$req->body['aid']}"; //Gathers applicant by id
    
});

$myapp->get("/sponsors", function(REST\Request $req, REST\Response $res) {
    $sql = select("sponsors"); //Gathers sponsors
});

$myapp->get("/judges", function(REST\Request $req, REST\Response $res) {
    $sql = select("judges"); //Gathers judges
});

$myapp->get("/users", function(REST\Request $req, REST\Response $res) {
    $sql = select("users"); //Gathers users
});

$myapp->get("/events", function(REST\Request $req, REST\Response $res) {
    $sql = select("events"); //Gathers events
});

$myapp->get("/prizes", function(REST\Request $req, REST\Response $res) {
    $sql = select("prizes"); //Gathers prizes
});

$myapp->get("/applicants/search?{name}", function(REST\Request $req, REST\Response $res) {
	// if ($req->body['column'] != "name" || $req->body['column'] != "email"){
	// 	die("Invalid search" . $req->body['column']);
	// }
    $sql = "SELECT * FROM applications WHERE name = {$req->body['name']}"; //Search applicants by name
});

$myapp->get("/applicants/search?{email}", function(REST\Request $req, REST\Response $res) {
    $sql = "SELECT * FROM applications WHERE email = {$req->body['email']"; //Search applicants by email
});

$myapp->get("/applicants/stats", function(REST\Request $req, REST\Response $res) {
    $sql = "SELECT count(aid) as totalApplicants FROM applications GROUP BY aid";
    $sql .= "SELECT school, count(aid) as totalApplicants FROM applications GROUP BY school";]
    for($i=0;$i<2;$i++){
    	$sql.="SELECT * FROM `applications` WHERE status=$i";
    }
});

$myapp->get("/applicants/sort?{hacks}", function(REST\Request $req, REST\Response $res) {
    $sql = "SELECT * FROM applications ORDER BY {$req->body['hacks']"; //Sort applications by # of hacks
});
/*
A LOT OF DUPLICATE CODE AHEAD
CREATE FUNCTION TO FOR SQL WITH PARAMS GIVEN
*
*
*
*
*/
/*
ADDING new elements to the following tables: sponsors, prizes, judges, events, users.
*/
$myapp->post("/sponsors/add", function(REST\Request $req, REST\Response $res) {
    $sql ="INSERT INTO sponsors VALUES ".implode(",", $req->body)""; //adds a new sponsor with all corresponding values to the database 
});

$myapp->post("/prizes/add", function(REST\Request $req, REST\Response $res) {
    $sql ="INSERT INTO prizes VALUES ".implode(",", $req->body)""; //adds a new prize with all corresponding values to the database 
});

$myapp->post("/judges/add", function(REST\Request $req, REST\Response $res) {
    $sql ="INSERT INTO judges VALUES ".implode(",", $req->body)""; //adds a new judge with all corresponding values to the database 
});

$myapp->post("/events/add", function(REST\Request $req, REST\Response $res) {
    $sql ="INSERT INTO events VALUES ".implode(",", $req->body)""; //adds a new event with all corresponding values to the database 
});

$myapp->post("/users/add", function(REST\Request $req, REST\Response $res) {
    $sql ="INSERT INTO users VALUES ".implode(",", $req->body)""; //adds a new user with all corresponding values to the database 
});

/*
DELETING TABLES:


*/
$myapp->post("/sponsors/delete", function(REST\Request $req, REST\Response $res) {
    $sql ="DELETE FROM sponsors WHERE sid = {$req->body['id']}"; //adds a new sponsor with all corresponding values to the database 
});

$myapp->post("/prizes/delete", function(REST\Request $req, REST\Response $res) {
    $sql ="DELETE FROM sponsors WHERE pid = {$req->body['id']}"; //adds a new prize with all corresponding values to the database 
});

$myapp->post("/judges/delete", function(REST\Request $req, REST\Response $res) {
    $sql ="DELETE FROM sponsors WHERE jid = {$req->body['id']}"; //adds a new judge with all corresponding values to the database 
});

$myapp->post("/events/delete", function(REST\Request $req, REST\Response $res) {
    $sql ="DELETE FROM sponsors WHERE eid = {$req->body['id']}"; //adds a new event with all corresponding values to the database 
});

$myapp->post("/users/delete", function(REST\Request $req, REST\Response $res) {
    $sql ="DELETE FROM sponsors WHERE uid = {$req->body['id']}"; //adds a new user with all corresponding values to the database 
});

/*
EDITING TABLES:


*/
$myapp->post("/users/edit", function(REST\Request $req, REST\Response $res) {
    $sql ="UPDATE user SET {$req->body['columnName']} = {$req->body['value']} WHERE uid = {$req->body['id']}"; //edits the user table based on a column name and their id
});

$myapp->post("/sponsors/edit", function(REST\Request $req, REST\Response $res) {
    $sql ="UPDATE user SET {$req->body['columnName']} = {$req->body['value']} WHERE sid = {$req->body['id']}"; //adds a new prize with all corresponding values to the database 
});

$myapp->post("/prizes/edit", function(REST\Request $req, REST\Response $res) {
    $sql ="UPDATE user SET {$req->body['columnName']} = {$req->body['value']} WHERE pid = {$req->body['id']}"; //adds a new prize with all corresponding values to the database 
});

$myapp->post("/events/edit", function(REST\Request $req, REST\Response $res) {
    $sql ="UPDATE user SET {$req->body['columnName']} = {$req->body['value']} WHERE eid = {$req->body['id']}"; //adds a new prize with all corresponding values to the database 
});

$myapp->post("/judges/edit", function(REST\Request $req, REST\Response $res) {
    $sql ="UPDATE user SET {$req->body['columnName']} = {$req->body['value']} WHERE jid = {$req->body['id']}"; //adds a new prize with all corresponding values to the database 
    $res->json()
});

$myapp->get("/applicants/loginCheck", function(REST\Request $req, REST\Response $res) {
    $sql ="SELECT 1 FROM applications WHERE email={$req->body['email']} and password = {$req->body['password']}";//will gather email and password
    if ($sql && mysql_num_rows($sql)) {
    	echo "Valid email & password";
    } else{
    	echo "invalid";// unsure what should be returned
    }
});

$myapp->post("/applicants/accept", function(REST\Request $req, REST\Response $res) {
	// if ($req->body['status'] != 0 || $req->body['status'] != 1 || $req->body['status'] != 2){
	// 	die("Incorrect Status for update" . $req->body['status']);
	// }
	$sql = "UPDATE applications SET status = 1 WHERE aid = {$req->body['id']}"; //change status of applicant to accepted

    //$sql = "UPDATE applications SET status = . $req->body['status'] . WHERE aid = '.$req->body['aid']'"; //change status of applicant
    
});

$myapp->post("/applicants/decline", function(REST\Request $req, REST\Response $res) {
	$sql = "UPDATE applications SET status = 2 WHERE aid = {$req->body['id']}"; //change status of applicant to decline
});

$myapp->post("/applicants/skip", function(REST\Request $req, REST\Response $res) {
	$sql = "UPDATE applications SET status = 0 WHERE aid = {$req->body['id']}"; //change status of applicant to skip
});



$myapp->post("/insert/", function(REST\Request $req, REST\Response $res) {
    $sql = "INSERT INTO". $req->body['tableName']." VALUES (" . implode(",",$req->body['values']) .");";
});

$myapp->post("/edit/", function(REST\Request $req, REST\Response $res) {
    $sql = "UPDATE " .$req->body['tableName'] ." SET ".$req->body['columnName']."=".$req->body['value']."WHERE". $req->body['idType']."=".$req->body['id'];
});
$myapp->start();


?>
