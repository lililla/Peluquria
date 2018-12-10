<!doctype html>
<html>
  <head>
      <meta charset="UTF-8">
      <title>Clientes</title>
      
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Admin/estilos.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Admin/estilos1200.css">
      
      <style>
        .gi-2x{font-size: 2em;}
        .gi-3x{font-size: 3em;}
        .gi-4x{font-size: 4em;}
        .gi-5x{font-size: 5em;}
      </style>
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
    <script>
    function goBack() {
        window.history.back();
    }
    </script>

    <style>
        .gi-2x{font-size: 2em;}
        .gi-3x{font-size: 3em;}
        .gi-4x{font-size: 4em;}
        .gi-5x{font-size: 5em;}
      </style>
<header align="center">
      <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">AlexPiñero</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="<?php echo site_url() ?>/Gestion/Admin">Inicio</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
         <li><a href="#"><span class="glyphicon glyphicon-user"></span> Mi cuenta</a></li>
         <li><a href="#"><span class="glyphicon glyphicon-log-out"></span>Desconectarse</a></li>
       </ul>
      </div>
      </nav>

      <h1 href=''>
    <u>Gestion Cliente</u>
  </h1>
</header>


    <div class="banda_blanca">
        <div class="centro">
        &nbsp;
        </div>
    </div>
    <div class="content_blanc">
        <div class="centro">
            
            <a href="<?php echo site_url() ?>/Gestion/ListaCliente">
              <div class="caja_marcas">
                  <div class="bandita_caja_marcas"></div>
                  <div class="logo_caja_marcas"><span class="glyphicon glyphicon-scissors gi-5x"></span></div>
                  <div class="web_caja_marcas">Listacliente</div>
              </div>
            </a>
            
            <a href="<?php echo site_url() ?>/Gestion/verificar">
              <div class="caja_marcas">
                  <div class="bandita_caja_marcas"></div>
                  <div class="logo_caja_marcas"><span class="glyphicon glyphicon-shopping-cart gi-5x"</span></div>
                  <div class="web_caja_marcas">Verificar Cliente</div>
              </div>
            </a>

            <a href="<?php echo site_url() ?>/Gestion/Admin">
          <div class="caja_marcas">
              <div class="bandita_caja_marcas"></div>
              <div class="logo_caja_marcas"><span class="glyphicon glyphicon-repeat gi-5x"></span></div>
              <div class="web_caja_marcas">Volver</div>
          </div>
        </a>
           

            <div style="clear:both;"></div>
        </div>
    </div>
  </body>
</html>
