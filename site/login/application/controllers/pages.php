<?php
class pages extends controller { 
	function help()
	{
		$this->loadView( "pages/help" );
	}

	function error()
	{
		$this->loadView( "pages/error" );
	}

	function about()
	{
		$this->loadView( "pages/about" );
	}
	function contact()
	{
		$this->loadView( "pages/contact" );
	}
	function live()
	{
		$this->loadView( "pages/live" );
	}
	function future()
	{
		$this->loadView( "pages/future" );
	}
	function create_event()
	{
		$this->loadView( "pages/create_event" );
	}
	function edit_profile()
	{
		$this->loadView( "pages/edit_profile" );
	}
	function past()
	{
		$this->loadView( "pages/past" );
	}
	function buystuff()
	{
		$this->loadView( "pages/buystuff" );
	}
	function agreement()
	{
		$this->loadView( "pages/agreement" );
	}
}
