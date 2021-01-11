@extends('layouts.layout')
	@section('navigate')
    	@parent
    @stop

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script>

      $(document).ready(function(){        

      function trunc (x, posiciones = 0) {
      var s = x.toString()
      var l = s.length
      var decimalLength = s.indexOf('.') + 1
      var numStr = s.substr(0, decimalLength + posiciones)
      return Number(numStr)

      //Declaramos variables

    
            }  
             

        $("#telefono").keyup(function () { 
          
          if ($("#telefono").val().match(/^[0-9]{3}[- ][0-9]{3}[- ][0-9]{4}$/))
          {
            $("#mensaje").html("");
          }
          else
          {
            $("#mensaje").html("<span class='badge badge-danger' >Ingrese por ejemplo: 722-222-4444</span>");
          }
          
      });

      $("#telefono2").keyup(function () { 
          
          if ($("#telefono2").val().match(/^[0-9]{3}[- ][0-9]{3}[- ][0-9]{4}$/))
          {
            $("#mensaje2").html("");
          }
          else
          {
            $("#mensaje2").html("<span class='badge badge-danger' >Ejemplo de Formato Correcto: 722-222-4444 ó 722 222 4444</span>");
          }
          
      });

          
    });


  </script>
    
    
    <link rel="shortcut icon" href="{{asset('img/logoSeguros.png')}}" type="image/x-icon">

  <img class="" id="fondo" src="{{asset('img/seguro.jpg')}}"></img>
  
  <div class="d-flex p-2 bd-highlight">

	<div class="form">
		<form method="POST" action="{{ route('cotizadores') }}">
			{{ csrf_field() }}
            <h3 class="h3 text-center">Cotiza con nosotros</h3>

            <div class="group row">
				<div class="col">
					<input required="" type="text" name="nombre" class="form-control" placeholder="Escribe tu nombre">
				</div>
			</div>
			<div class="group row">
				<div class="col">
					<input required="" type="email" name="correo" class="form-control" placeholder="Correo electrónico">
				</div>
            </div>
            <div class="group row">
                <div class="col-4">
					<input type="number" min="18"  max="100" required name="edad" class="form-control" placeholder="Edad">
				</div>
				<div class="col">
          <input required="" type="tel" name="telefono" id="telefono" class="form-control" placeholder="Teléfono">
          <div id="mensaje"></div>
				</div>
            </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="inlineRadio1">Genero:</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" id="masculino" value="M">
                        <label class="form-check-label" for="inlineRadio1">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" id="femenino" value="F">
                        <label class="form-check-label" for="inlineRadio2">Femenino</label>
                    </div>


            <h4 class="h4 text-center">DATOS DEL AUTO</h4>

			<div class="group row">
				<div class="col">
					<select required class="form-control" name="marca">
						<option selected="" disabled="" value="0">Marca</option>
						@foreach($marcas as $i)
							<option value="{{ $i->id }}">{{ $i->marca }}</option>
						@endforeach
					</select>
				</div>
				<div class="col">
					<select required name="modelo" class="form-control">
						<option selected="" disabled="">Modelo</option>
						@foreach($modelos as $i)
							<option value="{{ $i->id }}">{{ $i->modelo }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="group row">
				<div class="col">
					<input required="" name="descripcion" class="form-control" placeholder="EJEMPLO: JETTA A4 GTI"></input>
				</div>
			</div>


            <div class="group row">
				<div class="col">
					<input required="" type="checkbox" name="accept" value="1"> Acepto que he leído el <a href="" style="color: #000;" data-toggle="modal" data-target="#exampleModal"><b>Aviso de privacidad</b></a>
				</div>
            </div>

			<button class="btn btn-outline-dark btn-block" id="cotizar-btn">Cotizar</button>
		</form>
	</div>
	<div id="msj-index">
		<center>
			<h2 style="color: #2D2D2D">Te brindamos asesoría para la</h3><br>
			<h3 style="color: #313438">contratación de tu seguro</h1><br><br>
		</center>
		<a href="#cotizaciones" class="btn-index btn btn-info">Seguros</a>
		<a href="#contacto" class="btn-index btn btn-dark">Contacto</a>
	</div>

	<div id="new-body"  >
		<img src="{{asset('img/tira.png')}}" id="tira">

        <br>

        <div class="container">
            <div class="row">
              <div class="col">


                    <p  style="color: #313438">
                        <h2 class="text-center text-info">
                        "Nuestros agentes personalizan los planes de protección para ti y tu familia"
                        </h2>
                    </p>
                    <a href="#contacto" type="button" class="btn btn-outline-info btn-block">
                            Contactanos
                    </a>

              </div>

              <div class="col">

                <img src="{{asset('img/agente.jpg')}}" width="80%">

              </div>
            </div>
        </div>

			<br>
			@if(count($mega1) > 0)
			<center>
			<div class="bannerBig">
				<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  					<div class="carousel-inner">
  						<div class="carousel-item active">
  						</div>
  						@foreach($mega1 as $i)
    						<div class="carousel-item">
      							<img class="img-fluid rounded mx-auto d-block" src="{{asset('banners')}}/{{$i->imagen}}" alt="First slide" width="50%">
    						</div>
    					@endforeach
  					</div>
				</div>
			</div>
			</center>
			@endif
        <br>

        <h2 class="h2 text-center">NOS OCUPAMOS DE LO QUE TE PREOCUPA</h2>

		<br>
		<section id="cotizaciones">


            <div class="quotes">

                <div class="card" style="width: 16rem;">
                    <img loading="lazy"  src="{{asset('img/salud.png')}}" class="card-img-top" alt="Seguro de Salud">
                    <div class="card-body">
                      <h5 class="card-title text-info">Seguro de Salud</h5>
                      <p class="card-text text-left">Te ayudamos para proteger y recuperar tu salud y la de tu familia.</p>
                      <button data-toggle="modal" data-target="#cotizarSalud" class="btn btn-primary btn-block">Cotizar</button>
                    </div>
                </div>

                <div class="card" style="width: 16rem;">
                    <img loading="lazy"  src="{{asset('img/motos.png')}}" class="card-img-top" alt="Seguro de VehículoS">
                    <div class="card-body">
                      <h5 class="card-title text-info">Seguro de Vehiculos</h5>
                      <p class="card-text text-left">Tenemos la protección a la medida de tu vehículo contra cualquier accidente.</p>
                      <button data-toggle="modal" data-target="#cotizarVehiculo" class="btn btn-primary btn-block">Cotizar</button>
                    </div>
                </div>

                <div class="card" style="width: 16rem;">
                    <img loading="lazy"  src="{{asset('img/casas.jpg')}}" class="card-img-top" alt="Seguro de Hogar">
                    <div class="card-body">
                      <h5 class="card-title text-info">Seguro de Hogar</h5>
                      <p class="card-text text-left">Te ofrece la oportunidad de proteger el patrimonio familiar más importante.</p>
                      <button data-toggle="modal" data-target="#cotizarHogar" class="btn btn-primary btn-block">Cotizar</button>
                    </div>
                </div>

            </div>


    <div class="quotes">

            <div class="card" style="width: 16rem;">
                    <img loading="lazy"  src="{{asset('img/choque.png')}}" class="card-img-top" alt="Seguro de Autos">
                    <div class="card-body">
                    <h5 class="card-title text-info">Seguro de Autos</h5>
                    <p class="card-text text-left">Cotiza y contrata el mejor seguro para tu auto de manera fácil, rápida y segura.</p>
                    <button data-toggle="modal" data-target="#cotizarCarro" class="btn btn-primary btn-block">Cotizar</button>
                    </div>
                </div>

                <div class="card" style="width: 16rem;">
                    <img loading="lazy"  src="{{asset('img/vida.png')}}" class="card-img-top" alt="Seguro de Vida">
                    <div class="card-body">
                    <h5 class="card-title text-info">Seguro de Vida</h5>
                    <p class="card-text text-left">Los seguros de vida son múltiples y variados, los hay para cada tipo de necesidad.</p>
                    <button data-toggle="modal" data-target="#cotizarVida" class="btn btn-primary btn-block">Cotizar</button>
                    </div>
                </div>

                <div class="card" style="width: 16rem;">
                    <img loading="lazy"  src="{{asset('img/medicos.jpg')}}" class="card-img-top" alt="Seguro de Vida">
                    <div class="card-body">
                    <h5 class="card-title text-info">Seguro de Médico</h5>
                    <p class="card-text text-left">Cobertura medica por enfermedad o accidente para ti y tu familia.</p>
                    <button data-toggle="modal" data-target="#cotizarGastosMedicos" class="btn btn-primary btn-block">Cotizar</button>
                    </div>
                </div>

    </div>
  </section>
    {{-- Carrousel --}}

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
          <div class="carousel-item active">
          </div>
            <div class="carousel-item">
                  <img class="img-fluid rounded mx-auto d-block" src="{{asset('img/seguros2.png')}}" alt="First slide" width="50%">
            </div>
      </div>
</div>


{{--End Carrousel --}}

<br>

<h3 class="text-primary text-center">Beneficios que recibes al contratar un Seguro de Auto con Seguros Toluca</h3>
       
      <p class="text-justify m-5">
        Conocemos las necesidades que se tienen como conductor de un vehículo, es por eso que los seguros de autos se han creado para respaldar financieramente a los propietarios de los vehículos y por eso Seguros Toluca.En Seguros Toluca se han preocupado por dar un gran respaldo financiero en caso de requerirse, es por eso que se ofrecen los beneficios necesarios para que los usuarios se encuentren con la tranquilidad al salir de casa.
      </p>

		<div id="benefits-div">
			<div id="item1">
		<p>
			Al contar con el respaldo de los seguros de autos, puedes recibir lo siguiente:
		</p>
		<i class="far fa-check-circle text-success"></i> Daños Materiales.<br>
		<i class="far fa-check-circle text-success"></i> Robo Total de tu automóvil.<br>
		<i class="far fa-check-circle text-success"></i> Responsabilidad Civil por Daños a Terceros.<br>
		<i class="far fa-check-circle text-success"></i> Gastos Médicos a Ocupantes.<br>
		<i class="far fa-check-circle text-success"></i> Gastos Legales.<br>
		<i class="far fa-check-circle text-success"></i> Asistencia Vial y legal en caso de siniestro.<br>
		<i class="far fa-check-circle text-success"></i> Muerte al Conductor por Accidente Automovilístico.<br><br><br>
			</div>
		@if(count($square) > 0)
			<div class="square">
				<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  					<div class="carousel-inner">
  						<div class="carousel-item active">
  						</div>
  						@foreach($square as $i)
    						<div class="carousel-item">
      							<img class="img-fluid rounded mx-auto d-block" src="{{asset('banners')}}/{{$i->imagen}}" alt="seguros">
    						</div>
    					@endforeach
  					</div>
				</div>
			</div>
		@endif
		</div>
       


		<!--Nosotros-->
		<section id="nosotros">
			<div id="about-us">
                <br>
				<h3 class=" h3 text-center">NOSOTROS</h3>
				<br>

					<p class="text-justify">
                        Debido a las reformas dadas en nuestro país, se nos permite ofrecer productos competitivos para la adquisición de un seguro, ya sea de auto, vida, gastos médicos, casa, etc., y así proteger el patrimonio o bienestar del interesado.
                        Te asesoramos para la contratación de tu seguro, buscando la mejor opción de acuerdo a tus necesidades, brindándote la tranquilidad que te mereces, antes, durante y al momento de requerir alguna cobertura de tu póliza de seguros.
                        Después de todo, la necesidad de seguridad es universal. Recuerda que contratar un seguro te da la certeza de un respaldo sólido e inmediato en momentos en los que el tiempo y la confianza son más importantes.
					</p>

				<div class="about" id="first">
					<h4 class="h4 text-center">Misión</h4>
					<p class="text-justify">Consolidarnos como su mejor opción para la adquisición de un seguro. Brindándole productos de calidad y con excelencia en el servicio.</p>
				</div>
				<div class="about" id="second">
					<h4 class="h4 text-center">Visión</h4>
					<p class="text-justify">Ser líder en la venta de seguros, cubriendo las necesidades de nuestros clientes por encima de sus expectativas.</p>
				</div>



            </div>
            <br>
            <br>
		</section>
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15065.447234474666!2d-99.637388!3d19.266626!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6a794f1772849371!2sSeguros%20Toluca!5e0!3m2!1ses!2smx!4v1576046051100!5m2!1ses!2smx" frameborder="0" style="border:0;width: 100%;height: 500px;" allowfullscreen=""></iframe>
        <!--Contacto-->
        <br>
        <br>
		<section id="contacto">
			<div class="section-contacto">
				<img src="{{asset('img/office-620822_1920.jpg')}}" id="contact-image">
				<div class="message-contact">
						<h3 class="h3 text-center">DATOS DE CONTACTO</h3>
                        <br>
                        <h4 class="h4 text-center">SEGUROS TOLUCA</h4>
                        <br>
                        <h5 class="h5 text-center">TEL: +52 1 722 248 1733</h5>
                        <br>
                        <h5 class="h5 text-center">recuperacion@segurostoluca.com.mx</h5>

				</div>
			<center>
				<div class="contacto">
					<h2>Dudas o comentarios</h2>
					<form method="POST" action="{{ route('contacto.store') }}" id="submit_contact">
						{{ csrf_field() }}
						<div class="group row">
							<div class="col">
								<input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
							</div>
						</div>
						<div class="group row">
							<div class="col">
                <input type="text" name="telefono2" id="telefono2" class="form-control" placeholder="Teléfono" required>
                <div id="mensaje2"></div>
							</div>
						</div>
						<div class="group row">
							<div class="col">
								<input type="email" name="correo" class="form-control" placeholder="Correo electrónico" required>
							</div>
						</div>
						<div class="group row">
							<div class="col">
								<textarea name="mensaje" class="form-control" placeholder="Mensaje" rows="5" style="resize: none;"></textarea>
							</div>
						</div>
						<button type="submit" class="btn btn-primary btn-block">Enviar</button>
					</form>
				</div>
			</center>
			</div>
		</section>
		<div class="footer">
			<div class="section">
				<p><b>SEGUROS TOLUCA</b></p>
				<p>
					<i class="fas fa-caret-right"></i> <a href="" data-toggle="modal" data-target="#exampleModal">
                       <label for="" class=" text-secondary"> Aviso de privacidad</label></a>
				</p>
			</div>
			<div class="section">
				<p><b>SITIOS DE INTERÉS</b></p>
				<p>
                    <i class="fas fa-caret-right"></i> <a href="http://www.segurostoluca.com/" target="_blank">
                        <label for="" class=" text-secondary">Blog </label></a>
				</p>
            </div>

			<div class="section">

                <p><b>SÍGUENOS EN:</b></p>


                    <a href="https://www.facebook.com/segtolu/" target="_blank">
                        <i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i>
                    </a>

                    &nbsp; &nbsp;

                    <a href="https://api.whatsapp.com/send?phone=527222481733" target="_blank">
                        <i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i>
                    </a>

			</div>
			<div class="copyright">
				&copy; Derechos Reservados.
			</div>
		</div>
	</div>
	<div id="login">
		<i class="fas fa-times" id="close-login"></i>
		<form action="{{ route('login.store') }}" method="POST">
			{{ csrf_field() }}
			<center>
				<h2>Iniciar Sesión</h2><br>
				<div class="group row">
					<div class="col">
						<input type="email" name="user" class="form-control" placeholder="Correo electrónico">
					</div>
				</div>
				<div class="group row">
					<div class="col">
						<input type="password" name="pass" class="form-control" placeholder="Contraseña">
					</div>
				</div>
				<button type="success" class="btn btn-primary" id="logged">Iniciar Sesión</button><br><br>
				<a href="{{ route('registrar') }}" id="forget">registrarme</a>
				<br>
			</center>
		</form>
	</div>
  	<div class="btn-whatsapp">
		<a href="https://api.whatsapp.com/send?phone=527222481733" target="_blank">
			<img src="http://s2.accesoperu.com/logos/btn_whatsapp.png" alt="">
		</a>
	</div>
	<div id="msj_facebook">
		<a href="https://www.facebook.com/segtolu/" target="_blank"><img src="img/facebook.png"></a>
	</div>
	<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<center><h3 class="text-primary modal-title" id="exampleModalLabel">Aviso de privacidad</h3></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h4 class="text-primary">Identidad y domicilio del Responsable</h4>
          <p>
          	En virtud de lo dispuesto por la Ley Federal de Protección de Datos Personales en Posesión de los Particulares (en adelante, la “LFPD”) y resto de disposiciones aplicables, Trigarante Agente de Seguros y de Fianzas S.A. de C.V. (en adelante e indistintamente, “mejorsegurodeauto.mx”), con domicilio para oír y recibir notificaciones en Francisco Tamagno 223, Vallejo, 07870 Ciudad de México; le informa de forma expresa:
          </p>

          <h4 class="text-primary">1. FINALIDADES DEL TRATAMIENTO DE DATOS PERSONALES</h4>
          <p>
          	Los datos personales que recabamos de usted, serán utilizados conforme a lo que establece la Ley, tales datos podrán ser obtenidos de manera directa, indirecta o de otras fuentes, mismos datos nos son necesarios para proporcionarle los servicios que se deriven o sean accesorios de la misma, y con ello dar cumplimiento a las siguientes finalidades:
          </p>

			-Contacto <br>
			-Con fines de identificación y de verificación <br>
			-Promoción de productos financieros, esta información puede ser transferida a instituciones de crédito o instituciones financieras: <br>
			-Cobranza en cualquiera de sus fases <br>
			-Ofrecer y prestar servicios de telemercadeo y servicios relacionados, <br>
			-Encuestas, <br>
			-Promocionar y comercializar todo tipo de bienes y servicios <br>
			-Podrá tratar su información para fines publicitarios, promocionales y de investigaciones de mercado, <br>
			-Documentar la relación con los Clientes a través de la celebración de contratos y/o convenios correspondientes; <br>
			-Inclusión en el catálogo de clientes <br>
			-Intermediación de seguros y de fianzas. <br>
			-Cumplimiento de las obligaciones contenidas en nuestro contrato, convenio o de cualquier relación jurídica que establezcamos conforme a la Legislación aplicable vigente. <br>
			-Realizar las gestiones propias y necesarias para el cumplimiento de los servicios. <br>
			-Para intermediar en la evaluación de su solicitud de seguro, cotizar seguros y fianzas, brindarle la asesoría necesaria para la contratación de su seguro, en la renovación del mismo y en caso de siniestro; <br>
			-Atender cualquier queja, pregunta o comentario. <br>
			-Enviar notificaciones de cambios a este aviso de privacidad. <br>
			-Ubicación de clientes <br>
			-Cobranza en cualquiera de sus fases <br>
			-Ofrecer y prestar servicios de telemercadeo y servicios relacionados <br>
			-Promocionar y comercializar servicios financieros <br>
			-Fines de promoción, promocionales y actualización de producto o servicio
			Finalidades Secundarias <br>

			No utilizaremos sus datos para finalidades secundarias. <br>

		<h4 class="text-primary">2. TIPOS DE DATOS</h4>
		<p>
			Para llevara a cabo las finalidades primarias descritas en el presente aviso de privacidad, requerimos de los siguientes datos personales:
		</p>
		<p>
			-Identificación y de contacto.
			Además podremos utilizar única y exclusivamente para las finalidades primarias descritas en el presente aviso los siguientes datos personales, mismos que son considerados como sensibles, por lo que requieren de cuidado y protección especial, los cuales consisten en:
		</p>

		-Datos de salud.<br>
		-Datos de características físicas.<br>
		-Datos patrimoniales y/o financieros.<br>
		<p>
			La información que proporcione el Titular no podrá ser enajenada por terceras personas. Sin embargo, y con apego a la Ley podrá ser revelada en los siguientes casos:
		</p>
		<p>
			A) Cuando el titular de dicha información otorgue su consentimiento de manera expresa.
		</p>
		<p>
			B) Cuando la transferencia de información se efectué con terceros para dar cumplimiento a los servicios, gestiones u obligaciones pactadas con el Titular.
		</p>
		<p>
			C) En los casos que lo exija la Ley, la procuración o administración de justicia.
		</p>
		<p>
			Asimismo los datos personales pueden ser compartidos dentro del país con prestadores a organizaciones del sector asegurador, con motivo de las finalidades primarias para fines de contratación de sus pólizas, selección de riesgos, prevención de fraude, ajustadores de seguro, servicios hospitalarios y legales para atenderle durante algún siniestro.
		</p>

		<h4 class="text-primary">3. OPCIONES Y MEDIOS PARA LIMITAR EL USO O DIVULGACIÓN DE SUS DATOS</h4>
		<p>
			En un plazo de cinco días el titular podrá oponerse al tratamiento y transferencia de sus datos cuando este aviso de privacidad no se le da a conocer de manera directa o personal. Para limitar el uso y divulgación de su información personal, así como para manifestar su oposición para recibir mensajes promocionales de nuestra parte<!--, agradeceremos envíe su solicitud a través de la siguiente dirección: info@nexosmedia.com-->
		</p>

		<h4 class="text-primary">4.DERECHOS ARCO</h4>
			-Acceso: Conocer qué datos personales obtenemos y para qué los utilizamos.<br>
			-Rectificación: Solicitar corrección de información o por estar desactualizada.<br>
			-Cancelación: Consiste en la eliminación de datos de nuestra base de datos, por uso inadecuado.<br>
			-Oposición: Oponerse al uso de sus datos para fines específicos.<br>
			-Estos derechos se conocen como derechos ARCO.<br><br>
		<h4 class="text-primary">5. MECANISMOS PARA EL EJERCICIO DE DERECHOS ARCO Y REVOCACIÓN DE CONSENTIMIENTO</h4>
		<p>
			Para proceder al ejercicio de sus derechos ARCO o para la revocación del consentimiento o para limitar la transferencia de sus datos, es necesario dirija su solicitud a nuestro Departamento de Protección de Datos Personales, ubicado en el domicilio antes indicado, o bien, enviando un correo electrónico a: info@nexosmedia.com de conformidad con lo siguiente:
		</p>

		<p>
			Ingresar solicitud por escrito o enviar como se ha dicho la solicitud por correo electrónico. La solicitud deberá contener y acompañarse de lo siguiente:
		</p>

		A) Nombre completo del titular de los datos y su domicilio, correo electrónico u otro medio para comunicarle la respuesta a su solicitud. <br>
		B) Documentos que acrediten su identidad, Identificación oficial o documento con el que se acredite la representación de tu representante legal. <br>menu
		C) Descripción clara y precisa de la información respecto de la cual se solicite el acceso, rectificación, oposición o cancelación, según sea el caso. En caso de solicitudes de rectificación, acompañar la documentación que sustente su petición y las modificaciones a realizarse. <br>
		D) Cualquier otro elemento o documento que facilite la localización de sus datos personales. <br>
		-Se dará respuesta a su solicitud en un plazo máximo de 20 días hábiles contados desde la fecha en que la recibimos y de resultar procedente conforme a la Ley aplicable, se hará efectiva dentro de los 15 días hábiles siguientes a la fecha en que se te comunique la respuesta. <br>
		-Tratándose de solicitudes de acceso a datos personales procederá la entrega mediante cualquier medio físico o electrónico, previa acreditación de la identidad del solicitante o representante legal, según corresponda, con los documentos originales para su cotejo. <br>
		-Los plazos antes referidos podrán ser ampliados una sola vez, por un periodo igual, siempre y cuando así lo justifiquen las circunstancias del caso. <br>
		-La obligación de acceso a su información se dará por cumplida cuando se ponga a su disposición los datos personales o bien mediante la entrega de copias, documentos electrónicos u otro soporte, la entrega de los datos será gratuita, debiendo el titular cubrir únicamente los gastos justificados de envío o el costo de reproducción de copias u otros formatos. <br>
		-En los casos de rectificación o cancelación o se trate de solicitudes de oposición al tratamiento, te informaremos la resolución correspondiente debidamente fundada de conformidad con lo establecido por la Ley Federal de Protección de Datos en Posesión de los Particulares. Sin embargo, es importante que tengas en cuenta que no en todos los casos podremos atender su solicitud o concluir el uso de forma inmediata, ya que es posible que por alguna obligación legal necesitemos seguir tratando sus datos personales. <br>
		Si desea usar el formulario de solicitud que ponemos a su disposición para facilitar el ejercicio de derechos ARCO, puede solicitarlo a través de la siguiente dirección electrónica: contacto@segurostoluca.com.mx <br><br>

		<h4 class="text-primary">6. MODIFICACIONES</h4>
		<p>
			El presente aviso de privacidad puede ser susceptible de modificaciones, cambios o actualizaciones derivadas de la legislación aplicable. Los cambios o actualizaciones a este Aviso de privacidad podrán ser consultados en el vínculo de “aviso de privacidad”.
		</p>

		<h4 class="text-primary">7. COOKIES</h4>
		<p>
			La cookie es una breve información que el portal de Internet utiliza y envía a tu PC, la cual queda almacenada en el disco duro, para que la próxima vez que ingreses a nuestro portal, podamos usar la información almacenada en la cookie para facilitarte el uso a nuestro sitio de internet. Cabe mencionar que las mismas pueden ser eliminadas en el momento que lo desee siguiendo las instrucciones que se proporcionan a través de su navegador de internet.
		</p>

		<h4 class="text-primary">8. CONSENTIMIENTO PARA EL TRATAMIENTO DE SUS DATOS PERSONALES</h4>
		<p>
			En caso de que el titular no manifieste la oposición al tratamiento de sus datos personales, se entenderá que el mismo consiente tácitamente el tratamiento de su información personal en los términos indicados en el Aviso de Privacidad.
		</p>

		<h4 class="text-primary">9. mejorsegurodeauto.mx LE RECUERDA:</h4>
		<p>
			Los depósitos bancarios se realizan exclusivamente en cuentas a nombre de las compañías de seguros y nunca a nombre de particulares.
		</p>
		<p>
			Para mayor información puede comunicarse al +52 1 722 248 1733; enviarnos correo electrónico a: contacto@segurostoluca.com.mx
			<center><button type="submit" class="btn btn-primary emviar">Cotizar</button><br></center>
		</p>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="cotizarCarro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seguro de autos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="row" action="{{route('cotizadores')}}" method="POST">
        		{{ csrf_field() }}
	            <div class="col-md-12">
	                <label for="">Marca de Auto</label>
	                <input type="text" class="form-control" placeholder="Marca del Auto"/>
	            </div>
	            <div class="col-md-12">
	                <label for="inputModelo">Modelo</label>
	                <input type="text" class="form-control" placeholder="Modelo de Auto"/>
	            </div>
	            <div class="col-md-12">
	              <label for="inputSubmarcar">Submarca</label>
	                <input type="text" class="form-control" placeholder="Ingresa Submarca"/>
	            </div>
	            <div class="col-md-12">
	              <label for="inputDescripcion">Descripción</label>
	                <input type="text" class="form-control" placeholder="Descripción"/>
	            </div>
	            <div class="col-md-12">
	              <label for="inputDetalle">Detalle del Auto</label>
	                <input type="text" class="form-control" placeholder="Detalle Auto"/>
	            </div>
	            <div class="col-md-12">
	              <label for="">Nombre</label>
	                <input type="text" name="nombre" class="form-control" placeholder="Ingresa tus Nombre"/>
	            </div>
	            <div class="col-md-12">
	              <label for="inputyears">Edad</label>
	                <input type="text" class="form-control" placeholder="Ingresa tus Edad"/>
	            </div>
	            <div class="col-md-12">
	              <label for="">Correo</label>
	                <input type="text" name="correo" class="form-control" placeholder="Ingresa tu Correo"/>
	            </div>
	            <div class="col-md-12">
	              <label for="inputCelphone">Telefono</label>
	                <input type="text" class="form-control" placeholder="Ingresa tu Numero"/>
	            </div>
	            <center>
	              <label for="inputGenero">Genero</label>
	                <div class="checkbox">
              <label><input type="checkbox" name="tipo" value="">H</label>
              <label><input type="checkbox" name="tipo" value="">M</label>
            </div>
            </center>
                    </div>
                    <center><button type="submit" class="btn btn-primary emviar">Cotizar</button><br></center>
                </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="cotizarVehiculo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seguro de vehiculos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="row" action="{{route('cotizadores')}}" method="POST">
        			{{ csrf_field() }}
                    <div class="col-md-12">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre (s)"/>
                    </div>
                    <div class="col-md-12">
                        <label for="inputModelo">Apellido Paterno</label>
                        <input type="text" class="form-control" placeholder="Apellido Paterno"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputSubmarcar">Apellido Materno</label>
                        <input type="text" class="form-control" placeholder="Apellido Materno"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputyears">Edad</label>
                        <input type="text" class="form-control" placeholder="Edad"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputCelphone">Telefono</label>
                        <input type="text" class="form-control" placeholder="Numero Telefonico"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputCodPost">Codigo Postal</label>
                        <input type="text" class="form-control" placeholder="Codigo Postal"/>
                    </div>
                    <div class="col-md-12">
                      <label for="">Correo Electrónico</label>
                        <input type="email" class="form-control" name="correo" placeholder="Correo"/>
                    </div>
                    <center>
                      <label for="inputGenero">Genero</label>
                        <div class="checkbox">
              <label><input type="checkbox" name="tipo" value="">H</label>
              <label><input type="checkbox" name="tipo" value="">M</label>
            </div>
            </center>
                    </div>
                    <center><button type="submit" class="btn btn-primary emviar">Cotizar</button><br></center>
                </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="cotizarVida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cotizaVida">Seguro de vida</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="row" action="{{route('cotizadores')}}" method="POST">
        			{{ csrf_field() }}
                    <div class="col-md-12">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre (s)"/>
                    </div>
                    <div class="col-md-12">
                        <label for="inputModelo">Apellido Paterno</label>
                        <input type="text" class="form-control" placeholder="Apellido Paterno"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputSubmarcar">Apellido Materno</label>
                        <input type="text" class="form-control" placeholder="Apellido Materno"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputyears">Edad</label>
                        <input type="text" class="form-control" placeholder="Edad"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputCelphone">Telefono</label>
                        <input type="text" class="form-control" placeholder="Numero Telefonico"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputCodPost">Codigo Postal</label>
                        <input type="text" class="form-control" placeholder="Codigo Postal"/>
                    </div>
                    <div class="col-md-12">
                      <label for="">Correo Electrónico</label>
                        <input type="email" class="form-control" name="correo" placeholder="Correo"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputSmoke">Fuma</label>
                        <input type="text" class="form-control" placeholder="Fuma? Si/No"/>
                    </div>
                    <center>
                      <label for="inputGenero">Genero</label>
                        <div class="checkbox">
              <label><input type="checkbox" name="tipo" value="">H</label>
              <label><input type="checkbox" name="tipo" value="">M</label>
            </div>
            </center>
                    </div>
                    <center><button type="submit" class="btn btn-primary emviar">Cotizar</button><br></center>
                </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="cotizarHogar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seguro de hogar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="row" action="{{route('cotizadores')}}" method="POST">
        			{{ csrf_field() }}
                    <div class="col-md-12">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre (s)"/>
                    </div>
                    <div class="col-md-12">
                        <label for="inputModelo">Apellido Paterno</label>
                        <input type="text" class="form-control" placeholder="Apellido Paterno"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputSubmarcar">Apellido Materno</label>
                        <input type="text" class="form-control" placeholder="Apellido Materno"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputyears">Edad</label>
                        <input type="text" class="form-control" placeholder="Edad"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputCelphone">Telefono</label>
                        <input type="text" class="form-control" placeholder="Numero Telefonico"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputCodPost">Codigo Postal</label>
                        <input type="text" class="form-control" placeholder="Codigo Postal"/>
                    </div>
                    <div class="col-md-12">
                      <label for="">Correo Electrónico</label>
                        <input type="email" class="form-control" name="correo" placeholder="Correo"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputSmoke">Fuma</label>
                        <input type="text" class="form-control" placeholder="Fuma? Si/No"/>
                    </div>
                    <center>
                      <label for="inputGenero">Genero</label>
                        <div class="checkbox">
              <label><input type="checkbox" name="tipo" value="">H</label>
              <label><input type="checkbox" name="tipo" value="">M</label>
            </div>
            </center>
                    </div>
                    <center><button type="submit" class="btn btn-primary emviar">Cotizar</button><br></center>
                </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="cotizarPrivado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seguros de Servicio Publico y Privado
