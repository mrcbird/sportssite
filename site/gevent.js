
var Gyid =0;
var Glinepos =-99;
function join_hangout() 
{
   var quest = $('#event-name').val();
   console.log(quest);
 
    url=  "eventlist.php?c=join&quest=" + quest + "&event=" + Gevent;

    $.get( url, function( data ) {
	update_event();
        //obj = JSON.parse(data);
   });


}

$().ready(function() {





    update_event();
   
    //update_queue();


});
function update_queue() 
{
    $.get( "eventlist.php?c=qlist&event=" + Gevent, function( data ) {
        lst = JSON.parse(data);
        var ss = "";
	ss += "<b>Current Queue</b> "
 	ss += lst.length + " Users<br>";
        for(var i = 0; i < lst.length;i++) {
           //dd =  JSON.parse( lst[i]);
           var dd =  lst[i];
           ss += "<a onclick='user_view();' class='btn'>" ;
           ss += '<img width="88px" src="http://ninbot.com/sport/' + dd.photo + '">';
        //ss += "<br><small>" + dd.name + "</small><br>";
        ss += "</a>";
        }
        $("#list-area").html(ss);

    });
}
var first  = 1;
function update_photo() 
{
   window.open("facetogif/index.html", "_blank");

}
function update_event() 
{

$.get( "eventlist.php?c=query&event=" + Gevent, function( data ) {
    obj = JSON.parse(data);

    if (first) {
    ss = "";
    if (obj.live == "1") {
    //ss += '<h2><img src="img/logostar.png" width="70px"> Live Now</h2>';
    ss += '<h2>Live Now</h2>';
    } else {
    //ss += '<h2><img src="img/logostar.png" width="70px"> Earlier Broadcast</h2>';
    ss += '<h2>Earlier Broadcast</h2>';
    }
    ss += "<h3>" + obj.name + "</h3>";
    ss += "<b>with the host " + obj.host + "</b><br><br>";
    //ss += "<b> live  is " + obj.live +  "</b><br><br>";

    $("#title-area").html(ss);
	first = 0;
    }
    ss = "";
   
    if (obj.live == "0") {
	//$("#title-area").html(ss);
    } else {
	if (obj.linepos != Glinepos) {
	     Glinepos = obj.linepos;
//ss += obj.linepos + "<br>";
	if (obj.linepos < 1) {

	    ss += "<div style='float:left; margin-right:10px;'>";
	     ss += "<a class='btn btn-success btn-large' href='javascript:join_hangout();'>Join the Hangout</a>";
		ss += "</div><div style='float:left'>";

	ss += "<span style='margin-bottom:5px' >What you want to talk about</span><br>";
	ss += "<input id='event-name' style='width:320px; height:20px; font-size:150%' type='text' value=''></input> </div> ";
	     ss += "<br><a class='btn btn-success ' href='javascript:update_photo();'>Update Your Photo</a>";
	

	} else {
	   if (obj.linepos == 1) {
 		if (obj.hurl != "") {
	   		ss += '<a class="btn btn-large btn-success" href="' + obj.hurl + '">Join the Hangout</a>';
		}
	   } else { 
		ss += "You are number <b>" + obj.linepos + "</b> in line";
		if (obj.linepos < 10) {
		   ss += "<br><b>Get ready to Join</b>";
		}

	   }

 	}

	$("#event-area").html(ss);
	}
    }

	if (obj.yid != Gyid) {
	
	    yt = '<iframe width="420" height="315" src="http://www.youtube.com/embed/' + obj.yid + '" frameborder="0" allowfullscreen></iframe>';
	    $("#youtube-area").html(yt);
		Gyid = obj.yid;
	}
    if (obj.live == "1") {
        update_queue();
    	setTimeout(update_event, 5000);
    }
});
	
    //update_queue();


}
