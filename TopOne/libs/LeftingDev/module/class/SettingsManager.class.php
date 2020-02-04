<?php

class SettingsManager {
	
	/*
	 SettingsManager:
	 By Yanis Bounadja
	 
	 */
	
	private $_dataBase;
	
	public function __construct(SqlManager $sqlManager) {
		
		$this->_dataBase = $sqlManager->get_dataBase();
		
	}
	
	public function getAllSettings() {
		
		$stmt = $this->_dataBase->prepare("select * from `settings`");
		$stmt->execute();
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $row;
		
	}
	
	public function updateAll($paypalEmail, $paypalMessage, $email, $street, $title) {
		
		$stmt = $this->_dataBase->prepare("UPDATE settings SET email_paypal = :emailPaypal, message_paypal = :messagePaypal, email = :email, street = :street, title = :title");
		
		$stmt->bindValue('emailPaypal', $paypalEmail, PDO::PARAM_STR);
		$stmt->bindValue('messagePaypal', $paypalMessage, PDO::PARAM_STR);
		$stmt->bindValue('email', $email, PDO::PARAM_STR);
		$stmt->bindValue('street', $street, PDO::PARAM_STR);
		$stmt->bindValue('title', $title, PDO::PARAM_STR);
		
		return $stmt->execute();
		
	}
	
	public function updatePaypalEmail($email) {
		
		$stmt = $this->_dataBase->prepare("UPDATE settings (email_paypal) VALUES (:email)");
		
		$stmt->bindValue('email', $email, PDO::PARAM_STR);
		
		return $stmt->execute();
		
	}
	
	public function updatePaypalMessage($message) {
		
		$stmt = $this->_dataBase->prepare("UPDATE settings (message_paypal) VALUES (:message)");
		
		$stmt->bindValue('message', $message, PDO::PARAM_STR);
		
		return $stmt->execute();
		
	}
	
	public function updateEmail($email) {
		
		$stmt = $this->_dataBase->prepare("UPDATE settings (email) VALUES (:email)");
		
		$stmt->bindValue('email', $email, PDO::PARAM_STR);
		
		return $stmt->execute();
		
	}
	
	public function updateStreet($street) {
		
		$stmt = $this->_dataBase->prepare("UPDATE settings (street) VALUES (:street)");
		
		$stmt->bindValue('street', $street, PDO::PARAM_STR);
		
		return $stmt->execute();
		
	}
	
	public function updateTitle($title) {
		
		$stmt = $this->_dataBase->prepare("UPDATE settings (title) VALUES (:title)");
		
		$stmt->bindValue('title', $title, PDO::PARAM_STR);
		
		return $stmt->execute();
		
	}
	
}

