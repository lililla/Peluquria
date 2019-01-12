<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Alex Piñero Style For Men</title>
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
          <a class="navbar-brand" href="<?php echo site_url() ?>Gestion/inicio">Alex Piñero.</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fas fa-bars"></span> Menu
          </button>

          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <?php
              if($user == "AlexPiñero")
              {?>
              <li <?php if($active == "Admin"){?> class="nav-item active" <?php } else { ?> class="nav-item" <?php } ?>><a href="<?php echo site_url() ?>GestionAdmin/Admin" class="nav-link">Administrador</a></li>
              <?php }?>

              <li <?php if($active == "home"){?> class="nav-item active" <?php } else { ?> class="nav-item" <?php } ?>><a href="<?php echo site_url() ?>Gestion/inicio" class="nav-link">Home</a></li>
              <?php
              if($user != false)
              {?>
                    <li<?php if($active == "cita"){?> class="nav-item active" <?php } else { ?> class="nav-item" <?php } ?>><a href="<?php echo site_url() ?>Gestion/cita" class="nav-link">Cita</a></li>
              <?php }?>
              
              <li <?php if($active == "galeria"){?> class="nav-item active" <?php } else { ?> class="nav-item" <?php } ?>><a href="<?php echo site_url() ?>Gestion/Galeria" class="nav-link">Galerias</a></li>

              <?php
              if($user != false)
              {?>
              <li <?php if($active == "producto"){?> class="nav-item active" <?php } else { ?> class="nav-item" <?php } ?>><a href="<?php echo site_url() ?>Gestion/Producto" class="nav-link">Productos</a></li>
              <?php }?>



              <li <?php if($active == "contacto"){?> class="nav-item active" <?php } else { ?> class="nav-item" <?php } ?>><a href="<?php echo site_url() ?>Gestion/Contacto" class="nav-link">Contacto</a></li>


              <?php
              if($user != false)
              {?>
              <li <?php if($active == "red"){?> class="nav-item active" <?php } else { ?> class="nav-item" <?php } ?>><a href="<?php echo site_url() ?>Gestion/Red" class="nav-link">RedSocial</a></li>

              <?php }?>  
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
                                        <!--<a href="#" class="social_box fb">
                                                <span class="iconPopup"><i class="fab fa-facebook-f"></i></span>
                                                <span class="icon_title">Conectar con Facebook</span>

                                        </a>-->

                                        <!--<a href="#" class="social_box google">
                                                <span class="iconPopup"><i class="fab fa-google-plus-g"></i></span>
                                                <span class="icon_title">Conectar con Google</span>
                                        </a>-->
                                </div>

                                <div class="centeredText">
                                        <span>Bienvenido a peluquería AlexPiñero style for men</span>
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