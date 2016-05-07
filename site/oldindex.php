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
<img width="100%" src="img/logo500.png">
<a class="btn btn-success btn-large" href="ghost.php">Start a Hangout</a>
<a class="btn btn-success btn-large" href="ghang.php">Join a Hangout</a>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<?php if ($_SESSION['username'] == 'tom') {  ?>
<a class="btn btn-primary btn-large" href="todo.php">Todo</a>
<a class="btn btn-primary btn-large" href="notes.php">Notes</a>
<br>
<br>
<?php }  ?>
<hr>
<br>

<?php

superpage_tail();
/*
bootstrap_tail();
spage_tail();
*/


?>
