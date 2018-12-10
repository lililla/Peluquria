<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesion</title>
  <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Hind:300' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
  
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/login/style.css" />  


  
</head>

<body>
<div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors(); ?>
                    </div>
                </div>
  <div id="login-button">
  <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
  </img>

  <div class="container">
                <div class="row" id="flashMessage">
                    <?php
                    if ($this->session->flashdata('activacion')) {
                        ?>
                        <br/>
                        <div class="alert alert-success alert-dismissable">
                            <h4>listoooooooooo!</h4>
                            <p><?php echo $this->session->flashdata('activacion'); ?>.</p>
                        </div> 
                    <?php
                    }
                    ?>
                </div>
    </div>
</div>
<div id="container">
<?php echo form_open(base_url() . 'index.php/Gestion/verificarUsuario') ?>  
  <h1>Iniciar Sesion</h1>
  <span class="close-btn">
    <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
  </span>

  <form  class="form" id="formLogin" method="post">
    <input type="text" name="user" id="user" placeholder="Usuario" required>
    <input type="password" name="password" id="password" placeholder="Password" required>
    <button type="submit" name="login" value="login">Iniciar Sesion</button>
    <div id="remember-container">
      <input type="checkbox" id="checkbox-2-1" class="checkbox" checked="checked"/>
      <span id="remember">Recordarme</span>
      <span id="forgotten">Olvide Password</span>
      <span id="nueva">Nueva cuenta</span>

    </div>
</form>
</div>

<!-- Forgotten Password Container -->
<div id="forgotten-container">
   <h1>Recuperar</h1>
  <span class="close-btn">
    <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
  </span>

  <form>
    <input type="email" name="email" placeholder="E-mail">
    <a href="#" class="orange-btn">Obtener nuevo Password</a>
</form>
</div>

<div id="nueva-container">
  <?php echo form_open(base_url() . 'index.php/Gestion/registro') ?>
   <h1>Nueva</h1>
  <span class="close-btn">
    <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
  </span>

  <form>
    <input type="text" name="nusuario" placeholder="Usuario">
    <input type="email" name="nemail" placeholder="E-mail">
    <input type="password" name="ncontraseña" placeholder="Password">
    <input type="password" name="ncontraseña2" placeholder="Confirmacion de password">
    <button type="submit" name="registrar">Registrar</button>
</form>


</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="<?php echo base_url() ?>/assets/js/login/login.js"></script>

</body>
</html>



