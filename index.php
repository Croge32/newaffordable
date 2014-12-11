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
		if (preg_match("/^(\+0?1\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/", $_REQUEST['phoneNumber'])) {
		    $phoneNumber = $_REQUEST['phoneNumber'];
		} else {
    		array_push($errors, "Phone number is invalid");
		}
		
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
		if (preg_match("/^\d{5}(?:[-\s]\d{4})?$/", $_REQUEST['zipCode'])) {
		    $zipCode = $_REQUEST['zipCode'];
		} else {
    		array_push($errors, "Zip code is invalid");
		}
	}

	if(!isset($_REQUEST['brand']) || strlen(trim($_REQUEST['brand'])) == 0){
    	array_push($errors, "no brand provided");
	} else {
		if (preg_match("/^[A-Za-z]+$/", $_REQUEST['brand'])) {
		    $brand = $_REQUEST['brand'];
		} else {
    		array_push($errors, "Brand name is invalid");
		}
	}

	if(!isset($_REQUEST['modelNumber']) || strlen(trim($_REQUEST['modelNumber'])) == 0){
    	array_push($errors, "no model number provided");
	} else {
		$modelNumber = $_REQUEST['modelNumber'];
	}

	if(!isset($_REQUEST['year']) || strlen(trim($_REQUEST['year'])) == 0){
    	array_push($errors, "no year provided");
	} else {
		if (preg_match("/^[12][0-9]{3}$/", $_REQUEST['year'])) {
		    $year = $_REQUEST['year'];
		} else {
    		array_push($errors, "Year is invalid");
		}
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
		echo "<div class='container shadow'><h4>Errors submitting ticket</h4><br>";
		foreach ($errors as $error) {
			echo "<h5>$error</h5>";
		}
		echo "</div>";
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

		$email->addTo('orogers225@gmail.com')->
			   addTo('croge32@gmail.com')->
		       setFrom('AffordableSite@gmail.com')->
		       setSubject('Ticket')->
		       setHtml($ticket);

		$sendgrid->send($email);

		echo '<div class="container shadow"><h4>Ticket submitted successfully! We will call you to set up an appointment shortly.</h4></div>';
	}
	
}
?>

<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Affordable In-Home Tv Service</title>
	
	<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="libs/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/main.css">

	<script type="text/javascript" src="libs/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="libs/bootstrap/js/bootstrap.min.js"></script>
	
</head>

