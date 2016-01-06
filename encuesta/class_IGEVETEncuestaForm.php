<?php
error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");             // Fecha en el pasado
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Cambia siempre
	header("Cache-Control: no-cache, must-revalidate");           // HTTP/1.1
	header("Pragma: no-cache");
	require_once 'class_IGEVETAjaxValidator.php';
	
	class IGEVETEncuestaForm {
		
		protected $crudo_microarray;
		protected $archivo_microarray;
		protected $evolutivo;
		protected $gwas;
		protected $seleccion;
		protected $copias;
		protected $trans_microarray;
		protected $crudo_ngs;
		protected $archivo_ngs;
		protected $ensamblado;
		protected $snp;
		protected $anotacion;
		protected $trans_ngs;
		protected $otros_ngs;
		
		
		function getCrudoMicroarray() {
			return $this->crudo_microarray; 
		}
		
		function getArchivoMicroarray() {
			return $this->archivo_microarray;
		}
		
		function getEvolutivo() {
			return $this->evolutivo; 
		}
		
		function getGwas() {
			return $this->gwas; 		
		}
		
		function getSeleccion() {
			return $this->seleccion; 
		}
		
		function getCopias() {
			return $this->copias; 		
		}

		function getTransMicroarray() {
			return $this->trans_microarray;
		}
		
		
		function getCrudoNgs() {
			return $this->crudo_ngs; 		
		}
		
		function getArchivoNgs() {
			return $this->archivo_ngs; 
		}
		
		function getEnsamblado() {
			return $this->ensamblado; 		
		}

		function getSnp() {
			return $this->snp;
		}
		
		function getAnotacion() {
			return $this->anotacion; 
		}
		
		function getTransNgs() {
			return $this->trans_ngs; 		
		}
		
		function getOtrosNgs() {
			return $this->otros_ngs; 
		}
		
		/* 
		*
		*	Form Functions
		*
		*/

			
		function buildMailMessage() {
			$mail_message = " <b><ins> MICROARRAY </ins></b><br>" . 
				"<b>Análisis de datos crudos: </b>" . $this->getCrudoMicroarray() . "<br>" . 
				"<b>Tipo y transformacion de archivos: </b>" . $this->getArchivoMicroarray() . "<br>" .
				"<b>Análisis Poblacional - Evolutivo: </b>" . $this->getEvolutivo() . "<br>" . 
				"<b>Asociación genómica (GWAS) : </b>" . $this->getGwas() . "<br>" .
				"<b>Selección genómica: </b>" . $this->getSeleccion() . "<br>" .
				"<b>Variación en el número de copias (CNV): </b>" . $this->getCopias() . "<br>" .
				"<b>Transcriptómica: </b>" . $this->getTransMicroarray() . "<br><br>" .
				"<b><ins> SECUENCIACIÓN MASIVA (NGS) </ins></b><br>" .
				"<b>Análisis de datos crudos: </b>" . $this->getCrudoNgs() . "<br>" .
				"<b>Tipo y transformación de archivos: </b>" . $this->getArchivoNgs() . "<br>" .
				"<b>Ensamblado de genoma y de regiones cromosómicas: </b>" . $this->getEnsamblado() . "<br>" .
				"<b>Detección de SNPs: </b>" . $this->getSnp() . "<br>" .
				"<b>Anotación: </b>" . $this->getAnotacion() . "<br>" .
				"<b>Transcriptómica: </b>" . $this->getTransNgs() . "<br><br>" .
				"<b><ins>OTROS: </ins></b>" . $this->getOtrosNgs() . "<br>";
			return $mail_message;
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
			$header[] = "Content-type:text/html; charset=UTF-8";
			$header[] = "Content-Transfer-Encoding: 8bit";
			return mail($to, $subject, $message, implode("\r\n", $header));
		}	
		
		function formValidate() {
			//Put form elements into post variables (this is where you would sanitize your data)
			if(isset($_POST['crudo_microarray'])){
				$this->crudo_microarray = trim($_POST["crudo_microarray"]);
			}else{ $this->crudo_microarray = "No especificado";}
			
			if(isset($_POST['archivo_microarray'])){
				$this->archivo_microarray = trim($_POST["archivo_microarray"]);
			}else{ $this->archivo_microarray = "No especificado";}

			if(isset($_POST['evolutivo'])){
				$this->evolutivo = trim($_POST["evolutivo"]);
			}else{ $this->evolutivo = "No especificado";}

			if(isset($_POST['gwas'])){
				$this->gwas = trim($_POST["gwas"]);
			}else{ $this->gwas = "No especificado";}

			if(isset($_POST['seleccion'])){
				$this->seleccion = trim($_POST["seleccion"]);
			}else{ $this->seleccion = "No especificado";}

			if(isset($_POST['copias'])){
				$this->copias = trim($_POST["copias"]);
			}else{ $this->copias = "No especificado";}

			if(isset($_POST['trans_microarray'])){
				$this->trans_microarray = trim($_POST["trans_microarray"]);
			}else{ $this->trans_microarray = "No especificado";}

			// Secuenciacion Masiva (NGS)

			if(isset($_POST['crudo_ngs'])){
				$this->crudo_ngs = trim($_POST["crudo_ngs"]);
			}else{ $this->crudo_ngs = "No especificado";}

			if(isset($_POST['archivo_ngs'])){
				$this->archivo_ngs = trim($_POST["archivo_ngs"]);
			}else{ $this->archivo_ngs = "No especificado";}

			if(isset($_POST['ensamblado'])){
				$this->ensamblado = trim($_POST["ensamblado"]);
			}else{ $this->ensamblado = "No especificado";}

			if(isset($_POST['snp'])){
				$this->snp = trim($_POST["snp"]);
			}else{ $this->snp = "No especificado";}

			if(isset($_POST['anotacion'])){
				$this->anotacion = trim($_POST["anotacion"]);
			}else{ $this->anotacion = "No especificado";}

			if(isset($_POST['trans_ngs'])){
				$this->trans_ngs = trim($_POST["trans_ngs"]);
			}else{ $this->trans_ngs = "No especificado";}

			if(isset($_POST['otros_ngs'])){
				$this->otros_ngs = trim($_POST["otros_ngs"]);
			}else{ $this->otros_ngs = "No especificado";}

			//Establish values that will be returned via ajax
			$returnArray = array();

			//Begin form functionality
			$to = "servicios@igevet.gob.ar";
			$mail_message = $this->buildMailMessage();
			//$result = $this->sendMail("julieta.corvi@gmail.com","REQ ST2127", $mail_message);
			$result = $this->sendMail($to,"ENCUESTA AFFYMETRIX", $mail_message);
			if (! $result) 
				exit(header("Location:solicitud_error.php", true));
			else
				$returnArray['error'] = false;
			
			//print_r($returnArray);
			return json_encode($returnArray);			
		}
	}

	$ajaxValidate = new IGEVETEncuestaForm;
	echo $ajaxValidate->formValidate();		
?>
