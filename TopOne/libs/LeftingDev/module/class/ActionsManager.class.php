<?php

class ActionsManager {
	
	/*
	 ActionsManager:
	 By Yanis Bounadja
	 
	 */
	
	private $_dataBase;
	
	public function __construct(SqlManager $sqlManager) {
		
		$this->_dataBase = $sqlManager->get_dataBase();
		
	}
	
	public function getAllActions() {
		
		$stmt = $this->_dataBase->prepare("select * from `actions`");
		$stmt->execute();
		$size = $stmt->rowCount();
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		if($size > 0) {
			
			return $row;
			
		} else {
			
			return;
			
		}
		
	}
	
	public function removeActions($id) {
		
		$stmt = $this->_dataBase->prepare("DELETE  from `actions` where `id`=:id");
		
		$stmt->bindValue('id', $id, PDO::PARAM_INT);
		$stmt->execute();
		$size = $stmt->rowCount();
		
		return $size;
		
	}
	
	public function registerActions($image, $message) {
		
		$stmt = $this->_dataBase->prepare("INSERT INTO actions (message, image) VALUES (:message, :image)");
		
		$stmt->bindValue('image', $image, PDO::PARAM_STR);
		$stmt->bindValue('message', $message, PDO::PARAM_STR);
		
		return $stmt->execute();
		
	}
	
}

