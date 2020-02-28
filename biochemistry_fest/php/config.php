<?php
	$amount = $_POST['q49_calculation'];
	$amount .= "00";
	$name = $_POST['q8_fullName8'];
	$name_str = implode(" ", $name);
	$email = $_POST['q38_email38'];

	$qualification = $_POST['q43_qualification'];

	$designation = $_POST['q48_designation'];

	$add = $_POST['q34_institutionName'];

	$phone = $_POST['q12_phoneNumber12'];

	$intend = $_POST['q46_iIntend'];

	$accom = $_POST['q47_doYou'];

	$calc = $_POST['q49_calculation'];

	$add_str = implode(", ", $add);
	$phone_str = implode(" ", $phone);
	$intend_str = implode(", ", $intend);
?>