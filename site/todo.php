<?php
include "framework/spage.php";
superpage_head("Sportophile Test1");
?>

<h1>Sportophile</h1>
<p>Todo List</p>


<h3>General</h3>

<ul>
<li>User Login</li>
<li>Gmail Identity (may or may not need)</li>
</ul>

<h3>Host</h3>
<ul>
<li>Schedule/Add a Hangout</li>
<li>Launch Hangout</li>
<li>Hangout App</li>
<li>Get URL for Users</li>
<li>Get Youtube URL for Users</li>
<li>Dev app for host </li>
</ul>

<h3>Guest</h3>
<ul>
<li>Show List Of Hangouts in session</li>
<li>Show List of upcoming hangouts</li>
<li>Click on a Hangout takes you to queue/watch page</li>
<li>Take a picture or record your queue video</li>
<li>Handle invited user - button appears linking to hangout</li>
<li>Possibly when user is next in line a button will appear asking them if they are ready</li>
</ul>

<h3>DB Stuff</h3>
<ul>
<li>User DB
	<ul><li>userid - key</li></ul>
	<ul><li>email -varchar</li></ul>
	<ul><li>first -varchar</li></ul>
	<ul><li>last -varchar</li></ul>
	<ul><li>pass -char(md5)</li></ul>
</li>
<li>Event DB
	<ul><li>hostid - userid</li></ul>
	<ul><li>data - date</li></ul>
	<ul><li>time - time</li></ul>
	<ul><li>tzone</li></ul>
	<ul><li>desc</li></ul>
	<ul><li>status</li></ul>
	<ul><li>youtubeurl</li></ul>
	<ul><li>hangurl</li></ul>
	<ul><li>qtable</li></ul>
</li>
<li>Event Queue
	<ul><li>eventid  - userid</li></ul>

</li>
<li>Add New Event
	
	<ul><li></li></ul>
</li>
<li>List Events</li>
<li>Add user to the user Queue</li>
<li>Remove user from the user Queue</li>
<li>User/Password</li>
</ul>

<h3>Stuff to order</h3>
<ul>
 <li>Server Linode - monthly $29.95</li>
 <li>Domain $9.95 Year</li>
 <li>Security Cert $200 Year (or included domain)</li>
</ul>

<h3>Hours Log</h3>
<ul>

<li>2013-09-16 (3.5)<ul>
    <li>12:30-1:30 Meeting</li>
    <li>2:00-4:30 Research and Design</li>
</ul></li>
<li>2013-09-17 (6.0)<ul>
    <li>10:30-1:00<ul> 	
        <li>Design (see above list)</li>
        <li>Photos</li>
        <li>Started Layout</li>
    </ul><li>1:30-5:00<ul> 		
        <li>Created Initial Hangout app</li>
	<li>Created some Simple Logos</li>
</ul></ul><li>2013-09-18 (6.5)<ul>
    <li>2:00-3:00<ul> 		
        <li>More wrestling with hangout app</li>
	
    </ul><li>20:00-01:30<ul> 		
	<li>moved everything to ninbot for ssl access</li>
	<li>Got username from site to show in hangout</li>
	<li>Hangout app now knows if you are a Host or Guest</li>
	<li>found some webcam face GIF software</li>
	<li>Started testing mysqlite as a simple prototype</li>
	<li></li>
    </ul></li>
</ul></li>
<li>2013-09-19 (11.0)<ul>
    <li>8:30-11:30<ul> 	
        <li>scripting from hangout app back to server working</li>
    </ul><li>13:30-17:00<ul> 		
        <li>Got php simple schema event list/new/and update working</li>
    </ul><li>20:30-24:00<ul> 
        <li>Working on getting the lists to show and update</li>
        <li>Event now launching and registering</li>
        <li>Need to get update working from hangout wtf</li>
    </ul></li>
</ul></li>
<li>2013-09-20 (7h)<ul>
    <li>10:30-11:30<ul> 	
	<li>You Tube live stream now shows</li>
    </ul><li>12:00-18:00<ul> 	
	<li>List of shows in past shows icon from youtube</li>
	<li>Hangout button when invited</li>
	<li>Fake queue of fake people added</li>
	<li>Added question and button to join the queue</li>
    </ul><li>left<ul> 

	<li>Get it so its updating corectly from hangout</li>
	<li> Display the youtube live</li>
	<li> Show the Queue Somehow</li>
	<li> Trigger "Your Turn now from host</li>
	<li> Allow user to join server or autojoin for them</li>
    </ul></li>
</ul></li>
<li>2013-09-23  (6 hr)<ul>
    <li>9:30-3:30<ul> 	
	<li>added the user queue test</li>
    </ul></li>
</ul></li>
<li>2013-09-24 (6.5 hr -46.5) <ul>
    <li>10:30-5:00<ul> 	
	<li>added hangout user selector</li>
	<li>hangout layout update</li>
	<li>cleaning up demo data</li>
	<li>better test user data</li>
	<li>bootstrap controls and css in hangout now looks nice</li>
    </ul></li>

    </ul></li>
<li>2013-09-25 (2 hr ) <ul>
    <li>12:00-2:00<ul> 	
	<li>Delivery and Lunch</li>
    </ul></li>
    </ul></li>
<li>Billed $2000 (40 hrs) <ul>
    </ul></li>
<hr>
<li>2013-10-11 (1 hr ) <ul>
    <li>3:00-4:00<ul> 	
	<li>Skype Discussion</li>
	<li>Tests for Youtube Embedding</li>
    </ul></li>
    </ul></li>
<li>2013-10-13 (1 hr ) <ul>
    <li>1:00-2:00<ul> 	
	<li>Messing with Google Logins</li>
    </ul></li>
    </ul></li>
<li>2013-10-14  <ul>
    <li>10:30-14:00<ul> 	
	<li>New Logo and Organization</li>

    </ul></li>
    </ul></li>
</ul></li>
Todo Round 2--
 	- Google Logins Harder than Expected
	- Need more time to make it work
	- Time to move to your own server 
	- Rates sheet needed too stressful less than 1 day.
	  will have to bill for hosting as well
	
	
Todo--
 - prettier hangout controls
 - click on user in Live Now view
 - better test names
 - add question
 - test overlay?




</ul>
<?php
superpage_tail();
?>

