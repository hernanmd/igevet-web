<section>
	<div class="contenedor">
		<div class="institucional">
			<h2>Datos del Solicitante</h2>
			<form id="form1" class='traduccion_form' method='POST'>
				<?php 
					require_once('form_solicitante.php');
					require_once('form_paternidad_proposal');
				?>
				<li>
					<button class="submit" type="submit">Enviar</button>
				</li>
			</form>
				<script>
					$('#form1').submit(function(event) {
						$('.form-group').removeClass('has-error'); // remove the error class
						event.preventDefault();
						$.ajax({
							type: 'POST',
							url: 'class_IGEVETST247Form.php',
							data: $(this).serialize(),
							dataType: 'json',
							error: function( xhr, status ) {
								alert( "Hay un problema con el procesamiento del pedido, por favor actualice la página" );
								
							},										
							success: function (data) {

								console.log(data.error);
								if (! data.error) {
									$(this).unbind('submit').submit()
									window.location.href ='solicitud_ok.php';												
								} else {
									$('#name-group').addClass('has-error'); // add the error class to show red input												
									$('#name-group').append('<div class="help-block">' + data.errorCompleteName + '</div>');
									
									$('#institution-group').addClass('has-error'); // add the error class to show red input												
									$('#institution-group').append('<div class="help-block">' + data.errorInstitution + '</div>');
									
									$('#email-group').addClass('has-error'); // add the error class to show red input												
									$('#email-group').append('<div class="help-block">' + data.errorEmail + '</div>');
									
									$('#phone-group').addClass('has-error'); // add the error class to show red input												
									$('#phone-group').append('<div class="help-block">' + data.errorPhone_number + '</div>');
									
								}
							}
						});
					});
				</script>
		</div>
	</div>
</section>
