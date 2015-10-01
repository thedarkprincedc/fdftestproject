<?php
	$filename = "dummy.json";
	if(!is_file($filename)){
		print("Error: Couldnt open file");
		die();
	}
	$content = file_get_contents($filename);
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