<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/RedSocial/abc.css">
<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/RedSocial/abc1.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/RedSocial/abc3.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/RedSocial/abc4.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/RedSocial/fixed.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/RedSocial/top.css">
  <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script type="text/javascript">
  $(document).ready(function(){
    $("#mostrar0").click(function(){
      $('#target0').show(300);
      $('.target0').show("slow");
     });
    $("#mostrar1").click(function(){
      $('#target1').show(300);
      $('.target1').show("slow");
     });
    $("#mostrar2").click(function(){
      $('#target2').show(300);
      $('.target2').show("slow");
     });
    $("#mostrar3").click(function(){
      $('#target3').show(300);
      $('.target3').show("slow");
     });
    $("#mostrar4").click(function(){
      $('#target4').show(300);
      $('.target4').show("slow");
     });
    $("#mostrar5").click(function(){
      $('#target5').show(300);
      $('.target5').show("slow");
     });
    $("#mostrar6").click(function(){
      $('#target6').show(300);
      $('.target6').show("slow");
     });
    $("#mostrar7").click(function(){
      $('#target7').show(300);
      $('.target7').show("slow");
     });
    $("#mostrar8").click(function(){
      $('#target8').show(300);
      $('.target8').show("slow");
     });
    $("#mostrar9").click(function(){
      $('#target9').show(300);
      $('.target9').show("slow");
     });
    $("#mostrar10").click(function(){
      $('#target10').show(300);
      $('.target10').show("slow");
     });
    $("#mostrar11").click(function(){
      $('#target11').show(300);
      $('.target11').show("slow");
     });
    $("#mostrar12").click(function(){
      $('#target12').show(300);
      $('.target12').show("slow");
     });
    $("#mostrar13").click(function(){
      $('#target13').show(300);
      $('.target13').show("slow");
     });
    $("#mostrar14").click(function(){
      $('#target14').show(300);
      $('.target14').show("slow");
     });
    $("#mostrar15").click(function(){
      $('#target15').show(300);
      $('.target15').show("slow");
     });
    $("#mostrar16").click(function(){
      $('#target16').show(300);
      $('.target16').show("slow");
     });
    $("#mostrar17").click(function(){
      $('#target17').show(300);
      $('.target17').show("slow");
     });
    $("#mostrar18").click(function(){
      $('#target18').show(300);
      $('.target18').show("slow");
     });
    $("#mostrar19").click(function(){
      $('#target19').show(300);
      $('.target19').show("slow");
     });
    $("#mostrar20").click(function(){
      $('#target20').show(300);
      $('.target20').show("slow");
     });
    $("#mostrar21").click(function(){
      $('#target21').show(300);
      $('.target21').show("slow");
     });
    $("#mostrar22").click(function(){
      $('#target22').show(300);
      $('.target22').show("slow");
     });
    $("#mostrar23").click(function(){
      $('#target23').show(300);
      $('.target23').show("slow");
     });
    $("#mostrar24").click(function(){
      $('#target24').show(300);
      $('.target24').show("slow");
     });
    $("#mostrar25").click(function(){
      $('#target25').show(300);
      $('.target25').show("slow");
     });
    $("#mostrar26").click(function(){
      $('#target26').show(300);
      $('.target26').show("slow");
     });
    $("#mostrar27").click(function(){
      $('#target27').show(300);
      $('.target27').show("slow");
     });
    $("#mostrar28").click(function(){
      $('#target28').show(300);
      $('.target28').show("slow");
     });
    $("#mostrar29").click(function(){
      $('#target29').show(300);
      $('.target29').show("slow");
     });
    $("#ocultar").click(function(){
      $('#target').hide(300);
      $('.target').hide("fast");
     });
  });
</script>

<style type="text/css">
    .img-container2 img
      {
          width: 100px;
          height: 100px;
          border-radius: 5px;
          cursor: pointer;
          transition: 0.3s;
          
      }
      .img-container img
      {
          width: 50px;
          height: 50px;
          border-radius: 5px;
          cursor: pointer;
          transition: 0.3s;
          
      }

      .img-container3 img
      {
          width: 700px;
          height: 500px;
          border-radius: 5px;
          cursor: pointer;
          transition: 0.3s;
          
      }

      

  </style>

