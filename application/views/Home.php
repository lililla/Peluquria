<!DOCTYPE html>
<html lang="en">
  
  <body>

  	
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('<?php echo base_url() ?>/assets/img/Home/home.jpeg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
        	<!--<a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
        		<span class="icon-play"></a>
        	</a> -->
          <div class="col-md-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
          	<h3 class ="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Peluquería </h3>
            <h1 class="mb-alex" style = "color:#0000FF" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Alex Piñero</h1>
            <h1 class="mb-style" style = "line-height: 50%; font-size:20px;" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Style for men<!--<a href="#">Colorlib.com</a>--></h1>
            <!--<p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="https://vimeo.com/45830194" class="btn btn-primary px-4 py-3">Book an Appointment</a></p> -->
          </div>
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
	    						<p>A small river named Duden flows</p>
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
	    						<h3>Horario</h3>
	    						<p>Lunes-Viernes: 8:00am - 9:00pm</p>
                                <p>Sabado: 8:00am - 15:00pm</p>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    		<div class="social pl-md-5 p-4">
	    			<ul class="social-icon">
              <li class="ftco-animate"><a href="#"><span class="fab fa-facebook-f"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="fab fa-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="fab fa-instagram"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="fab fa-google-plus-g"></span></a></li>
            </ul>
	    		</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-4">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Bienvenido a <span>Alex Piñero</span> tu salón de peluqueria</h2>
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
    				<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section ftco-bg-dark">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 style = "color:#FFF;" class="mb-4">Noticias</h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <p class="mt-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
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
            <h2 class="mb-4">Nuestro Servicio</h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <p class="mt-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
    		<div class="row">
           <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('<?php echo base_url() ?>/assets/img/Home/calendar.png');">
              </a>
              <div class="text py-4 d-block">
                <h3 class="heading mt-2" ><a href="#" style = "color:#000;">Tu cita online</a></h3>
                <p>Pide tu cita online sin tener que coger el teléfono.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('<?php echo base_url() ?>/assets/img/Home/producto.png');">
              </a>
              <div class="text py-4 d-block">
                <h3 class="heading mt-2" ><a href="#" style = "color:#000;">Nuestra tienda online</a></h3>
                <p>Ahora podras consultar y comprar nuestro catalogo de producto online.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('<?php echo base_url() ?>/assets/img/Home/corte.jpg');">
              </a>
              <div class="text py-4 d-block">
                <h3 class="heading mt-2" ><a href="#" style = "color:#000;">Corte + Lavado + Peinado</a></h3>
                <p>Sal de tu peluquería disfrutando de tu nuevo look sin pasar por casa.</p>
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
            <p class="mt-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
    	</div>
    	<div class="container-wrap">
    		<div class="row no-gutters d-flex">
    			<div class="col-md-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="#" class="img" style="background-image: url('<?php echo base_url() ?>/assets/img/Home/work-1.jpg');"></a>
    					<div class="text p-4">
    						<h3>Hair Style </h3>
    						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia </p>
    						<!--<span><a href="#">Read more</a></span> -->
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="#" class="img" style="background-image: url('<?php echo base_url() ?>/assets/img/Home/work-2.jpg');"></a>
    					<div class="text p-4">
    						<h3>Trimming</h3>
    						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
    						<!--<span><a href="#">Read more</a></span> -->
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="#" class="img" style="background-image: url('<?php echo base_url() ?>/assets/img/Home/work-3.jpg');"></a>
    					<div class="text p-4">
    						<h3>Traditional Haircuts Mens </h3>
    						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
    						<!--<span><a href="#">Read more</a></span> -->
    					</div>
    				</div>
    			</div>
<!--
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
            <h2 class="mb-4">Servicio &amp; Precios</h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <p class="mt-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-6">
        		<div class="pricing-entry ftco-animate">
        			<div class="d-flex text align-items-center">
        				<h3 style = "color:#000;"" >Men's Haircut</h3>
        				<h3 class="price">$20.00</h3>
        			</div>
        			<div class="d-block">
        				<p>A small river named Duden flows by their place and supplies</p>
        			</div>
        		</div>
        		<div class="pricing-entry ftco-animate">
        			<div class="d-flex text align-items-center">
        				<h3 style = "color:#000;"" >Children Haircut</h3>
        				<span class="price">$29.00</span>
        			</div>
        			<div class="d-block">
        				<p>A small river named Duden flows by their place and supplies</p>
        			</div>
        		</div>
        		<div class="pricing-entry ftco-animate">
        			<div class="d-flex text align-items-center">
        				<h3 style = "color:#000;"" >Beard Cut</h3>
        				<span class="price">$20.00</span>
        			</div>
        			<div class="d-block">
        				<p>A small river named Duden flows by their place and supplies</p>
        			</div>
        		</div>
        		<div class="pricing-entry ftco-animate">
        			<div class="d-flex text align-items-center">
        				<h3 style = "color:#000;"" >Men's Haircut</h3>
        				<span class="price">$20.00</span>
        			</div>
        			<div class="d-block">
        				<p>A small river named Duden flows by their place and supplies</p>
        			</div>
        		</div>
        	</div>

        	<div class="col-md-6">
        		<div class="pricing-entry ftco-animate">
        			<div class="d-flex text align-items-center">
        				<h3 style = "color:#000;"" >Women's Haircut</h3>
        				<span class="price">$49.91</span>
        			</div>
        			<div class="d-block">
        				<p>A small river named Duden flows by their place and supplies</p>
        			</div>
        		</div>
        		<div class="pricing-entry ftco-animate">
        			<div class="d-flex text align-items-center">
        				<h3 style = "color:#000;"" >Men's Haircut</h3>
        				<span class="price">$20.00</span>
        			</div>
        			<div class="d-block">
        				<p>A small river named Duden flows by their place and supplies</p>
        			</div>
        		</div>
        		<div class="pricing-entry ftco-animate">
        			<div class="d-flex text align-items-center">
        				<h3 style = "color:#000;"" >Men's Haircut</h3>
        				<span class="price">$20.00</span>
        			</div>
        			<div class="d-block">
        				<p>A small river named Duden flows by their place and supplies</p>
        			</div>
        		</div>
        		<div class="pricing-entry ftco-animate">
        			<div class="d-flex text align-items-center">
        				<h3 style = "color:#000;"" >Men's Haircut</h3>
        				<span class="price">$20.00</span>
        			</div>
        			<div class="d-block">
        				<p>A small river named Duden flows by their place and supplies</p>
        			</div>
        		</div>
        	</div>
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
                    <div class="icon"><span class="far fa-eye"></span></div>
                    <strong class="number" data-number="705">0</strong>
                    <span>Visitas</span>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <div class="icon"><span class="far fa-users"></span></div>
                    <strong class="number" data-number="1000">0</strong>
                    <span>Registro</span>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <div class="icon"><span class="fas fa-cut"></span></div>
                    <strong class="number" data-number="3000">0</strong>
                    <span>Servicios Realizados</span>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <div class="icon"><span class="fas fa-shopping-cart"></span></div>
                    <strong class="number" data-number="900">0</strong>
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