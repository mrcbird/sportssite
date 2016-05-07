<?php
include "framework/spage.php";
superpage_head("Sportophile");
?>
<?php

$subject ="no subect";
$first ="";
$last ="";
$message ="";
if (isset($_GET['email'])) {
    $email = $_GET['email'];
} else {
	print("Unable send you mail without an email address<br>User your browser back button to complete the form<br>");
	superpage_tail('ifxsoftware');
	return(0);
	
}
if (isset($_GET['first'])) {
    $first = $_GET['first'];
}
if (isset($_GET['last'])) {
    $last = $_GET['last'];
}
if (isset($_GET['subject'])) {
    $subject = $_GET['subject'];
}
if (isset($_GET['message'])) {
    $message = $_GET['message'];
}

$headers = 'From: ' . $first . ' ' . $last . '<' . $email . ">\r\n" .

    'X-Mailer: PHP/' . phpversion();
$sub = "Sportofile inquiry " . $subject . " from " . $first . " " . $last;

$msg = $first . " " . $last . " (" . $email . ")  sent the following " . $subject . " message:\n\n";
  $msg = $msg . "\n" . $message ;
 $err = mail ( "tom@ninbot.com" ,$sub , $msg, $headers);

?>
<h3>Thank you!</h4>
<b>Your email has been sent to sportophile.</b>
<br>
<br> If you have any other questions or suggestions<br> you may also reach us at:
<a href="mailto:info@sportophile.com">info@sportophile.com</a> and <a href="mailto:support@sportophile.com">support@sportophile.com</a><br>
 
<br>


<A HREF="javascript:history.back()">Return to last page</A>


<?
superpage_tail('ifxsoftware');
/*
bootstrap_tail();
spage_tail();
*/

?>
