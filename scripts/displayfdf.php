<?php
$request = (!empty($_REQUEST))?$_REQUEST:null;
$filename = (!empty($request["filename"]))?$request["filename"]:FALSE;

if($filename){
	
	header("Content-type: application/pdf");
	header("Content-Disposition: inline; filename={$filename}");
	@readfile("../temp/{$filename}");
}
else{
	print("Could not open file");
}
?>