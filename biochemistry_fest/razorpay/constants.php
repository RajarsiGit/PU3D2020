<?php
	define('RAZOR_KEY_ID', 'rzp_live_Unm4EzxgGCOgoB');
	define('RAZOR_KEY_SECRET', 'OSKBxnjxKGJ5NIgbfKlZxvL9');

	//define('RAZOR_KEY_ID', 'rzp_test_6lTpg1E0LVrFPS');
	//define('RAZOR_KEY_SECRET', 'ecVekFi15HTmune4wWvD0Atz');	

	$amount = $_POST['q49_calculation'];
	$name = $_POST['q8_fullName8'];
	$email = $_POST['q38_email38'];
	$qualification = $_POST['q43_qualification'];
	$designation = $_POST['q48_designation'];
	$add = $_POST['q34_institutionName'];	
	$phone = $_POST['q12_phoneNumber12'];
	$intend = $_POST['q46_iIntend'];
	$accom = $_POST['q47_doYou'];
	$calc = $_POST['q49_calculation'];
	$fee = 1.02;
	$calc = $calc * $fee;
	$unique_id = $_POST['unique_id'];

	$name_str = implode(" ", $name);
	$add_str = implode(", ", $add);
	$phone_str = implode(" ", $phone);
	$intend_str = implode(", ", $intend);
	$amount .= "00";

	$phone_str = preg_replace('/  */', '', $phone_str);
?>