<form role="row" action="{{route('cotizadores')}}" method="POST">
					{{ csrf_field() }}
                    <div class="col-md-12">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre (s)"/>
                    </div>
                    <div class="col-md-12">
                        <label for="">Correo Electrónico</label>
                        <input type="textemailclass=" class="form-control" name="correo" placeholder="Correo"/>
                    </div>
                    <div class="col-md-12">
                        <label for="inputCell">Telefono</label>
                        <input type="text" class="form-control" id="inputCell" placeholder="Telefono"/>
                    </div>
                    <div class="col-md-12">
                        <label for="inputCP">Codigo Postal</label>
                        <input type="text" class="form-control" id="inputCP" placeholder="Codigo Postal"/>
                    </div>
                    <div class="col-md-12">
                        <label for="inputMarca">Marca del Vehiculo</label>
                        <input type="text" class="form-control" id="inputMarca" placeholder="Marca del Vehiculo"/>
                    </div>
                    <div class="col-md-12">
                        <label for="inputModel">Modelo del Vehiculo</label>
                        <input type="text" class="form-control" id="inputModel" placeholder="Modelo del Vehiculo"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputModel">Escriba su Mensaje</label>
                        <textarea class="form-control">Escriba su Mensaje</textarea>
                    </div>

                    </div>
                </form></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="cotizarGastosMedicos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seguro de gastos medicos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="row" action="{{route('cotizadores')}}" method="POST">
        		{{ csrf_field() }}
                    <div class="col-md-12">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre (s)"/>
                    </div>
                    <div class="col-md-12">
                        <label for="inputModelo">Apellido Paterno</label>
                        <input type="text" class="form-control" placeholder="Apellido Paterno"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputSubmarcar">Apellido Materno</label>
                        <input type="text" class="form-control" placeholder="Apellido Materno"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputyears">Edad</label>
                        <input type="text" class="form-control" placeholder="Edad"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputCelphone">Telefono</label>
                        <input type="text" class="form-control" placeholder="Numero Telefonico"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputCodPost">Codigo Postal</label>
                        <input type="text" class="form-control" placeholder="Codigo Postal"/>
                    </div>
                    <div class="col-md-12">
                      <label for="">Correo Electrónico</label>
                        <input type="email" class="form-control" name="correo" placeholder="Correo"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputSmoke">Fuma</label>
                        <input type="text" class="form-control" placeholder="Fuma? Si/No"/>
                    </div>
                    <center>
                      <label for="inputGenero">Genero</label>
                        <div class="checkbox">
              <label><input type="checkbox" name="tipo" value="">H</label>
              <label><input type="checkbox" name="tipo" value="">M</label>
            </div>
            </center>
                    </div>
                    <center><button type="submit" class="btn btn-primary emviar">Cotizar</button><br></center>
                </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="cotizarSalud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seguro de salud</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="row" action="{{route('cotizadores')}}" method="POST">
        			{{ csrf_field() }}
                    <div class="col-md-12">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre (s)"/>
                    </div>
                    <div class="col-md-12">
                        <label for="inputModelo">Apellido Paterno</label>
                        <input type="text" class="form-control" placeholder="Apellido Paterno"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputSubmarcar">Apellido Materno</label>
                        <input type="text" class="form-control" placeholder="Apellido Materno"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputyears">Edad</label>
                        <input type="text" class="form-control" placeholder="Edad"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputCelphone">Telefono</label>
                        <input type="text" class="form-control" placeholder="Numero Telefonico"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputCodPost">Codigo Postal</label>
                        <input type="text" class="form-control" placeholder="Codigo Postal"/>
                    </div>
                    <div class="col-md-12">
                      <label for="">Correo Electrónico</label>
                        <input type="email" class="form-control" name="correo" placeholder="Correo"/>
                    </div>
                    <div class="col-md-12">
                      <label for="inputSmoke">Fuma</label>
                        <input type="text" class="form-control" placeholder="Fuma? Si/No"/>
                    </div>
                    <center>
                      <label for="inputGenero">Genero</label>
                        <div class="checkbox">
              <label><input type="checkbox" name="tipo" value="">H</label>
              <label><input type="checkbox" name="tipo" value="">M</label>
            </div>
            </center>
                    </div>
                    <center><button type="submit" class="btn btn-primary emviar">Cotizar</button><br></center>
                </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="banner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Banner publicitario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<center>
        	<img src="" id="showBanner" width="80%">
        </center>
      </div>
      <div class="modal-footer">
      		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>
