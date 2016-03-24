<?php

	$helper->IncludeLib('PasswordHash');

	class DataStore {
		
		public function __construct( $dataConnection ) {
			$this->connection = $dataConnection;
			$this->pwdHasher = new PasswordHash(8, FALSE);
		}
		
		public function emailExists( $email, $table="admin" ) {
			$result = $this->connection->SelectAllWhere( $table, "email='$email'" );
			if( count( $result ) ) {
				return $result[ 0 ];
			}
			return 0;
		}
		
		public function usernameExists( $username, $table="admin" ) {
			$result = $this->connection->SelectAllWhere( $table, "username='$username'" );
			if( count( $result ) ) {
				return $result[ 0 ];
			}
			return false;
		}
		
		public function addUser( $userData, $table="admin" ) {

			// hash the password
			$userData[ 'password' ] = $this->pwdHasher->HashPassword( $userData[ 'password' ] );

			// create the user
			$this->connection->InsertArray( $table, $userData );
		}
		
		public function checkPassword( $username, $password, $table="admin" ) {
			// get password hash for user
			$hash = $this->connection->SelectAllWhere( $table, "username='$username'" );
			
			if( count( $hash ) ) {
				$hash = $hash[0][ "password" ];
			}
			else {
				return false;
			}
			
			// $hash would be the $hashed stored in your database for this user
			
			$checked = ($password == $hash) ? true : false;
			//$checked = $this->pwdHasher->CheckPassword($password, $hash);
			return $checked;
		}
		
		private $connection;
		private $pwdHasher;
	}
?>