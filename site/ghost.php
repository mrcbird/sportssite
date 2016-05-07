<?php
include "framework/spage.php";
superpage_head("Sportophile Test1");
$_SESSION['usertype']="host";
?>
<img  src="img/sportop_720.png" width="40%">
<br><br>

<div style='float:left; margin-right:10px;'>
<a class='btn btn-success btn-inverse btn-large' onclick="hangout();">Start Hangout</a>
</div>
<div style='float:left'>
<span style='margin-bottom:5px' class="">Name of your event </span><br>
<input id='event-name' style="width:320px; height:20px; font-size:150%" type="text" value="Hangout with <?php echo $_SESSION['username']; ?>"></input>
</div>
<div id='debug-area'></div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<script>
function hangout()
{
   var url = "eventlist.php?c=new&name=" + $('#event-name').val();
$.get( url, function( data ) {
        obj = JSON.parse(data);
        ss = "";
	var ur2="https://plus.google.com/hangouts/_?hso=0&gid=919050817699";
 //window.open(ur2,'_blank');
	
        ss += "<h3>" + obj.name + "</h3>";
        ss += "<b>" + obj.host + "</b>";
        $("#debug-area").html(ss);
	console.log(ur2);
	window.location = ur2;
});

  console.log("Hangout");
  console.log($('#event-name').val());

}
</script>
<?php

function create_table()
{
if ($db = sqlite_open('db/mysqlitedb', 0666, $sqliteerror)) { 
   sqlite_query($db, 'CREATE TABLE qtable (bar varchar(10))');


}

if ($db = sqlite_open('db/mysqlitedb', 0666, $sqliteerror)) { 
//   sqlite_query($db, 'CREATE TABLE foo (bar varchar(10))');
    sqlite_query($db, "INSERT INTO foo VALUES ('another')");
    //$result = sqlite_query($db, 'select bar from foo');

    $result = sqlite_query($db, 'select * from foo');
    var_dump(sqlite_fetch_array($result)); 
} else {
    die($sqliteerror);
}
}
?>
<script src="ghost.js" ></script>

<?php
superpage_tail();
?>

