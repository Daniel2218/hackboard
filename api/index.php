<?php

include_once("REST/REST.php");
$myapp = new REST\app('localhost','hackboard','root','');


$myapp->get("/applications", function(REST\Request $req, REST\Response $res, REST\App $myapp) {
    $sql = "SELECT aid, firstname, lastname, fname, lname, status FROM applications LEFT OUTER JOIN users ON applications.uid=users.uid"; //Gathers all information of applicants
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];
    if(empty($result['result'])){
        $json['status'] = false;
        $json['message'] = "Failure. No Applicants to be retrieved.";
    }elseif($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Applicants have not been retrieved.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Applicants have been retrieved successfully.";
    }
    $res->json($json);
});

$myapp->get("/IDapplications", function(REST\Request $req, REST\Response $res, REST\App $myapp) {
    $sql = "SELECT * FROM applications where aid = {$req->body['aid']}"; //Gathers applicant by id
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];
    if(empty($result['result'])){
        $json['status'] = false;
        $json['message'] = "Failure. Applicant {$req->body['aid']} was not found.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Applicant {$req->body['aid']} has been retrieved successfully.";
    }
    $res->json($json);
});

$myapp->get("/sponsors", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql = "SELECT * FROM sponsors";  //Gathers sponsors
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];

    if(empty($result['result'])){
        $json['status'] = false;
        $json['message'] = "Failure. No Sponsors to be retrieved.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Sponsors have been retrieved successfully.";
    }
    $res->json($json);
});

$myapp->get("/judges", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql = "SELECT * FROM judges";  //Gathers judges
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];

    if(empty($result['result'])){
        $json['status'] = false;
        $json['message'] = "Failure. No Judges to be retrieved.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. judges have been retrieved successfully.";
    }
    $res->json($json);
});

$myapp->get("/users", function(REST\Request $req, REST\Response $res, REST\App $myapp) {
    $sql = "SELECT * FROM users";  //Gathers users
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];

    if(empty($result['result'])){
        $json['status'] = false;
        $json['message'] = "Failure. No Users to be retrieved.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Users have been retrieved successfully.";
    }
    $res->json($json);
});

$myapp->get("/events", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql = "SELECT * FROM events";  //Gathers events
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];

    if(empty($result['result'])){
        $json['status'] = false;
        $json['message'] = "Failure. No Events to be retrieved.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Events have been retrieved successfully.";
    }
    $res->json($json);
});

$myapp->get("/prizes", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql = "SELECT * FROM prizes";  //Gathers prizes
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];

    if(empty($result['result'])){
        $json['status'] = false;
        $json['message'] = "Failure. No Prizes to be retrieved.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Prizes have been retrieved successfully.";
    }
    $res->json($json);
});

$myapp->get("/applications/searchName", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql = "SELECT * FROM applications WHERE firstname = {$req->body['name']}"; //Search applicants by name
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];
    if(empty($result['result'])){
        $json['status'] = false;
        $json['message'] = "Failure. Applicant does not exist.";
    }elseif($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Applicant has not been retrieved.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Applicant has been retrieved by name successfully.";
    }
    $res->json($json);
});

$myapp->get("/applications/searchEmail", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql = "SELECT * FROM applications WHERE email = {$req->body['email']}"; //Search applicants by email
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];

    if(empty($result['result'])){
        $json['status'] = false;
        $json['message'] = "Failure. Applicant does not exist.";
    }elseif($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Applicant has not been retrieved.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Applicant has been retrieved by email successfully.";
    }
    $res->json($json);
});

$myapp->get("/applications/total", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql = "SELECT count(aid) as overallApplicants FROM applications GROUP BY aid";
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];
    if(empty($result['result'])){
        $json['status'] = false;
        $json['message'] = "Failure. No applicants.";
    }elseif($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Applicants have not been retrieved.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Applicants have been retrieved successfully.";
    }
    $res->json($json);
});
$myapp->get("/applications/totalSchool", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql = "SELECT school, count(aid) as schoolApplicants FROM applications GROUP BY school";
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];

    if(empty($result['result'])){
        $json['status'] = false;
        $json['message'] = "Failure. No applicants.";
    }elseif($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Applicants have not been retrieved.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Applicants have been retrieved and grouped by school successfully.";
    }
    $res->json($json);
});

