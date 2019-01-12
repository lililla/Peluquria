<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>/assets/css/Administrador/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url() ?>/assets/css/Administrador/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>/assets/css/Administrador/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url() ?>/assets/css/Administrador/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url() ?>/assets/css/Administrador/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>/assets/css/Administrador/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/css/Administrador/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/css/Administrador/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" >Alex Piñero Administrador</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="">
                    <a class="" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>-->
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url() ?>Gestion"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Buscar...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo site_url() ?>GestionAdmin/Admin"><i class="fa fa-gears fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url() ?>GestionAdmin/Noticia"><i class="fa fa-comments fa-fw"></i> Noticias</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url() ?>GestionAdmin/Personal"><i class="fa fa-user fa-fw"></i> Personal</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url() ?>GestionAdmin/Precio"><i class="fa fa-eur fa-fw"></i> Servicio y Precio</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url() ?>GestionAdmin/Producto"><i class="fa fa-shopping-cart fa-fw"></i> Productos</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url() ?>GestionAdmin/Estilo"><i class="fa fa-camera-retro fa-fw"></i> Estilo</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i>Cita<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url() ?>GestionAdmin/Cita">Lista</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url() ?>GestionAdmin/Horario">Horarios</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url() ?>GestionAdmin/Cierre">Cierres</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i>Clientes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url() ?>GestionAdmin/Cliente">Cliente</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?php echo site_url() ?>GestionAdmin/RedSocial"><i class="fa fa-camera-retro fa-fw"></i> RedSocial</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url() ?>GestionAdmin/Contacto"><i class="fa fa-comments fa-fw"></i> Contactos</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

    <script src="<?php echo base_url() ?>/assets/js/Administrador/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/Administrador/datatables/js/jquery.dataTables.min.js"></script>
    

    

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>/assets/js/Administrador/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url() ?>/assets/js/Administrador/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url() ?>/assets/js/Administrador/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/Administrador/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/Administrador/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url() ?>/assets/js/Administrador/dist/js/sb-admin-2.js"></script>

    <script src="<?php echo base_url() ?>/assets/js/Administrador/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/Administrador/datatables-responsive/dataTables.responsive.js"></script>

</body>

</html>