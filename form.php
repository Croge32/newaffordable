<?php
include ('vendor/autoload.php');
if(isset( $_POST['submit'] ) ) {
	$sendgrid = new SendGrid('croge32', 'Cr12345432123454321');

	$email = new SendGrid\Email();

	$name = $phoneNumber = $city = $address = $zipCode = "";
	$brand = $modelNumber = $year = $mounted = $optionsRadios = $symptom = "";
	$errors = array();

	if(!isset($_REQUEST['name']) || strlen(trim($_REQUEST['name'])) == 0){
    	array_push($errors, "no name provided");
	} else {
		$name = $_REQUEST['name'];
	}

	if(!isset($_REQUEST['phoneNumber']) || strlen(trim($_REQUEST['phoneNumber'])) == 0){
    	array_push($errors, "no phone number provided");
	} else {
		$phoneNumber = $_REQUEST['phoneNumber'];
	}

	if(!isset($_REQUEST['city']) || strlen(trim($_REQUEST['city'])) == 0){
    	array_push($errors, "no city provided");
	} else {
		$city = $_REQUEST['city'];
	}

	if(!isset($_REQUEST['address']) || strlen(trim($_REQUEST['address'])) == 0){
    	array_push($errors, "no address provided");
	} else {
		$address = $_REQUEST['address'];
	}

	if(!isset($_REQUEST['zipCode']) || strlen(trim($_REQUEST['zipCode'])) == 0){
    	array_push($errors, "no zip code provided");
	} else {
		$zipCode = $_REQUEST['zipCode'];
	}

	if(!isset($_REQUEST['brand']) || strlen(trim($_REQUEST['brand'])) == 0){
    	array_push($errors, "no brand provided");
	} else {
		$brand = $_REQUEST['brand'];
	}

	if(!isset($_REQUEST['modelNumber']) || strlen(trim($_REQUEST['modelNumber'])) == 0){
    	array_push($errors, "no model number provided");
	} else {
		$modelNumber = $_REQUEST['modelNumber'];
	}

	if(!isset($_REQUEST['year']) || strlen(trim($_REQUEST['year'])) == 0){
    	array_push($errors, "no year provided");
	} else {
		$year = $_REQUEST['year'];
	}

	if(!isset($_REQUEST['symptom']) || strlen(trim($_REQUEST['symptom'])) == 0){
    	array_push($errors, "no symptoms provided");
	} else {
		$symptom = $_REQUEST['symptom'];
	}

	if($_REQUEST['mounted'] == true) {
		$mounted = "Mounted";
	} else {
		$mounted = "Not Mounted";
	}

	if($_REQUEST['optionsRadios'] == "radioSuddenly") {
		$optionsRadios = "Went out suddenly";
	} else {
		$optionsRadios = "Acted Up";
	}

	if (count($errors) != 0) {
		echo "There are errors with form: ";
		foreach ($errors as $error) {
			echo "<p>$error</p>";
		}
	} else {
		$ticket = "<p>Name: $name</p>
				<p>Phone Number: $phoneNumber</p>
				<p>City: $city</p>
				<p>Address: $address</p>
				<p>ZIP: $zipCode</p>
				<p>Brand: $brand</p>
				<p>Model Number: $modelNumber</p>
				<p>Year: $year</p>
				<p>Mounted: $mounted</p>
				<p>Sudden: $optionsRadios</p>
			   	<p>Symptoms: $symptom</p>";

		$email->addTo('croge32@gmail.com')->
		       setFrom('foo@bar.com')->
		       setSubject('Ticket')->
		       setHtml($ticket);

		$sendgrid->send($email);
		echo "Ticket submitted successfully!";
	}
	
}
?>