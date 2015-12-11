<h2>Información del texto a traducir</h2>
	<ul>
		<li>
			<div id="source_lang-group" class="form-group">			
				<label class="la_idiomaoriginal" for="idiomaoriginal">Idioma original</label>
				<select class="in_idiomaoriginal" name="source_lang">
					<option selected="selected"/>Inglés
					<option />Español
				</select>
				<div class="cleaner"></div>
			</div>
		</li>
		<li>
			<div id="target_lang-group" class="form-group">			
				<label class="la_idiomafinal" for="idiomafinal">Idioma a traducir</label>
				<select class="la_idiomafinal" name="target_lang">
					<option selected="selected"/>Inglés
					<option />Español
				</select>
				<div class="cleaner"></div>
			</div>
		</li>
		<li>
			<div id="service_type-group" class="form-group">			
				<label class="la_tiposervicio" for="tiposervicio">Tipo de servicio</label>
				<select class="in_tiposervicio" name="service_type">
					<option selected="selected"/>Traducción
					<option />Revisión
					<option />Corrección
				</select>								
				<div class="cleaner"></div>
			</div>
		</li>
		<li>
			<div id="due-group" class="form-group">			
				<label class="la_plazo" for="plazo">Plazo de entrega</label>
				<!--   <input class="in_plazo" type="text" placeholder="normal: 7 días / urgente" name="due"> -->
				<select class="in_plazo" name="due">
					<option />Normal (7 días)
					<option />Urgente
				</select>											
				<div class="cleaner"></div>
			</div>
		</li>
		<li>
			<div id="institution-group" class="form-group">			
				<label class="la_cantcaracteres" for="cantcaracteres">Cantidad de caracteres</label>
				<input class="in_cantcaracteres" type="number" min="1" placeholder="" name="char_count">
				<div class="cleaner"></div>
			</div>
		</li>

		<li>
			<button class="submit" type="submit">Enviar</button>
		</li>
	</ul>
<div class="cleaner"></div>