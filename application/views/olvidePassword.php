<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Peluqueria - Alex Piñero</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="<?php echo base_url() ?>assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="<?php echo base_url() ?>assets/css/creative.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/IconoTijeras.png">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="<?php echo site_url() ?>/Gestion/index">Inicio</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo site_url() ?>/Gestion/productos">Precios y productos</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url() ?>/Gestion#portfolio">Contacto</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url() ?>/Gestion/registro">Registro</a>
                    </li>
                    <li>
                        <a href="">Iniciar Sesión</a>
                    </li>                          
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
   
    <!-- Formulario de Inicio de Sesion -->
   <section class="bg-primary" id="about">
        <div class="container">
            <?php echo form_open(base_url() . 'index.php/Gestion/olvidePassword') ?>           
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Iniciar Sesión</h2>
                    <hr class="light">

                        <div class="form-group1" style="margin-left: 275px;">
                            <form class="form" id="formLogin" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="email" name="email" required placeholder="email" style="width: 200px">
                                </div>
                                <br>
                                <div class="olvido_pass"><a href="<?php echo site_url() ?>/Gestion/olvidePassword" >{%trans "&iquest;Olvidaste tu contrase&ntilde;a?"%}</a></div>
                                <button type="submit" class="btn btn-primary btn-xl page-scroll" name="login" value="login" style="margin-right: 275px;">Recuperar</button>
                        </div>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </section>

<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/creative.min.js"></script>

</body>

</html>