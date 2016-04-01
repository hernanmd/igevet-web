<?php
error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");             // Fecha en el pasado
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Cambia siempre
	header("Cache-Control: no-cache, must-revalidate");           // HTTP/1.1
	header("Pragma: no-cache");
	require_once 'class_IGEVETAjaxValidator.php';
	require_once 'class_BaseForm.php'
	
	class IGEVETInscripcionForm {
		
		protected $tipo_inscripcion;
		protected $dni;
		protected $nacionalidad;
		protected $cargo;
		protected $beca;
		protected $comentario;	
		protected $conferencia;
		protected $modulo1;
		protected $modulo2;
		protected $ambos;

		protected $errorNacionalidad;
		protected $errorCargo;

		
		function getComentario() {
			return $this->comentario; 
		}

		function getBeca() {
			return $this->beca; 
		}

		function getCargo() {
			return $this->cargo; 
		}

		function getTipoInscripcion() {
			$this->tipo_inscripcion = $this->conferencia . " " . $this->modulo1 . " " . $this->modulo2 . " " . $this->ambos;

			return $this->tipo_inscripcion;
		}
		
		
		function getDni() {
			return $this->dni; 		
		}

		function getErrorNacionalidad () {
			return $this->errorNacionalidad;  
		}
		
		function getErrorCargo () {
			return $this->errorCargo;
		}

		function getNacionalidad() {
			return $this->nacionalidad;
		}

		function checkNacionalidad ($formVal) {
				if (empty($formVal))
					$this->errorNacionalidad =  "El campo Nacionalidad está incompleto";
				else
					$this->institution = $formVal;				
		}

		function checkCargo ($formVal) {
				if (empty($formVal))
					$this->errorCargo =  "Debe seleccionar alguna opción para el campo Cargo";
				else
					$this->cargo = $formVal;				
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
			$returnArray['errorNacionalidad'] = $this->getErrorNacionalidad();
			$returnArray['errorCargo'] = $this->getErrorCargo();
						
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
			$mail_message = " <b><ins> INSCRIPCIÓN A WORKSHOP </ins></b><br>" . 
				"<b>Nombre y Apellido: </b>" . $this->getCompleteName() . "<br>" . 
				"<b>DNI: </b>" . $this->getDni() . "<br>" .
				"<b>Nacionalidad: </b>" . $this->getNacionalidad() . "<br>" .
				"<b>E-mail: </b>" . $this->getEmailAddress() . "<br>" .
				"<b>Número de Teléfono: </b>" . $this->getPhoneNumner() . "<br>" .
		
				"<b>Se inscribe a: </b>" . $this->getTipoInscripcion() . "<br>" .
				"<b>Institución: </b>" . $this->getInstitution() . "<br>" . 
				"<b>Cargo: </b>" . $this->getCargo() . "<br>" . 
				"<b>Solicita beca: </b>" . $this->getBeca() . "<br>" .
		
				"<b>Comentarios: </b>" . "<br>" . $this->getComentario() . "<br>";
			return $mail_message;
		}

			
		function formValidate() {
			//Put form elements into post variables (this is where you would sanitize your data)
			$this->checkCompleteName($_POST['complete_name']);
			$this->checkEmail($_POST['email'], EMAIL);
			$this->checkInstitution($_POST["institution"]);
			$this->checkPhoneNumber($_POST["phone_number"]);
			$this->checkNacionalidad($_POST["nacionalidad"]);
			$this->checkCargo($_POST["cargo"]);


			if(isset($_POST['conferencia'])){
				$this->conferencia = trim($_POST["conferencia"]);
			}else{ $this->conferencia = " ";}

			if(isset($_POST['modulo_1'])){
				$this->modulo1 = trim($_POST["modulo_1"]);
			}else{ $this->modulo1 = " ";}

			if(isset($_POST['modulo_2'])){
				$this->modulo2 = trim($_POST["modulo_2"]);
			}else{ $this->modulo2 = " ";}

			if(isset($_POST['ambos'])){
				$this->ambos = trim($_POST["ambos"]);
			}else{ $this->ambos = " ";}

			if(isset($_POST["dni"])){
				$this->dni = htmlspecialchars_decode($_POST["dni"]);
			}
			else{
				$this->dni = " No especifica DNI ";
			}

			if(isset($_POST['beca'])){
				$this->beca = trim($_POST["beca"]);
			}else{ $this->beca = "No";}

			if(isset($_POST["comentario"])){
				$this->comentario = htmlspecialchars_decode($_POST["comentario"]);
			}
			else{
				$this->comentario = " ";
			}

			//Establish values that will be returned via ajax
			$returnArray = array();
			$returnArray['error'] = '';

			if ($this->hasErrors($returnArray) === false){
				$to = "workshop@igevet.gob.ar";
				$mail_message = $this->buildMailMessage();
				//$result = $this->sendMail("julieta.corvi@gmail.com","REQ ST2127", $mail_message);
				$result = $this->sendMail($to,"INSCRIPCIÓN AFFYMETRIX", $mail_message);
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

	$ajaxValidate = new IGEVETInscripcionForm;
	echo $ajaxValidate->formValidate();		
?>
