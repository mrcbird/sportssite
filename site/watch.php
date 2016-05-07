<?php
	session_start();
        unset($_SESSION['timer']);

        header('Location: index.php');

?>
