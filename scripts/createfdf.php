<?php
	ini_set("display_errors", "1");
	error_reporting(E_ALL);
	
	//contedu_hours1 contedu_date1 contedu_topic1
	function createXFDF($file, $info, $enc = 'UTF-8'){
		$data = '<?xml version="1.0" encoding="' . $enc . '"?>' . "\n" . '<xfdf xmlns="http://ns.adobe.com/xfdf/" xml:space="preserve">' . "\n" . '<fields>' . "\n";
		foreach ($info as $field => $val) {
			$data .= '<field name="' . $field . '">' . "\n";
			if (is_array($val)) {
				foreach ($val as $opt)
					$data .= '<value>' . htmlentities($opt, ENT_COMPAT, $enc) . '</value>' . "\n";
			} else {
				$data .= '<value>' . htmlentities($val, ENT_COMPAT, $enc) . '</value>' . "\n";
			}
			$data .= '</field>' . "\n";
		}
		$data .= '</fields>' . "\n" . '<ids original="' . md5($file) . '" modified="' . time() . '" />' . "\n" . '<f href="../' . $file . '" />' . "\n" . '</xfdf>' . "\n";
		return $data;
	}
	function flattenPDF($pdf_template_path, $xfdf_file_path, $pdf_name){
		$command = "/opt/pdflabs/pdftk/bin/pdftk {$pdf_template_path} fill_form {$xfdf_file_path} output {$pdf_name} flatten";
		//print($command);
		exec( $command );
		//print_r($output);
		//pdftk ../data/doh-4231_paramedic_recert.pdf fill_form 1442528895.xfdf output test.pdf flatten
		//$file = "pdftk {$inputPDFTemplate} fill_form {$inputFDFFile} output {$outputFileName} flatten";
		return true;
	}
	function recursiveFunct($data){
		$arr = array();
		$stack = array();
		array_push($stack, $data);
		$overflowcount = 1;
		while (count($stack) > 0) {
			$curr = array_pop($stack);
			if(!empty($curr["id"])){
				$arr[$curr["id"]]=($curr["hours_earned"]>0)?$curr["hours_earned"]:0;
				$re = (($curr["hours_earned"] - $curr["required"]) > 0) ? ($curr["hours_earned"] - $curr["required"]) : 0;
				if($re > 0){
					
					$arr["contedu_topic{$overflowcount}"] = $curr["name"];
					$arr["contedu_hours{$overflowcount}"] = $curr["hours_earned"] - $curr["required"];
					$arr[$curr["id"]] = $curr["required"];
					$overflowcount++;
				}
			}
			
			foreach ($curr as $key => $value) {
				if(is_array($value)){
					array_push($stack, $value);
				}
			}
		}
		return $arr;
	}
	
	$files = array("emt" => "", "paramedic" => "doh-4231_paramedic_recert.pdf"); 
	$data = (!empty($_REQUEST["data"])) ? $_REQUEST["data"] : null;
	$getvars = (!empty($_GET)) ? $_GET : null;
	$tes = array();
	
	$arre = recursiveFunct($data);
	//print_r($arre);
	// die();
	$data = array_merge($arre, $data["userinfo"][0]);
	$data["ss1"] = substr($data["ssn"], 0,3);
	$data["ss2"] = substr($data["ssn"], 3,2);
	$data["ss3"] = substr($data["ssn"], 5,4);
	
	$retData = array();
	if($data){
		$retData = $data;
			
		if($getvars["form"] == "emt"){
			$filenm = "data/{$files["paramedic"]}";
			$xfdf = createXFDF($filenm,$data);
		
			$result_directory = dirname(__FILE__) . '/';
			$xfdf_file = time() . '.xfdf';
			$xfdf_file_path = $result_directory . '/' . $xfdf_file;
			
			if( $fp = fopen( $xfdf_file_path, 'w' ) )
			{
			    fwrite( $fp, $xfdf, strlen( $xfdf ) );
			}
			fclose($fp);
			
			flattenPDF("../".$filenm,$xfdf_file,str_replace(".xfdf", ".pdf", "../temp/".$xfdf_file));
			$retData["filename"] =str_replace(".xfdf", ".pdf", $xfdf_file); //"http://{$_SERVER['HTTP_HOST']}/fdfprototype/scripts/{$xfdf_file}";
		}
	}
	header('Content-Type: application/json');
	print(json_encode($retData));
?>