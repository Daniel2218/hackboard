<?php

include_once("REST/REST.php");
$myapp = new REST\app('localhost','hackboard','root','');


$myapp->get("/applications", function(REST\Request $req, REST\Response $res, REST\App $myapp) {
    $sql = "SELECT * FROM applications"; //Gathers all information of applicants
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Applicants have not been retrieved.";
        $res->json($json);
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Applicants have been retrieved successfully.";
        $res->json($json);
    }
});

$myapp->get("/IDapplications", function(REST\Request $req, REST\Response $res, REST\App $myapp) {
    $sql = "SELECT * FROM applications where aid = {$req->body['aid']}"; //Gathers applicant by id
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Applicant was not retrieved.";
        $res->json($json);
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Applicant {$req->body['aid']} has been retrieved successfully.";
        $res->json($json);
    }
    
});

$myapp->get("/sponsors", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql = "SELECT * FROM sponsors";  //Gathers sponsors
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Sponsors have not been retrieved.";
        $res->json($json);
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Sponsors have been retrieved successfully.";
        $res->json($json);
    }
});

$myapp->get("/judges", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql = "SELECT * FROM judges";  //Gathers judges
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Judges have not been retrieved.";
        $res->json($json);
    }else{
        $json['status'] = true;
        $json['message'] = "Success. judges have been retrieved successfully.";
        $res->json($json);
    }
});

$myapp->get("/users", function(REST\Request $req, REST\Response $res, REST\App $myapp) {
    $sql = "SELECT * FROM users";  //Gathers users
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Users have not been retrieved.";
        $res->json($json);
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Users have been retrieved successfully.";
        $res->json($json);
    }
});

$myapp->get("/events", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql = "SELECT * FROM events";  //Gathers events
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Events have not been retrieved.";
        $res->json($json);
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Events have been retrieved successfully.";
        $res->json($json);
    }
});

$myapp->get("/prizes", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql = "SELECT * FROM prizes";  //Gathers prizes
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Prizes have not been retrieved.";
        $res->json($json);
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Prizes have been retrieved successfully.";
        $res->json($json);
    }
});

$myapp->get("/applications/searchName", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql = "SELECT * FROM applications WHERE firstname = {$req->body['name']}"; //Search applicants by name
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Applicant has not been retrieved.";
        $res->json($json);
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Applicant has been retrieved by name successfully.";
        $res->json($json);
    }

});

$myapp->get("/applications/searchEmail", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql = "SELECT * FROM applications WHERE email = {$req->body['email']}"; //Search applicants by email
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Applicant has not been retrieved.";
        $res->json($json);
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Applicant has been retrieved by email successfully.";
        $res->json($json);
    }
});

$myapp->get("/applications/total", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql = "SELECT count(aid) as overallApplicants FROM applications GROUP BY aid";
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Applicants have not been retrieved.";
        $res->json($json);
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Applicants have been retrieved successfully.";
        $res->json($json);
    }
});
$myapp->get("/applications/totalSchool", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql = "SELECT school, count(aid) as schoolApplicants FROM applications GROUP BY school";
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Applicants have not been retrieved.";
        $res->json($json);
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Applicants have been retrieved and grouped by school successfully.";
        $res->json($json);
    }
});

$myapp->get("/applications/accepted", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="SELECT * FROM `applications` WHERE status='0'";
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Accepted applicants have not been retrieved.";
        $res->json($json);
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Accepted applicants have been retrieved successfully.";
        $res->json($json);
    }
});

$myapp->get("/applications/declined", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="SELECT * FROM `applications` WHERE status='1'";
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Declined applicants have not been retrieved.";
        $res->json($json);
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Declined applicants have been retrieved successfully.";
        $res->json($json);
    }
});

$myapp->get("/applications/skipped", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="SELECT * FROM `applications` WHERE status='2'";
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Skipped applicants have not been retrieved.";
        $res->json($json);
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Skipped applicants have been retrieved successfully.";
        $res->json($json);
    }
});


