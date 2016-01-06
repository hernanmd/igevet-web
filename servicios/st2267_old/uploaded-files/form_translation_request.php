<section>
	<div class="contenedor">
		<div class="institucional">
			<h2>Datos del Solicitante</h2>

			<span id="info1">
			</span>		
			
			<form id="form1" class='traduccion_form' action="submit_request.php" method='POST'>
				<?php require_once('form_solicitante.php') ?>
				<?php require_once('form_translation_proposal.php') ?>
			</form>
				<script>
					$('#form1').submit(function(event) {
						$('.form-group').removeClass('has-error'); // remove the error class
						event.preventDefault();
						$.ajax({
							type: 'POST',
							url: 'ajax.php',
							data: $(this).serialize(),
							dataType: 'json',
							error: function( xhr, status ) {
								alert( "Hay un problema con el procesamiento del pedido, por favor actualice la página" );
								// alert(status);
							},										
							success: function (data) {
								console.log(data);
								if (! data.error) {
									$(this).unbind('submit').submit()
									window.location.href ='solicitud_ok.php';												
								} else {
									// $('#info1').html(data.msg);
									$('#name-group').addClass('has-error'); // add the error class to show red input												
									$('#name-group').append('<div class="help-block">' + data.errorCompleteName + '</div>');
									
									$('#institution-group').addClass('has-error'); // add the error class to show red input												
									$('#institution-group').append('<div class="help-block">' + data.institution + '</div>');
									
									$('#email-group').addClass('has-error'); // add the error class to show red input												
									$('#email-group').append('<div class="help-block">' + data.email + '</div>');
									
									$('#phone-group').addClass('has-error'); // add the error class to show red input												
									$('#phone-group').append('<div class="help-block">' + data.phone_number + '</div>');
									
									$('#source_lang-group').addClass('has-error'); // add the error class to show red input												
									$('#source_lang-group').append('<div class="help-block">' + data.source_lang + '</div>');
									
									$('#target_lang-group').addClass('has-error'); // add the error class to show red input												
									$('#target_lang-group').append('<div class="help-block">' + data.target_lang + '</div>');
																				
									$('#service_type-group').addClass('has-error'); // add the error class to show red input												
									$('#service_type-group').append('<div class="help-block">' + data.service_type + '</div>');
									
									$('#due-group').addClass('has-error'); // add the error class to show red input												
									$('#due-group').append('<div class="help-block">' + data.due + '</div>');
									
								}
							}
						});
					});
				</script>
			</div>
			<div class="cleaner">
			<p>Los aranceles se regularán de acuerdo a las características del texto (longitud, grado de complejidad, plazo de entrega).</p>
		</div>
		<div class="cleaner">
</section>
