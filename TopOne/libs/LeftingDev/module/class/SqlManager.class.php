<?php

	class SqlManager {

		private $_dataBase;

		function __construct() {

			try {

				$this->_dataBase = new PDO("mysql:host=localhost;dbname=site", "root", "root");

			} catch (PDOException $e) {

  				echo "Error: ". $e->getMessage();
  			}

	    }

	   

		public function get_dataBase() {

			return $this->_dataBase;

		}

	}

?>