$myapp->get("/applications/accepted", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="SELECT count(aid) as total FROM `applications` WHERE status='1'";
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'][0];
    $json['error'] = $result['error'];

    if(empty($result['result'])){
        $json['status'] = false;
        $json['message'] = "Failure. No accepted applicants.";
    }elseif($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Accepted applicants have not been retrieved.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Accepted applicants have been retrieved successfully.";
    }
    $res->json($json);
});

$myapp->get("/applications/declined", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="SELECT count(aid) as total FROM `applications` WHERE status='2'";
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'][0];
    $json['error'] = $result['error'];

    if(empty($result['result'])){
        $json['status'] = false;
        $json['message'] = "Failure. No declined applicants.";
    }elseif($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Declined applicants have not been retrieved.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Declined applicants have been retrieved successfully.";
    }
    $res->json($json);
});

$myapp->get("/applications/skipped", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="SELECT count(aid) as total FROM `applications` WHERE status='0'";
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'][0];
    $json['error'] = $result['error'];

    if(empty($result['result'])){
        $json['status'] = false;
        $json['message'] = "Failure. No skipped applicants.";
    }elseif($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Skipped applicants have not been retrieved.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Skipped applicants have been retrieved successfully.";
    }
    $res->json($json);
});


$myapp->get("/applications/sort", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql = "SELECT * FROM applications ORDER BY {$req->body['sorting']}"; //Sort applications by # of hacks
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['result'] = $result['result'];
    $json['error'] = $result['error'];
    if(empty($result['result'])){
        $json['status'] = false;
        $json['message'] = "Failure. No applicants to sort.";
    }elseif($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Applicants have not been sorted.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Applicants have been sorted successfully.";
    }
    $res->json($json);
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
    $sql ="INSERT INTO sponsors VALUES (NULL, {$var})";//adds a new sponsor with all corresponding values to the database 
    
    $json = array();
    $result = $myapp->postQuery($sql);
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. A new sponsor has not been addded.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. A new sponsor has been added successfully.";
    }
    $res->json($json);
});
function addQuotes($arr){
    var_dump($arr);
    for($i=0;$i<sizeof($arr);$i++){
        $arr[$i] = "'" . $arr[$i] . "'";
    }
    return $arr;
}

$myapp->post("/prizes/add", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    var_dump($req->body);

    //$var = implode(", ", $req->body);
    
    $var = addQuotes($req->body);

    $sql ="INSERT INTO prizes VALUES (NULL, {$var})"; //adds a new prize with all corresponding values to the database 
    $json = array();
    $result = $myapp->postQuery($sql);
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. A new prize has not been addded.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. A new prize has been added successfully.";
    }
    $res->json($json);
});

$myapp->post("/judges/add", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $var = implode(", ", $req->body);
    $sql ="INSERT INTO judges VALUES (NULL, {$var})"; //adds a new judge with all corresponding values to the database 
    $json = array();
    $result = $myapp->postQuery($sql);
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];
    
    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. A new judge has not been addded.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. A new judge has been added successfully.";
    }
    $res->json($json);
});

$myapp->post("/events/add", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $var = implode(", ", $req->body);
    $sql ="INSERT INTO events VALUES (NULL, {$var})"; //adds a new event with all corresponding values to the database 
    $json = array();
    $result = $myapp->postQuery($sql);
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];
    
    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. A new event has not been addded.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. A new event has been added successfully.";
    }
    $res->json($json);
});

$myapp->post("/users/add", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $var = implode(", ", $req->body);
    $sql ="INSERT INTO users(uid,fname,lname,email,phone,position,password) VALUES (NULL, {$var})"; //adds a new user with all corresponding values to the database 
    $json = array();
    $result = $myapp->postQuery($sql);
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];
    
    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. A new user has not been addded.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. A new user has been added successfully.";
    }
    $res->json($json);
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
    }else{
        $json['status'] = true;
        $json['message'] = "Success. A sponsor was deleted successfully.";
    }
    $res->json($json);
});

