<?php

	class Database {
		static function openConn() {
			try {
				$conn = new PDO("mysql:host=localhost;dbname=balanca","root","");
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch (PDOException $e) {
				echo $e->getMessage();
			}

			return $conn;
		}

		static function closeConn() {
			return null;
		}

	}

?>
