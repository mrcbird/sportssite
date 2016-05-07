
$().ready(function() {

//    update_page();
    find_event();

    //update_queue();


});
function find_event()
{
    $.get( "eventlist.php?c=list", function( data ) {
	lst = JSON.parse(data);
	var last_record = -1;
	var live_show = -1;
	var obj;
	console.log(lst.length);
	for (var i = 0; i <lst.length; i++) {
	   
	   if (lst[i].live == 1) {
		live_show = i;
		break;
	   } else {
		lastrecord = i;
	   }
   	}
	if (live_show > -1) {
	    obj = lst[live_show];
	    console.log(obj);
	} else if (last_record > -1) {
	    obj = lst[last_record];
	    console.log(obj);
 	} else {
	    obj = "";
	}
 	if (obj != "") {
	    var str = '<iframe style="z-index:-9999;" width="640" height="400" src="//www.youtube.com/embed/' + obj.yid + '?autoplay=1&amp;showinfo=0" frameborder="0" allowfullscreen=""></iframe>';

	    $("#youtuber").html(str);
	}
	// obj = JSON.parse(lst[lst.length -2]);
	// obj = JSON.parse(lst[lst.length -2]);
	
	console.log(obj);
    });
}
function load_event()
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

function update_page()
{
   var t = Math.random()  % 60;
   Gtimer --;
   var m = Math.floor( Gtimer / 60. );
   var s = Gtimer - ( m * 60);
   if (m > 1) { 
      $('#time-left').html( m + " minutes " + s  + " Seconds");
   } else {
      $('#time-left').html( Gtimer  + " Seconds");
   }
   if (Gtimer <= 0) {
	window.location.href = 'login.php';
   }

  

        setTimeout(update_page, 1000);
}
