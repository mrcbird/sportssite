

$().ready(function() {


 console.log("Hi");
$.get( "/eventlist.php?c=list", function( data ) {
	lst = JSON.parse(data);
	ss = "";
	for(var i = 0; i < lst.length;i++) {
		dd =  JSON.parse( lst[i]);
	   ss += "<a href='gevent.php?event=" + dd.event + "' class='btn'>" + dd.name + "</a><br>";
	}
	$("#list-area").html(ss);
	console.log("Data is " + dd);
	console.log("Got Data");
  // alert( "Load was performed." );
});

$.ajax({
  url: "/eventlist.php?c=list",
  data: function(data) {
	console.log("Data is " + data);
	console.log("Got Data");
	
  },
  error: function() {
	console.log("Got Error");
  },
  success: function() {
	console.log("Got Succes");

  }
});


});
