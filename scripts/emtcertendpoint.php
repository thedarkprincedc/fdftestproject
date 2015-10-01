<?php

/*$req = array_map(function($val,$ind){
	return array($ind => $val);
}, $_REQUEST);
$action = (!empty($_REQUEST['action']))?$_REQUEST['action']:null;
switch($action){
	case "getuserinfo": getUserInfo($_REQUEST); break;
}*/
$content = file_get_contents("dummy.json");
$jsonContent = json_decode($content);
if(!($retVal = call_user_func($_REQUEST["action"], $_REQUEST, $jsonContent))){
	print("Error: couldnt call the current action '{$_REQUEST["action"]}'<br/>");
}
else{
	header('Content-Type: application/json');
	print(json_encode($retVal, JSON_PRETTY_PRINT));
}

function getUserInfo($request, $jsonContent){
	$username = (!empty($request["username"])) ? $request["username"] : FALSE;
	return $jsonContent->userinfo[0];
}

function getSkills($request, $jsonContent){
	return $jsonContent->skills;
}
function getTraining($request, $jsonContent){
	return $jsonContent->training;
}
function getEducation($request, $jsonContent){
	return $jsonContent->educations;
}
?>