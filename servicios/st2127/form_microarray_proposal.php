<h2>Información de inter&eacute;s</h2>
	<ul>
		<li>
			<div id="tipo_analisis" class="form-group">			
				<label class="la_tipo_analisis" for="tipoanalisis">Tipo de an&aacute;lisis</label>
				<select class="in_tipo_analisis" name="se_tipo_analisis">
					<option selected="selected"/>SNPs Genotyping
					<option />CNV Genotyping
					<option />miRNA Genotyping
					<option />Exome Genotyping
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
						<option selected="selected"/>Axiom® Cotton Genotyping Array (Algodón)
						<option />Arabidopsis SNP Genotyping and Tiling Array (Arabidopsis)
						<option />GeneChip® Rice 44K SNP Genotyping Array (Arroz)
						<option />Axiom® Genome-Wide BOS 1 Bovine Array (Bovino)
						<option />Axiom® Buffalo Genotyping Array (Búfalo)
						<option />Axiom® Strawberry Genotyping Array (Fresa)
						<option />Lettuce (Lactuca sativa) SNP Genotyping Array (Lechuga)
						<option />Axiom® Maize Genotyping Array (Maíz)
						<option />Canine SNP Genotyping Array (Perros)
						<option />Pepper (Capsicum) SNP Genotyping Array (Pimienta)
						<option />Axiom® Genome-Wide Chicken Genotyping Array (Pollos)
						<option />Axiom® Porcine Genotyping Array (Porcinos)
						<option />Affymetrix® Mouse Diversity Genotyping Array (Ratón)
						<option />Axiom® Salmon Genotyping Array (Salmón)
						<option />Axiom® Soybean Genotyping Array (Soja)
						<option />Axiom® Wheat Genotyping Arrays (Trigo)
						<option />Axiom® Trout Genotyping Array (Trucha)
						<optgroup label="Humanos">
							<optgroup label="Axiom® Biobank Genotyping Arrays">
								<option />UK Biobank Axiom® Array
								<option />Axiom® Biobank Genotyping Array
								<option />Axiom® Biobank Plus Genotyping Array
							</optgroup>
							<optgroup label="Axiom® Exome Genotyping Arrays">
								<option />Axiom® Exome 319 Array Plate
								<option />Axiom® Exome Plus Array Plate
							</optgroup>
							<optgroup label="Axiom® World Arrays">
								<option />Axiom® Genome-Wide EUR 1 Array Plate
								<option />Axiom® Genome-Wide EAS 1 Array Plate
								<option />Axiom® Genome-Wide AFR 1 Array Plate
								<option />Axiom® Genome-Wide LAT 1 Array Plate
							</optgroup>
							<optgroup label="Axiom® Genome-Wide Population-Optimized Human Arrays">
								<option />Axiom® Genome-Wide CEU 1 Array Plate
								<option />Axiom® Genome-Wide ASI 1 Array Plate
								<option />Axiom® Genome-Wide CHB 1 Array Plate
								<option />Axiom® Genome-Wide CHB 2 Array Plate
							</optgroup>
							<option />Axiom® Genome-Wide Human Origins 1 Array Plate
							<optgroup label="Axiom® miRNA Target Site Genotyping Arrays">
								<option />Axiom® miRNA Target Site Genotyping Array Plate
								<option />Axiom® miRNA Target Site Plus Genotyping Array Plate
							</optgroup>
							<optgroup label="Axiom® myDesign™ Human Genotyping Arrays">
								<option />Axiom® 384HT myDesign™ Custom Array
								<option />Axiom® myDesign™ TG Array, 1K-25K
								<option />Axiom® myDesign™ TG Array, 25K-50K
								<option />Axiom® myDesign™ TG Array, 50K-90K
								<option />Axiom® myDesign™ TG Array, 90K-200K
								<option />Axiom® myDesign™ GW Array Plate, 200K-675K
								<option />Axiom® myDesign™ GW Array Plate, 675K-1.3M
								<option />Axiom® myDesign™ GW Array Plate, 1.3M-2.0M
								<option />Axiom® myDesign™ GW Array Plate, 2.0M-2.6M
							</optgroup>

						</optgroup>
						
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
			<div>	
				<label class="la_comentario" for="comentario">Comentarios adicionales</label>
				<textarea class="in_comentario" name="comentario"></textarea> 
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