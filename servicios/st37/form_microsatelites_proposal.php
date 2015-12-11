<h2>Información de inter&eacute;s</h2>
	<ul>
		<li>
			<div id="tipo_analisis" class="form-group">			
				<label class="la_tipo_analisis" for="tipoanalisis">Tipo de an&aacute;lisis</label>
				<select class="in_tipo_analisis" name="se_tipo_analisis">
					<option selected="selected"/>Genotipado por SNPs
					<option />STR
				</select>
				<div class="cleaner"></div>
			</div>
		</li>
		<li>
			<script type="text/javascript">
				$(document).ready(function() {
					$('#form1 input:radio').click(function() {
						$(".generator").toggle();
					});
				});
		 
			</script>
			<div id="tipo_array" class="form-group">	
				<div>		
					<label class="la_tipo_array" for="tipoarray">Tipo de array</label>
					<input type="radio" name="tipo_a" value="comercial" checked>Comercial     
					<input type="radio" name="tipo_a" value="customizado">Personalizado
				</div>
				<div class="generator">
					<label class="la_generator" for="listaespecies">Lista de especies</label>
					<select class="generator" name="service_type">
						<option selected="selected"/>Axiom® Genome-Wide BOS 1 Bovine Array (Bovino)
						<option />Axiom® myDesign™ Human Genotyping Arrays (Humano)
						<option />Axiom® Buffalo Genotyping Array (Búfalo)
						<option />Axiom® Genome-Wide Chicken Genotyping Array (Pollos)
						<option />Axiom® Porcine Genotyping Array (Porcinos)
						<option />Axiom® myDesign™ Human Genotyping Arrays (Humano)
						<option />Axiom® Cotton Genotyping Array (Algodón)
						<option />Axiom® Maize Genotyping Array (Maíz)
						<option />GeneChip® Rice 44K SNP Genotyping Array (Arroz)
						<option />Axiom® Strawberry Genotyping Array (Fresa)
						<option />Axiom® Salmon Genotyping Array (Salmón)
						<option />Axiom® Soybean Genotyping Array (Soja)
						<option />Axiom® Trout Genotyping Array (Trucha)
						<option />Axiom® Wheat Genotyping Arrays (Trigo)
						<option />Lettuce (Lactuca sativa) SNP Genotyping Array (Lechuga)
						<option />Pepper (Capsicum) SNP Genotyping Array (Pimienta)
						<option />Arabidopsis SNP Genotyping and Tiling Array (Arabidopsis)
						<option />Canine SNP Genotyping Array (Perros)
						<option />Affymetrix® Mouse Diversity Genotyping Array (Ratón)
					</select>				
				</div>
				<div class="cleaner"></div>
			</div>
		</li>
		<li>
			<div id="cantidad_muestras" class="form-group">			
				<label class="la_cantmuestras" for="cantmuestras">Cantidad de muestras</label>
				<select class="in_cantmuestras" name="cant_muestras">
					<option selected="selected"/>de 0 a 96
					<option />de 0 a 384
					<option />de 0 a 500
					<option />de 0 a 1000
				</select>								
				<div class="cleaner"></div>
			</div>
		</li>
		<li>
			<div id="marcadores" class="form-group">			
				<label class="la_marcadores" for="marcad">N&uacute;mero de marcadores</label>
				<select class="in_marcadores" name="marca">
					<option selected="selected">De 1.500 a 50.000
					<option />M&aacute;s de 50.000
				</select>											
				<div class="cleaner"></div>
			</div>
		</li>
		<li>
			<div id="soporte-group" class="form-group">
				<label class="la_soporte" >¿Necesita soporte Bioinform&aacute;tico?</label>
				<input class="in_soporte" type="checkbox" name="soporte" value="Si">
				<div class="cleaner"></div>
			</div>
		</li>
	</ul>