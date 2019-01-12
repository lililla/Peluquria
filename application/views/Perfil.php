<script src="<?php echo base_url() ?>/assets/js/Galeria/jssor.slider.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Prueba/style.css">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://andwecode.com/wp-content/uploads/2015/10/jquery.leanModal.min_.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link href="<?php echo base_url() ?>/assets/css/miperfil/popup.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url() ?>/assets/css/miperfil/magnific-popup.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url() ?>/assets/css/miperfil/styles.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/css/miperfil/star-rating.js?ver=3.1.1"></script>


<script src="vendor/magnific-popup/jquery.magnific-popup.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/js/Modal/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/Modal/jquery.leanModal.min.js"></script>


    <style type="text/css">

    .img-container img
    {
        width: 250px;
        height: 250px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        
    }
    .img-container img:hover {opacity: 0.7;}
    
        
    </style>


<div class="hero-wrap js-fullheight" style="background-image: url('<?php echo base_url() ?>/assets/img/Home/perfil.jpg');background-size: 1400px 800px;" data-stellar-background-ratio="0.5">
	      <div class="overlay"></div>
	      <div class="container">
	        <!--<div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
	          <div class="col-md-6 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
	          	<h1 class="mb-3 mt-5 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Gallery</h1>
	            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Gallery</span></p>
	          </div>
	        </div>-->
	      </div>
	    </div>


    

    <section class="section-perfil">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Mi Sitio</h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <p class="mt-5">Este es tu sitio, aquí podras ver tus citas pendientes y en caso de poder anularla, consulta tus historial de cita y tu historial de producto sin olvidar valorarlo.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="pricing-entry ftco-animate">
              
                <h5 style="color:#000;">Datos de Usuario</h5>
              
              <div class="d-block">
                <p><?php print($user);?>&nbsp;&nbsp;</p>
              </div>
            </div>
            <div class="pricing-entry ftco-animate">
              <h5 style="color:#000;">Email</h5>
              <div class="d-block">
                <p><?php print($email);?>&nbsp;&nbsp;</p>
              </div>
            </div>
            <div class="pricing-entry ftco-animate">
              
              <h5 style="color:#000;">Número de Usuario</h5>
                
              
              <div class="d-block">
                <p>000<?php print($id);?></p>
              </div>
            </div>
            <div class="pricing-entry ftco-animate">
              <a href="<?php echo site_url() ?>/Gestion/Perfil?cerrar" name ='modal_triggerr' id='modal_triggerr' style="color:#0000FF;font-size: 1.5em;">Cerrar Sesión&nbsp;&nbsp;<span style = "color:#0000FF; font-size: 1.5em;" class="fas fa-chevron-circle-left"></span></a></h5>
              
            </div>
          </div>

          <div class="col-md-6">
            <div class="pricing-entry ftco-animate">
              
                <h3 class="heading mt-2" >Mi historial de cita <a class="link" href="#popup1" style = "color:blue;">Aquí</a></h3>
                
              
              
                <h5 style="color:#000;">Mis citas pendientes</h5>
              
              <?php
              $i=1;
              foreach ($cita as $row) 
              {

                  if($row->fecha > date('Y-m-d'))
                  {
                    echo"
                        <div class='d-block'>
                          <p>Tienes una cita pendiente el día ".$row->fecha." a las ".$row->hora." horas.&nbsp;&nbsp;<a href='#cita".$i."' name='pop".$i."' id='pop".$i."'></span>&nbsp;&nbsp;&nbsp;<span style = 'color:#FF0000; font-size: 1.7em;' class='fas fa-times'></span></a></p>
                        </div>";
                    $i++;
                  }
                
              }
              if($i == 1)
              {
                echo"No tiene cita pendiente";
              }?>
              

              
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Mis productos adquiridos</h2>
          </div>
        </div>
        <div class="row">

          <?php
          $i=0;
          foreach ($productoUsuario as $row ) 
          {
            foreach ($producto as $row2 ) 
            {

              if($row->producto_id == $row2->id)
              {

                echo"<div class='col-md-3 ftco-animate'>
                  <div class='product-entry text-center'>
                    <a><div class='img-container'><img src='".base_url()."/uploads/".$row2->imagen."' class='img-fluid' alt='Colorlib Template'></div></a>
                    <div class='text'>
                      <h3 style='color:#000;''><a style='color:#000;'>".$row2->nombre."</a></h3>
                      <section class='section' id='section-1'>
                        <form class='form-1' method='post' action='Perfil'>
                            <select class='rating".$i."' name='".$row->producto_id."'>";
                            if($row->valoracion == 0)
                            {
                                echo "<option value='' selected></option>";
                                echo "<option value='5'></option>";
                                echo "<option value='4'></option>";
                                echo "<option value='3'></option>";
                                echo "<option value='2'></option>";
                                echo "<option value='1'></option>";
                            }
                            if($row->valoracion == 1)
                            {
                                echo "<option value=''></option>";
                                echo "<option value='5'></option>";
                                echo "<option value='4'></option>";
                                echo "<option value='3'></option>";
                                echo "<option value='2'></option>";
                                echo "<option value='1' selected></option>";
                            }
                            if($row->valoracion == 2)
                            {
                                echo "<option value=''></option>";
                                echo "<option value='5'></option>";
                                echo "<option value='4'></option>";
                                echo "<option value='3'></option>";
                                echo "<option value='2' selected></option>";
                                echo "<option value='1'></option>";
                            }
                            if($row->valoracion == 3)
                            {
                                echo "<option value=''></option>";
                                echo "<option value='5'></option>";
                                echo "<option value='4'></option>";
                                echo "<option value='3' selected></option>";
                                echo "<option value='2'></option>";
                                echo "<option value='1'></option>";
                            }
                            if($row->valoracion == 4)
                            {
                                echo "<option value=''></option>";
                                echo "<option value='5'></option>";
                                echo "<option value='4' selected></option>";
                                echo "<option value='3'></option>";
                                echo "<option value='2'></option>";
                                echo "<option value='1'></option>";
                            }
                            if($row->valoracion == 5)
                            {
                                echo "<option value=''></option>";
                                echo "<option value='5' selected></option>";
                                echo "<option value='4'></option>";
                                echo "<option value='3'></option>";
                                echo "<option value='2'></option>";
                                echo "<option value='1'></option>";
                            }
                        echo"
                            </select>
                          
                          
                            <br></br>
                            <input type='submit' class='btn my-cart-btn' value='valorar' ></input> 
                          
                        </form>
                      </section>

                    </div>
                  </div>
                </div>";
                $i++;
              }
              
            }
          }?>
          
          <!--<div class="col-md-3 ftco-animate">
            <div class="product-entry text-center">
              <a href="#"><img src="<?php echo base_url() ?>/assets/img/Producto/prod-2.png" class="img-fluid" alt="Colorlib Template"></a>
              <div class="text">
                <section class="section" id="section-1">
                  <form class="form-1">
                    
                      <select id="glsr-ltr" class="star-rating" disabled="disabled">
                        <option value=""></option>
                        <option value="5"></option>
                        <option value="4"></option>
                        <option value="3"></option>
                        <option value="2"></option>
                        <option value="1"></option>
                      </select>
                    
                    <div class="button-group">
                      <button type="button">Toggle</button>
                      
                    </div>
                  </form>
                </section>
              </div>
            </div>
          </div>
          <div class="col-md-3 ftco-animate">
            <div class="product-entry text-center">
              <a href="#"><img src="<?php echo base_url() ?>/assets/img/Producto/prod-3.png" class="img-fluid" alt="Colorlib Template"></a>
              <div class="text">
                <h3><a href="#">Shaves 01</a></h3>
                <span class="price mb-4">$150</span>
                <p><a href="#" class="btn btn-primary">Add to cart</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 ftco-animate">
            <div class="product-entry text-center">
              <a href="#"><img src="<?php echo base_url() ?>/assets/img/Producto/prod-4.png" class="img-fluid" alt="Colorlib Template"></a>
              <div class="text">
                <h3><a href="#">Shaves 01</a></h3>
                <span class="price mb-4">$150</span>
                <p><a href="#" class="btn btn-primary">Add to cart</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 ftco-animate">
            <div class="product-entry text-center">
              <a href="#"><img src="<?php echo base_url() ?>/assets/img/Producto/prod-1.png" class="img-fluid" alt="Colorlib Template"></a>
              <div class="text">
                <h3><a href="#">Shaves 01</a></h3>
                <span class="price mb-4">$150</span>
                <p><a href="#" class="btn btn-primary">Add to cart</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 ftco-animate">
            <div class="product-entry text-center">
              <a href="#"><img src="<?php echo base_url() ?>/assets/img/Producto/prod-2.png" class="img-fluid" alt="Colorlib Template"></a>
              <div class="text">
                <h3><a href="#">Shaves 01</a></h3>
                <span class="price mb-4">$150</span>
                <p><a href="#" class="btn btn-primary">Add to cart</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 ftco-animate">
            <div class="product-entry text-center">
              <a href="#"><img src="<?php echo base_url() ?>/assets/img/Producto/prod-3.png" class="img-fluid" alt="Colorlib Template"></a>
              <div class="text">
                <h3><a href="#">Shaves 01</a></h3>
                <span class="price mb-4">$150</span>
                <p><a href="#" class="btn btn-primary">Add to cart</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 ftco-animate">
            <div class="product-entry text-center">
              <a href="#"><img src="<?php echo base_url() ?>/assets/img/Producto/prod-4.png" class="img-fluid" alt="Colorlib Template"></a>
              <div class="text">
                <h3><a href="#">Shaves 01</a></h3>
                <span class="price mb-4">$150</span>
                <p><a href="#" class="btn btn-primary">Add to cart</a></p>
              </div>
            </div>
          </div>-->
        </div>
        <!--<div class="row mt-5">
            <div class="col text-center">
              <div class="block-27">
                <ul>
                  <li><a href="#">&lt;</a></li>
                  <li class="active"><span>1</span></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">&gt;</a></li>
                </ul>
              </div>
            </div>
          </div>-->
      </div>
    </section>

    

    <div id="popup1" class="overlay">
            <div class="popup">
                <div class="table-users">
                <?php echo"<div class='header'>".$user."</div>
                    <table cellspacing='0'>
                      <tr>
                         <th></th>
                         <th>Número</th>
                         <th>Fecha</th>
                         <th>Hora</th>
                         <th width='230'>Comentario</th>
                      </tr>";
                      $i=1;
                      foreach($cita as $row) 
                      {
                        foreach ($personal as $row2) 
                        {
                          if($row2->tipo == $row->id_personal)
                          {
                            $imagen = $row2->imagen;
                          }
                        }
                        
                        echo"<tr>
                            <td><img src='".base_url()."/uploads/".$imagen."' ></img></td> 
                            <td>Número ".$i."</td>
                            <td>".$row->fecha."</td>
                            <td>".$row->hora."</td>
                            <td>Gracias por confiar en nuestro servicio.</td>
                        </tr>";
                        $i++;
                      }
                      ?>
                   </table>
                </div>
                <a class="close" href="#">&times;</a>
            </div>
        </div>


    <script type="text/javascript">
        var destroyed = false;
        var starratings = new StarRating( '.star-rating', {
          onClick: function( el ) {
            console.log( 'Selected: ' + el[el.selectedIndex].text );
          },
        });
        document.querySelector( '.toggle-star-rating' ).addEventListener( 'click', function() {
          if( !destroyed ) {
            starratings.destroy();
            destroyed = true;
          }
          else {
            starratings.rebuild();
            destroyed = false;
          }
        });
  </script>




  <script type='text/javascript'>
                    
        var starratings = new StarRating('.rating0');
        //var starratings = new StarRating( '.rating1', {});

    </script>

    <script type='text/javascript'>
                    
        var starratings1 = new StarRating('.rating1');
        //var starratings = new StarRating( '.rating1', {});

    </script>

    <script type='text/javascript'>
                    
        var starratings2 = new StarRating('.rating2');
        //var starratings = new StarRating( '.rating1', {});

    </script>

    <script type='text/javascript'>
                    
        var starratings3 = new StarRating('.rating3');
        //var starratings = new StarRating( '.rating1', {});

    </script>

    <script type='text/javascript'>
                    
        var starratings4 = new StarRating('.rating4');
        //var starratings = new StarRating( '.rating1', {});

    </script>

    <script type='text/javascript'>
                    
        var starratings5 = new StarRating('.rating5');
        //var starratings = new StarRating( '.rating1', {});

    </script>

    <script type='text/javascript'>
                    
        var starratings6 = new StarRating('.rating6');
        //var starratings = new StarRating( '.rating1', {});

    </script>

    <script type='text/javascript'>
                    
        var starratings7 = new StarRating('.rating7');
        //var starratings = new StarRating( '.rating1', {});

    </script>

    <script type='text/javascript'>
                    
        var starratings8 = new StarRating('.rating8');
        //var starratings = new StarRating( '.rating1', {});

    </script>

    <script type='text/javascript'>
                    
        var starratings9 = new StarRating('.rating9');
        //var starratings = new StarRating( '.rating1', {});

    </script>

    <script type='text/javascript'>
                    
        var starratings10 = new StarRating('.rating10');
        //var starratings = new StarRating( '.rating1', {});

    </script>

    <script type='text/javascript'>
                    
        var starratings11 = new StarRating('.rating11');
        //var starratings = new StarRating( '.rating1', {});

    </script>

    <script type='text/javascript'>
                    
        var starratings12 = new StarRating('.rating12');
        //var starratings = new StarRating( '.rating1', {});

    </script>

    <script type='text/javascript'>
                    
        var starratings13 = new StarRating('.rating13');
        //var starratings = new StarRating( '.rating1', {});

    </script>

    <script type='text/javascript'>
                    
        var starratings14 = new StarRating('.rating14');
        //var starratings = new StarRating( '.rating1', {});

    </script>

    <script type='text/javascript'>
                    
        var starratings15 = new StarRating('.rating15');
        //var starratings = new StarRating( '.rating1', {});

    </script>

    <script type='text/javascript'>
                    
        var starratings16 = new StarRating('.rating16');
        //var starratings = new StarRating( '.rating1', {});

    </script>

    <script type='text/javascript'>
                    
        var starratings17 = new StarRating('.rating17');
        //var starratings = new StarRating( '.rating1', {});

    </script>

    <script type='text/javascript'>
                    
        var starratings18 = new StarRating('.rating18');
        //var starratings = new StarRating( '.rating1', {});

    </script>

    <script type='text/javascript'>
                    
        var starratings19 = new StarRating('.rating19');
        //var starratings = new StarRating( '.rating1', {});

    </script>

