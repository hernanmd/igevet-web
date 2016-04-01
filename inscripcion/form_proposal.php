
	<ul>
	
		<li>
			<div id="tipo_inscripcion" class="form-group">			
				<label class="la_tipo_inscripcion" for="tipoinscripcion">Inscripci&oacute;n a:</label>

				<label class="la_conferencia" >Conferencias Preliminares</label>
				<input class="in_conferencia" type="checkbox" name="conferencia" value="Conferencias Preliminares">
				<br>
				<label class="la_modulo_1" >M&oacute;dulo 1</label>
				<input class="in_modulo_1" type="checkbox" name="modulo_1" value="Modulo 1">
				<br>
				<label class="la_modulo_2" >M&oacute;dulo 2</label>
				<input class="in_modulo_2" type="checkbox" name="modulo_2" value="Modulo 2">
				<br>
				<label class="la_ambos" >Ambos m&oacute;dulos</label>
				<input class="in_ambos" type="checkbox" name="ambos" value="Ambos Modulos">
				<div class="cleaner"></div>
			</div>
		</li>
		<li>
			<div id="informacion" class="form-group">	
				<p> 
				<strong>Aranceles:</strong>
				<br>
				Conferencias plenarias: Actividad gratuita. Requiere inscripción previa.
				<br>
				* Módulo 1 - Costo: AR$ 4.000 (cuatro mil Pesos). Los inscriptos deberán asistir con su computadora portable.
				<br>
				* Módulo 2 - Costo: AR$ 4.000 (cuatro mil Pesos). Los inscriptos deberán asistir con su computadora portable.
				<br>
				* Módulos 1 y 2- Costo : AR$ 6.000 (seis mil Pesos). Los inscriptos deberán asistir con su computadora portable.
				<br>
				</p>
				
				
				<div class="cleaner"></div>
			</div>
		</li>
		<li>
			<h2> Datos del Solicitante </h2>
			<?php 
					require_once('form_solicitante.php');
			?>
			<div class="cleaner"></div>
		</li>
		<li>
			<div id="beca-group" class="form-group">
				<label class="la_beca" >Solicito beca:</label>
				<input class="in_beca" type="checkbox" name="beca" value="Si">
				<p>Enviar cv a: workshop@igevet.gob.ar 
				<br>
				Sujeto a selección por el Departamento de Postgrado de la Facultad de Cs. Veterinarias UNLP
				</p>
				
				<div class="cleaner"></div>
			</div>
		</li>
		<li>
			<div>	
				<label class="la_comentario" for="comentario">Comentarios adicionales</label>
				<textarea class="in_comentario" name="comentario"></textarea> 
				<div class="cleaner"></div>
			</div>
		</li>		
		<li>
			<p>
			* Actividades aranceladas: la información para realizar el pago será enviada a la brevedad al correo electrónico indicado
			</p>
		</li>

	</ul>

