<?php
function formatDate($date){
	
	return date('F j,Y g:i:s a',strtotime($date));
}

function formatMonth($date){
	$date = $date.'-01 00:00:00';

	return date('F',strtotime($date));
}

function formatText($text){
	$text = substr($text,0,300);
	$text = substr($text,0,strrpos($text,' '));
	$text = $text.'...';

	return $text;
}

function userRole($role){
	if($role == 3){
		return "Editor";	
	}
	else if($role == 2){
		return "Author";	
	}
	else{
		return "Admin";	
	}
}
?>