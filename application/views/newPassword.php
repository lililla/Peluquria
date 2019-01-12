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



    <meta name="viewport" content="initial-scale=1, width= 320px" />
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Prueba/style.css">
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://andwecode.com/wp-content/uploads/2015/10/jquery.leanModal.min_.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/Modal/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>/assets/js/Modal/jquery.leanModal.min.js"></script>
        


  </head>
  <body>
    



    

    <script type="text/javascript">


        function myFunction() {

            event.preventDefault();
            var url = window.location.href;
            var email = location.search.split('email=')[1]
            //var email = url.searchParams.get("email");
            //document.write(email);


        var password  = $("#password").val();
        var password2  = $("#password2").val();
        

        $.ajax({
            url : "<?php echo base_url('index.php/Gestion/newPassword2');?>",
            type: 'POST',
            dataType: "json",
            data : {'password':password,'password2':password2, 'email':email},
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

<div  class="popupContainer">

                <header class="popupHeader">
                        <span class="header_title">Iniciar Sesion</span>
                        <span class="modal_close"><i class="fas fa-times"></i></span>
                </header>

                <section class="popupBody">
                        <!-- Social Login -->
                        <div class="social_login">
                                <form class="form" id="formLogin" method="post" onsubmit="myFunction()">
                                <label>Contraseña</label>
                                <input type="password" name="password" id="password" required />
                                <br></br>
                                <label>Verificación</label>
                                <input type="password" name="password2" id="password2" required />
                                <br></br>
                                <p id="error-msg"></p>
                                <div class="action_btns">
                                    <div class="one_half"><a href="#" class="btn back_btn" ><i class="fa fa-angle-double-left"></i> Salir</a></div>
                                    <div class="one_half last"><button class="btn btn_red" type="submit" name="registrar" id="registrar">Recuperar</button></div>
                                </div>
                            </form>
                        </div>





                </section>
    </div>
        
    <!-- END nav -->
    
  </body>
</html>