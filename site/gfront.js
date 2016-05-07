
$().ready(function() {

    update_page();

    //update_queue();


});

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
