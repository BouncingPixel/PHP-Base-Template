<?php
	class Helpers {
		public function __construct( $path = "." ) {
			$this->basePath = $path;
			include( "$this->basePath/config.php" );
		}

		public function CheckSession( $mustBeLoggedIn = false ) {

			// create a session if one doesn't exist
			session_start();

		}

		public function DisplaySessionMessages() {
			$messages = "";
			if( isset( $_SESSION['error'] ) ) {
				 $messages .= $_SESSION['error'];
				unset( $_SESSION['error'] );
			}
			if( isset( $_SESSION['notice'] ) ) {
				$messages .= $_SESSION['notice'];
				unset( $_SESSION['notice'] );
			}
			return $messages;
		}

		// HTTP or HTTPS
		public function ForceSSL() {
			$newurl = "";
			if(stripos($_SERVER['REQUEST_URI'], substr("ssl", 0))) {
				$newurl = "https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
			}	else {
				$_SERVER['HTTPS'] = "off";
				$newurl = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
		 	}
		 	header("Location: ".$newurl);
		}

		// Check for Facebook Leads
		public function ForcePPCID() {
			if(stripos($_SERVER['REQUEST_URI'], substr("fb", 0))) {
				// create a session if one doesn't exist
				session_name( 'FHA-FB' );
				session_start();

				// sets the default sessions
				$_SESSION['PPCID'] = "108";
				$_SESSION['CID'] = "Facebook";
		 	}
		 	header("Location: index.php");
		}

		public function IncludeHTML( $file ) {
			readfile( "$this->basePath/includes/$file.html" );
		}

		public function IncludePHP( $file ) {
			include_once( "$this->basePath/includes/$file.php" );
		}

		public function IncludePiece( $file ) {
			$helper = $this;
			include_once( "$this->basePath/pieces/$file.php" );
		}

		public function IncludeLib( $file ) {
			$helper = $this;
			include_once( "$this->basePath/libs/$file.php" );
		}

		public function ConvertForDisplay( $string ) {
			return nl2br( $string );
		}

		public function getFullPath() {
			return $this->basePath;
		}

		public function getUrl(  ){
			$url = $_SERVER["REQUEST_URI"];
			$pcs = explode( '/', $_SERVER["REQUEST_URI"]);
			return array_pop ( $pcs );
		}

    public function ConvertForListDisplay( $string ) {
      return '<li>' . str_replace("\n", '</li><li>', $string) . '</li>';
    }

		public function DisplayAssetUpload( $folder, $file ) {
			if(isset($folder) && $folder != "") {
				echo "/".$folder."/assets/definitions/".$file;
			} else {
				echo "/assets/definitions/".$file;
			}
		}

		public function DisplayTemplate( $variableArray = array() ) {
			$message = Helpers::DisplaySessionMessages(); $helper = $this; extract( $variableArray, EXTR_REFS );
			ob_start();
			include( "./templates/$template.php" );
			return ob_get_clean();
		}

		private $basePath;
	}
?>
