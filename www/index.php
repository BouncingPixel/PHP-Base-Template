<?php
// This includes the helper functions
include("pieces/helpers.php") ;
global $helper;
$helper = new Helpers( "." );
// The helper function for MySQL database queries
$helper->IncludePiece( "mysqliData" );
global $PIECES;

// The helper function to set up a session
$helper->CheckSession( false );

// Build the $page array
$page = array();
$page[ 'title' ] = "PHP Started Template";
$page[ 'description' ] = "This is a basic PHP template (and file structure) we use";
$page[ 'keywords' ] = "PHP";

ob_start(); ?>
	<!-- Content starts here -->
	
  <h1>PHP Starter Template</h1>

	<p>This is a basic PHP template (and file structure) we use.  It is built to be responsive in design, can use MySQL as its database resource and is deployable on Heroku.</p>


	<!-- Content ends here -->
	<?php
	// OUTPUT $page array AND $page_body TO THE TEMPLATE
	$page[ 'page_body' ] = ob_get_clean();
	$page[ 'template' ] = 'template-basic';
	// Display the page
	echo $helper->DisplayTemplate( $page );

	?>