<section class="ftco-section ftco-degree-bg" style="background-color: #eeeeee;">
        <div class="container">
          <div class="row">
              <?php
              $pu=0;
              foreach ($publicaciones as $row) 
              {
                if($row->tipo == 2)
                {
                  echo"<div class='col-md-8 ftco-animate'>";
                  echo"<div id='".$row->id."'>
                  <h2 style='color:#7971ea;' class='mb-3'>".$row->asunto."</h2>";
                  foreach ($login as $row2) {
                    if($row->id_login == $row2->id)
                    {
                      echo"<div class='meta'>Publicado por ".$row2->usuario." el ".$row->fecha."</div>";
                    }
                    
                  }
                  echo"<p style='color:#222831;'>".$row->texto."</p>
                  <p><div class='img-container3'><img src='".base_url()."/uploads/".$row->file."' class='img-fluid'></div></p>
                  
                    <!--<div class='tagcloud'>
                      <a style='color:black; cursor: -webkit-grab; cursor: grab;' class='zoom-btn-sm1'>Comentar</a>
                    </div>-->";
                    echo"<form action='".base_url()."Gestion/Red?pu=".$row->id."' id='form' method='post' role='form' name='form'>
                      <hr>
                      <textarea id='msg' name='comentario' placeholder='Comentario...'></textarea>
                      <br></br>
                      <div class='tagcloud'>
                      <input type='submit' name='fileSubmit0' value='Comentar' id='submit'></input>
                      </div>
                      </form>";
                  
                  $i=0;
                  $comment = array();
                  foreach ($comentario as $row3) 
                  {
                    if($row3->id_publicaciones == $row->id)
                    {

                      $comment[$i] = $row3;
                      $i++;
                    }
                  }
                  echo"
                  
                    <a style='cursor: -webkit-grab; cursor: grab;' id='mostrar".$pu."' name='boton1' value='Click para mostrar elementos'><h3 class='mb-5' style='color:#222831;text-decoration:underline;'>".count($comment)." Comentarios</h3></a>";
                  

                echo"<ul id='target".$pu."' class='target".$pu."' style='display:none;'>";
                
                for ($i=0; $i < count($comment) ; $i++) 
                { 
                  echo"
                  <li class='comment'>
                    <!--<div class='vcard bio'>
                      <img src='images/person_1.jpg' alt='Image placeholder'>
                    </div>-->
                    <div class='comment-body'>";
                    foreach ($login as $row2) 
                    {
                      if($row2->id == $comment[$i]->id_login)
                      {
                        echo"<h5 style='color:#222831;'>".$row2->usuario."</h5>";
                      } 
                    }
                      
                      echo"<div class='meta'>".$comment[$i]->fecha."</div>
                      <p style='color:#222831;'>".$comment[$i]->comentario."</p>
                      <!--<p><a href='' class='reply'>Reply</a></p>-->
                    </div>
                  </li>";
                }
              }

              if($row->tipo == 1)
                {
                  echo"<div class='col-md-8 ftco-animate'>";
                  echo"<div id='".$row->id."'>
                  <h2 style='color:#7971ea;'' class='mb-3'>".$row->asunto."</h2>";
                  foreach ($login as $row2) {
                    if($row->id_login == $row2->id)
                    {
                      echo"<div class='meta'>Publicado por ".$row2->usuario." el ".$row->fecha."</div>";
                    }
                    
                  }
                  echo"<p style='color:#222831;'>".$row->texto."</p>
                  <video controls loop>
                    <source src='".base_url()."/uploads/".$row->file."' type='video/mp4'>
                  </video>
                  
                    <!--<div class='tagcloud'>
                      <a style='color:black; cursor: -webkit-grab; cursor: grab;' class='zoom-btn-sm1'>Comentar</a>
                    </div>-->";
                    echo"<form action='".base_url()."Gestion/Red?pu=".$row->id."' id='form' method='post' role='form' name='form'>
                      <hr>
                      <textarea id='msg' name='comentario' placeholder='Comentario...'></textarea>
                      <br></br>
                      <div class='tagcloud'>
                      <input type='submit' name='fileSubmit0' value='Comentar' id='submit'></input>
                      </div>
                      </form>";
                  
                  $i=0;
                  $comment = array();
                  foreach ($comentario as $row3) 
                  {
                    if($row3->id_publicaciones == $row->id)
                    {

                      $comment[$i] = $row3;
                      $i++;
                    }
                  }
                  echo"
                  
                    <a style='cursor: -webkit-grab; cursor: grab;' id='mostrar".$pu."' name='boton1' value='Click para mostrar elementos'><h3 class='mb-5' style='color:#222831;'>".count($comment)." Comentarios</h3></a>";
                  

                echo"<ul id='target".$pu."' class='target".$pu."' style='display:none;'>";
                
                for ($i=0; $i < count($comment) ; $i++) 
                { 
                  echo"
                  <li class='comment'>
                    <!--<div class='vcard bio'>
                      <img src='images/person_1.jpg' alt='Image placeholder'>
                    </div>-->
                    <div class='comment-body'>";
                    foreach ($login as $row2) 
                    {
                      if($row2->id == $comment[$i]->id_login)
                      {
                        echo"<h5 style='color:#222831;'>".$row2->usuario."</h5>";
                      } 
                    }
                      
                      echo"<div class='meta'>".$comment[$i]->fecha."</div>
                      <p style='color:#222831;'>".$comment[$i]->comentario."</p>
                      <!--<p><a href='' class='reply'>Reply</a></p>-->
                    </div>
                  </li>";
                }
              }

              if($row->tipo == 3)
                {
                  echo"<div class='col-md-8 ftco-animate'>";
                  echo"<div id='".$row->id."'>
                  <h2 style='color:#7971ea;' class='mb-3'>".$row->asunto."</h2>";
                  foreach ($login as $row2) {
                    if($row->id_login == $row2->id)
                    {
                      echo"<div class='meta'>Publicado por ".$row2->usuario." el ".$row->fecha."</div>";
                    }
                    
                  }
                  echo"<p style='color:#222831;'>".$row->texto."</p>";
                  echo"
                  
                    <!--<div class='tagcloud'>
                      <a style='color:black; cursor: -webkit-grab; cursor: grab;' class='zoom-btn-sm1'>Comentar</a>
                    </div>-->";
                    echo"<form action='".base_url()."Gestion/Red?pu=".$row->id."' id='form' method='post' role='form' name='form'>
                      <hr>
                      <textarea id='msg' name='comentario' placeholder='Comentario...'></textarea>
                      <br></br>
                      <div class='tagcloud'>
                      <input type='submit' name='fileSubmit0' value='Comentar' id='submit'></input>
                      </div>
                      </form>";
                  
                  $i=0;
                  $comment = array();
                  foreach ($comentario as $row3) 
                  {
                    if($row3->id_publicaciones == $row->id)
                    {

                      $comment[$i] = $row3;
                      $i++;
                    }
                  }
                  echo"
                  
                    <a style='cursor: -webkit-grab; cursor: grab;' id='mostrar".$pu."' name='boton1' value='Click para mostrar elementos'><h3 class='mb-5' style='color:#222831;text-decoration:underline;'>".count($comment)." Comentarios</h3></a>";
                  

                echo"<ul id='target".$pu."' class='target".$pu."' style='display:none;'>";
                
                for ($i=0; $i < count($comment) ; $i++) 
                { 
                  echo"
                  <li class='comment'>
                    <!--<div class='vcard bio'>
                      <img src='images/person_1.jpg' alt='Image placeholder'>
                    </div>-->
                    <div class='comment-body'>";
                    foreach ($login as $row2) 
                    {
                      if($row2->id == $comment[$i]->id_login)
                      {
                        echo"<h5 style='color:#222831'>".$row2->usuario."</h5>";
                      } 
                    }
                      
                      echo"<div class='meta'>".$comment[$i]->fecha."</div>
                      <p style='color:#222831;'>".$comment[$i]->comentario."</p>
                      <!--<p><a href='' class='reply'>Reply</a></p>-->
                    </div>
                  </li>";
                }
              }
   
                echo"</ul>
                
              </div>
              </div>";

              echo"<div id='abc1'>
                
                    <div id='popupContact'>
                      <form action='".base_url()."Gestion/Red?pu=".$row->id."' id='form' method='post' role='form' name='form'>
                      <div class='img-container'><img id='close' src='".base_url()."/assets/img/Red/close.png' onclick ='div_hide1()''></div>
                      <h2 style='color:black;'><i style='color:gray;' class='fa fa-edit fa-2x'></i> Estado".$row->id."</h2>
                      <hr>
                      <textarea id='msg' name='comentario' placeholder='Comentario...'></textarea>
                      <br></br>
                      <input type='submit' name='fileSubmit0' value='Publicar' id='submit'></input>
                      </form>
                    </div>
                  </div>";
            
            if($pu==0):?>

              <div class="col-md-4 sidebar ftco-animate">
              <!--<div class="sidebar-box ftco-animate">
                <div class="categories">
                  <h3>Categories</h3>
                  <li><a href="#">Tour <span>(12)</span></a></li>
                  <li><a href="#">Hotel <span>(22)</span></a></li>
                  <li><a href="#">Coffee <span>(37)</span></a></li>
                  <li><a href="#">Drinks <span>(42)</span></a></li>
                  <li><a href="#">Foods <span>(14)</span></a></li>
                  <li><a href="#">Travel <span>(140)</span></a></li>
                </div>
              </div>-->

              <div class="sidebar-box ftco-animate">
                <h3 style="color:#222831;">Mis publicaciones</h3>
                <?php

                foreach ($publicaciones as $row) 
                {
                    if($row->id_login == $id)
                    {
                      if($row->tipo == 2)
                      {
                          echo"

                        <div class='block-21 mb-4 d-flex'>
                          <div class='img-container2'>
                          <a class='blog-img mr-4'><img src='".base_url()."/uploads/".$row->file."'></a>
                        </div>
                          <div class='text'>
                            <h3 class='heading'><a style='color:#7971ea;' href='#".$row->id."'>".$row->asunto."</a></h3>
                            <div class='meta'>
                              <div><a></span>".$row->fecha."</a></div>
                              <div><a></span>".$user."</a></div>
                            </div>
                          </div>
                        </div>";
                      }
                      else
                      {
                        echo"

                        <div class='block-21 mb-4 d-flex'>
                          <div class='text'>
                            <h3 class='heading'><a style='color:black;' href='#".$row->id."'>".$row->asunto."</a></h3>
                            <div class='meta'>
                              <div><a></span>".$row->fecha."</a></div>
                              <div><a>".$user."</a></div>
                            </div>
                          </div>
                        </div>";
                      }

                    }

                
                      
                }?>

                </div>
              <!--<div class="sidebar-box ftco-animate">
                <h3>Tag Cloud</h3>
                <div class="tagcloud">
                  <a href="#" class="tag-cloud-link">dish</a>
                  <a href="#" class="tag-cloud-link">menu</a>
                  <a href="#" class="tag-cloud-link">food</a>
                  <a href="#" class="tag-cloud-link">sweet</a>
                  <a href="#" class="tag-cloud-link">tasty</a>
                  <a href="#" class="tag-cloud-link">delicious</a>
                  <a href="#" class="tag-cloud-link">desserts</a>
                  <a href="#" class="tag-cloud-link">drinks</a>
                </div>
              </div>

              <div class="sidebar-box ftco-animate">
                <h3>Paragraph</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
              </div>-->
            </div>

          </div>

        <?php endif;

          

            $pu++;
            }?>
          
        </div>
      </section>




