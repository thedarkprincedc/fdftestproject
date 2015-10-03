<?php
	//$json = file_get_contents("endpoints/certsummarydummy.json");
	//$data = json_decode($json, TRUE);
	//	print_r($data);
	$json = file_get_contents("http://{$_SERVER[HTTP_HOST]}/fdftestproject/endpoints/index.php?action=getCertCourseSummary");
	$data = json_decode($json, TRUE);
	$date = $data["date"];
	$variable1 = $data["data"];
	$name = "Brett Mosley";
	//$variable1[] = array("name" => "frffr", "nysrequirement" => 10);
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php print("EMSPlumbline Full Summary - {$name}"); ?></title>
		<meta name="description" content="The HTML5 Herald">
		<meta name="author" content="SitePoint">
		<!-- DataTables CSS -->
		<link rel="stylesheet" type="text/css" href="js/DataTables-1.10.9/media/css/jquery.dataTables.css">
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="js/bootstrap-3.3.5-dist/css/bootstrap.min.css">		
		<!-- Optional theme -->
		<link rel="stylesheet" href="js/bootstrap-3.3.5-dist/css/bootstrap-theme.css">	
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="container">
			<h2 class="alcenter"> <?php print("Certification Summary for {$name}<br/> Cert. Date: {$date}"); ?></h2>
			<table class="table table-striped">
				<thead>
				<tr>
					<th>Division</th>
					<th>NYS Requirements</th>
					<th>Core Content Not Accomplished</th>
					<th>Achieved Core</th>
					<th>Achieved Non-Core</th>
					<th>Rejected by System</th>
				</tr>
				</thead>
				<tbody>
					
					<?php foreach ($variable1 as $key => $value): ?>
					<tr>
						<td><?php print($value["name"]); ?></td>
						<td><?php print($value["requirement"]); ?></td>
						<td><?php print($value["content_notcompleted"]); ?></td>
						<td><?php print($value["content_completed"]); ?></td>
						<td><?php print($value["noncore_content_completed"]); ?></td>
						<td><?php print($value["rejected_content"]); ?></td>
						<?php 
							$ttlRequirment+=$value["requirement"];
							$ttlNotCompleted+=$value["content_notcompleted"];
							$ttlCompleted+=$value["content_completed"];
							$ttlNonCore+=$value["noncore_content_completed"];
							$ttlRejected+=$value["rejected_content"];
						?>
					</tr>
					<?php  endforeach; ?>
				</tbody>
				<tfoot>
					<tr>
						<td>Core</td>
						<td><?php print($ttlRequirment); ?></td>
						<td><?php //print($ttlNotCompleted); ?></td>
						<td><?php //print($ttlCompleted); ?></td>
						<td><?php print($ttlNonCore); ?></td>
						<td><?php print($ttlRejected); ?></td>
					</tr>
					<tr>
						<td>Non-Core</td>
						<td><?php print($ttlNYSRequirment); ?></td>
						<td><?php print($ttlNYSRequirment); ?></td>
						<td><?php print($ttlNYSRequirment); ?></td>
						<td><?php //print($ttlNYSRequirment); ?></td>
						<td><?php //print($ttlNYSRequirment); ?></td>
					</tr>
				</tfoot>
			</table>
		</div>
		<script src="js/jquery-1.11.3.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="js/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
		<!-- jQuery -->
		<!-- DataTables -->
		<script type="text/javascript" charset="utf8" src="js/DataTables-1.10.9/media/js/jquery.dataTables.js"></script>

	</body>
</html>