<body>
	
	<nav class="navbar navbar-default navbar-fixed-top" id="nav" role="navigation">
	  <div class="container-fluid">

	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="">Affordable In-Home TV Service</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#estimates">Estimates</a></li>
	        <li><a href="#brands">Brands</a></li>
	        <li><a href="#about">About</a></li>
	        <li><a href="#repair">Schedule a Repair</a></li>
	      </ul>
	    </div>

	  </div>
	</nav>

	<div class="container shadow">
		
		<div class="content">
			<h3>Home</h3><br>

			<h4>Do you have a broken television and no means to purchase a new set or bring your TV to a repair shop?</h4>

		    <p>At Affordable In-Home TV Service, we do all the work for you! Located out of Baton Rouge, Louisiana, our business has served Baton Rouge and the surrounding area for over 30 years. Simply call and we will send a licensed technician to inspect, diagnose, and repair your television, all within the comfort of your own home. We work on every popular brand and many different varieties of televisions, including projection, HDTV LCD, LED, and many more!</p>

		    <p>For a complete list of supported brands and models, visit our <a href="#brands">brands</a> page.</p>

		    <h4>Why in-home repair?</h4>

			<p>With our technician in your home, you can be sure you are receiving the BEST service at a BARGAIN price. With in-home repair, you don't have to fear additional damage to your television through transit to a repair shop or the negligence of a shop repairman. You will stay informed, as our technician will provide a detailed explanation of your television's issue as he repairs it.</p>

			<h4>Don't overwork yourself! At Affordable In-Home TV Service, you can relax... we come to you!</h4>
		</div>
 	</div>

	<div class="pictureContent">
	
		<img class="shadow" src="img/van.jpg" width="600" />

	</div>

	<div class="container shadow">
		
		<div class="content">
			<a name="estimates" class="anchor">
    			<h3 style="padding-top: 60px; margin-top: -60px;">Estimates</h3><br>
			</a>

			<h4>We work primarily within the Baton Rouge area and some surrounding cities.</h4>

			<h5>In Baton Rouge, we service zip codes:</h5>

			<p>70801, 70802, 70803, 70804, 70806, 70807, 70808, 70809, 70810, 70811, 70812, 70813, 70814, 70815, 70816, 70817, 70818, 70819, 70820, 70821, 70822, 70823, 70825, 70826, 70827, 70831, 70833, 70835, 70836, 70837, 70874, 70879, 70883, 70884, 70893, 70894, 70895, 70896, 70898</p>

			<h5>In Denham Springs, we service zip codes:</h5>

			<p>70706, 70726, 70727</p>

			<h5>In Baker, we service zip codes:</h5>

			<p>70704, 70714</p>

			<h5>In Gonzales, we service zip codes:</h5>

			<p>70707, 70737</p>

			<h5>We also will come out to Walker, Zachary, Prairieville, Port Allen, Brusly, and Addis.</h5><br>

			<h4>For estimates on the cost of service in your area, give us a call at (225) 262-4472.</h4>
		</div>
 	</div>

	
	<div class="container shadow">
		
		<div class="content">
			<a name="brands" class="anchor">
    			<h3 style="padding-top: 60px; margin-top: -60px;">Brands</h3><br>
			</a>

			<h4>We service many different television brands including:</h4>

			<p>AKAI, Denon, Emerson, GE, Harmon, Kardon, Hitachi, JVC, LG, Magnavox, Mitsubishi, Philips, Panasonic, Pioneer, Polaroid, Quasar, RCA, Samsung, Sharp, Sony, Sylvania, Teac, Toshiba, Vizio, Westinghouse, Zenith, and many more.<p><br>

			<h4>We specialize in Big Screen TV, HDTV, Projection TV, DLP TV, LCD TV, LED TV, and VCR repair.</h4><br>

			<h4>If you any question as to what type of television you have, we will assist you over the phone.<h4>
		</div>
 	</div>

 	<div class="container shadow">
		
		<div class="content">
			<a name="about" class="anchor">
    			<h3 style="padding-top: 60px; margin-top: -60px;">About</h3><br>
			</a>

			<h4>Affordable In-Home TV Service, LLC has been serving South Louisiana since 1984. Our technician is a proud member of NESDA (National Electronic Service Dealers Association) and SESDA (South Eastern Service Dealers Association). He is factory trained and possesses an LA Radio and TV License as well as an F.C.C. License.</h4><br>

			<h4>Contacting us is easy</h4>

			<p>Telephone and Fax: (225) 262-4472</p>

			<p>email: orogers225@gmail.com</p>
		</div>
 	</div>

 	<div class="container shadow">
		
		<div class="content">
			<a name="repair" class="anchor">
    			<h3 style="padding-top: 60px; margin-top: -60px;">Repair</h3><br>
			</a>

			<form role="form" method="POST" name="repair" action="index.php">

				<div class="row">
					<div class="col-md-4 col-md-offset-1">
					<h4>Personal Information</h4><br>
				</div>
				</div>
				<div class="row">
				  <div class="col-md-4 col-md-offset-1">

				  	<div class="form-group">
				    <label for="name">Name</label>
				    <input type="text" name="name" class="form-control" id="name" placeholder="Ex. John Doe">
				  </div>
				  </div>
				  <div class="col-md-4">
				  	<div class="form-group">
				    <label for="exampleInputEmail1">Phone Number</label>
				    <input type="text" name="phoneNumber" class="form-control" id="phoneNumber" placeholder="Ex: 123-456-7890">
				  </div>
				  </div>
				</div>
				<div class="row">
				  <div class="col-md-4 col-md-offset-1">

				  	<div class="form-group">
				    <label for="name">City</label>
				    <input type="text" name="city" class="form-control" id="city" placeholder="Ex. Baton Rouge">
				  </div>
				  </div>
				  <div class="col-md-4">
				  	<div class="form-group">
				    <label for="exampleInputEmail1">Street Address</label>
				    <input type="text" name="address" class="form-control" id="address" placeholder="Ex: 123 Meadow Dr.">
				  </div>
				  </div>
				</div>
				<div class="row">
				  <div class="col-md-4 col-md-offset-1">
				  	<div class="form-group">
				    <label for="exampleInputEmail1">ZIP Code</label>
				    <input type="text" name="zipCode" class="form-control" id="zipCode" placeholder="Ex: 70816"><br>
				  </div>
				  </div>
				  </div>
				</div>

				<div class="row">
					<div class="col-md-4 col-md-offset-1">
					<h4>TV Information</h4><br>
				</div>
				</div>
				<div class="row">
				  <div class="col-md-4 col-md-offset-1">

				  	<div class="form-group">
				    <label for="name">Brand</label>
				    <input type="text" name="brand" class="form-control" id="brand" placeholder="Ex. Sony, Visio, RCA...">
				  </div>
				  </div>
				  <div class="col-md-4">
				  	<div class="form-group">
				    <label for="exampleInputEmail1">Model Number</label>
				    <input type="text" name="modelNumber" class="form-control" id="modelNumber" placeholder="Ex: UN55F8000AFXZA">
				  </div>
				  </div>
				</div>
				<div class="row">
				  <div class="col-md-4 col-md-offset-1">
				  	<div class="form-group">
				    	<label for="name">Year</label>
				    	<input type="text" name="year" class="form-control" id="year" placeholder="Ex. 2003">
				  	</div>
				  </div>

				<div class="col-md-4">
				  	<div class="checkbox">
					    <label>
					      <input type="checkbox" name="mounted"> Is television mounted?
					    </label><br>
					    <div class="radio">
						  <label>
						    <input type="radio" name="optionsRadios" id="optionsRadios1" value="radioSuddenly" checked>
						    Television broke suddenly
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="optionsRadios" id="optionsRadios2" value="radioNotSuddenly">
						    Television acted up and broke later
						  </label>
						</div>
					  </div>
				  </div>
				</div>

				<div class="row">
				  <div class="col-md-8 col-md-offset-1">
				  	<div class="form-group">
				    	<label for="name">Symptoms</label>
				    	<input type="text" name="symptom" class="form-control" id="symptom" placeholder="Ex. Won't turn on, screen blurry, etc."><br>
				  	</div>
				  </div>
				</div>

				<div class="row">
				  <div class="col-md-8">
				  	<div class="form-group">
				    	<button type="submit" name="submit" class="btn btn-primary">Submit</button>		
				    </div>
				  </div>
				</div>		  

			</form>

		</div>
 	</div>

 	<nav class="navbar navbar-default navbar-fixed-bottom" id="footer">
	  <div class="container-fluid">

	    <p>&copy; 2014 Affordable In-Home TV Service, LLC. All Rights Reserved.</p>

	  </div>
	</nav>

</body>

</html>