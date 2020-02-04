<?php

class NewsletterManager {
	
	/*
	 NewsletterManager:
	 By Yanis Bounadja
	 
	 */
	
	private $_dataBase;
	
	public function __construct(SqlManager $sqlManager) {
		
		$this->_dataBase = $sqlManager->get_dataBase();
		
	}
	
	public function getAllNews() {
		
		$stmt = $this->_dataBase->prepare("select * from `newsletter`");
		$stmt->execute();
		$size = $stmt->rowCount();
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		if($size > 0) {
			
			return $row;
			
		} else {
			
			return;
			
		}
		
	}
	
	public function removeNews($id) {
		
		$stmt = $this->_dataBase->prepare("DELETE  from `newsletter` where `id`=:id");
		
		$stmt->bindValue('id', $id, PDO::PARAM_INT);
		$stmt->execute();
		$size = $stmt->rowCount();
		
		return $size;
		
	}
	
	public function registerNews($title, $message) {
		
		$stmt = $this->_dataBase->prepare("INSERT INTO newsletter (title, message) VALUES (:title, :message)");
		
		$stmt->bindValue('title', $title, PDO::PARAM_STR);
		$stmt->bindValue('message', $message, PDO::PARAM_STR);
		
		return $stmt->execute();
		
	}
	
}

