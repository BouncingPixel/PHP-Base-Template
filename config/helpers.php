<?php
	class Helpers {
		public function __construct( $path = "." ) {
			$this->basePath = dirname(__DIR__);
			include( $this->basePath."/config/config.php" );
		}

		public function CheckSession( $mustBeLoggedIn = false ) {

			// create a session if one doesn't exist
			if( ! isset($_SESSION) ){
				session_name( "tHisIStheBestSessionName05032018" );
				session_start();
				//(24 * 3600)
			}

			// sets the default sessions
			if( !isset($_SESSION['loggedIn']) ) {
				$_SESSION['loggedIn'] = false;
			}

			if( !isset($_SESSION['superUser']) ) {
				$_SESSION['superUser'] = false;
			}

			if( $mustBeLoggedIn && $_SESSION['loggedIn'] == false ) {
				$_SESSION['notice'] = "You must be logged in.";
				$file = $_SERVER["SCRIPT_NAME"];
				// We need to redirect to login page(index.php) every time except when the request comes from itself.
				if( $pfile != "/index.php" ) {
					header("Location: /index.php");
				}
			}
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

		public function ForceSSL() {
			if($_SERVER["HTTPS"] != "on") {
				$newurl = "https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
				header("Location: $newurl");
				exit();
			}
		}

		public function IncludeHTML( $file ) {
			readfile( "$this->basePath/www/includes/$file.html" );
		}

		public function IncludePHP( $file ) {
			include_once( "$this->basePath/www/includes/$file.php" );
		}

		public function IncludePiece( $file ) {
			$helper = $this;
			include_once( "$this->basePath/config/$file.php" );
		}

		public function IncludeLib( $file ) {
			$helper = $this;
			// include_once( "$this->basePath/libs/$file.php" );
			include_once( "$file.php" );
		}

		public function ConvertForDisplay( $string ) {
			return nl2br( $string );
		}

		public function getFullPath() {
			if($_SERVER["HTTPS"] != "on") {
				return "http://".$_SERVER['HTTP_HOST'];
			} else {
				return "https://".$_SERVER['HTTP_HOST'];
			}
		}

		public function getUrl(  ){
			$url = $_SERVER["REQUEST_URI"];
			$pcs = explode( '/', $_SERVER["REQUEST_URI"]);
			return array_pop ( $pcs );
		}

		// MongoDB Helpers
		public function getTimeStringMongo( $dVals ){
			return date("m/d/Y", $dVals->sec);
		}

		public function makeMongoID( $mid ){
			return new MongoID( $mid );
		}

		public function makeMongoDate( $dVals ){
			$mongoDate = MongoDB\BSON\fromPHP([$dVals => 9]);
			return $mongoDate;
			// return new MongoDate( $dVals );
		}

		// Date-Time Helpers
		public function getTimeString( $dVals ){
			return date("m/d/Y", strtotime($dVals));
		}

		public function ConvertTimeDatabase( $dVals ){
			$db_date = '';
			if( isset( $dVals ) ) {
				$db_date  = DateTime::createFromFormat('m-d-Y', $dVals );
			}
			return date_format($db_date, 'Y-m-d H:i:s');
		}

		// Character Encoding Helpers
		public function ConvertUnicode( $string ) {
      return html_entity_decode(preg_replace("/U\+([0-9A-F]{4,5})/", "&#x\\1;", $string), ENT_NOQUOTES, 'UTF-8');
    }

    public function ConvertOthers( $string ) {
      return html_entity_decode(preg_replace("/â€+((œ)|(™)|(˜)|(“)|(){1,5})/", "&#x\\1;", $string), ENT_NOQUOTES, 'UTF-8');
    }

    public function ConvertAscii( $string ) {
      return iconv("windows-1252", "utf-8", $string);
    }

    public function ConvertWindows( $string ) {
      return iconv("ISO-8859-1", "UTF-8", $string);
    }

    public function ReplaceQuotes( $string ) {
    	$doubleQuotes = array('â€œ','â€');
    	$singleQuotes = array('â€™','â€˜');
      return str_replace($tags, "'", $string);
    }

    public function ConvertForListDisplay( $string ) {
      return '<li>' . str_replace("\n", '</li><li>', $string) . '</li>';
    }

		public function DisplayTemplate( $variableArray = array() ) {
			$message = Helpers::DisplaySessionMessages(); 
			extract( $variableArray, EXTR_REFS );
			ob_start();
			include( $this->basePath."/www/templates/$template.php" );
			return ob_get_clean();
		}

		private $basePath;
	}
?>
