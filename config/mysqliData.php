<?php
	class MysqliData {

		public function __construct( $server = "localhost", $uid, $pwd, $database ) {

			// Connect using MySQL Server Authentication.
			$this->connection = mysqli_connect( $server, $uid, $pwd );
			//$this->connection = mysql_connect(  );
			if( !$this->connection )
			{
			     die( print_r( mysqli_connect_error(), true));
			}

			$this->database = mysqli_select_db( $this->connection, $database );

			if( !$this->database )
			{
				die( print_r( mysqli_connect_error(), true ));
			}
		}

		public function SelectAll( $table, $extra = "", $columns = "*" ) {
			$tsql = "SELECT $columns FROM $table $extra";
			$stmt = $this->ExecuteDontFreeQuery( $tsql );

			$results = array();

			// Retrieve the results of the query.
			$i = 0;
			while( $row = mysqli_fetch_array($stmt, MYSQLI_BOTH) )
			{
				$results[ $i ] = $row;
				$i++;
			}

			// Free statement and connection resources.
			mysqli_free_result( $stmt);

			return $results;
		}

		public function SelectArticlesWhere( $table, $where, $columns = "" ) {
			$tsql = "SELECT SQL_CALC_FOUND_ROWS $columns FROM $table WHERE $where";
			$stmt = $this->ExecuteDontFreeQuery( $tsql );

			$results = array();

			// Retrieve the results of the query.
			$i = 0;
			while( $row = mysqli_fetch_array($stmt, MYSQLI_BOTH) )
			{
				$results[ $i ] = $row;
				$i++;
			}

			// Free statement and connection resources.
			mysqli_free_result( $stmt);

			return $results;
		}

		public function SelectAllWhere( $table, $where, $extra = "", $columns = "*" ) {
			$tsql = "SELECT $columns FROM $table WHERE $where $extra";
			$stmt = $this->ExecuteDontFreeQuery( $tsql );

			$results = array();

			// Retrieve the results of the query.
			$i = 0;
			while( $row = mysqli_fetch_array($stmt, MYSQLI_BOTH) )
			{
				$results[ $i ] = $row;
				$i++;
			}

			// Free statement and connection resources.
			mysqli_free_result( $stmt);

			return $results;
		}

		public function SelectAllWhereDist( $table, $where, $columns = "" ) {
			$tsql = "SELECT DISTINCT $columns FROM $table WHERE $where";
			$stmt = $this->ExecuteDontFreeQuery( $tsql );

			$results = array();

			// Retrieve the results of the query.
			$i = 0;
			while( $row = mysqli_fetch_array($stmt, MYSQLI_BOTH) )
			{
				$results[ $i ] = $row;
				$i++;
			}

			// Free statement and connection resources.
			mysqli_free_result( $stmt);

			return $results;
		}

		public function InsertArray( $table, $valuesArray ) {
			$keys = "";
			$values = "";
			$count = count( $valuesArray );
			$i = 0;

			foreach( $valuesArray as $key => $value ) {
				$i++;
				$keys .= "$key";
				$values .= "'$value'";
				if( $i != $count ) {
					$keys .= ", ";
					$values .= ", ";
				}
			}

			$tsql = "INSERT INTO $table ( $keys ) VALUES ( $values )";

			$this->ExecuteQueryNoResult( $tsql );
		}

		public function Update( $table, $values, $where ) {
			$tsql = "UPDATE $table SET $values WHERE $where";

			$this->ExecuteQueryNoResult( $tsql );
		}

		public function Delete( $table, $where ) {
			$tsql = "DELETE FROM $table WHERE $where";

			$this->ExecuteQueryNoResult( $tsql );
		}

		// public function __destruct() {
		// 	mysql_close( $this->connection );
		// }

		private $connection;
		private $database;

		private function ExecuteDontFreeQuery( $tsql )
		{
			$stmt = mysqli_query( $this->connection, $tsql );
			if( $stmt == false )
			{
				die( print_r(mysqli_error( $this->connection ), true));
			}
			return $stmt;
		}

		private function ExecuteQuery( $tsql )
		{
			$stmt = mysqli_query( $this->connection, $tsql );
			if( $stmt == false )
			{
				die( print_r(mysqli_error( $this->connection ), true));
			}

			// Retrieve the results of the query.
			$row = mysqli_fetch_array($stmt, MYSQLI_BOTH);

			// Free statement and connection resources.
			mysqli_free_result( $stmt );

			return $row;
		}

		private function ExecuteQueryNoResult( $tsql )
		{
			$stmt = mysqli_query( $this->connection, $tsql );
			if( $stmt == false )
			{
				die( print_r(mysqli_error( $this->connection ), true));
			}
		}
	}
?>
