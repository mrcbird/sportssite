

$().ready(function() {


 console.log("Hi");
$.get( "eventlist.php?c=list", function( data ) {
	lst = JSON.parse(data);
	ss = "";
	for(var i = 0; i < lst.length;i++) {
		//dd =  JSON.parse( lst[i]);
		dd =  lst[i];


	ss = "";
	ss += "<a href='?route=events/join&event=" + dd.event + "' class='btn'>" ;
	ss += '<img src="http://img.youtube.com/vi/' + dd.yid + '/3.jpg">';
	ss += "<br><small>" + dd.name + "</small><br>";
	ss += "</a>";
	if (dd.live == 1) {
	    $("#live-area").append(ss);
	} else {
	    $("#list-area").append(ss);
	}
	}
	console.log("Data is " + dd);
	console.log("Got Data");
  // alert( "Load was performed." );
});

$.ajax({
  url: "eventlist.php?c=list",
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
