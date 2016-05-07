<?php
include "framework/spage.php";
superpage_head("Sportophile Test1");

$_SESSION['usertype']="guest";

?>

<img  src="img/sportop_720.png" width="40%">
<h3>Live Now</h3>
<div id="live-area"></div>
<div style='display:none;'>
<h3>Recordings</h3>
<div id="list-area"></div>
</div>
<script src="ghang.js" ></script>
<?php
superpage_tail();
?>

