<?php

include "framework/spage.php";

superpage_head("Sportophile");

/*
spage_head("Test Page");
bootstrap_head();
spage_body();

bootstrap_body();
*/
?>
<div style='text-align:center;font-weight:bold; font-size:150%;'>
<img src="img/sportop_720.png"><br><br>
<br>
<div style='text-align:center;'>
  <input type="text" name="user" class="span3" placeholder="Login">
  <input type="password" name="pass" class="span3" placeholder="Password">
<br>

<a class="btn btn-inverse btn" href="">Login</a>
<a class="btn btn-inverse btn" href="signup.php">Sign Up</a>
</div>
</div>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<a class="btn btn-mini btn-danger" href="gplus-quickstart-php/index.html">Login with Google + Test</a>
<a class="btn btn-mini btn-success" href="greenroom.php">Green Room</a>
<a class="btn btn-inverse btn-mini" href="watch.php">Reset Timer</a>
<hr>
<br>

<?php

superpage_tail();
/*
bootstrap_tail();
spage_tail();
*/


?>
