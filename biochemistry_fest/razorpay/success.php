<?php
  include('templates/header.php');
  require_once "constants.php";
  require_once "PHPMailer/PHPMailerAutoload.php";

  $myFile = "data.json";
  $arr_data = array();
  $jsondata = file_get_contents($myFile);
  $arr_data = json_decode($jsondata, true);

  $name = $name_str;
  $email = $email;
  $qualification = $qualification;
  
  $designation = $designation;
  $add = $add_str; 
  $phone = $phone_str;
  $intend = $intend_str;
  
  $accom = $accom;
  $calc = $calc;
  $order_id = $unique_id;

  $conn = mysqli_connect('sql213.epizy.com', 'epiz_25235366', 'Dq6qEkTmRZUrN', 'epiz_25235366_form');
  if(!$conn){
    die('Connection failed!'.mysqli_error($conn));
  }
  
  $sql = "INSERT INTO form VALUES(null,null,'$name','$qualification','$designation','$add','$phone','$email','$intend','$accom','$calc','$order_id');";

  if(mysqli_query($conn, $sql))
  {
      $sql = "SELECT id FROM form WHERE name = '$name' AND order_id = '$order_id';";
      $row = mysqli_fetch_array(mysqli_query($conn, $sql));
      $id = $row['id'];
      $reg_id = "REG_00" . $id;

      $sql = "UPDATE form SET reg_id = '$reg_id' WHERE id = '$id';";
      if(!mysqli_query($conn, $sql)){
        echo "Connection failed!";
      }

      $mail = new PHPMailer;
      
      $mail->SMTPDebug = 3;                               
      $mail->isSMTP();                              
      $mail->Host = "smtp.gmail.com";
      $mail->SMTPAuth = true;                           
      $mail->Username = "pu3d2020@gmail.com";                 
      $mail->Password = "omsrisaibaba66";                           
      $mail->SMTPSecure = "tls";                           
      $mail->Port = 587;
      $mail->From = "admin@pu3d.epizy.com";
      $mail->FromName = "PU 3D 2020";
      $mail->addAddress($email, $name);
      $mail->addReplyTo("noreply@pu3d.epizy.com", "noreply");
      $mail->isHTML(true);
      $mail->Subject = "Registration Confirmed";

      $mail->Body = "<html><body><h1>3RD NATIONAL CONFERENCE ON DRUG DISCOVERY & DEVELOPMENT - 3D 2020</h1><h3>March 6 - 7, 2020<br>At the Convention cum Cultural Centre<br>PEC Bus Stop, SH 49,<br>Pillaichavady,<br>Puducherry - 605014</h3>";
      $mail->Body .= "<h4>Thank you for registering with us!<br>Your partial registration is confirmed! Your form details are given below:</h4>";
      $mail->Body .= "Registration ID: <b>".$reg_id."</b><br>";
      $mail->Body .= "Name: <b>".$name."</b><br>";
      $mail->Body .= "Qualification: <b>".$qualification."</b><br>";
      $mail->Body .= "Designation: <b>".$designation."</b><br>";
      $mail->Body .= "Name and Address of institution: <b>".$add."</b><br>";
      $mail->Body .= "Phone: <b>".$phone."</b><br>";
      $mail->Body .= "Email: <b>".$email."</b><br>";
      $mail->Body .= "You intend to: <b>".$intend."</b><br>";
      $mail->Body .= "Your accomodation requirment: <b>".$accom."</b><br><br>";
      $mail->Body .= "Your pending amount: <b>Rs.".$calc."/-</b> (Please pay using the following details:<br>Beneficiary Name: BIOCHEMISTRY CONFERENCE 2020<br>Account No: 6859387180<br>IFSC code: IDIB000P152<br>Branch: Pondicherry University Branch<br>Please ignore if already paid.)<br><br>";
      $mail->Body .= "Please show us this email during spot registration for easier confirmation of your registration.<br><br>";
      $mail->Body .= "<b>Department of Biochemistry & Molecular Biology<br>Pondicherry University<br>R.V.Nagar, Kalapet,<br>Puducherry - 605014</b></body></html>";


      $mail->ALtBody = "3RD NATIONAL CONFERENCE ON DRUG DISCOVERY & DEVELOPMENT - 3D 2020\nMarch 6 - 7, 2020\nAt the Convention cum Cultural Centre\nPEC Bus Stop, SH 49,\nPillaichavady,<br>Puducherry - 605014\n";
      $mail->ALtBody .= "Thank you for registering with us!\nYour partial registration is confirmed! Your form details are given below:\n";
      $mail->ALtBody .= "Registration ID: ".$reg_id."\n";
      $mail->ALtBody .= "Name: ".$name."\n";
      $mail->ALtBody .= "Qualification: ".$qualification."\n";
      $mail->ALtBody .= "Designation: ".$designation."\n";
      $mail->ALtBody .= "Name and Address of institution: ".$add."\n";
      $mail->ALtBody .= "Phone: ".$phone."\n";
      $mail->ALtBody .= "Email: ".$email."\n";
      $mail->ALtBody .= "You intend to: ".$intend."\n";
      $mail->ALtBody .= "Your accomodation requirment: ".$accom."\n\n";
      $mail->AltBody .= "Your pending amount: Rs.".$calc."/- (Please pay using the following details:\nBeneficiary Name: BIOCHEMISTRY CONFERENCE 2020\nAccount No: 6859387180\nIFSC code: IDIB000P152\nBranch: Pondicherry University Branch\nPlease ignore if already paid.)\n\n";
      $mail->AltBody .= "Please show us this email during spot registration for easier confirmation of your registration.\n\n";
      $mail->ALtBody .= "Department of Biochemistry & Molecular Biology\nPondicherry University\nR.V.Nagar, Kalapet,\nPuducherry - 605014";

      if(!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
      }
  }
  else
  {
    echo mysqli_error($conn);
    echo "<script type='text/javascript'>alert('Sorry! Please try again!');</script>";
  }
?>
<section class="showcase">
   <div class="container">
    <div class="text-center">
      <h1 class="display-3">Thank You!</h1>
      <p class="lead">Your partial registration is successful.<br><b>Please pay &#8377; <?php echo "$calc";?> /-</b> online via Internet Banking using the following details: <br>Beneficiary Name: <b>BIOCHEMISTRY CONFERENCE 2020</b><br>Account No: <b>6859387180</b><br>IFSC Code: <b>IDIB000P152</b><br>Branch: <b>Pondicherry University Branch</b><br>Also if possible mention your Registration ID sent in your e-mail as remarks during paymeny.<br><b>Please check your e-mail for further details.</b></p>
      <hr>
      <p>
        Having trouble? <a href="mailto:pu3d2020@gmail.com">Contact us</a>
      </p>
      <p class="lead">
        <a class="btn btn-primary btn-sm" type="submit" href="http://pu3d.epizy.com/">Continue to homepage</a>
      </p>
    </div>
    </div>
</section>
<br><br><br>
<?php include('templates/footer.php');?>