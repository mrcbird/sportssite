<?php
include "framework/spage.php";
superpage_head("Sportophile Test1");
?>
<img  src="img/sportop_720.png" width="40%">
<br><br>
<form name"contact" action="sendmail.php" class="well span8">
    <div class="row">
        <div class="span3">
     	    <label>First Name</label>
            <input type="text" name="first" class="span3" placeholder="Your First Name">
            <label>Last Name</label>
            <input type="text" name="last" class="span3" placeholder="Your Last Name">
            <label>Email Address</label>
            <input type="text" name="email" class="span3" placeholder="Your email address">
            <label>Subject</label>
            <select id="subject" name="subject" class="span3">
                    <option value="na" selected="">Choose One:</option>
                    <option value="service">General Customer Service</option>
                    <option value="suggestions">Suggestions</option>
                    <option value="product">Product Support</option>
            </select>
         </div>
         <div class="span5">
            <label>Message</label>
            <textarea name="message" id="message" class="input-xlarge span5" rows="10"></textarea>
         </div>
         <button type="submit" class="btn btn-primary pull-right">Send</button>
    </div>
    </form>
    <div style='clear:left;' ></div><br>


<?php
superpage_tail();
?>
