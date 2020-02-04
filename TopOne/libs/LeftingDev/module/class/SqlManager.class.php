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

	    /*
			WebSiteManager:
			SHA1: 8469ef72a5029cac8a620f292c443c1b65c300bd

	    */

		public function checkMessage($id) {

	    	$stmt = $this->_dataBase->prepare("select * from `websitemanager` where `id`=:id");

      		$stmt->bindValue('id', $id, PDO::PARAM_INT);
      		$stmt->execute();
      		$size = $stmt->rowCount();

      		return $size > 0;

	    }
	    
	    public function setMessage($id, $message) {

	    	if(!$this->checkMessage($id)) {

	    		$query = "INSERT INTO websitemanager (message) VALUES (:message)";
	    		$stmt = $this->_dataBase->prepare($query);

	    	} else {

	    		$query = "UPDATE websitemanager SET message=:message WHERE id=:id";
	    		$stmt = $this->_dataBase->prepare($query);
	    		$stmt->bindValue('id', $id, PDO::PARAM_INT);

	    	}

	    	$stmt->bindValue('message', $message, PDO::PARAM_STR);

      		return $stmt->execute();

	    }

	    public function getMessage($id) {

	    	$stmt = $this->_dataBase->prepare("select * from `websitemanager` where `id`=:id");

      		$stmt->bindValue('id', $id, PDO::PARAM_INT);
      		$stmt->execute();

      		return $stmt->fetch(PDO::FETCH_ASSOC)["message"];

	    }

		public function get_dataBase() {

			return $this->_dataBase;

		}

	}

?>