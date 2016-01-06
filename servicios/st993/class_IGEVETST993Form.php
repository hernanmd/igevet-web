<?php
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");             // Fecha en el pasado
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Cambia siempre
	header("Cache-Control: no-cache, must-revalidate");           // HTTP/1.1
	header("Pragma: no-cache");
	
	require_once 'messages.php';
	require_once '../class_IGEVETBaseForm.php';
	
	class IGEVETST993Form extends IGEVETBaseForm {

		/* 
		*
		*	Form Functions
		*
		*/

		function getErrors (&$returnArray)
		{
			$returnArray['errorCompleteName'] = $this->getErrorCompleteName();
			$returnArray['errorEmail'] = $this->getErrorEmailAddress();
			$returnArray['errorInstitution'] = $this->getErrorInstitution();
			$returnArray['errorPhone_number'] = $this->getErrorPhoneNumber();
			
		}		
		
		function hasErrors (&$returnArray)
		{
			$this->getErrors($returnArray);
			// If there are no null values in array
			if (! array_filter($returnArray))
				return false;
			else
				return true;
		}
		
		
		function buildMailMessage() {
			$mail_message = "Nombre y Apellido: " . $this->getCompleteName() . "\r\n" . 
				"E-mail: " . $this->getEmailAddress() . "\r\n" .
				"Institución: " . $this->getInstitution() . "\r\n" . 
				"Número de Teléfono: " . $this->getPhoneNumner() . "\r\n";
			return $mail_message;
		}
		
		function formValidate() {
			//Put form elements into post variables (this is where you would sanitize your data)
			$this->checkCompleteName($_POST['complete_name']);
			$this->checkEmail($_POST['email'], EMAIL);
			$this->checkInstitution($_POST["institution"]);
			$this->checkPhoneNumber($_POST["phone_number"]);			
			
			//Establish values that will be returned via ajax
			$returnArray = array();
			$returnArray['error'] = '';

			//Begin form functionality
			if ($this->hasErrors($returnArray) === false){
				$to = "servicios@igevet.gob.ar";
				$mail_message = $this->buildMailMessage();
				$result = $this->sendMail("hernan.morales@gmail.com","REQ ST993", $mail_message);
				$result = $this->sendMail($to,"REQ ST993", $mail_message);
				if (! $result) 
					exit(header("Location:solicitud_error.php", true));
				else
					$returnArray['error'] = false;
			}
			else {
				$returnArray['error'] = true;
			}
			// print_r($returnArray);
			return json_encode($returnArray);			
		}
	}

	$ajaxValidate = new IGEVETST993Form;
	echo $ajaxValidate->formValidate();		
?>
