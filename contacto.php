<?php  
	$cat=6;
	$seccion = 'Contacto';
	require ('header.php');
?>

<div class="container-fluid topContacto">	
</div>

<div class="container-fluid" style="background-color: #FAFAFA; padding-bottom:50px;">
	<div class="container nosotros" >
		<div class="col-md-8 offset-md-2">
			<div class="tema">
				CONTACTO
			</div>
			<div class="titulo">
				Gracias por su interés en OMNI<br>
				Por favor, póngase en contacto con nosotros <br>
				por cualquier pregunta o comentario.
			</div>
			<form id="contact-form" method="post" action="contact.php" role="form">
              <div class="messages"></div>

                        <div class="controls">
            <div class="row">
              <div class="form-group col-12 col-md-3">
                <label for="form_name">* Nombre </label>
                <input id="form_name" type="text" name="name" class="form-control" required="required" data-error="Nombre es requerido.">
                <div class="help-block with-errors"></div>
              </div> 
              <div class="form-group col-12 col-md-3">
               <label for="form_lastname">* Apellido</label>
                <input id="form_lastname" type="text" name="surname" class="form-control" required="required" data-error="Apellido es requerido.">
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group col-12 col-md-3">
                 <label for="form_lastname">Empresa</label>
                <input id="form_empresa" type="text" name="empresa" class="form-control" >
                
              </div>
              <div class="form-group col-12 col-md-3">
                <label for="form_phone">Tel.</label>
                <input id="form_phone" type="tel" name="phone" class="form-control" >
                <div class="help-block with-errors"></div>
              </div>
          </div>
          <div class="row">
             <div class="form-group col-12 col-md-6">
                <label for="form_email">* Email</label>
              <input id="form_email" type="email" name="email" class="form-control" required="required" data-error="Un email válido es requerido.">
          <div class="help-block with-errors"></div>
              </div> 
               <div class="form-group col-12 col-md-6">
                <label for="razon">Equipo o Marca</label>
                <select class="form-control" name="reason" id="reason" required="required" data-error="Nombre es requerido.">
                 <option>Seleccione una opción</option>
                 <option>Seleccione una opción</option>
                 <option>Seleccione una opción</option>
                 <option>Seleccione una opción</option>
                
                </select>
              </div> 
          </div>
          <div class="row">
             <div class="form-group col-12">
                <label for="form_message">Mensaje</label>
                                        <textarea id="form_message" name="message" class="form-control"  rows="6" required="required" data-error="Por favor, deje un mensaje."></textarea>
                                        <div class="help-block with-errors"></div>
              </div>  
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6Lde0zAaAAAAAEsCc7oRQhyfOrHc7Pa5D9306o-p
" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                <input class="form-control hidden" data-recaptcha="true" required data-error="Por favor complete el  Captcha"> 
                  <div class="help-block with-errors"></div>
                                    </div>
                                </div>
            <div class="col-6 col-md-4">
              <p>* Campos obligatorios</p>
            </div>
            <div class="col-6 col-md-2">
               <input type="submit" class="btn btn-colorado-enviar btn-send" value="ENVIAR">
            
            </div>
          </div>
        </div>
        </form>
		</div>
	</div>
</div>



<?php 
  require ('footer.php') ;
?>