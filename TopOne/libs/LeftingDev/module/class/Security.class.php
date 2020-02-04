<?php

class Security {
	
	public function  __construct() {
		
		if(empty($_SESSION["username"])) {
			
			header("Location: /connexion");
			die();
			
		}
		
	}
	
}