$myapp->post("/prizes/delete", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="DELETE FROM prizes WHERE pid = {$req->body['id']}"; //adds a new prize with all corresponding values to the database 
    $json = array();
    $result = $myapp->postQuery($sql);
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Prize has not been deleted.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Prize has been deleted successfully.";
    }
    $res->json($json);
});

$myapp->post("/judges/delete", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="DELETE FROM judges WHERE jid = {$req->body['id']}"; //adds a new judge with all corresponding values to the database 
    $json = array();
    $result = $myapp->postQuery($sql);
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Judge has not been deleted.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Judge has been deleted successfully.";
    }
    $res->json($json);
});

$myapp->post("/events/delete", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="DELETE FROM events WHERE eid = {$req->body['id']}"; //adds a new event with all corresponding values to the database 
    $json = array();
    $result = $myapp->postQuery($sql);
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. Event has not been deleted.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. Event has been deleted successfully.";
    }
    $res->json($json);
});

$myapp->post("/users/delete", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="SET foreign_key_checks = 0";
    $result = $myapp->postQuery($sql);
    $sql ="DELETE FROM users WHERE uid = {$req->body['id']}"; //adds a new user with all corresponding values to the database 
    $json = array();
    $result = $myapp->postQuery($sql);
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];

    if($result['error'][0]!="00000"){
        $json['status'] = false;
        $json['message'] = "Failure. User has not been deleted.";
    }else{
        $json['status'] = true;
        $json['message'] = "Success. User has been deleted successfully.";
    }
    $sql ="SET foreign_key_checks = 1";
    $result = $myapp->postQuery($sql);
    $json['error2'] = $result['error'];
    $res->json($json);
});

/*
EDITING TABLES:


*/
$myapp->post("/users/edit", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="SELECT * from users WHERE uid = {$req->body['id']}";
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];
    if (empty($result['result'])){
        $json['status'] = false;
        $json['message'] = "Failure. This user does not exist.";
    }else{
        $sql ="UPDATE users SET {$req->body['columnName']} = {$req->body['value']} WHERE uid = {$req->body['id']}"; //edits the user table based on a column name and their id
        $result = $myapp->postQuery($sql);
        $json['string'] = $result['string'];
        $json['error'] = $result['error'];
        if($result['error'][0]!="00000"){
            $json['status'] = false;
            $json['message'] = "Failure. A user has not been edited.";
        }else{
            $json['status'] = true;
            $json['message'] = "Success. A user has been edited successfully.";
        }
    }
    $res->json($json);
});

$myapp->post("/sponsors/edit", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="SELECT * from sponsors WHERE sid = {$req->body['id']}";
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];
    if (empty($result['result'])){
        $json['status'] = false;
        $json['message'] = "Failure. This sponsor does not exist.";
    }else{
        $sql ="UPDATE sponsors SET {$req->body['columnName']} = {$req->body['value']} WHERE sid = {$req->body['id']}"; //adds a new prize with all corresponding values to the database 
        $result = $myapp->postQuery($sql);
        $json['string'] = $result['string'];
        $json['error'] = $result['error'];

        if($result['error'][0]!="00000"){
            $json['status'] = false;
            $json['message'] = "Failure. A sponsor has not been edited.";
        }else{
            $json['status'] = true;
            $json['message'] = "Success. A sponsor has been edited successfully.";
        }
    }
    $res->json($json);
});

$myapp->post("/prizes/edit", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="SELECT * from prizes WHERE pid = {$req->body['id']}";
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];
    if (empty($result['result'])){
        $json['status'] = false;
        $json['message'] = "Failure. This prize does not exist.";
    }else{
        $sql ="UPDATE prizes SET {$req->body['columnName']} = {$req->body['value']} WHERE pid = {$req->body['id']}"; //adds a new prize with all corresponding values to the database 
        $result = $myapp->postQuery($sql);
        $json['string'] = $result['string'];
        $json['error'] = $result['error'];

        if($result['error'][0]!="00000"){
            $json['status'] = false;
            $json['message'] = "Failure. A prize has not been edited.";
        }else{
            $json['status'] = true;
            $json['message'] = "Success. A prize has been edited successfully.";
        }
    }
    $res->json($json);
});

