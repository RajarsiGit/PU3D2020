<?php
	require_once('config.php');
?>
<html>
	<head>
		<title>Razorpay Payment Gateway</title>
		<meta name="viewport" content="width=device-width">
		<style type="text/css">
			.razorpay-payment-button {
				color: #ffffff !important;
				height: 50px;
				width: 160px;
				background-color: #2266ba;
				font-size: 14px;
				padding: 10px;
				border: none;
				border-radius: 5px;
				cursor: pointer;
			}
		</style>
	</head>
	<body style="font-family: Open Sans; text-align: center; padding: 5%; background-color: #fbf7f5;">
		<h1>Click below to proceed...</h1>
		<form action="charge.php" method="POST">
			<script
			    src="https://checkout.razorpay.com/v1/checkout.js"
			    data-key="rzp_live_4dgZI2megPlJjE"
			    data-amount="<?php echo $amount; ?>"
			    data-currency="INR"
			    data-description="For Online Registration purposes."
			    data-buttontext="Pay with Razorpay"
			    data-name="PU 3D 2020"
			    data-description="Online Registration"
			    data-image="logo-2.png"
			    data-prefill.name="<?php echo $name_str; ?>"
			    data-prefill.email="<?php echo $email; ?>"
			    data-prefill.contact="<?php echo $phone_str; ?>"
			    data-theme.color="#528FF0">
			</script>
			<input type="hidden" custom="Hidden Element" name="hidden">

			<input type="hidden" custom="Hidden Element" name="q8_fullName8" value="<?php echo $name_str; ?>">
			<input type="hidden" custom="Hidden Element" name="q43_qualification" value="<?php echo $qualification; ?>">
			<input type="hidden" custom="Hidden Element" name="q48_designation" value="<?php echo $designation; ?>">
			<input type="hidden" custom="Hidden Element" name="q34_institutionName" value="<?php echo $add_str; ?>">
			<input type="hidden" custom="Hidden Element" name="q12_phoneNumber12" value="<?php echo $phone_str; ?>">
			<input type="hidden" custom="Hidden Element" name="q38_email38" value="<?php echo $email; ?>">
			<input type="hidden" custom="Hidden Element" name="q46_iIntend" value="<?php echo $intend_str; ?>">
			<input type="hidden" custom="Hidden Element" name="q47_doYou" value="<?php echo $accom; ?>">
			<input type="hidden" custom="Hidden Element" name="q49_calculation" value="<?php echo $calc; ?>">
		</form>
	</body> 
</html>