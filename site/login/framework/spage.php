<?php

function bootstrap_head()
{

    print('<meta charset="utf-8">
    <title>Sportophile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <!-- Le styles -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="/assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="/assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="/assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="/sport/sport-hangout/hangout_32.png"> ');
}

function bootstrap_body()
{
    print('
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="index.php">Sportophile</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="?route=pages/about">About</a></li>
              <li><a href="?route=pages/contact">Contact</a></li>');

	      if (isset($_SESSION['user'])) {
              	  print('<li><a href="?route=users/logout">Logout</a></li>');
	      } else {
                  print('<li><a href="?route=users/login">Login</a></li>');
	      }
 print('
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container"> ');


}
function bootstrap_tail()
{

    print('
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/bootstrap-transition.js"></script>
    <script src="/assets/js/bootstrap-alert.js"></script>
    <script src="/assets/js/bootstrap-modal.js"></script>
    <script src="/assets/js/bootstrap-dropdown.js"></script>
    <script src="/assets/js/bootstrap-scrollspy.js"></script>
    <script src="/assets/js/bootstrap-tab.js"></script>
    <script src="/assets/js/bootstrap-tooltip.js"></script>
    <script src="/assets/js/bootstrap-popover.js"></script>
    <script src="/assets/js/bootstrap-button.js"></script>
    <script src="/assets/js/bootstrap-collapse.js"></script>
    <script src="/assets/js/bootstrap-carousel.js"></script>
    <script src="/assets/js/bootstrap-typeahead.js"></script>

   ');

}
function spage_head( $title)
{
    session_start();
    print('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">');
    print('<html xmlns="http://www.w3.org/1999/xhtml">');
    print('<head>');
    printf('<title>' . $title . '</title>');
    $userinfo = array(
                'chris'=>'goteam',
                'tom'=>'yes'
                );

    if(isset($_GET['logout'])) {
        $_SESSION['username'] = '';
        header('Location:  ' . $_SERVER['PHP_SELF']);
    }

    if(isset($_POST['username'])) {
        if($userinfo[$_POST['username']] == $_POST['password']) {
             $_SESSION['username'] = $_POST['username'];
         }else {
             //Invalid Login
         }
    }
    print('</head>');
    print("<html>");
}
function spage_body()
{
    printf("<body>");
    if($_SESSION['username']) {
        // <button class="btn btn-success">Login</button>

    } else {
         bootstrap_login();
/*
	print('<form name="login" action="" method="post">
            Username:  <input type="text" name="username" value="" /><br />
            Password:  <input type="password" name="password" value="" /><br />
            <input type="submit" name="submit" value="Submit" />
        </form>');
*/
	superpage_tail();
	exit;
    } 
    printf("</body>");

}
function bootstrap_login()
{
print('<form class="form-horizontal" action="" method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Login</legend>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Username</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
      </div>
    </div>
 
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Login</button>
      </div>
    </div>
  </fieldset>
</form>');

}
function spage_tail()
{
    print("</html>");
}

function superpage_head($title)
{
//   spage_head($title);
   bootstrap_head($title);
   bootstrap_body($title);
//   spage_body($title);
}
function superpage_tail()
{
    if($_SESSION['username']) {
            print('<br><br><hr><b>Logged in as ' . $_SESSION["username"].  ' ' . 
	'<a  class="btn btn-susscess" href="?logout=1">Logout</a></p>');
        // <button class="btn btn-success">Login</button>

    }
   bootstrap_tail();
   spage_tail();
}

?>
