<?php
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");             // Fecha en el pasado
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Cambia siempre
	header("Cache-Control: no-cache, must-revalidate");           // HTTP/1.1
	header("Pragma: no-cache");
	
	require_once 'messages.php';
	require_once '../class_IGEVETBaseForm.php';
	
	class IGEVETST249Form extends IGEVETBaseForm {

		private $comentario;
		private $raza;
		private $num_muestras;
		private $tipo_muestras;
		private $tipo;
		private $hisopado;
		private $sangre;
		private $tejido;
		private $hueso;
		private $diente;
		private $heces;
	

		/* 
		*
		*	Form Functions
		*
		*/

		function getRaza(){
			return $this->raza;
		}

		function getNumMuestras(){
			return $this->num_muestras;
		}
		function getTipoMuestras(){
			$this->tipo_muestras = $this->hisopado . " " . $this->sangre . " " . $this->tejido . " " . $this->hueso . " " . $this->diente . " " . $this->heces;

			return $this->tipo_muestras;
		}
		function getTipo(){
			return $this->tipo;
		}

		function getComentario(){
			return $this->comentario;
		}

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
			$mail_message = "<b>Nombre y Apellido: </b>" . $this->getCompleteName() . "<br>" . 
				"<b>E-mail: </b>" . $this->getEmailAddress() . "<br>" .
				"<b>Institución: </b>" . $this->getInstitution() . "<br>" . 
				"<b>Número de Teléfono: </b>" . $this->getPhoneNumner() . "<br>" .
				"<b>Raza: </b>" . $this->getRaza() . "<br>" .
				"<b>Numero de muestras: </b>" . $this->getNumMuestras() . "<br>" .
				"<b>Tipo: </b>" . $this->getTipo() . "<br>" .
				"<b>Tipo de muestra: </b>" . $this->getTipoMuestras() . "<br>" .
				"<b>Comentarios: </b>" . "<br>" . $this->getComentario() . "<br>";
			return $mail_message;
		}
		
		function formValidate() {

			//Put form elements into post variables (this is where you would sanitize your data)
			$this->checkCompleteName($_POST['complete_name']);
			$this->checkEmail($_POST['email'], EMAIL);
			$this->checkInstitution($_POST["institution"]);
			$this->checkPhoneNumber($_POST["phone_number"]);

			if(isset($_POST["raza"])){
				$this->raza = htmlspecialchars_decode($_POST["raza"]);
			}
			else{
				$this->raza = " No especificada ";
			}

			if(isset($_POST["num_muestras"])){
				$this->num_muestras = htmlspecialchars_decode($_POST["num_muestras"]);
			}
			else{
				$this->num_muestras = " No especificada ";
			}

			$this->tipo = trim($_POST["tipo_a"]);

			if(isset($_POST['hisopado'])){
				$this->hisopado = trim($_POST["hisopado"]);
			}else{ $this->hisopado = " ";}

			if(isset($_POST['sangre'])){
				$this->sangre = trim($_POST["sangre"]);
			}else{ $this->sangre = " ";}

			if(isset($_POST['tejido'])){
				$this->tejido = trim($_POST["tejido"]);
			}else{ $this->tejido = " ";}

			if(isset($_POST['hueso'])){
				$this->hueso = trim($_POST["hueso"]);
			}else{ $this->hueso = " ";}

			if(isset($_POST['diente'])){
				$this->diente = trim($_POST["diente"]);
			}else{ $this->diente = " ";}

			if(isset($_POST['heces'])){
				$this->heces = trim($_POST["heces"]);
			}else{ $this->heces = " ";}

			if(isset($_POST["comentario"])){
				$this->comentario = htmlspecialchars_decode($_POST["comentario"]);
			}
			else{
				$this->comentario = " ";
			}						
			
			//Establish values that will be returned via ajax
			$returnArray = array();
			$returnArray['error'] = '';

			//Begin form functionality
			if ($this->hasErrors($returnArray) === false){
				$to = "servicios@igevet.gob.ar";
				$mail_message = $this->buildMailMessage();
				$result = $this->sendMail($to,"REQ ST249", $mail_message);
				if (! $result) 
					exit(header("Location:solicitud_error.php", true));
				else
					$returnArray['error'] = false;
			}
			else {
				$returnArray['error'] = true;
			}
			
			return json_encode($returnArray);			
		}
	}

	$ajaxValidate = new IGEVETST249Form;
	echo $ajaxValidate->formValidate();		
?>
