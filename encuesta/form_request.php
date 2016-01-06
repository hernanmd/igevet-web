<section>
	<div class="workshop_color">
		<div class="contenedor">
				<h2>¿Cu&aacute;l de los siguientes temas es de su inter&eacute;s o de utilidad para su trabajo presente o futuro?</h2>
		</div>
	</div>
	<div class="contenedor">
		<div>
			
			
			<form id="form1" class='traduccion_form' method='POST'>
				<?php 
					require_once('form_proposal.php');
				?>	
				<ul>
				<li class="workshop">
					<div id="otros-ngs-group" class="form-group">
						<label class="la_otros_ngs" > Otros :</label>
						<input class="in_otros_ngs" type="text" name="otros_ngs">
						<div class="cleaner"></div>
					</div>
				</li>				
				<li class="workshop">
					<button class="submit" type="submit">Enviar</button>
				</li>				
</ul>
				</form>
				<script>
					$('#form1').submit(function(event) {
						//$('.form-group').removeClass('has-error'); // remove the error class
						event.preventDefault();
						$.ajax({
							type: 'POST',
							url: 'class_IGEVETEncuestaForm.php',
							data: $(this).serialize(),
							dataType: 'json',
							error: function( xhr, status ) {
								alert( "Hay un problema con el procesamiento, por favor actualice la página" );
								alert(status, xhr.error);
							},										
							success: function (data) {
								console.log(data.error);
								if (! data.error) {
									$(this).unbind('submit').submit()
									window.location.href ='solicitud_ok.php';												
								} 
							}
						});
					});
				</script>
		</div>
	</div>
</section>
