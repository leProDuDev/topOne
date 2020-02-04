<?php

class UserManager {
	
	/*
	 UserManager:
	 By Yanis Bounadja
	 
	 */
	
	private $_dataBase;
	
	public function __construct(SqlManager $sqlManager) {
		
		$this->_dataBase = $sqlManager->get_dataBase();
		
	}
	
	public function checkLogin($username, $password) {
		
		$stmt = $this->_dataBase->prepare("select * from `usermanager` where `username`=:username and `password`=:password");
		
		$stmt->bindValue('username', $username, PDO::PARAM_STR);
		$stmt->bindValue('password', $password, PDO::PARAM_STR);
		$stmt->execute();
		$size = $stmt->rowCount();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($size > 0) {
			
			return $row;
			
		} else {
			
			return;
			
		}
		
	}
	
	public function getAllLogin() {
		
		$stmt = $this->_dataBase->prepare("select * from `usermanager`");
		$stmt->execute();
		$size = $stmt->rowCount();
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		if($size > 0) {
			
			return $row;
			
		} else {
			
			return;
			
		}
		
	}
	
	public function existUser($username) {
		
		$stmt = $this->_dataBase->prepare("select * from `usermanager` where `username`=:username");
		
		$stmt->bindValue('username', $username, PDO::PARAM_STR);
		$stmt->execute();
		$size = $stmt->rowCount();
		
		return $size > 0;
		
	}
	
	public function removeUser($id) {
		
		$stmt = $this->_dataBase->prepare("DELETE  from `usermanager` where `id`=:id");
		
		$stmt->bindValue('id', $id, PDO::PARAM_INT);
		$stmt->execute();
		$size = $stmt->rowCount();
		
		return $size;
		
	}
	
	public function registerUser($user, $password) {
		
		$stmt = $this->_dataBase->prepare("INSERT INTO usermanager (username, password) VALUES (:name, :password)");
		
		$stmt->bindValue('name', $user, PDO::PARAM_STR);
		$stmt->bindValue('password', $password, PDO::PARAM_STR);
		
		return $stmt->execute();
		
	}
	
}

