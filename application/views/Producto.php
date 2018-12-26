  <!DOCTYPE html>
<html lang="en">
  <head>
    <title>Trim - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Home/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Home/animate.css">
    
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Home/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Home/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Home/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Home/aos.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Home/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Home/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Home/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Home/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Home/icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Home/style.css">


    <link href="<?php echo base_url() ?>/assets/css/miperfil/styless.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/css/miperfil/star-rating.js?ver=3.1.1"></script>

    <meta name="viewport" content="initial-scale=1, width= 320px" />
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Prueba/style.css">
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://andwecode.com/wp-content/uploads/2015/10/jquery.leanModal.min_.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/Modal/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/Modal/jquery.leanModal.min.js"></script>
        


  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
          <a class="navbar-brand" href="index.html">Alex Piñero.</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fas fa-bars"></span> Menu
          </button>

          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
              <li <?php if($active == "home"){?> class="nav-item active" <?php } else { ?> class="nav-item" <?php } ?>><a href="<?php echo site_url() ?>Gestion/inicio" class="nav-link">Home</a></li>
              <li<?php if($active == "cita"){?> class="nav-item active" <?php } else { ?> class="nav-item" <?php } ?>><a href="<?php echo site_url() ?>Gestion/cita" class="nav-link">Cita</a></li>
              <li <?php if($active == "galeria"){?> class="nav-item active" <?php } else { ?> class="nav-item" <?php } ?>><a href="<?php echo site_url() ?>Gestion/Galeria" class="nav-link">Galerias</a></li>            
              <li <?php if($active == "producto"){?> class="nav-item active" <?php } else { ?> class="nav-item" <?php } ?>><a href="<?php echo site_url() ?>Gestion/Producto" class="nav-link">Productos</a></li>
              <li <?php if($active == "contacto"){?> class="nav-item active" <?php } else { ?> class="nav-item" <?php } ?>><a href="<?php echo site_url() ?>Gestion/Contacto" class="nav-link">Contacto</a></li> 
              <?php
              if($user == false)
              {?>
                <li class='nav-item'><a href='#modal' name='modal_trigger' id='modal_trigger' class='nav-link'>Iniciar Sesion   
                <span class='far fa-user'></span></a></li>
        <?php }
              else
              {?>
                <li<?php if($active == "perfil"){?> class="nav-item active" <?php } else { ?> class="nav-item" <?php } ?>><a href='Perfil' class='nav-link'><?php echo $user ?>   
                <span class='far fa-user'></span></a></li>
              
        <?php }?>

                <!--<div style="float: right; cursor: pointer;">
                    <span class="glyphicon glyphicon-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span>
                </div>-->
                <li class="nav-item"><div style="float: right; cursor: pointer; position: absolute;
    top: 25px; ">
                    <span style="color:orange;" class="fas fa-shopping-cart fa-2x  my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span>
                </div></li>
                

                
            </ul>
          </div>
        </div>
      </nav>



    

    <script type="text/javascript">


        function myFunction() {

            event.preventDefault();


        var email  = $("#user").val();
        var password   = $("#password").val();

        $.ajax({
            url : "<?php echo base_url('index.php/Gestion/verificarUsuario');?>",
            type: 'POST',
            dataType: "json",
            data : {'email':email,'password':password},
            success: function(respuesta) 
            {
                if(respuesta.status == "success")
                    window.location.href = respuesta.redirect_url;
                else
                    $('#error-msg').html('<div class="alert alert-danger">' + respuesta.message + '</div>').fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-dismissible").alert('close');
});
            },
            error: function(respuesta)
            {
                $('#error-msg').html('<div class="alert alert-danger">' + "Error del Sistema, intentelo mas tarde" + '</div>');
            }
        });
        return false;
};


        function myFunction2(){
            event.preventDefault();

        var user  = $("#nusuario").val();
        var password   = $("#ncontraseña").val();
        var password2   = $("#ncontraseña2").val();
        var email  = $("#nemail").val();
        
        $.ajax({
            url : "<?php echo base_url('index.php/Gestion/registro');?>",
            type: 'POST',
            dataType: "json",
            data : {'email':email,'password':password, 'password2':password2, 'user':user},
            success: function(respuesta) 
            {
                if(respuesta.status == "success")
                    window.location.href = respuesta.redirect_url;
                else
                    $('#error-msg2').html('<div class="alert alert-danger">' + respuesta.message + '</div>').fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-dismissible").alert('close');
});
            },
            error: function(respuesta)
            {
                $('#error-msg2').html('<div class="alert alert-danger">' + "Error del Sistema, intentelo mas tarde" + '</div>');
            }
        });
        return false;
};


        function myFunction3(){
            event.preventDefault();
            var email  = $("#email").val();
            
        
        $.ajax({
            url : "<?php echo base_url('index.php/Gestion/olvidePassword');?>",
            type: 'POST',
            dataType: "json",
            data : {'email':email},
            success: function(respuesta) 
            {
                if(respuesta.status == "success")
                    window.location.href = respuesta.redirect_url;
                else
                    $('#error-msg2').html('<div class="alert alert-danger">' + respuesta.message + '</div>').fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-dismissible").alert('close');
});
            },
            error: function(respuesta)
            {
                $('#error-msg2').html('<div class="alert alert-danger">' + "Error del Sistema, intentelo mas tarde" + '</div>');
            }
        });
        return false;
};

        
        // Plugin options and our code
        $("#modal_trigger").leanModal({

                top: 100,
                overlay: 0.6,
                closeButton: ".modal_close"
        });

        $(function() 
        {

                $("#forgot_password").click(function()
                {
                    $(".user_login").hide();
                    $(".user_password").show();
                    $(".header_title").text('Recuperar Contraseña');
                    return false;

                });
                // Calling Login Form
                $("#login_form").click(function() {
                        $(".social_login").hide();
                        $(".user_login").show();
                        return false;
                });

                // Calling Register Form
                $("#register_form").click(function() {
                        $(".social_login").hide();
                        $(".user_register").show();
                        $(".header_title").text('Register');
                        return false;
                });

                // Going back to Social Forms
                $(".back_btn").click(function() {
                        $(".user_login").hide();
                        $(".user_register").hide();
                        $(".user_password").hide();
                        $(".social_login").show();
                        $(".header_title").text('Login');
                        return false;
                });

                
        });
        
