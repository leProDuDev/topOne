<?php

 session_start();
 
 /*
  * Check IP for SESSION ID 
  * By: Yanis
  * 
  */
 
 if(!empty($_SESSION["ip"])) {
 	
 	if($_SESSION["ip"] != $_SERVER["REMOTE_ADDR"]) {
 		
 		session_destroy();
 		
 	}
 	
 } else {
 	
 	$_SESSION["ip"] = $_SERVER["REMOTE_ADDR"];
 	
 }

?>