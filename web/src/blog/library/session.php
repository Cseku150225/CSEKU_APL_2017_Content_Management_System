<?php

class Session{
	public static function startSession(){
		session_start();		
	}

	public static function setSession($sessionName, $sessionValue){
		$_SESSION[$sessionName]=$sessionValue;
	}

	public static function getSession($sessionName){
		if(isset($_SESSION[$sessionName])){
			return $_SESSION[$sessionName];	
		}

		return false;
	}

	public static function checkSession(){
		self::startSession();
		if(self::getSession('login') == false){
			self::removeSession();
			header('Location: login.php');
		}
	} 

	public static function removeSession(){
		session_unset();
		session_destroy();
	}

}

?>