</script>

<div id="modal" class="popupContainer" style = "top:-50px; display:none;">

                <header class="popupHeader">
                        <span class="header_title">Iniciar Sesion</span>
                        <span class="modal_close"><i class="fas fa-times"></i></span>
                </header>

                <section class="popupBody">
                        <!-- Social Login -->
                        <div class="social_login">
                                <div class="">
                                        <a href="#" class="social_box fb">
                                                <span class="iconPopup"><i class="fab fa-facebook-f"></i></span>
                                                <span class="icon_title">Conectar con Facebook</span>

                                        </a>

                                        <a href="#" class="social_box google">
                                                <span class="iconPopup"><i class="fab fa-google-plus-g"></i></span>
                                                <span class="icon_title">Conectar con Google</span>
                                        </a>
                                </div>

                                <div class="centeredText">
                                        <span>Usa tu dirección Email</span>
                                </div>

                                <div class="action_btns">
                                        <div class="one_half"><a href="#" id="login_form" class="btn">Iniciar Sesion</a></div>
                                        <div class="one_half last"><a href="#" id="register_form" class="btn">Registrar</a></div>
                                </div>
                        </div>

                        <!-- Username & Password Login form -->
                        <div class="user_login">
                            
                                <form class="form" id="formLogin" method="post" onsubmit="myFunction()">
                                        <label>Email / Usuario</label>
                                        <input type="text" name="user" id="user" placeholder="Usuario" required/>
                                        <br />

                                        <label>Contraseña</label>
                                        <input type="password" name="password" id="password" placeholder="Password" required/>
                                        <br />

                                        <div class="checkbox">
                                                <input id="remember" type="checkbox" />
                                                <label for="remember">Recordar Contraseña</label>
                                        </div>

                                        <p id="error-msg"></p>
                                        <div class="action_btns">
                                                <div class="one_half"><a href="#" class="btn back_btn" ><i class="fa fa-angle-double-left"></i> Atras</a></div>
                                                <div class="one_half last"><button class="btn btn_red" type="submit" name="l_submit" id="l_submit" value="login">Iniciar Sesion</button></div>
                                        </div>
                                </form>

                                <div class="row">
                                    <div class="col-md-12">
                                        <?php echo validation_errors(); ?>
                                    </div>
                                </div>

                                <a href="#" id ="forgot_password" class="forgot_password">¿Olvidó su contraseña?</a>
                        </div>
                        <div class="user_password">
                            <form class="form" id="formLogin" method="post" onsubmit="myFunction3()">
                                <label>Correo Electronico</label>
                                <input type="text" name="email" id="email" required />
                                <br></br>
                                <div class="action_btns">
                                    <div class="one_half"><a href="#" class="btn back_btn" ><i class="fa fa-angle-double-left"></i> Atras</a></div>
                                    <div class="one_half last"><button class="btn btn_red" type="submit" name="registrar" id="registrar">Recuperar</button></div>
                                </div>
                            </form>
                        </div>

                        <!-- Register Form -->
                        <div class="user_register">
                            
                                <form class="form" id="formLogin" method="post" onsubmit="myFunction2()">
                                        <label>Usuario</label>
                                        <input type="text" name="nusuario" id="nusuario" required />
                                        <br />

                                        <label>Direción Email</label>
                                        <input type="email" name="nemail" id="nemail" required />
                                        <br />

                                        <label>Contraseña</label>
                                        <input type="password" name="ncontraseña" id="ncontraseña" pattern=".{0}|.{4,20}" title="minimo 4 caracteres" required/>
                                        <br />

                                        <label>Verificar Contraseña</label>
                                        <input type="password" name="ncontraseña2" id="ncontraseña2"  pattern=".{0}|.{4,20}" title="minimo 4 caracteres" required>
                                        <br />

                                        <div class="checkbox">
                                                <input id="send_updates" type="checkbox" />
                                                <label for="send_updates">Quiero recibir notificaciones</label>
                                        </div>
                                        <p id="error-msg2"></p>
                                        <div class="action_btns">
                                                <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Atras</a></div>
                                                <div class="one_half last"><button class="btn btn_red" type="submit" name="registrar" id="registrar">Registrar</button></div>
                                        </div>
                                </form>
                        </div>
                </section>
    </div>
        
    <!-- END nav -->
    
  </body>
