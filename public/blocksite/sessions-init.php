<?php
	session_start();

	if (empty($_SESSION["nameBird"])) {
		$_SESSION["nameBird"] = '';
	}
	
?>