$myapp->post("/events/edit", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="SELECT * from events WHERE eid = {$req->body['id']}";
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];
    if (empty($result['result'])){
        $json['status'] = false;
        $json['message'] = "Failure. This event does not exist.";
    }else{
        $sql ="UPDATE events SET {$req->body['columnName']} = {$req->body['value']} WHERE eid = {$req->body['id']}"; //adds a new prize with all corresponding values to the database 
        $result = $myapp->postQuery($sql);
        $json['string'] = $result['string'];
        $json['error'] = $result['error'];

        if($result['error'][0]!="00000"){
            $json['status'] = false;
            $json['message'] = "Failure. An event has not been edited.";
        }else{
            $json['status'] = true;
            $json['message'] = "Success. An event has been edited successfully.";
        }
    }
    $res->json($json);
});

$myapp->post("/judges/edit", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql ="SELECT * from judges WHERE jid = {$req->body['id']}";
    $result = $myapp->getQuery($sql);
    $json = array();
    $json['string'] = $result['string'];
    $json['error'] = $result['error'];
    if (empty($result['result'])){
        $json['status'] = false;
        $json['message'] = "Failure. This judge does not exist.";
    }else{
        $sql ="UPDATE judges SET {$req->body['columnName']} = {$req->body['value']} WHERE jid = {$req->body['id']}"; //adds a new prize with all corresponding values to the database 
        $result = $myapp->postQuery($sql);
        $json['string'] = $result['string'];
        $json['error'] = $result['error'];

        if($result['error'][0]!="00000"){
            $json['status'] = false;
            $json['message'] = "Failure. A judge has not been edited.";
        }else{
            $json['status'] = true;
            $json['message'] = "Success. A judge has been edited successfully.";
        }
    }
    $res->json($json);
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
    } else{
        $json['status'] = true;   
        $json['message'] = "Success. Login Check succeeded.";
    }
    $res->json($json);
});

$myapp->post("/applications/accept", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
	$sql = "UPDATE applications SET status = 1 WHERE aid = {$req->body['id']}"; //change status of applicant to accepted
    $json = array();
    $result = $myapp->getQuery($sql);
    $json['result']=$result['result'];
    $json['error'] = $result['error'];

    if ($result['error'][0]!="00000") {
        $json['status'] = false;
        $json['message'] = "Failure. Accept procedure failed."; 
    } else{
        $json['status'] = true;   
        $json['message'] = "Success. Accept procedure succeeded.";
    }
    $res->json($json);
});

$myapp->post("/applications/decline", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
	$sql = "UPDATE applications SET status = 2 WHERE aid = {$req->body['id']}"; //change status of applicant to decline
    $json = array();
    $result = $myapp->getQuery($sql);
    $json['result']=$result['result'];
    $json['error'] = $result['error'];

    if ($result['error'][0]!="00000") {
        $json['status'] = false;
        $json['message'] = "Failure. Decline procedure failed."; 
    } else{
        $json['status'] = true;   
        $json['message'] = "Success. Decline procedure succeeded.";
    }
    $res->json($json);
});

$myapp->post("/applications/skip", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
	$sql = "UPDATE applications SET status = 0 WHERE aid = {$req->body['id']}"; //change status of applicant to skip
    $json = array();
    $result = $myapp->getQuery($sql);
    $json['result']=$result['result'];
    $json['error'] = $result['error'];

    if ($result['error'][0]!="00000") {
        $json['status'] = false;
        $json['message'] = "Failure. Skip procedure failed."; 
    } else{
        $json['status'] = true;   
        $json['message'] = "Success. Skip procedure succeeded.";
    }
    $res->json($json);
});



$myapp->post("/insert/", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql = "INSERT INTO". $req->body['tableName']." VALUES (" . implode(",",$req->body['values']) .");";
});

$myapp->post("/edit/", function(REST\Request $req, REST\Response $res, REST\ App $myapp) {
    $sql = "UPDATE " .$req->body['tableName'] ." SET ".$req->body['columnName']."=".$req->body['value']."WHERE". $req->body['idType']."=".$req->body['id'];
});
$myapp->start();


?>