</html>



  <style>
  .badge-notify{
    background:red;
    position:relative;
    top: -20px;
    right: 10px;
  }
  .my-cart-icon-affix {
    position: fixed;
    z-index: 999;
  }
  </style>


<div class="hero-wrap js-fullheight" style="background-image: url('<?php echo base_url() ?>/assets/img/Home/bg_2.jpg');" data-stellar-background-ratio="0.5">
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




<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Our Shop</h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <p class="mt-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        <div class="row">
            <?php
            $i=0;
        foreach ($producto as $row ) {
          echo"<div class='col-md-3 ftco-animate'>
            <div class='product-entry text-center'>
              <a><img src='".base_url()."/uploads/".$row->imagen."' class='img-fluid' alt='Colorlib Template'></a>
              <div class='text'>
                <h3 style='color:#000;''><a style='color:#000;'>".$row->nombre."</a></h3>
                <span class='price mb-4'>".$row->precio."€</span>

                <section class='section' id='section-1'>
                      <select class='rating".$i."'>";
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
                </section>
                <br></br>

                <p><a class='btn my-cart-btn' data-id='".$row->id."' data-name='".$row->nombre."' data-summary='summary 1' data-price='".$row->precio."' data-quantity='1' data-image='".base_url()."/uploads/".$row->imagen."'>Añadir al carrito</a></p>

              </div>
            </div>
          </div>";
            $i++;
        }?>






          <!--<div class="col-md-3 ftco-animate">
            <div class="product-entry text-center">
              <a href="#"><img src="<?php echo base_url() ?>/assets/img/Producto/prod-2.png" class="img-fluid" alt="Colorlib Template"></a>
              <div class="text">
                <h3><a href="#">Shaves 01</a></h3>
                <span class="price mb-4">$150</span>
                <p><a class="btn btn-primary my-cart-btn" data-id="2" data-name="product 2" data-summary="summary 2" data-price="20" data-quantity="1" data-image="<?php echo base_url() ?>/assets/img/Producto/prod-1.png">Add to Cart</a></p>
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
        <div class="row mt-5">
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
          </div>
      </div>
    </section>

  <script type='text/javascript' src="<?php echo base_url() ?>/assets/js/Cart/jquery-2.2.3.min.js"></script>
  <script type='text/javascript' src="<?php echo base_url() ?>/assets/js/Cart/bootstrap.min.js"></script>
  <script type='text/javascript' src="<?php echo base_url() ?>/assets/js/Cart/jquery.mycart.js"></script>
  <script type="text/javascript">
    $(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        left: position.left
      }, 500 , "linear", function() {
        $image.remove();
      });
    }

    $('.my-cart-btn').myCart({
      currencySymbol: '€',
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      classProductQuantity: 'my-product-quantity',
      classProductRemove: 'my-product-remove',
      classCheckoutCart: 'my-cart-checkout',
      affixCartIcon: true,
      showCheckoutModal: true,
      numberOfDecimals: 2,
      cartItems: [
        
      ],
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },
      afterAddOnCart: function(products, totalPrice, totalQuantity) {
        console.log("afterAddOnCart", products, totalPrice, totalQuantity);
      },
      clickOnCartIcon: function($cartIcon, products, totalPrice, totalQuantity) {
        console.log("cart icon clicked", $cartIcon, products, totalPrice, totalQuantity);
      },
      checkoutCart: function(products, totalPrice, totalQuantity) {
        var checkoutString = "Total Price: " + totalPrice + "\nTotal Quantity: " + totalQuantity;
        checkoutString += "\n\n id \t name \t summary \t price \t quantity \t image path";
        $.each(products, function(){
          checkoutString += ("\n " + this.id + " \t " + this.name + " \t " + this.summary + " \t " + this.price + " \t " + this.quantity + " \t " + this.image);
        });
        alert(checkoutString)
        console.log("checking out", products, totalPrice, totalQuantity);
      },
      getDiscountPrice: function(products, totalPrice, totalQuantity) {
        console.log("calculating discount", products, totalPrice, totalQuantity);
        return totalPrice * 0.5;
      }
    });

    $("#addNewProduct").click(function(event) {
      var currentElementNo = $(".row").children().length + 1;
      $(".row").append('<div class="col-md-3 text-center"><img src="images/img_empty.png" width="150px" height="150px"><br>product ' + currentElementNo + ' - <strong>$' + currentElementNo + '</strong><br><button class="btn btn-danger my-cart-btn" data-id="' + currentElementNo + '" data-name="product ' + currentElementNo + '" data-summary="summary ' + currentElementNo + '" data-price="' + currentElementNo + '" data-quantity="1" data-image="images/img_empty.png">Add to Cart</button><a href="#" class="btn btn-info">Details</a></div>')
    });
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

    





  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="keywords" content="footer, address, phone, icons" />

  <title>Footer With Address And Phones</title>

  
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Footer/footer-distributed-with-address-and-phones.css">
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">



  


    <!-- The content of your page would go here. -->

    <footer class="footer-distributed">

      <div class="footer-left">

        <h3>Alex<span>Piñero</span></h3>

        <p class="footer-links">
          <a href="#">Home</a>
          ·
          <a href="#">Cita</a>
          ·
          <a href="#">Galerias</a>
          ·
          <a href="#">Producto</a>
          ·
          <a href="#">Contacto</a>
        </p>

        <!--<p class="footer-company-name">Company Name &copy; 2015</p>-->
      </div>

      <div class="footer-center">

        <div>
          <i class="fa fa-map-marker"></i>
          <p><span>21 Revolution Street</span> Paris, France</p>
        </div>

        <div>
          <i class="fa fa-phone"></i>
          <p>+1 555 123456</p>
        </div>

        <div>
          <i class="fa fa-envelope"></i>
          <p><a href="mailto:support@company.com">support@company.com</a></p>
        </div>

      </div>

      <div class="footer-right">

        <p class="footer-company-about">
          <span>AlexPiñero</span>
          AlexPiñero Style for men es un salon de peluquería...
        </p>

        <div class="footer-icons">

          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-linkedin"></i></a>
          <a href="#"><i class="fa fa-github"></i></a>

        </div>

      </div>

    </footer>

    <!--<script src="<?php echo base_url() ?>/assets/js/Home/jquery.min.js"></script>-->
  <!--<script src="<?php echo base_url() ?>/assets/js/Home/jquery-migrate-3.0.1.min.js"></script>-->
  <script src="<?php echo base_url() ?>/assets/js/Home/popper.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/Home/bootstrap.min.js"></script>
  <!--<script src="<?php echo base_url() ?>/assets/js/Home/jquery.easing.1.3.js"></script>-->
  <script src="<?php echo base_url() ?>/assets/js/Home/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/Home/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/Home/owl.carousel.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/Home/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/Home/aos.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/Home/jquery.animateNumber.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/Home/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/Home/jquery.timepicker.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/Home/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo base_url() ?>/assets/js/Home/google-map.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/Home/main.js"></script>



  