<?php
error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");             // Fecha en el pasado
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Cambia siempre
	header("Cache-Control: no-cache, must-revalidate");           // HTTP/1.1
	header("Pragma: no-cache");
	
	require_once 'messages.php';
	require_once 'class_IGEVETBaseForm.php';
	
	class IGEVETST2127Form extends IGEVETBaseForm {
		
		protected $tipoAnalisis;
		protected $tipoArray;
		protected $serviceType;
		protected $cantMuestras;
		protected $marca;
		protected $soporte;
		
		function __construct() {
			parent::__construct();		
			$this->errorTipoAnalisis = "";
			$this->errorTipoArray = "";
			$this->errorCantMuestras = "";
			$this->errorServiceType = "";
			$this->errorMarca = "";
			$this->errorSoporte = "";
		}
		
		function getTipoAnalisis() {
			return $this->tipoAnalisis; 
		}
		
		function getTipoArray() {
			return $this->tipoArray;
		}
		
		function getServiceType() {
			return $this->serviceType; 
		}
		
		function getCantMuestras() {
			return $this->cantMuestras; 		
		}
		
		function getMarca() {
			return $this->marca; 
		}
		
		function getSoporte() {
			return $this->soporte; 		
		}
		
	
		/* Error Functions */
	
		function getErrorTipoAnalisis () {
			return $this->errorTipoAnalisis;  
		}
		
		function getErrorTipoArray () {
			return $this->errorTipoArray;  
		}
		
		function getErrorCantMuestras () {
			return $this->errorCantMuestras;  
		}

		function getErrorServiceType () {
			return $this->errorServiceType;  
		}

		function getErrorMarcadores () {
			return $this->errorMarca;  
		}
		
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
			$returnArray['errorTipo_analisis'] = $this->getErrorTipoAnalisis(); 
			$returnArray['errorTipo_array'] = $this->getErrorTipoArray(); 
			$returnArray['errorService_type'] = $this->getErrorServiceType();
			$returnArray['errorCant_muestras'] = $this->getErrorCantMuestras();
			$returnArray['errorMarcadores'] = $this->getErrorMarcadores();
			
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
				"<b>Tipo de analisis: </b>" . $this->getTipoAnalisis() . "<br>" .
				"<b>Tipo de array: </b>" . $this->getTipoArray() . "<br>" .
				"<b>Especie: </b>" . $this->getServiceType() . "<br>" .
				"<b>Cantidad de muestras: </b>" . $this->getCantMuestras() . "<br>" .
				"<b>Cantidad de marcadores: </b>" . $this->getMarca() . "<br>" .
				"<b>Solicita soporte: </b>" . $this->getSoporte() . "<br>";
			return $mail_message;
		}
		
		function formValidate() {
			//Put form elements into post variables (this is where you would sanitize your data)
			$this->checkCompleteName($_POST['complete_name']);
			$this->checkEmail($_POST['email'], EMAIL);
			$this->checkInstitution($_POST["institution"]);
			$this->checkPhoneNumber($_POST["phone_number"]);
			$this->tipoAnalisis = trim($_POST["se_tipo_analisis"]);
			$this->tipoArray = trim($_POST["tipo_a"]);
			if($_POST['tipo_a'] == "comercial"){
				$this->serviceType = trim($_POST["service_type"]);
			}
			else{
				$this->serviceType = "No especificado";
			}
			$this->cantMuestras = trim($_POST["cant_muestras"]);
			$this->marca = trim($_POST["marca"]);
			if(isset($_POST['soporte'])){
				$this->soporte = trim($_POST["soporte"]);
			}else{ $this->soporte = "no";}
			
			//Establish values that will be returned via ajax
			$returnArray = array();
			$returnArray['error'] = '';

			//Begin form functionality
			if ($this->hasErrors($returnArray) === false){
				$to = "servicios@igevet.gob.ar";
				$mail_message = $this->buildMailMessage();
				//$result = $this->sendMail("julieta.corvi@gmail.com","REQ ST2127", $mail_message);
				$result = $this->sendMail($to,"REQ ST2127", $mail_message);
				if (! $result) 
					exit(header("Location:solicitud_error.php", true));
				else
					$returnArray['error'] = false;
			}
			else {
				$returnArray['error'] = true;
			}
			//print_r($returnArray);
			return json_encode($returnArray);			
		}
	}

	$ajaxValidate = new IGEVETST2127Form;
	echo $ajaxValidate->formValidate();		
?>
