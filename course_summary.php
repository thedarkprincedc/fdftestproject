<?php
	//$json = file_get_contents("endpoints/coursesummarydummy.json");
	//print($json);
	$json = file_get_contents("http://localhost:8888/fdftestproject/endpoints/index.php?action=getCourseSummary");
	//print($json);
	$data = json_decode($json, TRUE);
	//print_r($data);
	$variable1 = $data["data"];
	$fullname = "Brett Mosley";
	$date = "10/23/1932";
?>
<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">

		<title><?php print("EMSPlumbline - Course Summary for {$fullname} "); ?></title>
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
			<h2><?php print("Course Summary for {$fullname} {$date}"); ?></h2>
			<table class="table table-striped">
				<thead>
				<tr>
					<th>Course Title</th>
					<th>Course Completion Date</th>
					<th>Applicable NYS Division(s)</th>
					<th>Hours of Core Content</th>
					<th>Hours of Non-Core Content</th>
					<th>Credit / Clock / Classroom Hours</th>
					<th>Format of Training</th>
					<th>State Required Minimums for Core Content</th>
				</tr>
				</thead>
				<tbody>
					<?php foreach ($variable1 as $key => $value): ?>
					<tr>
						<td><?php print($value["name"]); ?></td>
						<td><?php print($value["completion_date"]); ?></td>
						
						<?php
							$divisions  = "";
							$hourscc = "";
							$hoursnoncc = "";
							foreach ($value["division"] as &$value2) {
								$divisions .= "{$value2["name"]}<br/>";
								$hourscc .= "{$value2["hoursofcc"]}<br/>";
								$hoursnoncc .= "{$value2["hoursofnoncc"]}<br/>";
							}
							print("<td>{$divisions}</td><td>{$hourscc}</td><td>{$hoursnoncc}</td>");
						?>
						<td><?php print($value["classhours"]); ?></td>
						<td><?php print($value["format"]); ?></td>
						<td><?php print($value["state_minimums"]); ?></td>
					</tr>
					<?php  endforeach; ?>
				</tbody>
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