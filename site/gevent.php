<?php
include "framework/spage.php";
superpage_head("Sportophile Test1");

$_SESSION['usertype']="guest";
$_SESSION['linepos']="0";

$event=$_GET['event'];
echo "<script>Gevent='" . $event . "';</script>";
?>
<script src="gevent.js" ></script>
<br><br>

<style>
#event-area {
    height: 80px;
}
#youtube-area {
   float: left;
   margin-right:10px;
   margin-bottom:10px;
}
#list-area {
   float: left;
   width:420px;
   height:420px;
   overflow-y:scroll;

}
#clear-area {
   clear: left;
}
</style>


<div id="title-area"></div>
<div id="event-area"></div>
<br>
<div id="youtube-area"></div>

<div id="list-area"></div>
<div id="clear-area"></div>

<?php
superpage_tail();
?>
