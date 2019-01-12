<!DOCTYPE html>
<html lang="en">
  
  <body>

    <style type="text/css">


      .img-container img
    {
        width: 50px;
        height: 50px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        
    }

    .imagen-servicio img
    {
        width: 50px;
        height: 50px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        
    }
    </style>

  	
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('<?php echo base_url() ?>/assets/img/Home/home.jpg');background-size: 1500px 1000px;" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        
        <div  class="col-md-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <!--<h3 style="padding-top: 100px;text-align: center; font-family: 'Bradley Hand';" class ="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Peluquería </h3>
            <h1 class="mb-alex" style = "color:#0000FF;text-align: center;" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Alex Piñero</h1>
            <h1 class="mb-style" style = "line-height: 50%; font-size:20px; color:#E5C975; text-align: center;" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Style for men<!--<a href="#">Colorlib.com</a>--></h1>
            <!--<p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="https://vimeo.com/45830194" class="btn btn-primary px-4 py-3">Book an Appointment</a></p> -->
          </div>
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
        	<!--<a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
        		<span class="icon-play"></a>
        	</a> -->
          
        </div>
      
      </div>
    </div>

    <section class="ftco-intro">
    	<div class="container-wrap">
    		<div class="wrap d-md-flex align-items-end">
	    		<div class="info">
	    			<div class="row no-gutters">
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="fa fa-phone"></span></div>
	    					<div class="text">
	    						<h3>956-56-56-56</h3>
	    						<p>Estamos a su entera disposición</p>
	    					</div>
	    				</div>
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="fas fa-search-location"></span></div>
	    					<div class="text">
	    						<h3>Calle Faustino Ruiz</h3>
	    						<p>Centro de San Fernando</p>
	    					</div>
	    				</div>
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="fas fa-clock"></span></div>
	    					<div class="text">
	    						<h3>Horarios</h3>
	    						<p>Lunes-Viernes: 8:00am - 21:00pm</p>
                                <p>Sabado: 8:00am - 15:00pm</p>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    		<div class="social pl-md-5 p-4">
	    			<ul class="social-icon">
              <li class="ftco-animate"><a target="_blank" href="https://www.facebook.com/alex.pineropeluqueria"><span class="fab fa-facebook-f"></span></a></li>
              <li class="ftco-animate"><a target="_blank" href="https://twitter.com/alexstyleformen?lang=es"><span class="fab fa-twitter"></span></a></li>
              <li class="ftco-animate"><a target="_blank" href="https://www.instagram.com/apstyleformen/?hl=es"><span class="fab fa-instagram"></span></a></li>
              <li class="ftco-animate"><a target="_blank" href="https://www.google.com/search?ei=t5g3XNLWHdSZjLsP2aeA2AY&q=alex%20pi%C3%B1ero%20stylo%20for%20men&oq=alex+pi%C3%B1ero+st&gs_l=psy-ab.3.0.35i39.5802.8613..9890...0.0..1.751.4064.0j7j4j5-2j1......0....1..gws-wiz.......0i131j0j0i131i67j0i67j0i20i263j0i3j0i22i30j38.m-BukV6me4k&npsic=0&rflfq=1&rlha=0&rllag=36443480,-6173091,3347&tbm=lcl&rldimm=1169509217949407326&ved=2ahUKEwj25bTE9ePfAhXC1-AKHZ-HDwUQvS4wAXoECAAQKg&rldoc=1&tbs=lrf:!2m1!1e2!2m1!1e3!3sIAE,lf:1,lf_ui:2"><span class="fab fa-google-plus-g"></span></a></li>
            </ul>
	    		</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-4">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Bienvenido a <span>Alex Piñero</span></h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
          </div>
        </div>
        <div class="row" id="flashMessage">
                    <?php
                    if ($this->session->flashdata('noSesion')) {
                        ?>
                        <br/>
                        <div class="alert alert-success alert-dismissable">
                            <h4>listoooooooooo!</h4>
                            <p><?php echo $this->session->flashdata('noSesion'); ?>.</p>
                        </div> 
                    <?php
                    }
                    ?>
                </div>
    		<div class="row justify-content-center">
    			<div class="col-md-8 text-center ftco-animate">
    				<p>Bienvenido a la Peluquería Alex Piñero Style For Men.
              Si has llegado hasta aquí, es que necesitas un cambio de imagen, un arreglo puntual para un evento especial, o tal vez, has tropezado con nosotros por casualidad.
              En cualquiera de los casos, esperamos que te encuentres en nuestro salón como en casa.
              En Alex Piñero, creemos que cortarse el pelo o arreglarse la barba debe ser, y es; mucho más que "quitarse pelo". Se trata de un ritual, un momento de buena conversación, en un ambiente relajado, masculino; que le aporte valor añadido. Por eso, te recibiremos con el mejor ambiente, y por supuesto, saldrás con el corte de pelo, afeitado, o arreglo que estabas buscando.</p>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section ftco-bg-dark">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 style = "color:#FFF;" class="mb-4">Últimas noticias</h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <p class="mt-5">Os mostramos la actualidad de nuestra peluquería, publicaremos en esta session todas las noticias, eventos, promociones, etc... No te descuides.</p>
          </div>
        </div>
        <div class="row d-flex">
  

              <?php
              setlocale(LC_ALL,"es_ES");
              foreach ($noticia as $row ) {
                $date=date_create($row->fecha);
                

                echo"
                <div class='col-md-4 d-flex ftco-animate'>
            <div class='blog-entry align-self-stretch'>
                <img class='block-20' src='".base_url()."/uploads/".$row->imagen."'>
              </img>
              <div class='text py-4 d-block'>
                <div class='meta'>
                  <div><a >".date_format($date, "F j,Y")."</a></div>
                </div>
                <h3 class='heading mt-2'><a></a>".$row->asunto."</h3>
                <p>".$row->informacion."</p>
              </div>
              </div>
              </div>";
      
              }
              
              ?>



            
          <!--<div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('<?php echo base_url() ?>/assets/img/Home/image_1.jpg');">
              </a>
              <div class="text py-4 d-block">
                <div class="meta">
                  <div><a href="#">Sept 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">Men's hairstyle for all face shapes</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('<?php echo base_url() ?>/assets/img/Home/image_1.jpg');">
              </a>
              <div class="text py-4 d-block">
                <div class="meta">
                  <div><a href="#">Sept 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">Men's hairstyle for all face shapes</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('<?php echo base_url() ?>/assets/img/Home/image_1.jpg');">
              </a>
              <div class="text py-4 d-block">
                <div class="meta">
                  <div><a href="#">Sept 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">Men's hairstyle for all face shapes</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('<?php echo base_url() ?>/assets/img/Home/image_2.jpg');">
              </a>
              <div class="text py-4 d-block">
                <div class="meta">
                  <div><a href="#">Sept 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">Men's hairstyle for all face shapes</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('<?php echo base_url() ?>/assets/img/Home/image_3.jpg');">
              </a>
              <div class="text py-4 d-block">
                <div class="meta">
                  <div><a href="#">Sept 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">Men's hairstyle for all face shapes</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>-->
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Nuestros Servicios</h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <p class="mt-5">.</p>
          </div>
        </div>
    		<div class="row">
           <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <div class="imagen-servicio">
              <a class="block-20" style="background-image: url('<?php echo base_url() ?>/assets/img/Home/overtime.png');background-size: 300px 250px;">
              </a>
            </div>
              <div class="text py-4 d-block">
                <h3 class="heading mt-2" ><a style = "color:#000;text-align: center;">Cita online</a></h3>
                <p>Ya puedes pedir tu cita a travez de la web sin tener que llamar por teléfono.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a class="block-20" style="background-image: url('<?php echo base_url() ?>/assets/img/Home/carrito.png');background-size: 300px 250px;">
              </a>
              <div class="text py-4 d-block">
                <h3 class="heading mt-2" ><a style = "color:#000;">Tienda online</a></h3>
                <p>Ahora podras consultar y comprar nuestros productos a tráves de nuestra tienda online.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a class="block-20" style="background-image: url('<?php echo base_url() ?>/assets/img/Home/redSocial.png');background-size: 450px 400px;">
              </a>
              <div class="text py-4 d-block">
                <h3 class="heading mt-2" ><a style = "color:#000;">Red Social</a></h3>
                <p>Comparte tus fotos o vídeos en nuestra Red Social.</p>
              </div>
            </div>
          </div>    
          </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section ftco-bg-dark">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 style = "color:#FFF;" class="mb-4">Conocenos</h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <p class="mt-5">En Alex Piñero contamos con los mejores peluqueros, en esta session os mostramos cada uno de nuestros profecionales.</p>
          </div>
        </div>
    	</div>
    	<div class="container-wrap">
    		<div class="row no-gutters d-flex">
    			   <?php
             foreach ($personal as $row ) {

                echo"<div class='col-md-4 d-flex ftco-animate'>
    				          <div class='services-wrap d-flex'>
    					         ";?>
                       <a class='img' style="background-image: url('<?php echo base_url() ?>/uploads/<?php echo $row->imagen ?>')";'></a>
                       
    					         <?php echo"<div class='text p-4'>
    						        <h3>".$row->nombre."</h3>
    						<p>".$row->informacion."</p>
    					</div>
    				</div>
    			</div>";
              }?>

