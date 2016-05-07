<?php
include "framework/spage.php";
superpage_head("Sportophile Test1");
?>

<h4>Notes from Web 09/19/13</h4>
API Ref
https://developers.google.com/+/hangouts/api/gapi.hangout.onair#gapi.hangout.onair.onYouTubeLiveIdReady

<h4>Notes from Lunch 09/16/13</h4>
<ul>
<li>Most Important to see people in the queue</li>
<li>Check out HuffPost Live</li>
<li>Check out Chatting Cage</li>
<li>Check out Expertory.com</li>
<li>Would like 2 Big images of guest and host</li>
<li>Would ideally like 4x4 Guest grid</li>
<li>We Agreed to begin the job</li>
<li>We Agreed chris to pay next week</li>
<li>We Agreed tom to keep in touch status</li>
</ul>


<h4>Notes from 09/16/13</h4>
<pre>
use gapi.hangout.getHangoutUrl();


http://stackoverflow.com/questions/12987140/invite-participant-in-hangout

Overview
https://plus.google.com/+FraserCain/posts/PaeeynDx34L


https://groups.google.com/forum/#!topic/google-plus-developers/rI7bz3u94Gk

Based on that use-case, if I were you, I would consider two options:

Develop a private Hangout extension that can also reach a server over which you have control. Your Hangout link would have the gid=[your appID] on the URL, along with potentially a trainingEventID on "gd=" in the queryString and when opened, it would:
1) See if this particular Hangout has been announced by checking a variable in the script... "var didAnnounce = false;" (if so, end processing)
2) If not, see if the participant entering the Hangout is one of your designated trainers (if not end processing)
3) If so, build your Hangout link using the address on gapi.hangout.getHangoutUrl() along with any AppID on "gid" and any needed data on "gd".
4) URL-Encode the above URL and send to your waiting server, which would build a mailing list of participants (either a special group based on trainingEventID or just your generic "everyone" mailing list) and use a SendMail function to deliver the invitation via email.
5) Set "didAnnounce = true;" to avoid unwanted duplication.

Or... the trainer can just use the "Invite" button on the Hangout interface so it appears in Notifications. Seems easier to just invite prepared circles to me, but you could go the development route, too.
---
Starting a hangout from website - google says naw
http://productforums.google.com/forum/#!topic/google-plus-discuss/CBl7ChenM8w%5B1-25-true%5D
video says yes
http://www.youtube.com/watch?v=Al4SbeVyLm4

How to launch an app from the button...

https://developers.google.com/+/hangouts/button

http://productforums.google.com/forum/#!topic/google-plus-discuss/neMXkRRQNFU
start it with hangouts on air...
https://plus.google.com/hangouts/_?hso=0&gid=<appID>

The API
https://developers.google.com/+/hangouts/api/gapi.hangout

Sign in
https://developers.google.com/+/web/signin/


Designing a queue

http://stackoverflow.com/questions/13354266/php-front-end-user-queue


Kick/Ban a user 

The new QA list 
https://plus.google.com/116916940622399669871/posts/JUkdfm6cRkW



You'll be prompted to invite your friends or circles before you enter the Hangout On Air. Please note that you can't invite the public to join a Hangout on Air but, you can open the broadcast for public viewing by clicking Start broadcast from within the Hangout On Air window.

</pre>

<?php
superpage_tail();
?>
