<h2>Información de inter&eacute;s</h2>
	<ul>
		<li>
			<div id="tipo_analisis" class="form-group">			
				<label class="la_tipo_analisis" for="tipoanalisis">Tipo de an&aacute;lisis</label>
				<select class="in_tipo_analisis" name="se_tipo_analisis">
					<option selected="selected"/>Paternidad/Maternidad Total
					<option />Paternidad/Maternidad Parcial
					<option />Cambio de cria
				</select>
				<div class="cleaner"></div>
			</div>
		</li>
		<li>
			<div id="raza" class="form-group">	
				<div>		
					<label class="la_raza" for="raza">Raza</label>
					<input type="text" class = "in_raza" name="raza">
				</div>
				
				<div class="cleaner"></div>
			</div>
		</li>
		<li>
			<div id="tipo" class="form-group">	
				<div>		
					<label class="la_tipo" for="tipo">Procedencia de la solicitud</label>
					<input type="radio" name="tipo_a" value="particular" checked>Particular    
					<input type="radio" name="tipo_a" value="judicial">Judicial
					<input type="radio" name="tipo_a" value="Institución">Institución
				</div>
				
				<div class="cleaner"></div>
			</div>
		</li>
		<li>
			<label class="la_tipo_muestra" >Tipo de muestra  </label>
			<div id="tipo-muestra-group" class="form-group">
						
				<label class="la_hisopado_bucal" >Hisopado Bucal</label>
				<input class="in_hisopado_bucal" type="checkbox" name="hisopado" value="Hispado bucal">
				
				<label class="la_sangre" >Sangre</label>
				<input class="in_sangre" type="checkbox" name="sangre" value="Sangre">
				<br>
				<label class="la_tejido" >Tejido</label>
				<input class="in_tejido" type="checkbox" name="tejido" value="Tejido">
				
				<label class="la_hueso" >Hueso</label>
				<input class="in_hueso" type="checkbox" name="hueso" value="Hueso">
				<br>
				<label class="la_diente" >Diente</label>
				<input class="in_diente" type="checkbox" name="diente" value="Diente">
				
				<label class="la_heces" >Heces</label>
				<input class="in_heces" type="checkbox" name="heces" value="Heces">
				
				<div class="cleaner"></div>
			</div>
		</li>
		<li>
			<label class="la_num_muestras">N&uacute;mero de muestras</label>
			<input type"number" class="in_num_muestras" name="num_muestras">
		</li>
		<li>
			<div>	
				<label class="la_comentario" for="comentario">Comentarios adicionales</label>
				<textarea class="in_comentario" name="comentario"></textarea> 
				<div class="cleaner"></div>
			</div>
		</li>
	</ul>