<!--    			<div class="col-md-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="#" class="img" style="background-image: url('<?php echo base_url() ?>/uploads/IMG_067815.JPG');"></a>
    					<div class="text p-4">
    						<h3>Trimming</h3>
    						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
    						
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="#" class="img" style="background-image: url('<?php echo base_url() ?>/assets/img/Home/work-3.jpg');"></a>
    					<div class="text p-4">
    						<h3>Traditional Haircuts Mens </h3>
    						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
    						
    					</div>
    				</div>
    			</div>

    			<div class="col-md-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="#" class="img order-md-last" style="background-image: url(images/work-4.jpg);"></a>
    					<div class="text p-4">
    						<h3>Hair Style for Womens</h3>
    						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia </p>
    						<span><a href="#">Read more</a></span>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="#" class="img order-md-last" style="background-image: url(images/work-5.jpg);"></a>
    					<div class="text p-4">
    						<h3>Trimming </h3>
    						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
    						<span><a href="#">Read more</a></span>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="#" class="img order-md-last" style="background-image: url(images/work-6.jpg);"></a>
    					<div class="text p-4">
    						<h3>Traditional Haircuts Mens </h3>
    						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
    						<span><a href="#">Read more</a></span>
    					</div>
    				</div>
    			</div>
            -->
    		</div>
    	</div>
    </section>
    <section class="section-perfil">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Servicios &amp; Precios</h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <p class="mt-5">Aquí os mostramos nuestra carta de servicios, con unos costes muy razonables a nuestro diseño.</p>
          </div>
        </div>
        <div class="row">


          <?php
            $i = 0;
            foreach ($precio as $row ) {
              if($i%2==0)
              {
              	echo "<div class='col-md-6'>
              		<div class='pricing-entry ftco-animate'>
              			<div class='d-flex text align-items-center'>
              				<h3 style = 'color:#000;'>".$row->nombre."</h3>
              				<h3 class='price'>".$row->precio."€</h3>
              			</div>
              			<div class='d-block'>
              				<p>".$row->informacion."</p>
              			</div>
              		</div>
              	</div>";
              }

              
              //$row = current($precio);
              else
              {
              	echo"<div class='col-md-6'>
              		<div class='pricing-entry ftco-animate'>
              			<div class='d-flex text align-items-center'>
              				<h3 style = 'color:#000;'' >".$row->nombre."</h3>
              				<span class='price'>".$row->precio."€</span>
              			</div>
              			<div class='d-block'>
              				<p>".$row->informacion."</p>
              			</div>
              		</div>
              	</div>";
              }
              $i++;
            }?>
        </div>
    	</div>
    </section>

    <section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url('<?php echo base_url() ?>/assets/img/Home/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="row">
              <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <div class="icon"><span class="fa fa-cut"></span></div>
                    <?php echo"<strong class='number' data-number='".$TotalCita."'>0</strong>";?>
                    <span>Citas</span>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <div class="icon"><span class="fa fa-users"></span></div>
                    <?php echo"<strong class='number' data-number='".$TotalCliente."'>0</strong>";?>
                    <span>Registro</span>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <div class="icon"><span class="fa fa-tag"></span></div>
                    <?php echo"<strong class='number' data-number='".$TotalProducto."'>0</strong>";?>
                    <span>Producto</span>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <div class="icon"><span class="fa fa-shopping-cart  "></span></div>
                    <?php echo"<strong class='number' data-number='".$TotalProducto."'>0</strong>";?>
                    <span>Compra Gestionada</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <!--<section class="ftco-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Our Hair Stylist</h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <p class="mt-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        <div class="row">
        	<div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
        		<div class="staff">
      				<div class="img mb-4" style="background-image: url(images/person_1.jpg);"></div>
      				<div class="info text-center">
      					<h3><a href="teacher-single.html">Tom Smith</a></h3>
      					<span class="position">Hair Specialist</span>
      					<div class="text">
	        				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
	        			</div>
      				</div>
        		</div>
        	</div>
        	<div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
        		<div class="staff">
      				<div class="img mb-4" style="background-image: url(images/person_2.jpg);"></div>
      				<div class="info text-center">
      					<h3><a href="teacher-single.html">Mark Wilson</a></h3>
      					<span class="position">Beard Specialist</span>
      					<div class="text">
	        				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
	        			</div>
      				</div>
        		</div>
        	</div>
        	<div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
        		<div class="staff">
      				<div class="img mb-4" style="background-image: url(images/person_3.jpg);"></div>
      				<div class="info text-center">
      					<h3><a href="teacher-single.html">Patrick Jacobson</a></h3>
      					<span class="position">Hair Stylist</span>
      					<div class="text">
	        				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
	        			</div>
      				</div>
        		</div>
        	</div>
        	<div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
        		<div class="staff">
      				<div class="img mb-4" style="background-image: url(images/person_4.jpg);"></div>
      				<div class="info text-center">
      					<h3><a href="teacher-single.html">Ivan Dorchsner</a></h3>
      					<span class="position">Beard Specialist</span>
      					<div class="text">
	        				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
	        			</div>
      				</div>
        		</div>
        	</div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-bg-dark">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Our Shop</h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <p class="mt-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-3 ftco-animate">
    				<div class="product-entry text-center">
    					<a href="#"><img src="images/prod-1.png" class="img-fluid" alt="Colorlib Template"></a>
    					<div class="text">
    						<p class="rate"><span class="icon-star2"></span><span class="icon-star2"></span><span class="icon-star2"></span><span class="icon-star2"></span><span class="icon-star_half"></span></p>
    						<h3><a href="#">Shaves 01</a></h3>
    						<span class="price mb-4">$150</span>
    						<p><a href="#" class="btn btn-primary">Add to cart</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-3 ftco-animate">
    				<div class="product-entry text-center">
    					<a href="#"><img src="images/prod-2.png" class="img-fluid" alt="Colorlib Template"></a>
    					<div class="text">
    						<p class="rate"><span class="icon-star2"></span><span class="icon-star2"></span><span class="icon-star2"></span><span class="icon-star2"></span><span class="icon-star_half"></span></p>
    						<h3><a href="#">Shaves 01</a></h3>
    						<span class="price mb-4">$150</span>
    						<p><a href="#" class="btn btn-primary">Add to cart</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-3 ftco-animate">
    				<div class="product-entry text-center">
    					<a href="#"><img src="images/prod-3.png" class="img-fluid" alt="Colorlib Template"></a>
    					<div class="text">
    						<p class="rate"><span class="icon-star2"></span><span class="icon-star2"></span><span class="icon-star2"></span><span class="icon-star2"></span><span class="icon-star_half"></span></p>
    						<h3><a href="#">Shaves 01</a></h3>
    						<span class="price mb-4">$150</span>
    						<p><a href="#" class="btn btn-primary">Add to cart</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-3 ftco-animate">
    				<div class="product-entry text-center">
    					<a href="#"><img src="images/prod-4.png" class="img-fluid" alt="Colorlib Template"></a>
    					<div class="text">
    						<p class="rate"><span class="icon-star2"></span><span class="icon-star2"></span><span class="icon-star2"></span><span class="icon-star2"></span><span class="icon-star_half"></span></p>
    						<h3><a href="#">Shaves 01</a></h3>
    						<span class="price mb-4">$150</span>
    						<p><a href="#" class="btn btn-primary">Add to cart</a></p>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-gallery">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Our Gallery</h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <p class="mt-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
    	</div>
    	<div class="container-wrap">
    		<div class="row no-gutters">
					<div class="col-md-3 ftco-animate">
						<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-1.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-2.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-3.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-4.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
        </div>
    	</div>
    </section>


		

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Recent from blog</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text py-4 d-block">
              	<div class="meta">
                  <div><a href="#">Sept 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">Men's hairstyle for all face shapes</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text py-4 d-block">
              	<div class="meta">
                  <div><a href="#">Sept 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">Men's hairstyle for all face shapes</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text py-4 d-block">
              	<div class="meta">
                  <div><a href="#">Sept 10, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">Men's hairstyle for all face shapes</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

		
		<section class="ftco-appointment">
			<div class="overlay"></div>
    	<div class="container-wrap">
    		<div class="row no-gutters d-md-flex align-items-center">
    			<div class="col-md-6 d-flex align-self-stretch">
    				<div id="map"></div>
    			</div>
	    		<div class="col-md-6 appointment ftco-animate">
	    			<h3 class="mb-3">Appointments</h3>
	    			<form action="#" class="appointment-form">
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<input type="text" class="form-control" placeholder="First Name">
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<input type="text" class="form-control" placeholder="Last Name">
		    				</div>
	    				</div>
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<div class="input-wrap">
		            		<div class="icon"><span class="ion-md-calendar"></span></div>
		            		<input type="text" id="appointment_date" class="form-control" placeholder="Date">
	            		</div>
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<div class="input-wrap">
		            		<div class="icon"><span class="ion-ios-clock"></span></div>
		            		<input type="text" id="appointment_time" class="form-control" placeholder="Time">
	            		</div>
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<input type="text" class="form-control" placeholder="Phone">
		    				</div>
	    				</div>
	    				<div class="form-group">
	              <textarea name="" id="" cols="30" rows="3" class="form-control" placeholder="Message"></textarea>
	            </div>
	            <div class="form-group">
	              <input type="submit" value="Appointment" class="btn btn-primary py-3 px-4">
	            </div>
	    			</form>
	    		</div>    			
    		</div>
    	</div>
    </section>-->

    
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
    
  </body>
</html>