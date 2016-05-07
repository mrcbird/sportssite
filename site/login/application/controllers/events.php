<?php
class events extends controller {
        function talk()
	{
            $this->loadview( "events/talk" );
	}
        function join()
        {
	    if( ! isset( $_SESSION["user"] ) ){
                $this->redirect( "users/login" );
            }
	    $user = $this->loadModel( "user" );
	    $user_data = $user->find_by_id( $_SESSION["user"] );
            $this->loadview( "events/join" );
	}
        function start()
        {
	    if( ! isset( $_SESSION["user"] ) ){
                $this->redirect( "users/login" );
            }

	    $user = $this->loadModel( "user" );
	    $user_data = $user->find_by_id( $_SESSION["user"] );

    	    if ($user_data['id'] > 3) {
                $this->redirect( "users/profile" );
	    }
            $this->loadview( "events/start" );
        }
}
?>
