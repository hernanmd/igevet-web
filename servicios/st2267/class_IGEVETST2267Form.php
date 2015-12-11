<?php
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");             // Fecha en el pasado
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Cambia siempre
	header("Cache-Control: no-cache, must-revalidate");           // HTTP/1.1
	header("Pragma: no-cache");
	
	require_once 'messages.php';
	require_once 'class_IGEVETBaseForm.php';
	
	class IGEVETST2267Form extends IGEVETBaseForm {

		protected $errorCharCount;
		protected $errorAttachment;
		
		protected $sourceLang;
		protected $targetLang;
		protected $serviceType;
		protected $charCount;
		protected $due;
		
		function __construct() {
			parent::__construct();		
			$this->errorCharCount = "";
			$this->errorAttachment = "";
			$this->errorDueDate = "";
			$this->errorServiceType = "";
			$this->errorSourceLang = "";
			$this->errorTargetLang = "";
			$this->due = "";
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
		*	Form Functions
		*
		*/
		
		function checkCharacterCount ($formVal, $field)  {
			if (! $this->checkInteger ($formVal, $field)) 
				$this->errorCharCount = "El campo Cantidad de Caracteres contiene caracteres no numéricos : " . $formVal;
			else
				$this->charCount = trim($formVal);
		}

		function getErrors (&$returnArray)
		{
			$returnArray['errorCompleteName'] = $this->getErrorCompleteName();
			$returnArray['errorEmail'] = $this->getErrorEmailAddress();
			$returnArray['errorInstitution'] = $this->getErrorInstitution();
			$returnArray['errorPhone_number'] = $this->getErrorPhoneNumber();
			$returnArray['errorSource_lang'] = $this->getErrorSourceLang(); 
			$returnArray['errorTarget_lang'] = $this->getErrorTargetLang(); 
			$returnArray['errorService_type'] = $this->getErrorServiceType();
			$returnArray['errorDue'] = $this->getErrorDueDate();
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
			$mail_message = "<b>Nombre y Apellido: </b>" . $this->getCompleteName() . "<br>" . 
				"<b>E-mail: </b>" . $this->getEmailAddress() . "<br>" .
				"<b>Institución: </b>" . $this->getInstitution() . "<br>" . 
				"<b>Número de Teléfono: </b>" . $this->getPhoneNumner() . "<br>" .
				"<b>Idioma original: </b>" . $this->getSourceLang() . "<br>" .
				"<b>Idioma destino: </b>" . $this->getTargetLang() . "<br>" .
				"<b>Tipo de Servicio: </b>" . $this->getServiceType() . "<br>" .
				"<b>Cantidad de Caracteres: </b>" . $this->getCharCount() . "<br>";
			return $mail_message;
		}
		
		function formValidate() {
			$this->checkCompleteName($_POST['complete_name']);
			$this->checkEmail($_POST['email'], EMAIL);
			$this->checkInstitution($_POST["institution"]);
			$this->checkPhoneNumber($_POST["phone_number"]);
			$this->sourceLang = trim($_POST["source_lang"]);
			$this->targetLang = trim($_POST["target_lang"]);
			$this->serviceType = trim($_POST["service_type"]);
			$this->due = $_POST["due"];
			$this->checkCharacterCount($_POST["char_count"],CHARCOUNT);	

			//Establish values that will be returned via ajax
			$returnArray = array();
			$returnArray['error'] = '';

			//Begin form functionality
			if ($this->hasErrors($returnArray) === false){
				$to = "servicios@igevet.gob.ar";
				$mail_message = $this->buildMailMessage();
				$result = $this->sendMail("hernan.morales@gmail.com","REQ ST2267", $mail_message);
				$result = $this->sendMail($to,"REQ ST2267", $mail_message);
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

	$ajaxValidate = new IGEVETST2267Form;
	echo $ajaxValidate->formValidate();		
?>
