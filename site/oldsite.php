<?php

include "framework/spage.php";
superpage_head("Sportophile");

if (isset($_SESSION['timer'])) {
   $now = time();
   if ($now - $_SESSION['timer'] > 180) {
	header('Location: login.php');
   }
   $timeleft = 180 - ($now - $_SESSION['timer']);
    
} else {
	$_SESSION['timer']= time();
   $timeleft = 180;
}

/*
spage_head("Test Page");
bootstrap_head();
spage_body();

bootstrap_body();
*/
?>
<style>
notbody {  background-color:#000 };
</style>
<script src="gfront.js" ></script>

<script>
Gtimer = <? print($timeleft) ?>;
</script>

<div style='text-align:center;font-weight:bold; font-size:150%;'>
<iframe style="z-index:-9999;" width="640" height="400" src="//www.youtube.com/embed/QoLDHtLXR6c?autoplay=1&showinfo=0" frameborder="0" allowfullscreen></iframe><br><br>
<img width='150px' src="img/kobe2.jpg">
<img width='150px' src="img/h18.png"><br><br>

<img src="img/sportop_720_slim.png"><br>
<br>
<br>
TO CONTINUE BROADCAST PLEASE LOG IN OR SIGN UP<br>
IN THE NEXT <span id="time-left">3 minutes</span></div>
<br>
<div style='text-align:center;font-weight:bold; font-size:150%;'>
<a class="btn btn-inverse btn" href="login.php">Login</a>
<a class="btn btn-inverse btn" href="signup.php">Sign Up</a>
<a class="btn btn-inverse btn" href="javascript:">Join Queue to Talk</a>
<a class="btn btn-inverse btn" href="future.php">Upcoming Schedule</a>
<a class="btn btn-inverse btn" href="past.php">View Past Broadcasts</a>
</div>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<hr>
<br>

<?php

superpage_tail();
/*
bootstrap_tail();
spage_tail();
*/


?>
