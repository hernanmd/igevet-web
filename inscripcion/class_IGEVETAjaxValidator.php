<?php

	class IGEVETBasicFormValidator {

		function isAlpha($dataField){
			return preg_match("/^[a-zA-ZáéíóúñÑ ]{3,}$/i",$dataField);
		}

		function checkAlpha ($var) {
			return $this->isAlpha($var);
		}
		
		function checkInteger ($formVal, $field) {
			return ctype_digit((string)($formVal));
		}

		function checkInvalidChars ($formVal) {
			$invalidChars = array("~", "`", "!", "@", "#", "\$", "%", "^", "&", "*", "_", "-", "+", "=", "|","\\", "{", "}", ":", ";", "\"", "'", ",", "<", ".", ">", "?", "/");
			foreach ($invalidChars as $invalidCh) {
				if (strchr($formVal,$invalidCh)) {
					return true;
				}
			}
		}
	 
		function checkEmailAddress($email, $field) {
			// First, we check that there's one @ symbol, and that the lengths are right
			if (empty($email)) {
				return false;
			}
			if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
				// Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
				return false;
			}
			// Split it into sections to make life easier
			$email_array = explode("@", $email);
			$local_array = explode(".", $email_array[0]);
			for ($i = 0; $i < sizeof($local_array); $i++) {
				if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
					return false;
				}
			}
			if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
				$domain_array = explode(".", $email_array[1]);
				if (sizeof($domain_array) < 2) {
					return false; // Not enough parts to domain
				}
				for ($i = 0; $i < sizeof($domain_array); $i++) {
					if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
						return false;
					}
				}
			}
			return true;
		}
	}

?>
