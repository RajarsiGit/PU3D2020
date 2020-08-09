<?php

	$amount = $_POST['q49_calculation'];
	$amount .= "00";
	$name = $_POST['q8_fullName8'];

	$email = $_POST['q38_email38'];

	$qualification = $_POST['q43_qualification'];

	$designation = $_POST['q48_designation'];

	$add = $_POST['q34_institutionName'];	

	$phone = $_POST['q12_phoneNumber12'];

	$intend = $_POST['q46_iIntend'];

	$accom = $_POST['q47_doYou'];

	$calc = $_POST['q49_calculation'];

//$razorpay_payment_id = "";
	$email_message = "";
	$headers = "";
	$email_from = "noreply@pu3d.000webhostapp.com";
	$email_res_subject = "Registration Confirmation";

/*if ($_POST) {
	//$razorpay_payment_id = $_POST['razorpay_payment_id'];

	$name_str = $_POST['q8_fullName8'];
	$qualification = $_POST['q43_qualification'];
	$designation = $_POST['q48_designation'];

	$add_str = $_POST['q34_institutionName'];
	$phone_str = $_POST['q12_phoneNumber12'];
	$email = $_POST['q38_email38'];

	$intend_str = $_POST['q46_iIntend'];
	$accom = $_POST['q47_doYou'];
	$calc = $_POST['q49_calculation'];
	
	//echo "Razorpay success ID: ". $razorpay_payment_id;
}*/
	

	$conn = mysqli_connect('localhost', 'epiz_25235366_form', 'omsrisaibaba66', 'id12592007_pu3d');
	if(!$conn)
	{
		die('Connection failed!'.mysqli_error($conn));
	}
	
	$sql = "INSERT INTO form VALUES(null,'$name','$qualification','$designation','$add','$phone','$email','$intend','$accom','$calc');";

	if(mysqli_query($conn, $sql))
	{
		$email_message .= "<html><body><h1>3RD NATIONAL CONFERENCE ON DRUG DISCOVERY & DEVELOPMENT - 3D 2020</h1><h3>March 6 - 7, 2020<br>At the Convention cum Cultural Centre<br>PEC Bus Stop, SH 49,<br>Pillaichavady,<br>Puducherry - 605014</h3>";

		$email_message .= "<h4>Thank you for registering with us!<br>Your partial registration is confirmed! Your form details are given below:<h4>";

	    $email_message .= "Name: <b>".$name_str."</b><br>";
	    $email_message .= "Qualification: <b>".$qualification."</b><br>";
	    $email_message .= "Designation: <b>".$designation."</b><br>";
	    $email_message .= "Name and Address of institution: <b>".$add_str."</b><br>";
	    $email_message .= "Phone: <b>".$phone_str."</b><br>";
	    $email_message .= "Email: <b>".$email."</b><br>";
	    $email_message .= "You intend to: <b>".$intend_str."</b><br>";
	    $email_message .= "Your accomodation requirment: <b>".$accom."</b><br>";
	    $email_message .= "Your pending payment amount: ₹ <b>".$calc."/-</b><br>";
	    $email_message .= "<h2>Please pay this at the registration desk on the day of the event.</h2>";

	    $email_message .= "Please show us this email during spot registration for easier confirmation of your registration.<br><br>";

	    $email_message .= "<b>Department of Biochemistry & Molecular Biology<br>Pondicherry University<br>R.V.Nagar, Kalapet,<br>Puducherry - 605014</b></body></html>";

	    $headers  = 'MIME-Version: 1.0' . "\r\n";
	    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: ' . $email_from . "\r\n" . 'Reply-To: ' . $email_from . "\r\n" . 'X-Mailer: PHP/' . phpversion();

		@mail($email, $email_res_subject, $email_message, $headers);
	}
	else
	{
		echo mysqli_error($conn);
		echo "<script type='text/javascript'>alert('Sorry! Please try again!');</script>";
	}

	echo "<script>window.close();</script>";
?>