<a href="#0" class="cd-top js-cd-top">Top</a>

  <div class="zoom">

    <a class="zoom-fab zoom-btn-large" id="zoomBtn"><i style="color:white;" class="fa fa-bars"></i></a>

    <ul class="zoom-menu">
      <li><a class="zoom-fab zoom-btn-sm2 zoom-btn-person scale-transition scale-out"><i style="color:white;" class="fa fa-play-circle"></i></a></li>
      <li><a class="zoom-fab zoom-btn-sm4 zoom-btn-doc scale-transition scale-out"><i style="color:white;" class="fa fa-edit"></i></a></li>
      <li><a class="zoom-fab zoom-btn-sm3 zoom-btn-tangram scale-transition scale-out"><i style="color:white;" class="fa fa-image"></i></a></li>
    </ul>
  </div>


  <div id="abc1">
        <!-- Popup Div Starts Here -->
          <div id="popupContact">
          <!-- Contact Us Form -->
          <form action="<?php echo base_url()?>Gestion/Red?pu=4" id="form" method="post" role="form" name="form">
          <div class="img-container"><img id="close" src="<?php echo base_url() ?>/assets/img/Red/close.png" onclick ="div_hide1()"></div>
          <h2 style="color:black;"><i style="color:gray;" class="fa fa-edit fa-2x"></i> Estado</h2>
          <hr>
          <textarea id="msg" name="comentario" placeholder="Comentario..."></textarea>
          <br></br>
          <input type="submit" name="fileSubmit0" value="Publicar" id="submit"></input>
          </form>
          </div>
          <!-- Popup Div Ends Here -->
        </div>


