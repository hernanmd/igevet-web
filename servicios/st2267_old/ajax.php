<?php
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");             // Fecha en el pasado
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Cambia siempre
	header("Cache-Control: no-cache, must-revalidate");           // HTTP/1.1
	header("Pragma: no-cache");
	
	require_once 'messages.php';
	/* require_once 'UploadHandler.php'; */
	
	class ajaxValidate {

		protected $errorCompleteName;
		protected $errorEmailAddress;
		protected $errorPhoneNumber;
		protected $errorCharCount;
		protected $errorAttachment;
		protected $hasInvalid;
		
		protected $completeName;
		protected $emailAddress;
		protected $institution;
		protected $phoneNumner;
		protected $sourceLang;
		protected $targetLang;
		protected $serviceType;
		protected $charCount;
		protected $due;
		
		function __construct() {
			$this->completeName = "";
			$this->errorCompleteName = "";
			$this->errorInstitution = "";
			$this->errorEmailAddress = "";
			$this->errorPhoneNumber = "";
			$this->errorCharCount = "";
			$this->errorAttachment = "";
			$this->errorDueDate = "";
			$this->errorServiceType = "";
			$this->errorSourceLang = "";
			$this->errorTargetLang = "";
			$this->due = "";			
			$this->hasInvalid = false;
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
		
		function getSourceLang() {
			return $this->sourceLang; 
		}
		
		function getTargetLang() {
			return $this->targetLang;
		}
		
		function getServiceType() {
			return $this->serviceType; 
		}
		
		function getCharCount() {
			return $this->charCount; 		
		}
		
	
		/* Error Functions */
		
		
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
		
		function getErrorCharCount () {
			return $this->errorCharCount;  
		}
		
		function getErrorDueDate () {
			return $this->errorDueDate;  
		}
		
		function getErrorAttachment () {
			return $this->errorAttachment;  
		}

		function getErrorServiceType () {
			return $this->errorServiceType;  
		}

		function getErrorTargetLang () {
			return $this->errorTargetLang;  
		}

		function getErrorSourceLang () {
			return $this->errorSourceLang;  
		}
				
		/* 
		*
		*	Basic Functions
		*
		*/
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
					$this->hasInvalid = true;
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

		/* 
		*
		*	Form Functions
		*
		*/
		function checkPhoneNumber ($phoneNumner) {
			$var = '011-4959-0200';

			$pattern = '/^([0-9]{4})(-)([0-9]{7})$/';
			$pattern_2 = '/^([0-9]{3})(-)([0-9]{4})(-)([0-9]{4})$/';
			// $temp = preg_replace("/[^0-9]/","",$celno);

			if (empty($phoneNumner))
				$this->errorPhoneNumber = "El campo Número de Teléfono está incompleto";
			if (!(preg_match($pattern, $var)) && !(preg_match($pattern_2, $var))) {
				$this->hasInvalid = true;
				$this->errorPhoneNumber = "El campo Número de Teléfono contiene caracteres no válidos : " . $phoneNumner;
			}
			else
				$this->phoneNumner = $phoneNumner;
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
				$this->checkInvalidChars ($formVal);
				if ($this->hasInvalid)
					$this->errorCompleteName .= "El campo Nombre y Apellido contiene caracteres no válidos";
				else {
					if (! $this->checkAlpha($formVal))
						$this->errorCompleteName .= "El campo Nombre y Apellido contiene números ó menos de 3 caracteres";
					else 
						$this->completeName = $formVal;
				}
			}
		}
		
		function checkEmail ($formVal, $field) {
			if (! $this->checkEmailAddress ($formVal, $field)) 
			{
				$this->hasInvalid = true;
				$this->errorEmailAddress = $field . "<br />";
			}
			else
				$this->emailAddress = $formVal;
		}
		
		function checkCharacterCount ($formVal, $field)  {
			if (! $this->checkInteger ($formVal, $field)) 
			{
				$this->hasInvalid = true;
				$this->errorCharCount = "El campo Cantidad de Caracteres contiene caracteres no numéricos : " . $formVal;
			}
			else
				$this->charCount = trim($formVal);
		}

		function getErrors (&$returnArray)
		{
			$returnArray['errorCompleteName'] = $this->getErrorCompleteName();
			$returnArray['email'] = $this->getErrorEmailAddress();
			$returnArray['institution'] = $this->getErrorInstitution();
			$returnArray['phone_number'] = $this->getErrorPhoneNumber();
			$returnArray['source_lang'] = $this->getErrorSourceLang(); 
			$returnArray['target_lang'] = $this->getErrorTargetLang(); 
			$returnArray['service_type'] = $this->getErrorServiceType();
			$returnArray['due'] = $this->getErrorDueDate();
			if ($this->hasInvalid) {
				$returnArray['error'] = true; }			
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
			/* Set message content type HTML*/
			$header[] = "Content-type:text/html; charset=iso-8859-1";
			$header[] = "Content-Transfer-Encoding: 7bit";
			return mail($to, $subject, $message, implode("\r\n", $header));
		}
		
		function buildMailMessage() {
			$mail_message = "Nombre y Apellido: " . $this->getCompleteName() . "\n" . 
				"Institución: " . $this->getInstitution() . "\n" . 
				"Número de Teléfono: " . $this->getPhoneNumner() . "\n" .
				"Idioma original: " . $this->getSourceLang() . "\n" .
				"Idioma destino: " . $this->getTargetLang() . "\n" .
				"Tipo de Servicio: " . $this->getServiceType() . "\n" .
				"Cantidad de Caracteres: " . $this->getCharCount() . "\n";
			return $mail_message;
		}
		
		function formValidate() {
			//Put form elements into post variables (this is where you would sanitize your data)
			
			$this->hasInvalid = false;
			$this->checkCompleteName($_POST['complete_name']);
			$this->checkEmail($_POST['email'], EMAIL);
			$this->checkInstitution($_POST["institution"]);
			$this->checkPhoneNumber($_POST["phone_number"]);
			$this->checkInvalidChars($_POST["source_lang"],$this->sourceLang);
			$this->checkInvalidChars($_POST["target_lang"],$this->targetLang);
			$this->checkInvalidChars($_POST["service_type"],$this->serviceType);
			$this->checkInvalidChars($_POST["due"],$this->due);
			$this->checkCharacterCount($_POST["char_count"],CHARCOUNT);	
			
			//Establish values that will be returned via ajax
			$returnArray = array();
			$returnArray['msg'] = '';
			$returnArray['error'] = false;

			//Begin form validation functionality
			$this->getErrors($returnArray);

			//Begin form success functionality
			if ($returnArray['error'] === false){
				$to = "hernan.morales@gmail.com";
				// $to = "secretaria@igevet.gob.ar";
				$mail_message = $this->buildMailMessage();
				$result = $this->sendMail($to,"REQ ST2267", $mail_message);
				// echo "Result : " . $this->errorCompleteName;
				if (! $result) {
					exit(header("Location:solicitud_error.php", true));
				}
			}
			return json_encode($returnArray);				
		}
	}
	
	/* $upload_handler = new UploadHandler(); */
	$ajaxValidate = new ajaxValidate;
	echo $ajaxValidate->formValidate();

?>
