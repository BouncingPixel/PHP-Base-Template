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

// The database connection helper using the $PICECES defined in the config.php page.
// Un-comment this line when you want to establish a database connection and run queries.
// $dataConnection = new MysqliData( $PIECES[ 'databaseLocation' ], $PIECES[ 'databaseUserName' ], $PIECES[ 'databasePassword' ], $PIECES[ 'database' ] );

// Build the $page array
$page = array();
$page[ 'title' ] = "PHP Started Template";
$page[ 'description' ] = "This is a basic PHP template (and file structure) we use";
$page[ 'keywords' ] = "PHP";

ob_start(); ?>
	<!-- Content starts here -->
	<div style="margin:10px;">

	  <h1>PHP Starter Template</h1>

		<br />

		<p>This is a basic PHP template (and file structure) we use.<br />It is built to be responsive in design, can use MySQL as its database resource and is deployable on Heroku.</p>


	</div>

	<!-- Content ends here -->
	<?php
	// OUTPUT $page array AND $page_body TO THE TEMPLATE
	$page[ 'page_body' ] = ob_get_clean();
	$page[ 'template' ] = 'template-basic';
	// Display the page
	echo $helper->DisplayTemplate( $page );

	?>