$myapp->get("/applications/sort", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql = "SELECT * FROM applications ORDER BY {$req->body['sorting']}"; //Sort applications by # of hacks
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Applicants have not been sorted.";
        $res->json($json);
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Applicants have been sorted successfully.";
        $res->json($json);
    }
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
$myapp->post("/sponsors/add", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $var = implode(", ", $req->body);
    $sql ="INSERT INTO sponsors VALUES ({$var})";//adds a new sponsor with all corresponding values to the database 
    
    $json = array();
    $result = $myapp->postQuery($sql);
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. A new sponsor has not been addded.";
        $res->json($json); 
    }else{
        $json['status'] = true;
        $json['message'] = "Success. A new sponsor has been added successfully.";
        $res->json($json);
    }
});

$myapp->post("/prizes/add", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $var = implode(", ", $req->body);
    $sql ="INSERT INTO prizes VALUES ({$var})"; //adds a new prize with all corresponding values to the database 
    $json = array();
    $result = $myapp->postQuery($sql);
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. A new prize has not been addded.";
        $res->json($json); 
    }else{
        $json['status'] = true;
        $json['message'] = "Success. A new prize has been added successfully.";
        $res->json($json);
    }
});

$myapp->post("/judges/add", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $var = implode(", ", $req->body);
    $sql ="INSERT INTO judges VALUES ({$var})"; //adds a new judge with all corresponding values to the database 
    $json = array();
    $result = $myapp->postQuery($sql);
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];
    
    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. A new judge has not been addded.";
        $res->json($json); 
    }else{
        $json['status'] = true;
        $json['message'] = "Success. A new judge has been added successfully.";
        $res->json($json);
    }
});

$myapp->post("/events/add", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $var = implode(", ", $req->body);
    $sql ="INSERT INTO events VALUES ({$var})"; //adds a new event with all corresponding values to the database 
    $json = array();
    $result = $myapp->postQuery($sql);
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];
    
    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. A new event has not been addded.";
        $res->json($json); 
    }else{
        $json['status'] = true;
        $json['message'] = "Success. A new event has been added successfully.";
        $res->json($json);
    }
});

$myapp->post("/users/add", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $var = implode(", ", $req->body);
    $sql ="INSERT INTO users VALUES ({$var})"; //adds a new user with all corresponding values to the database 
    $json = array();
    $result = $myapp->postQuery($sql);
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];
    
    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. A new user has not been addded.";
        $res->json($json); 
    }else{
        $json['status'] = true;
        $json['message'] = "Success. A new user has been added successfully.";
        $res->json($json);
    }
});

/*
DELETING TABLES:


*/
$myapp->post("/sponsors/delete", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="DELETE FROM sponsors WHERE sid = {$req->body['id']}"; //adds a new sponsor with all corresponding values to the database 
    $json = array();
    $result = $myapp->postQuery($sql);
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];
    
    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. A sponsor was not deleted.";
        $res->json($json); 
    }else{
        $json['status'] = true;
        $json['message'] = "Success. A sponsor was deleted successfully.";
        $res->json($json);
    }
});

$myapp->post("/prizes/delete", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="DELETE FROM prizes WHERE pid = {$req->body['id']}"; //adds a new prize with all corresponding values to the database 
});

$myapp->post("/judges/delete", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="DELETE FROM judges WHERE jid = {$req->body['id']}"; //adds a new judge with all corresponding values to the database 
});

$myapp->post("/events/delete", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="DELETE FROM events WHERE eid = {$req->body['id']}"; //adds a new event with all corresponding values to the database 
});

$myapp->post("/users/delete", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="DELETE FROM users WHERE uid = {$req->body['id']}"; //adds a new user with all corresponding values to the database 
});

