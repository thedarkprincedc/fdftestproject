<?php
//$json = file_get_contents("dummy.json");
//$data = json_decode($json, TRUE);
//print_r($data);
$variable = array();
$variable[] = array("topic" => "fwefwefw", "hours" => 6, "date" => "10/23/2001");
$variable[] = array("topic" => "fwefwefw", "hours" => 6, "date" => "10/23/2001");
$variable[] = array("topic" => "fwefwefw", "hours" => 6, "date" => "10/23/2001");
$variable[] = array("topic" => "fwefwefw", "hours" => 6, "date" => "10/23/2001");
$variable[] = array("topic" => "fwefwefw", "hours" => 6, "date" => "10/23/2001");
$variable1 = array();
$variable2 = array();
foreach ($variable as $key => $value) {
	if ($key % 2) {
		$variable2[] = $value;
	} else {
		$variable1[] = $value;
	}
}

for($i=0; $i<(count($variable1)+1)-count($variable2)+1; $i++){
	$variable2[] = array("topic" => "&nbsp;", "hours" => "&nbsp;", "date" => "&nbsp;");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>HTML5 boilerplate – all you really need…</title>
		<link rel="stylesheet" href="css/style.css">
		<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<style>
			@media screen {
				body {
					padding-left: 20%;
					padding-right: 20%;
				}
			}
			@media print {
				body {
					-webkit-print-color-adjust: exact;
				}
			}
			@media print, screen {
				body {
					font-family: Arial, Helvetica, sans-serif;
					font-size: 10pt;
				}
				.heading {
					display: block;
					background-color: black !important;
					color: white;
				}
				table {
					border-collapse: collapse;
				}
				table, th, tr, td {
					border: 1px solid black;
				}
				table tr td:nth-child(2) {
					text-align: center;
				}

			}
		</style>
	</head>

	<body>
		<div class="heading">
			<b>&nbsp;CPR Certification &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*A Copy of Current Card (front and back) MUST Accompany This Application*</b>
		</div><br/>
		<div class="heading">
		<b>&nbsp;Additional 24 Hours of Continuing Education - Must include mandatory National EMT Standards</b>
		</div><br/>
		
		<div style="width:100%">
			<div style="width:50%;float: left;">
				<table class="contedu">
					<thead><tr><th width="300px">Topic</th><th>Hours</th><th>Date</th></tr>
					</thead>
					<tbody>
						<tr>
							<td>EMT National Standards Update</td>
							<td>3</td>
							<td></td>
						</tr>
						<?php foreach ($variable1 as $key => $value): ?>
						<tr>
							<td><?php print($value["topic"]); ?></td>
							<td><?php print($value["hours"]); ?></td>
							<td><?php print($value["date"]); ?></td>
						</tr>
						<?php  endforeach; ?>
					</tbody>
					<tfoot></tfoot>
				</table>
						
			</div>
			<div style="width:50%;float: left;">
				
				<table  class="contedu">
					<thead><tr><th width="300px">Topic</th><th>Hours</th><th>Date</th></tr>
								 <colgroup>
    <col style="width:.2em;">
    <col style="width:.1em;">
    <col style="width:.1em;">
  </colgroup>
					</thead>
					<tbody>
						
						<?php foreach ($variable2 as $key => $value): ?>
						<tr>
							<td><?php print($value["topic"]); ?></td>
							<td><?php print($value["hours"]); ?></td>
							<td><?php print($value["date"]); ?></td>
						</tr>
						<?php  endforeach; ?>
					</tbody>
					<tfoot></tfoot>
				</table>
				
			</div>
			<div style="clear: left;"></div>
	</div><br/>
		<div class="heading">
			<b>&nbsp;Skill Competency Verification</b>
		</div><br/>
		<table>
			<thead>
				<tr>
					<th>Skill</th>
					<th>QA/QI</th>
					<th>Direct Observation</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Patient Assessment (Medical and Trauma)</td><td></td><td></td>
				</tr>
				<tr>
					<td>Airway / Ventilation (Simple Adjuncts, Supplemental Oxygen Delivery, Bag Valve-Mask one and
two rescuer)</td><td></td><td></td>
				</tr>
				<tr>
					<td>Hemorrhage Control and Splinting (long bone injury, joint injury, and traction splinting)
</td><td></td><td></td>
				</tr>
				<tr>
					<td>Spinal Immobilization (Seated and Supine)</td><td></td><td></td>
				</tr>
				<tr>
					<td>Cardiac Arrest / Automatic External Defibrillator (AED)</td><td></td><td></td>
				</tr>
			</tbody>
			<tfoot></tfoot>
		</table>
		
		
	
		
		<p style="font-size: .75em;">As the Physician Medical Director or Training Officer for the Participant's Continuing Education Program I hereby affix my signature attesting to
proficiency in all skills outlined above. </p>
<div style="width: 100%;">
	

	<div style="width:30%; float: left; padding-left: 3%;">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<hr>
		<p style="font-size: .75em;">Printed Name of Medical Director / Training Officer</p><br/>
	</div>

	<div style="width:30%; float: left; padding-left: 3%;">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<hr>
		<p style="font-size: .75em;">Signature of Medical Director / Training Officer</p><br/>
	</div>
	<div style="width:30%; float: left; padding-left: 3%;">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<hr>
		<p style="font-size: .75em;">Date</p><br/>
	</div>
	<div style="clear: left;"></div>
</div>
<hr>
<p style="font-size: .75em;">
	I hereby affirm that all statements on this recertification form are true and correct, including all copies of cards, certificates and other required verification.
It is understood that false statements or documents submitted with the intent to falsely recertify may be grounds for revocation of certification and
applicable civil and criminal penalties. It is also understood that the Bureau of Emergency Medical Services or its designee may conduct an audit of the
activities listed herein at any time. This form must be mailed and postmarked no less than 45 days prior to your current expiration date!
</p>
<div style="width: 100%;">
	

	<div style="width:40%; float: left; padding-left: 5%;">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<hr>
		<p style="font-size: .75em;">Signature of Participant</p><br/>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<hr>
		<p style="font-size: .75em;">Date</p>
	</div>

	<div style="width:40%; float: left; padding-left: 5%;">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<hr>
		<p style="font-size: .75em;">Signature of Sponsoring Agency Contact / Coordinator</p><br/>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<hr>
		<p style="font-size: .75em;">Date</p>
	</div>
	<div style="clear: left;"><p>DOH-5065 (06/12)</p></div>
</div>
	</body>
</html>