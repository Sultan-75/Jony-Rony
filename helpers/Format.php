<?php

class Format{
	public function formatDate($date){
		return date('Y/m/d ', strtotime($date));
	}

	public function validation($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

}
?>