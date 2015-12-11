<?php
	require_once 'class_IGEVETAjaxValidator.php';

	class IGEVETBaseForm extends IGEVETBasicFormValidator {
	
		protected $completeName;
		protected $emailAddress;
		protected $institution;
		protected $phoneNumner;

		protected $errorCompleteName;
		protected $errorInstitution;
		protected $errorEmailAddress;
		protected $errorPhoneNumber;
		
		function __construct() {
			$this->completeName = "";
			$this->errorCompleteName = "";
			$this->errorInstitution = "";
			$this->errorEmailAddress = "";
			$this->errorPhoneNumber = "";
		}
			
		function getcompleteName() {
			return $this->completeName; 		
		}
		
		function getInstitution() {
			return $this->institution; 		
		}
		
		function getEmailAddress() {
			return $this->emailAddress;
		}
		
		function getPhoneNumner() {
			return $this->phoneNumner; 
		}
		
		function getErrorCompleteName () {
			return $this->errorCompleteName;  
		}
		
		function getErrorInstitution () {
			return $this->errorInstitution;
		}
				
		function getErrorEmailAddress () {
			return $this->errorEmailAddress;  
		}
				
		function getErrorPhoneNumber () {
			return $this->errorPhoneNumber;  
		}
		
		
		function checkPhoneNumber ($phoneNumner) {
			$var = '011-4959-0200';
			
			$pattern = '/^([0-9]{4})(-)([0-9]{7})$/';
			$pattern_2 = '/^([0-9]{3})(-)([0-9]{4})(-)([0-9]{4})$/';
			// $temp = preg_replace("/[^0-9]/","",$celno);

			if (empty($phoneNumner))
				$this->errorPhoneNumber = "El campo Número de Teléfono está incompleto";
			
			else{
				if (!(preg_match($pattern, $var)) && !(preg_match($pattern_2, $var))){
					$this->errorPhoneNumber = "El campo Número de Teléfono contiene caracteres no válidos : " . $phoneNumner;
				}
				else{
					if (is_numeric($phoneNumner) === false){
						$this->errorPhoneNumber = "El campo Número de Teléfono contiene letras";
					}
					else
						$this->phoneNumner = $phoneNumner;
				}
				
			}
		}
		
		function checkInstitution ($formVal) {
			if (empty($formVal))
				$this->errorInstitution = "El campo Institución está incompleto";
			else
				$this->institution = $formVal;				
		}
		
		function checkCompleteName ($formVal) {
			if (empty($formVal))
				$this->errorCompleteName =  "El campo Nombre y Apellido está incompleto";
			else {
				if ($this->checkInvalidChars ($formVal))
					$this->errorCompleteName .= "El campo Nombre y Apellido contiene caracteres no válidos";
				elseif (! $this->checkAlpha($formVal))
						$this->errorCompleteName .= "El campo Nombre y Apellido contiene números ó menos de 3 caracteres";
					else 
						$this->completeName = $formVal;
				}
		}
		
		function checkEmail ($formVal, $field) {
			if (! $this->checkEmailAddress ($formVal, $field))
				$this->errorEmailAddress = $field . "<br />";
			else
				$this->emailAddress = $formVal;
		}
		
		/**
		 * Email send with headers
		 *
		 * @return bool | void
		 **/
		function sendMail($to, $subject, $message) {
			$header = array();
			$header[] = "MIME-Version: 1.0";
			// $header[] = "From: {$from_name}<{$from_mail}>";
			/* Set message content type HTML*/			//charset=iso-8859-1
			$header[] = "Content-type:text/html; charset=UTF-8";
			$header[] = "Content-Transfer-Encoding: 8bit";
			return mail($to, $subject, $message, implode("\r\n", $header));
		}		
		
	}
?>