/*
EDITING TABLES:


*/
$myapp->post("/users/edit", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="UPDATE users SET {$req->body['columnName']} = {$req->body['value']} WHERE uid = {$req->body['id']}"; //edits the user table based on a column name and their id
    $json = array();
    $result = $myapp->postQuery($sql);
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. A user has not been edited.";
        $res->json($json); 
    }else{
        $json['status'] = true;
        $json['message'] = "Success. A user has been edited successfully.";
        $res->json($json);
    }
});

$myapp->post("/sponsors/edit", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="UPDATE sponsors SET {$req->body['columnName']} = {$req->body['value']} WHERE sid = {$req->body['id']}"; //adds a new prize with all corresponding values to the database 
    $json = array();
    $result = $myapp->postQuery($sql);
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. A sponsor has not been edited.";
        $res->json($json); 
    }else{
        $json['status'] = true;
        $json['message'] = "Success. A sponsor has been edited successfully.";
        $res->json($json);
    }
});

$myapp->post("/prizes/edit", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="UPDATE prizes SET {$req->body['columnName']} = {$req->body['value']} WHERE pid = {$req->body['id']}"; //adds a new prize with all corresponding values to the database 
    $json = array();
    $result = $myapp->postQuery($sql);
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. A prize has not been edited.";
        $res->json($json); 
    }else{
        $json['status'] = true;
        $json['message'] = "Success. A prize has been edited successfully.";
        $res->json($json);
    }
});

$myapp->post("/events/edit", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="UPDATE events SET {$req->body['columnName']} = {$req->body['value']} WHERE eid = {$req->body['id']}"; //adds a new prize with all corresponding values to the database 
    $json = array();
    $result = $myapp->postQuery($sql);
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. An event has not been edited.";
        $res->json($json); 
    }else{
        $json['status'] = true;
        $json['message'] = "Success. An event has been edited successfully.";
        $res->json($json);
    }
});

$myapp->post("/judges/edit", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="UPDATE judges SET {$req->body['columnName']} = {$req->body['value']} WHERE jid = {$req->body['id']}"; //adds a new prize with all corresponding values to the database 
    $json = array();
    $result = $myapp->postQuery($sql);
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. A judge has not been edited.";
        $res->json($json); 
    }else{
        $json['status'] = true;
        $json['message'] = "Success. A judge has been edited successfully.";
        $res->json($json);
    }
});

$myapp->get("/users/loginCheck", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="SELECT * FROM users WHERE email={$req->body['email']} AND password = {$req->body['password']}";//will gather email and password
    $json = array();
    $result = $myapp->getQuery($sql);
    $json['result']=$result['result'];
    $json['error'] = $result['error'];

    if (empty($result['result'])) {
    	$json['status'] = false;
        $json['message'] = "Failure. Login Check failed."; 
        $res->json($json);
    } else{
        $json['status'] = true;   
        $json['message'] = "Success. Login Check succeeded.";
        $res->json($json);
    }
});

$myapp->post("/applications/accept", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
	// if ($req->body['status'] != 0 || $req->body['status'] != 1 || $req->body['status'] != 2){
	// 	die("Incorrect Status for update" . $req->body['status']);
	// }
	$sql = "UPDATE applications SET status = 1 WHERE aid = {$req->body['id']}"; //change status of applicant to accepted

    //$sql = "UPDATE applications SET status = . $req->body['status'] . WHERE aid = '.$req->body['aid']'"; //change status of applicant
    
});

$myapp->post("/applications/decline", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
	$sql = "UPDATE applications SET status = 2 WHERE aid = {$req->body['id']}"; //change status of applicant to decline
});

$myapp->post("/applications/skip", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
	$sql = "UPDATE applications SET status = 0 WHERE aid = {$req->body['id']}"; //change status of applicant to skip
});



$myapp->post("/insert/", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql = "INSERT INTO". $req->body['tableName']." VALUES (" . implode(",",$req->body['values']) .");";
});

$myapp->post("/edit/", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql = "UPDATE " .$req->body['tableName'] ." SET ".$req->body['columnName']."=".$req->body['value']."WHERE". $req->body['idType']."=".$req->body['id'];
});
$myapp->start();


?>
