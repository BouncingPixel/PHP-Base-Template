<?php
// This includes the helper functions
include("../config/helpers.php");
$helper = new Helpers();
// The helper function for MongoDB database connections (queries)
// include("../config/mongoData.php");
global $PIECES;

// The helper function to set up a session
$helper->CheckSession();

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

		<p>This is a basic PHP template (and file structure) we use.<br />It is built to be responsive in design, can use MongoDB as it's database resource and is deployable on Heroku.</p>


	</div>

	<!-- Content ends here -->
	<?php
	// OUTPUT $page array AND $page_body TO THE TEMPLATE
	$page[ 'page_body' ] = ob_get_clean();
	$page[ 'template' ] = 'template-basic';
	// Display the page
	echo $helper->DisplayTemplate( $page );

	?>
