<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title><?php echo $title; ?></title>
	<meta name="Description" content="<?php echo $description; ?>" />
	<meta name="Keywords" content="<?php echo $keywords; ?>" />
	<meta name="Robots" CONTENT="NOODP, index, follow">
	<!-- ADD SITE SPECIFIC GOOGLE VARIFICATION ID IF NEEDED -->
	<meta name="google-site-verification" content="" />
	<meta name="viewport" content="width=device-width initial-scale=1" />

	<!-- ADD FAVICON -->
	<link type="image/x-icon" href="favicon.ico" rel="shortcut icon" media="all">

    <!-- ADD FONTS -->
    <link rel='preload' href='../assets/fonts/source-sans-pro/source-sans-pro-v14-latin-regular.woff2' as='font' type='font/woff2' crossorigin='anonymous'/>
	<link rel='preload' href='../assets/fonts/source-sans-pro/source-sans-pro-v14-latin-600.woff2' as='font' type='font/woff2' crossorigin='anonymous'/>
	<link rel='preload' href='../assets/fonts/source-sans-pro/source-sans-pro-v14-latin-700.woff2' as='font' type='font/woff2' crossorigin='anonymous'/>
	<link rel='preload' href='../assets/fonts/roboto/roboto-v27-latin-regular.woff2' as='font' type='font/woff2' crossorigin='anonymous'/>
    <link rel='preload' href='../assets/fonts/roboto/roboto-v27-latin-500.woff2' as='font' type='font/woff2' crossorigin='anonymous'/>
	
	<!-- MAIN STYLESHEET WITH RESPONSIVE BREAK-POINTS FOR TABLET AND PHONE -->
	<link type="text/css" href="assets/styles/global-responsive.css" rel="stylesheet" media="all" />

	<!-- Google Analytics and Quantcast -->
	<?php include("partials/metrics.php"); ?>

</head>

<body>

  <?php echo $page_body; ?>


  <!-- JS PLACED AT THE BOTTOM OF THE PAGE FOR FASTER LOADING -->
  <script src="assets/scripts/jquery.min.js"></script>
  <script src="assets/scripts/main.js"></script>

</body>
</html>
