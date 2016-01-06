<?php 
	include_once ('header_uploader.inc')
?>
<body>
<?php
	include_once ('header_menu.inc');
?>
	<section>
		<div class="contenedor">
			<div class="traduccion">
				<img src="../../img/st_37.png" alt="iso traduccion"/>
				<h2>ST37</h2>
				<h2>Análisis de fragmentos de ADN (microsatélites)</h2>
			</div>
		</div>
		<div class="cleaner"></div>
	</section>
	<section class="traduccion_color">
		<div class="contenedor">
			<h2>Solicitud de servicio / Presupuesto</h2>
		</div>
		<li>
			<label class="la_textoadjunto" for="textoadjunto">Adjuntar texto</label>
			<!-- https://github.com/blueimp/jQuery-File-Upload/wiki/Basic-plugin -->
			<input class="in_textoadjunto" placeholder="Archivo .doc" id="fileupload" type="file" name="files[]" data-url="uploaded-files/" multiple>
			<input class="in_textoadjunto" type="text" placeholder="archivo .doc" name="textoadjunto"> -->
			<div id="progress">
				<div class="bar" style="width: 0%;"></div>
			</div>
			<div class="cleaner"></div>
		</li>		
	</section>
<?php include_once ('form_translation_request.php'); ?>
<?php include_once ('footer.inc'); ?>