<div id="cita1" class="popupContainer" style="display:none;">
                <header class="popupHeader">
                        <span class="header_title">Ventana emergente</span>
                        <span class="modal_close"><i class="fas fa-times"></i></span>
                </header>

                <section class="popupBody">
                        <!-- Social Login -->
                        <div class="social_login">

                                <div class="centeredText">
                                        <span>¿Estas seguro que quieres anular la cita?</span>
                                </div>

                                <div class="action_btns">
                                        <div class="one_half"><a href="<?php echo base_url()?>Gestion/Perfil?cita1=1X054lF" id="login_form" class="btn">Aceptar</a></div>
                                        <div class="one_half last"><a class="modal_close btn" href="#" id="register_form">Cancelar</a></div>
                                </div>
                        </div>

                        <!-- Username & Password Login form -->
                        
                </section>
    </div>


<div id="cita2" class="popupContainer" style="display:none;">
                <header class="popupHeader">
                        <span class="header_title">Ventana emergente</span>
                        <span class="modal_close"><i class="fas fa-times"></i></span>
                </header>

                <section class="popupBody">
                        <!-- Social Login -->
                        <div class="social_login">

                                <div class="centeredText">
                                        <span>¿Estas seguro que quieres anular la cita?</span>
                                </div>

                                <div class="action_btns">
                                        <div class="one_half"><a href="<?php echo base_url()?>Gestion/Perfil?cita2=1X054lF" id="login_form" class="btn">Aceptar</a></div>
                                        <div class="one_half last"><a class="modal_close btn" href="#" id="register_form">Cancelar</a></div>
                                </div>
                        </div>

                        <!-- Username & Password Login form -->
                        
                </section>
    </div>

    <div id="cita3" class="popupContainer" style="display:none;">
                <header class="popupHeader">
                        <span class="header_title">Ventana emergente</span>
                        <span class="modal_close"><i class="fas fa-times"></i></span>
                </header>

                <section class="popupBody">
                        <!-- Social Login -->
                        <div class="social_login">

                                <div class="centeredText">
                                        <span>¿Estas seguro que quieres anular la cita?</span>
                                </div>

                                <div class="action_btns">
                                        <div class="one_half"><a href="<?php echo base_url()?>Gestion/Perfil?cita3=1X054lF" id="login_form" class="btn">Aceptar</a></div>
                                        <div class="one_half last"><a class="modal_close btn" href="#" id="register_form">Cancelar</a></div>
                                </div>
                        </div>

                        <!-- Username & Password Login form -->
                        
                </section>
    </div>

<script type="text/javascript">
  $("#pop1").leanModal({

                top: 100,
                overlay: 0.6,
                closeButton: ".modal_close"
        });
</script>

<script type="text/javascript">
  $("#pop2").leanModal({

                top: 100,
                overlay: 0.6,
                closeButton: ".modal_close"
        });
</script>

<script type="text/javascript">
  $("#pop3").leanModal({

                top: 100,
                overlay: 0.6,
                closeButton: ".modal_close"
        });
</script>

	    