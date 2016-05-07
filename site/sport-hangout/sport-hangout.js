$(function() {
nbhang = new Object();
nbhang.username = "unknown";

$(function(){
   console.log("MAIN HANG TEST Flight 1");

});


nbhang.jsonp = function (msg) {
   
//console.log("JSONP CALLBACL");
// console.log(msg);
   nbhang.data = msg;
   nbhang.username = msg.user;
   nbhang.usertype = msg.usertype;
   nbhang.servers = msg.servers;
   nbhang.update_interface();

}

function OverideShowNothing() {
  currentItem = null;
  hideAllOverlays();
  setControlVisibility(false);
}
nbhang.update_interface = function(  ) {
   $('#layout').html("");
   //if (nbhang.username != "tom" && nbhang.username != "chris") {
   if (0) {
  		
       $('#layout').append("<h3>Login is Required</h3><br>");
	return;
   } 


   $('#layout').append("User:" +  nbhang.username );

   $('#layout').append(" Type:" +  nbhang.usertype + "<br>");
   $('#layout').append('<img width="220px" src="http://sportophile.com/sport-hangout/logo.png"><br>');

/*
    var $b = $('<h3>Lower Third</h3>');   
    $('#layout').append($b);
    nbhang.addThird("Pro", 'lowerthird.png', 1, 0, .38);
    nbhang.addThird("Logo", 'logo500.png', .2, -.35, .4);
    // nbhang.addThird("Bug", 'logohead.png', .07, .35, .38);
    nbhang.addThird("None", '', 1, 0, 0);
*/
    var url =  gapi.hangout.getHangoutUrl();
 //   $('#layout').append("<br>" + url );
    gapi.hangout.onair.onYouTubeLiveIdReady.add( nbhang.youtube_available );
    
    nbhang.update_server();


}
nbhang.youtube_available = function( liveid)
{
   console.log("YOUTUBE IS " + liveid);

    //nbhang.update_server();

}
user_view_close = function()
{
    $("#sport-userview").hide();
}

user_invite_callback = function(reply)
{
   console.log("User Invite callback reply is " + reply);

}
user_invite = function(id)
{
   var name = nbhang.waitlist[id].name;
  var URL =  "https://sportophile.com/login/eventlist.php?c=invite&user=" + name;
   $.ajax(URL, {
    crossDomain:true, 
    dataType: "jsonp", 
    success:function(data,text,xhqr){
    }
   });

 

}
user_view = function(id)
{
    console.log(nbhang.waitlist[id]);
    dd = nbhang.waitlist[id];
    var ss = "";
    ss += '<div class="sport-user"><img width="120px" src="http://sportophile.com/' + dd.photo + '">';
    ss += '<br>name: ' + dd.name + '<br>';
    ss += 'question: ' + dd.question + '<br>';
    ss += 'waiting: 12:32';
    ss += '<br><a class="btn btn-small btn-success" href="javascript:user_invite(' + id +');">Invite Now </a>'
    ss += '<a class="btn btn-small btn-danger" href="javascript:user_view_close();"> Close</a></div>'
    
    $("#sport-userview").html(ss);
    $("#sport-userview").show();
 
    

}
sport_openlist_callback = function(stuff) 
{
   var lst = JSON.parse(stuff);
   nbhang.waitlist = lst;
   console.log(lst);
        var ss = "";
        ss += "<b>Current Queue</b> "
        ss += lst.length + " Users<br>";
        for(var i = 0; i < lst.length;i++) {
           //dd =  JSON.parse( lst[i]);
           var dd =  lst[i];
           ss += "<a onclick='user_view(" + i + ");' class='btn'>" ;
           ss += '<img width="54px" src="http://sportophile.com/' + dd.photo + '">';
        //ss += "<br><small>" + dd.name + "</small><br>";
        ss += "</a>";
        }
        $("#sport-userlist").html(ss);




}
sport_openlist = function() 
{
  var URL =  "https://sportophile.com/login/eventlist.php?c=hostlist";
   $.ajax(URL, {
    crossDomain:true, 
    dataType: "jsonp", 
    success:function(data,text,xhqr){
    }
   });


}
update_callback = function(stuff) {
   //console.log(stuff);
   var obj = JSON.parse(stuff);
   var ss = "<span class='sport-counter'>" + obj.viewers + "</span>";
   ss += "<span class='sport-label'>viewers</span><br>";
   ss += "<span class='sport-counter'>" + obj.waiting + "</span>";
   ss += "<span class='sport-label'>waiting</span>";
   ss += "<br><a class='btn btn-small btn-primary' href='javascript:sport_openlist()'>"
   ss += "update list</a>";
   $('#sport-status').html(ss);
    
   console.log(obj);
   
   setTimeout("nbhang.update_server();",15000);
}

nbhang.update_callback = function(stuff)
{
   console.log(stuff);
   setTimeout("nbhang.update_server();",15000);
  // console.log(stuff);
   //nbhang.update_interface();
}

nbhang.update_server = function()
{
  var yid  = gapi.hangout.onair.getYouTubeLiveId();
  var hurl = gapi.hangout.getHangoutUrl();
  var URL =  "https://sportophile.com/login/eventlist.php?c=update&yid=" + yid + "&hurl=" + hurl;
console.log("This is the routine");
/*
$.ajax({
    type: 'GET',
    dataType: "json",
    url: URL,
    success: function (responseData, textStatus, jqXHR) {
    	crossDomain:true, 
        console.log("in");
        //var data = JSON.parse(responseData['AuthenticateUserResult']);
        var data = JSON.parse(responseData);
        console.log(data);
    },
    error: function (responseData, textStatus, errorThrown) {
        alert('POST failed.');
    }
});
*/

/*
  $.get( URL, function( data ) {
	console.log(data);
  });

*/

   $.ajax(URL, {
    crossDomain:true, 
    dataType: "jsonp", 
    success:function(data,text,xhqr){
console.log("Test Flight Landed");
        $.each(data, function(i, item) {
            alert(item);
        });
    }
   });

/*
  $.get( "http://sportophile.com/hangout.php?yid=" + yid + "&hurl=" + hurl, function( data ) {
     	$( ".result" ).html( data );
  	alert( "Load was performed." );
  });
 
*/

} 


nbhang.jingle = function( v ) {

   console.log("Playing ");

   jingle1.play();

   console.log(jingle1);

}

nbhang.bug = function( uri ) {

   showNothing();
    arbitraryResource = gapi.hangout.av.effects.createImageResource(
        uri);

    // Use an onLoad handler 
    arbitraryResource.onLoad.add( function(event) {
        if ( !event.isLoaded ) {
        } else {
        }
    });

    // Create this non-moving overlay that will be 50% of the width
    // of the video feed.
    arbitraryOverlay = arbitraryResource.createOverlay(
        {'scale':
         {'magnitude': 0.25,
          'reference': gapi.hangout.av.effects.ScaleReference.WIDTH}});
    // Put the text x-centered and halfway down the frame
    arbitraryOverlay.setPosition(.30, 0.38);
    arbitraryOverlay.setVisible(true);

}
nbhang.showThird = function( name, uri, scale, posx, posy ) 
{
   return(nbhang.showOverlay('thirds', name, uri, scale, posx, posy ));
}

nbhang.showOverlay = function( section, name, uri, scale, posx, posy ) 
{

    if (!nbhang.sections) {
	nbhang.sections = new Array();
    }
    if (!nbhang.overlays) {
	nbhang.overlays = new Array();
    }

    if (!nbhang.sections[section]) {
        nbhang.sections[section] = new Object();
        nbhang.sections[section].active = "";
    } else {	
        if (nbhang.sections[section].active != "") {
             nbhang.overlays[nbhang.sections[section].active].overlay.setVisible(false);
             nbhang.sections[section].active = "";
	}
    }


    if (uri == "") return;
    if (!nbhang.overlays[name]) {
        nbhang.overlays[name] = new Object();
	nbhang.overlays[name].img = gapi.hangout.av.effects.createImageResource(uri);
	
        nbhang.overlays[name].img.onLoad.add( function(event) {
        if ( !event.isLoaded ) {
        } else {
        }
        });

         nbhang.overlays[name].overlay = nbhang.overlays[name].img.createOverlay(

        {'scale':
         {'magnitude': scale,
          'reference': gapi.hangout.av.effects.ScaleReference.WIDTH}});
    }
    nbhang.overlays[name].overlay.setPosition(posx, posy);
    nbhang.overlays[name].overlay.setVisible(true);
    nbhang.sections[section].active = name;


}

nbhang.lowerthird = function(uri, sc, posx, posy ) {
  var img = gapi.hangout.av.effects.createImageResource(nbhang.overlay(nbhang.username));
 // var overlayResource = gapi.hangout.av.effects.createImageResource(img);
  var overlay = img.createOverlay({});
  overlay.setPosition(0, .38);
  overlay.setVisible(1);
  
}

nbhang.facetrack = function( uri, sc ) {
    console.log("facetrack");
    if (nbhang.facetracker) {
	nbhang.facetracker.setVisible(false);
    console.log("hidden");
    }
    if (uri == "") return;

  var stache = gapi.hangout.av.effects.createImageResource( uri );
  var ovlay = stache.createFaceTrackingOverlay(
      {'trackingFeature':
       gapi.hangout.av.effects.FaceTrackingFeature.NOSE_TIP,
       'scaleWithFace': true,
       'rotateWithFace': true});
    ovlay.setScale(sc);
    ovlay.setVisible(true);
    nbhang.facetracker = ovlay;
/*
  minScale['stache'] = 0.65;
  maxScale['stache'] = 2.5;
*/

}

nbhang.sexythird = function(uri ) {
   showNothing();

    
    arbitraryResource = gapi.hangout.av.effects.createImageResource(
        uri);

    // Use an onLoad handler 
    arbitraryResource.onLoad.add( function(event) {
        if ( !event.isLoaded ) {
        } else {
        }
    });

    // Create this non-moving overlay that will be 50% of the width
    // of the video feed.
    arbitraryOverlay = arbitraryResource.createOverlay(

        {'scale':
         {'magnitude': 1.0,
          'reference': gapi.hangout.av.effects.ScaleReference.WIDTH}});


    // Put the text x-centered and halfway down the frame
    arbitraryOverlay.setPosition(0, 0.38);
    arbitraryOverlay.setVisible(true);

}


nbhang.overlay = function(string) {
  // Create a canvas to draw on
  var canvas = document.createElement('canvas');
  canvas.setAttribute('width', 720);
  canvas.setAttribute('height', 100);
  
  var context = canvas.getContext('2d');

  //ninbot_getstat();

  // Draw background
  context.fillStyle = '#0000';
  context.fillStyle = "rgba(0, 0, 0, 0.0)";
  context.fillRect(0,0,720,160);

  context.fillStyle = "rgba(0, 0, 0, 0.4)";
  context.fillRect(0,0,720,100);

  // Draw text
  context.font = '32pt Helvetica';
  context.lineWidth = 6;
  context.lineStyle = '#000';
//  context.fillStyle = '#FFF';
  context.fillStyle = "rgba(200, 200, 200, 1.0)";
  context.fillColor = '#ffff00';
  context.fillColor = '#ffff00';
  context.textAlign = 'center';
  context.textBaseline = 'bottom';
  // context.strokeText(string, canvas.width / 2, canvas.height / 2);
  context.fillText(string, canvas.width / 2, canvas.height / 2 + 30);

  return canvas.toDataURL();
}



nbhang.init = function () {
  gapi.hangout.onApiReady.add(function(eventObj) {
    console.log("Ninbot here");
    gapi.hangout.av.setLocalParticipantVideoMirrored(0);

    //var jingleurl1 = 'http://sportophile.com/sport-hangout/audio/jingle1.wav';
      // document.querySelector('#nbhang-msg').style.visibility = 'visible';
    // $('#nbhang-msg').html("Loaded");
  //  document.querySelector('#fullUI').style.visibility = 'visible';

/*
   jingle1 = gapi.hangout.av.effects.createAudioResource(
    jingleurl3).createSound({loop: false, localOnly: false});
*/

    $('#layout').html("");

/*
    var $b = $('<h3>Lower Third</h3>');   
    $('#layout').append($b);
    nbhang.addThird("Pro", 'lowerthird.png', 1, 0, .38);
    nbhang.addThird("Logo", 'logo500.png', .2, -.35, .4);
    // nbhang.addThird("Bug", 'logohead.png', .07, .35, .38);
    nbhang.addThird("None", '', 1, 0, 0);
*/
/*
    var $b = $('<hr><h3>Info Svc</h3>');   
    $('#layout').append($b);
*/
/*
    nbhang.addInfo("Jam Name", 'infoJam', 'name', 0, .4);
    nbhang.addInfo("2049", 'infoServer', '2049', 0, .4);
    nbhang.addInfo("2050", 'infoServer', '2050', 0, .4);
    nbhang.addInfo("2051", 'infoServer', '2051', 0, .4);
    nbhang.addInfo("2052", 'infoServer', '2052', 0, .4);
    nbhang.addInfo("None", null, '0');

*/

/*
    var $b = $('<hr><h3>Face Tracking</h3>');   
    $('#layout').append($b);
    nbhang.addFace("Ninbot", "logohead.png", 13);
    nbhang.addFace("Jimi", "jimi.png", 5);
    nbhang.addFace("Billy", "billy.png", 2.2);
    nbhang.addFace("None", "", 1);

*/



  });

}


nbhang.infoServer = function( arg ) 
{
   console.log(nbhang.servers);
   var i = arg -2049;
   var s = nbhang.servers;
   console.log(s);
   var s = nbhang.servers.servers[i];
   console.log(s);


   //var str = s.name + " " + s.users.length + " users ";
   var str2 = s.name;
   var str = "" ;
   for(var k = 1; k < s.users.length; k++) { 
	str += s.users[k].name + " ";
   }
   
//   return(nbhang.imgFromText(str, 720,486, 18, 'center'));
   return(nbhang.imgFromText(str, str2, 1280,1024, 24, 'center'));

}
nbhang.infoJam = function( arg ) 
{
   return(nbhang.imgFromText(nbhang.username,"", 720,100, 24,'center'));

}

nbhang.imgFromText = function( str, str2, w, h, fsize, align ) 
{
   var canvas = document.createElement('canvas');
   canvas.setAttribute('width', w);
   canvas.setAttribute('height', h);
  
  var context = canvas.getContext('2d');

  //ninbot_getstat();

  // Draw background
   context.fillStyle = '#0000';
   context.fillStyle = "rgba(0, 0, 0, 0.0)";
   context.fillRect(0,0,w,h);
/*
  context.fillStyle = "rgba(0, 0, 0, 0.4)";
  context.fillRect(0,0,720,100);

*/
  // Draw text
  context.font =  fsize + 'pt Helvetica';
// console.log("Font size  is " + fsize);
   context.font= fsize;
 //+ 'pt sans-serif";

//  context.lineWidth = 6;
  context.lineStyle = '#000';
//  context.fillStyle = '#FFF';
  context.fillStyle = "rgba(200, 200, 200, 1.0)";
  context.fillColor = '#ffff00';
  context.fillColor = '#ffff00';
  context.textAlign = align;
  context.textBaseline = 'bottom';
  // context.strokeText(string, canvas.width / 2, canvas.height / 2);
  context.fillText(str, 80 + canvas.width / 2, canvas.height / 2 + 30);
  context.fillText(str2, 80 + canvas.width / 2, canvas.height / 2 -10);

  return canvas.toDataURL();

}


nbhang.showInfo = function(name, func, arg, x, y)
{
   if (nbhang.currentInfo) {
        if (nbhang.currentInfo != "") {
	    nbhang.currentInfo.setVisible(false);
	    nbhang.currentInfo = "";
	}
   } else {
	nbhang.currentInfo = "";
   }
   if (func == "null")  return;
   if (func == null) return;
   if (func == "infoServer") {

       var data = nbhang.infoServer( arg );

   }
   if (func == "infoJam") {
       var data = nbhang.infoJam( arg );
	
   } 
   var img = gapi.hangout.av.effects.createImageResource(data);
   //var img = exec(func + "(" + arg + ")");
// var img = gapi.hangout.av.effects.createImageResource(
//	nbhang.overlay( func(arg) ));
	
   nbhang.currentInfo = img.createOverlay({});
    nbhang.currentInfo.setScale(1., 
        gapi.hangout.av.effects.ScaleReference.WIDTH);

   nbhang.currentInfo.setPosition(x, y);
   //nbhang.currentInfo.setScale(.5);
   nbhang.currentInfo.setVisible(true);
   //nbhang.currentInfo = overlay;


  
}


nbhang.addInfo = function(name, func, arg, posx, posy)
{

   var $b  = $('<input class="button" type="button" value="' + name + '" onClick="nbhang.showInfo(\'' + name + '\',  \'' + func + '\', \'' + arg +  '\',  ' + posx +  ',  ' + posy + ')"\>');
   $('#layout').append($b);
}
nbhang.addThird = function(name, img, scale, posx, posy)
{
   var fmage = "";
   if (img) {
	fmage = 'https://sportophile.com/sport-hangout/' + img;
   }
   var $b  = $('<input class="button" type="button" value="' + name + '" onClick="nbhang.showThird(\'' + name + '\',  \'' + fmage + '\', ' + scale + ', ' + posx + ', ' + posy + ')"\>');
   $('#layout').append($b);
}
/*
{
    return(nbhang.addOverlay ('thirds', name, img, scale, posx, posy));
nbhang.addThird = function(name, img, scale, posx, posy)
{
   var fmage = "";
   if (img) {
	fmage = 'https://sportophile.com/app/google-hangout/' + img;
   }
   var $b  = $('<input class="button" type="button" value="' + name + '" onClick="nbhang.showThird(\'' + fmage + '\', ' + scale + ', ' + posx + ', ' + posy)"\>');
   $('#layout').append($b);
}
*/



nbhang.addFace = function(name, img, scale)
{
   var fmage = "";
   if (img) {
	fmage = 'https://sportophile.com/sport-hangout/' + img;
   }
   var $b  = $('<input class="button" type="button" value="' + name + '" onClick="nbhang.facetrack(\'' + fmage + '\', ' + scale + ')"\>');
   $('#layout').append($b);

}


gadgets.util.registerOnLoadHandler(nbhang.init);
});
