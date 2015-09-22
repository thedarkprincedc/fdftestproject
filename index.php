<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">

		<title>FDFPrototype</title>
		<meta name="description" content="The HTML5 Herald">
		<meta name="author" content="SitePoint">
		<!-- DataTables CSS -->
		<link rel="stylesheet" type="text/css" href="js/DataTables-1.10.9/media/css/jquery.dataTables.css">
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
				<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		
<style>
	.alncenter { text-align: center; }
	
	h1{
		font-size: 18pt;
	}
	h2{
		font-size: 12pt;
	}
	h3{
		font-size: 10pt;
	}
	body{
		font-size: 8pt;
	}
</style>
	</head>

	<body>
		<div class="container">

		<form class="form-horizontal">
		<h2>EMT Recertification Forms</h2>
		
		<div id="info"></div>
		</form>
		<br/>
		<br/>
		<table id="table_id" class="display">
			<thead>
				<tr>
					<th>Name</th>
					<th>Link</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		</div>
		<script src="js/jquery-1.11.3.min.js"></script>
		
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<!-- jQuery -->

		<!-- DataTables -->

		<script type="text/javascript" charset="utf8" src="js/DataTables-1.10.9/media/js/jquery.dataTables.js"></script>
		<script>
			$(document).ready(function() {
				
				var showform = function(){
					$.post("scripts/createfdf.php?form=emt&year=2015", {
						"data" : emtdata
					}).then(function(msg) {
						window.open("scripts/displayfdf.php?filename="+msg.filename);
						//setTimeout(function(){
							
							
						//}, 2000);
						console.log(msg);
						//debugger;
					});
				};
				
				$("body").on("click", "#paramedic_form", showform);
				$("body").on("click", "#emt_form", showform);
				
				$('#table_id').DataTable({
					data : [["2015 Paramedic Recertification Packet", "<a href='#' id='paramedic_form'>PDF</a>,&nbsp;<a href='../fdfprototype/scripts/paramedic_cert_print.php'>Web</a>"], 
					["2015 EMT Recertification Packet", "<a href='#' id='emt_form'>PDF</a>,&nbsp;<a href='../fdfprototype/scripts/emt_cert_print.php'>Web</a>"]]
				});
				
				var emtdata = {
					"userinfo" : [
						{
						"username" : "bmosley",
						"fname" : "Brett",
						"lname" : "Mosley",
						"mi" : "T",
						"ssn" : "579234567",
						"address" : "2611 Franklin Street NE",
						"city" : "Washington",
						"state" : "DC",
						"zipcode" : "20018",
						"agencycode" : "12345",
						"emtnumber" : "22032"
						}
					],
					"skills" : [{
						"name" : "Patient Assessment (Medical and Trauma)",
						"qa" : 5,
						"do" : 5
					}, {
						"name" : "Airway/Ventilation (Simple Adjuncts, Advanced Adjuncts, Supplemental Oxygen Delivery, Bag Valve-Mask – one and two rescuer)",
						"qa" : 5,
						"do" : 5
					}, {
						"name" : "Cardiac Arrest Management (Therapeutic Modalities, Megacode, Monitor/Defibrillator Knowledge)",
						"qa" : 5,
						"do" : 5
					}, {
						"name" : "Hemorrhage Control & Splinting (long bone injury, joint injury, and traction splinting)",
						"qa" : 5,
						"do" : 5
					}, {
						"name" : "IV Therapy / Medication Administration",
						"qa" : 5,
						"do" : 5
					}, {
						"name" : "Spinal Immobilization (Seated and Supine)",
						"qa" : 5,
						"do" : 5
					}],
					"training" : [
						{
							"name" : "Preparatory",
							"id" : "preparatory",
							"required" : 6,
							"hours_earned" : "6",
							"cic_initials" : ""
						},
						{
							"name" : "Airway Management & Ventilation",
							"id" : "airways",
							"required" : 6,
							"hours_earned" : "6",
							"cic_initials" : ""
						},{
							"name" : "Trauma",
							"id" : "trauma",
							"required" : 10,
							"hours_earned" : "10",
							"cic_initials" : ""
						},{
							"name" : "Medical (see sub categories)",
							"list" : [
								{
									"name" : "Pulmonary and Cardiology",
									"id" : "pulmonary",
									"required" : 6,
									"hours_earned" : "7",
									"cic_initials" : ""
								},{
									"name" : "Neurology/Endocrinology/Allergies & Anaphylaxis",
									"id" : "neurology",
									"required" : 3,
									"hours_earned" : "10",
									"cic_initials" : ""
								},{
									
									"name" : "Gastroentaerology/Renal & Urology/Toxicology/Hematology", 
									"id" : "gastro",
									"required" : 3,
									"hours_earned" : "3",
									"cic_initials" : ""					
								},{
									"name" : "Environmental Conditions/Infectious & Communicable Diseases/Behavioral", 
									"id" : "environmental",
									"required" : 3,
									"hours_earned" : "3",
									"cic_initials" : ""
									
								},{
									"name" : "Gynecology and Obstetrics",
									"id" : "gynecology", 
									"required" : 3,
									"hours_earned" : "3",
									"cic_initials" : ""
								}
								
							]
						},{
							"name" : "Special Considerations (see sub categories)",
							"list" : [
								{
									"name" : "Neonatology and Pediatrics", 
									"id" : "neonatology", 
									"required" : 3, 
									"hours_earned" : "3",
									"cic_initials" : ""
								},
								{
									"name" : "Abuse and Assault",
									"id" : "abuse",  
									"required" : 1,
									"hours_earned" : "1",
									"cic_initials" : ""
								},
								{
									"name" : "Patients w/Special Challenges & Acute Interventions for Chronic Care Patients", 
									"id" : "specialchallenges", 
									"required" : 2,
									"hours_earned" : "2",
									"cic_initials" : ""
								},
								{
									"name" : "Operations", 
									"id" : "operations", 
									"required" : 2, 
									"hours_earned" : "2",
									"cic_initials" : ""
								}
							]
						}
					],
					"Education" : []

				};
				var retString = "";
				$.each(emtdata, function($ind, $val){
					if(!Array.isArray($val)){
						retString += $ind + ": " + $val + "<br/>";
					}
					else{
						var arr = "";
						if($ind == "userinfo"){
							$.each($val[0], function(ind,val){
								 arr += "<tr>";
								 arr += "<td>" + ind + "</td>";
								 arr += "<td>" + val + "</td>"
								 arr += "</tr>";
							});
							retString += "<h2>Information</h2><div class='col-xs-6'><h2>User Info</h2><table class='table table-striped'><thead><tr><th>Name</th><th>Value</th></tr></thead><tbody>"+arr+"</tbody></table></div>";
						}
						if($ind == "skills"){
							 arr = "";
							$.each($val, function(ind,val){
								 arr += "<tr>";
								 arr += "<td>" + val.name + "</td>";
								 arr += "<td class='alncenter'>" + val.qa + "</td>";
								 arr += "<td class='alncenter'>" + val.do + "</td>";
								 arr += "</tr>";
							});
							retString += "<div class='col-xs-6'><h2>Skills</h2><table class='table table-striped'><thead><tr><th>Skills</th><th>QA</th><th>Direct Observation</th></tr></thead><tbody>"+arr+"</tbody></table></div>";
						}
						if($ind == "training"){
							
							//training
							var arr = "";
							var arr2 =[];
							$.each($val, function(ind,val){
								var required = (typeof(val.list) === "undefined") ? val.required : "";
								var earned = (typeof(val.list) === "undefined") ? val.hours_earned : "";
								var color = ((required - earned) == 0) ? "green" 
										: ((earned - required) > 0) ? "green" : "red";
								
								if(typeof(val.list) === "undefined"){
									earned = (earned !== "") ? earned : 0; 
									
									 arr += "<tr style='color:"+color+";'>";
									 arr += "<td>" + val.name + "</td>";
									 arr += "<td class='alncenter'>" + required + "</td>";
									 arr += "<td class='alncenter'>" + earned + "</td>";							
									 arr += "</tr>";
								}
								else{
									arr += "<tr>";
									 arr += "<td>" + val.name + "</td>";
									 arr += "<td class='alncenter'>" + required + "</td>";
									 arr += "<td class='alncenter'>" + earned + "</td>";							
									 arr += "</tr>";
									 
									$.each(val.list, function(inda,vala){
										var required = (typeof(vala.list) === "undefined") ? vala.required : "";
										var earned = (typeof(vala.list) === "undefined") ? vala.hours_earned : "" ;
										earned = (earned !== "") ? earned : 0;
										var color = ((required - earned) == 0) ? "green" 
										: ((earned - required) > 0) ? "green" : "red";
										
										if((earned - required) > 0){
											
											arr2.push({date : "10/21/2015", topic : vala.name, hours: (earned - required)});
											earned = required + "+";
										}
										arr += "<tr style='color:"+color+";'>";
										 arr += "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + vala.name + "</td>";
										 arr += "<td class='alncenter'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + required + "</td>";
										 arr += "<td class='alncenter'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + earned + "</td>";							
										 arr += "</tr>";
									});
									
								}
								
							});
							retString += "<div class='col-xs-6'><h2>Training</h2><table class='table table-striped'><thead><tr><th><br/>Skills</th><th>Required</th><th>Hours Earned</th></tr></thead><tbody>"+arr+"</tbody><tfoot><tr><td></td><td></td><td>Total: </td></tr></tfoot></table></div>";
							// education
							arr = "";
							
							$.each(arr2, function(ind,val){
								arr += "<tr>";
								arr += "<td>"+val.date+"</td>";
								arr += "<td>"+val.topic+"</td>";
								arr += "<td>"+val.hours+"</td>";
								arr += "</tr>";
							});
							retString += "<div class='col-xs-6'><h2>Education</h2><table class='table table-striped'><thead><tr><th>Date</th><th>Topic</th><th>Hours</th></tr></thead><tbody>"+arr+"</tbody></table></div>";
						}
						/*if($ind == "education"){
							$.each($val, function(ind,val){
								if(typeof(val.list) === "undefined"){
									
								}
								else{
									arr += "<tr>";
									arr += "<td>" + val.name + "</td>";
									arr += "<td class='alncenter'>" + required + "</td>";
									arr += "<td class='alncenter'>" + earned + "</td>";							
									arr += "</tr>";
								}
							});
							
						}*/
					}
					
				});
				$("#info").html(retString);
			});

		</script>
	</body>
</html>