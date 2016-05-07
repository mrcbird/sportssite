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
<div style='text-align:left;font-weight:bold; font-size:150%;'>
<img src="img/sportop_720.png"><br><br>
<h3>Sign Up</h3>
  <input type="email" name="email" class="span3" placeholder="Email Address"><br>
  <input type="text" name="user" class="span3" placeholder="Username">
<a class="btn btn-inverse btn" href="javascript:checkusername()">Check Available</a><br>
  <input type="password" name="pass" class="span3" placeholder="Password">
<br>
<a class="btn btn-inverse btn" href="javascript:register();">Sign Up</a>
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