<div id="abc">
        <!-- Popup Div Starts Here -->
          <div id="popupContact">
          <!-- Contact Us Form -->
          <form action="<?php echo base_url()?>Gestion/Red" id="form" method="post" role="form" name="form" enctype="multipart/form-data">
          <div class="img-container"><img id="close" src="<?php echo base_url() ?>/assets/img/Red/close.png" onclick ="div_hide()"></div>
          <h2 style="color:black;"><i style="color:red;" class="fa fa-play-circle fa-2x"></i> Video</h2>
          <hr>
          <input id="name" name="asunto" type="text" placeholder="Asunto">
          <textarea id="msg" name="comentario" placeholder="Comentario..."></textarea>
          <input type="file" name="files[]">
          <br></br>
          <input type="submit" name="fileSubmit1" value="Publicar" id="submit"></input>
          </form>
          </div>
        <!-- Popup Div Ends Here -->
        </div>


        <div id="abc3">
        <!-- Popup Div Starts Here -->
          <div id="popupContact">
          <!-- Contact Us Form -->
          <form action="<?php echo base_url()?>Gestion/Red" id="form" method="post" role="form" name="form" enctype="multipart/form-data">
          <div class="img-container"><img id="close" src="<?php echo base_url() ?>/assets/img/Red/close.png" onclick ="div_hide3()"></div>
          <h2 style="color:black;"><i style="color:green;" class="fa fa fa-image fa-2x"></i> Imagen</h2>
          <hr>
          <input id="name" name="asunto" type="text" placeholder="Asunto">
          <textarea id="msg" name="comentario" placeholder="Comentario..."></textarea>
          <input type="file" name="files[]">
          <br></br>
          <input type="submit" name="fileSubmit2" value="Publicar" id="submit"></input>
          </form>
          </div>
          <!-- Popup Div Ends Here -->
        </div>

        <div id="abc4">
        <!-- Popup Div Starts Here -->
          <div id="popupContact">
          <!-- Contact Us Form -->
          <form action="<?php echo base_url()?>Gestion/Red" id="form" method="post" role="form" name="form">
          <div class="img-container"><img id="close" src="<?php echo base_url() ?>/assets/img/Red/close.png" onclick ="div_hide4()"></div>
          <h2 style="color:black;"><i style="color:yellow;" class="fa fa-edit fa-2x"></i> Estado</h2>
          <hr>
          <input id="name" name="asunto" type="text" placeholder="Asunto">
          <textarea id="msg" name="comentario" placeholder="Comentario..."></textarea>
          <br></br>
          <input type="submit" name="fileSubmit3" value="Publicar" id="submit"></input>
          </form>
          </div>
          <!-- Popup Div Ends Here -->
        </div>

        



<script src="<?php echo base_url() ?>/assets/js/RedSocial/top.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript">
    $('#zoomBtn').click(function() {
  $('.zoom-btn-sm1').toggleClass('scale-out');
  $('.zoom-btn-sm2').toggleClass('scale-out');
  $('.zoom-btn-sm3').toggleClass('scale-out');
  $('.zoom-btn-sm4').toggleClass('scale-out');
  
  });

  $('.zoom-btn-sm1').click(function() {
    document.getElementById('abc1').style.display = "block";
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
  $('.zoom-btn-sm5').click(function() {
    document.getElementById('abc5').style.display = "block";
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

  function div_hide1(){
  document.getElementById('abc1').style.display = "none";
  }
  </script>



  




    