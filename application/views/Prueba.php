<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>jQuery tiny-fab Plugin Demo</title>
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/RedSocial/abc.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/RedSocial/abc3.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/RedSocial/abc4.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/RedSocial/fixed.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/RedSocial/top.css">
  
  <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
    .img-container img
      {
          width: 50px;
          height: 50px;
          border-radius: 5px;
          cursor: pointer;
          transition: 0.3s;
          
      }
  </style>
</head>

<body>

  <h1>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</h1>
  <h1>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</h1>
  <h1>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</h1>
  <h1>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</h1>
  <h1>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</h1>
  <h1>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</h1>
  <h1>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</h1>
  <h1>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</h1>
  <h1>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</h1>
  <h1>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</h1>
  <h1>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</h1>
  <h1>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</h1>
  <h1>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</h1>
  <h1>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</h1>
  <h1>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</h1>
  <h1>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</h1>
  <a href="#0" class="cd-top js-cd-top">Top</a>

  <div class="zoom">

    <a class="zoom-fab zoom-btn-large" id="zoomBtn"><i class="fa fa-bars"></i></a>

    <ul class="zoom-menu">
      <li><a class="zoom-fab zoom-btn-sm2 zoom-btn-person scale-transition scale-out"><i class="fa fa-play-circle"></i></a></li>
      <li><a class="zoom-fab zoom-btn-sm4 zoom-btn-doc scale-transition scale-out"><i class="fa fa-image"></i></a></li>
      <li><a class="zoom-fab zoom-btn-sm3 zoom-btn-tangram scale-transition scale-out"><i class="fa fa-image"></i></a></li>
      <li><a class="zoom-fab zoom-btn-sm zoom-btn-report scale-transition scale-out"><i class="fa fa-edit"></i></a></li>
      <li><a class="zoom-fab zoom-btn-sm zoom-btn-feedback scale-transition scale-out"><i class="fa fa-bell"></i></a></li>
    </ul>
    <div class="zoom-card scale-transition scale-out">
      <ul class="zoom-card-content">
      <li>Content</li>
      <li>Content</li>
      <li>Content</li>
      <li>Content</li>
      <li>Content</li>
      </ul>
    </div>

  </div>
  

































  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript">
    $('#zoomBtn').click(function() {
  $('.zoom-btn-sm').toggleClass('scale-out');
  $('.zoom-btn-sm2').toggleClass('scale-out');
  $('.zoom-btn-sm3').toggleClass('scale-out');
  $('.zoom-btn-sm4').toggleClass('scale-out');
  
  });

  $('.zoom-btn-sm2').click(function() {
    document.getElementById('abc').style.display = "block";
  });
  $('.zoom-btn-sm3').click(function() {
    document.getElementById('abc3').style.display = "block";
  });
  $('.zoom-btn-sm4').click(function() {
    document.getElementById('abc4').style.display = "block";
  });
  function div_hide(){
  document.getElementById('abc').style.display = "none";
  }

  function div_hide3(){
  document.getElementById('abc3').style.display = "none";
  }

  function div_hide4(){
  document.getElementById('abc4').style.display = "none";
  }
  </script>

  

        <div id="abc">
        <!-- Popup Div Starts Here -->
          <div id="popupContact">
          <!-- Contact Us Form -->
          <form action="#" id="form" method="post" name="form">
          <div class="img-container"><img id="close" src="<?php echo base_url() ?>/assets/img/Red/close.png" onclick ="div_hide()"></div>
          <h2 style="color:black;"><i style="color:red;" class="fa fa-play-circle fa-2x"></i> Video</h2>
          <hr>
          <input id="name" name="asunto" type="text" placeholder="Asunto">
          <textarea id="msg" name="message" placeholder="Comentario..."></textarea>
          <input type="file" name="myFile">
          <br></br>
          <a href="javascript:%20check_empty()" id="submit">Publicar</a>
          </form>
          </div>
        <!-- Popup Div Ends Here -->
        </div>


        <div id="abc3">
        <!-- Popup Div Starts Here -->
          <div id="popupContact">
          <!-- Contact Us Form -->
          <form action="#" id="form" method="post" name="form">
          <div class="img-container"><img id="close" src="<?php echo base_url() ?>/assets/img/Red/close.png" onclick ="div_hide3()"></div>
          <h2 style="color:black;"><i style="color:green;" class="fa fa fa-image fa-2x"></i> Imagen</h2>
          <hr>
          <input id="name" name="asunto" type="text" placeholder="Asunto">
          <textarea id="msg" name="message" placeholder="Comentario..."></textarea>
          <input type="file" name="myFile">
          <br></br>
          <a href="javascript:%20check_empty()" id="submit">Publicar</a>
          </form>
          </div>
          <!-- Popup Div Ends Here -->
        </div>

        <div id="abc4">
        <!-- Popup Div Starts Here -->
          <div id="popupContact">
          <!-- Contact Us Form -->
          <form action="#" id="form" method="post" name="form">
          <div class="img-container"><img id="close" src="<?php echo base_url() ?>/assets/img/Red/close.png" onclick ="div_hide4()"></div>
          <h2 style="color:black;"><i style="color:yellow;" class="fa fa-edit fa-2x"></i> Estado</h2>
          <hr>
          <input id="name" name="asunto" type="text" placeholder="Asunto">
          <textarea id="msg" name="message" placeholder="Comentario..."></textarea>
          <input type="file" name="myFile">
          <br></br>
          <a href="javascript:%20check_empty()" id="submit">Publicar</a>
          </form>
          </div>
          <!-- Popup Div Ends Here -->
        </div>

        <script src="<?php echo base_url() ?>/assets/js/RedSocial/top.js"></script>
               
</body>

</html>
