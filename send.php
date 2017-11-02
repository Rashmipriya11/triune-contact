<?php 
$errors = '';
$myemail = 'info@triunebusiness.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['tel'])||
   empty($_POST['packages']) || 
   empty($_POST['city'])) 
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$tel = $_POST['tel']; 
$packages = $_POST['packages']; 
$city = $_POST['city']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
    $to = $myemail; 
    $email_subject = "Contact form submission: $name";
    $email_body = "You have received a new message. /n".
    " Here are the details:\n Name: $name \n Email: $email_address \n Tel: $tel \n Packages: $packages \n City: $city ";
}

    $headers = "From: $myemail\n"; 
    $headers .= "Reply-To: $email_address";

    mail($to,$email_subject,$email_body,$headers);
    //redirect to the 'thank you' page
    // header('Location: contact-form-thank-you.html');

    echo "Thank You!";
?>
<!-- This page is displayed only if there is some error -->
<!-- <?php
// echo nl2br($errors);
?>
 -->

</body>
</html>