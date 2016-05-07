<?php
//
//  All the serverside ajax is handled here.
//  Todo replace the file model with database keystore
//

   session_start();

function fake_live_event( $id )
{
    $ev = Array();
    $ev['event'] = $id;
    $ev['host'] = "MrDemo";
    $ev['name'] = "Live With Richard Branson";
    $ev['yid'] = "Vy9y_YSpYxA";
    $ev['hurl'] = "xxx";
    $ev['last'] = time();
    $ev['live'] = 1;
    return($ev);



}
function fake_event( $id )
{
    $ev = Array();
    $ev['event'] = $id;
    $ev['host'] = "MrDemo";
    $ev['name'] = "Hangout Sir Richard Branson";
    $ev['yid'] = "Vy9y_YSpYxA";
    $ev['hurl'] = "";
    $ev['last'] = 0;
    return($ev);

}

function fake_user($i)
{  
    $user = Array();


    $user['name'] = "J Smith " . (rand() % 10);
    $user['anim'] = "";
    //$user['photo'] = "img/h" .((rand() % 24) +1) . ".png";
    $user['photo'] = "img/h" .(($i % 24) +1) . ".png";
    $user['question'] = "What is your favorite color?";
    
    return($user);
}
   $data = Array();

   $cmd = $_GET["c"];
   
   //$data['bob'] = 'yes';
   if ($cmd == "list") {
      $lst = scandir("events/");
      $cnt = 0;
      foreach ($lst as $a) {
	if ($a != '.' && $a != '..') {
	   $data[$cnt] = file_get_contents("events/" . $a);
	   $data[$cnt] = json_decode($data[$cnt], 1);
   	

	   $cnt++;
	}
      }
      //$data[$cnt] = json_encode(fake_event("X11")); $cnt++;
      //$data[$cnt] = fake_event("X11"); $cnt++;
      //$data[$cnt] = fake_live_event("live_100"); $cnt++;
      //$data[$cnt] = fake_live_event("live_101"); $cnt++;
      //$data[$cnt] = fake_event(); $cnt++;
      //$data[$cnt] = fake_event(); $cnt++;
      $seconds = time();
      for ($i =0; $i < $cnt; $i++) {
	   $rslt = $seconds - $data[$i]['last'];
	if ($rslt > 10000)  {
	//	$data[$i]->live = 0;
		//$data[$i]->live = $rslt;
		$data[$i]['live'] = 0;
	} else {
		//$data[$i]['live'] = "YES";
		//$data[$i]->live = $rslt;
		$data[$i]['live'] = 1;
	}

      }

      $json = json_encode($data);
      echo $json;
   }
   if ($cmd == "qlist") {
      $event = $_GET['event'];
      $data = Array();
      for($i = 0; $i < 24; $i++) {
	$data[$i] = fake_user($i);
      }
      $json = json_encode($data);
      echo $json;
   }
   if ($cmd == "new") {	
	$eventname = $_GET["name"];
	$eventuser = $_SESSION['username'];
    	$yid  = '';
    	$hurl = '';
 	$data = Array();
	$jul = date('Ymd_His');
	$seconds = time();

	$data['event'] = $jul;
	$data['name'] = $eventname;
	$data['host'] = $eventuser;
	$data['yid'] = $yid;
	$data['hurl'] = $hurl;
	$data['last'] = $seconds;

        $json = json_encode($data);

        //$data = "{ 'name': '$eventname', 'host': '$eventuser',  'event': '$yid',  'hurl': '" . $hurl . "' }";

	$_SESSION['event'] = $jul;
	$fname = "events/" . $jul . ".json";
        file_put_contents($fname, $json);
	print $json;
	
   }
   if ($cmd == "join") {	
	$_SESSION['linepos'] = rand() % 15 + 15;
       	echo "yes";
   }
   if ($cmd == "query") {	
	$event = $_GET['event'];
	$fname = "events/" . $event . ".json";
	if (file_exists($fname)) {
             $json = file_get_contents($fname);
  	} else {
             $json = json_encode(fake_live_event($event));
	}
	$data = json_decode($json, 1);
	$lp = $_SESSION['linepos'];
	if ($lp > 1) {
	    $lp = $lp - (rand() % 5);
	    if ($lp < 1) $lp =1;
 	}
	$data['linepos'] = $lp;
	$_SESSION['linepos'] = $lp;



	$seconds = time();
	   $rslt = $seconds - $data['last'];
	if ($rslt > 10000)  {
		$data['live'] = 0;
	} else {
		//$data[$i]['live'] = "YES";
		//$data[$i]->live = $rslt;
		$data['live'] = 1;
	}

	$json = json_encode($data);
       	echo $json;
   }

   // Called By Hangout to update the current event same as qlist but has 
   // function wrapper
   if ($cmd == "invite") {	
      $event = $_SESSION['event'];
      $userid = $_GET['user'];
      header('Content-Type: application/javascript');
      echo ("user_invite_callback('" . $user . " invited to " . $event . "');");
	
   }
   if ($cmd == "hostlist") {	
      $event = $_GET['event'];
      $data = Array();
      for($i = 0; $i < 24; $i++) {
	$data[$i] = fake_user($i);
      }
      $json = json_encode($data);
	header('Content-Type: application/javascript');
       echo ("sport_openlist_callback('" . $json . "');");

   }
   if ($cmd == "update") {	
	$event = $_SESSION['event'];
	$yid = $_GET["yid"];
	$hurl = $_GET["hurl"];
	if ($event) {
	    $fname = "events/" . $event . ".json";
            $json = file_get_contents($fname);
	    $data = json_decode($json, 1);
	    $data['yid'] = $yid;
	    $data['hurl'] = $hurl;
	    $seconds = time();
	    $data['last'] = $seconds;
	    $json = json_encode($data);
            file_put_contents($fname, $json);

       	    //echo $json;
	    header('Content-Type: application/javascript');
	 
	    $data['viewers'] = 150 + (rand() %15) ; 
	    $data['waiting'] = 24;
	    $json = json_encode($data);
	    echo ("update_callback('" . $json . "');");
	} else {
	    echo ("update_callback('this is user message');");
	}
    }

?>
