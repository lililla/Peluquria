<script src="<?php echo base_url() ?>/assets/js/Galeria/jssor.slider.min.js" type="text/javascript"></script>


<div class="hero-wrap" style="background-image: url('<?php echo base_url() ?>/assets/img/Home/bg_2.jpg');" data-stellar-background-ratio="0.5">
	      <div class="overlay"></div>
	      <div class="container">
	        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
	          <div class="col-md-6 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
	          	<h1 class="mb-3 mt-5 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Gallery</h1>
	            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Gallery</span></p>
	          </div>
	        </div>
	      </div>
	    </div>

	    <section class="ftco-gallery">
	    	<div class="container">
	    		<div class="row justify-content-center mb-5 pb-3">
	          <div class="col-md-7 heading-section ftco-animate text-center">
	            <h2 class="mb-4">Our Gallery</h2>
	            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
	            <p class="mt-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
	          </div>
	        </div>
	    	</div>
	    	<div class="container-wrap">
	    		<div class="row no-gutters">
						<div class="col-md-3 ftco-animate">
							<a class="gallery img d-flex align-items-center" style="background-image: url('<?php echo base_url() ?>/assets/img/Galeria/gallery-1.jpg');">
							</a>
						</div>
						<div class="col-md-3 ftco-animate">
							<a class="gallery img  d-flex align-items-center" style="background-image: url('<?php echo base_url() ?>/assets/img/Galeria/gallery-2.jpg');">
							</a>
						</div>
						<div class="col-md-3 ftco-animate">
							<a class="gallery img d-flex align-items-center" style="background-image: url('<?php echo base_url() ?>/assets/img/Galeria/gallery-3.jpg');">
							</a>
						</div>
						<div class="col-md-3 ftco-animate">
							<a class="gallery img d-flex align-items-center" style="background-image: url('<?php echo base_url() ?>/assets/img/Galeria/gallery-4.jpg');">
							</a>
						</div>
						<div class="col-md-3 ftco-animate">
							<a class="gallery img d-flex align-items-center" style="background-image: url('<?php echo base_url() ?>/assets/img/Galeria/gallery-5.jpg');">
							</a>
						</div>
						<div class="col-md-3 ftco-animate">
							<a class="gallery img d-flex align-items-center" style="background-image: url('<?php echo base_url() ?>/assets/img/Galeria/gallery-6.jpg');">
							</a>
						</div>
						<div class="col-md-3 ftco-animate">
							<a class="gallery img d-flex align-items-center" style="background-image: url('<?php echo base_url() ?>/assets/img/Galeria/gallery-7.jpg');">
							</a>
						</div>
						<div class="col-md-3 ftco-animate">
							<a class="gallery img d-flex align-items-center" style="background-image: url('<?php echo base_url() ?>/assets/img/Galeria/gallery-8.jpg');">
							</a>
						</div>
	        </div>
	    	</div>
	    </section>


	    <script src="../js/jssor.slider.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            //Reference https://www.jssor.com/help/layer-animation.html
            var jssor_1_SlideoTransitions = [
              [{b:0,d:600,y:-290,e:{y:27}}],
              [{b:0,d:1000,y:185},{b:1000,d:500,o:-1},{b:1500,d:500,o:1},{b:2000,d:1500,r:360},{b:3500,d:1000,rX:30},{b:4500,d:500,rX:-30},{b:5000,d:1000,rY:30},{b:6000,d:500,rY:-30},{b:6500,d:500,sX:1},{b:7000,d:500,sX:-1},{b:7500,d:500,sY:1},{b:8000,d:500,sY:-1},{b:8500,d:500,kX:30},{b:9000,d:500,kX:-30},{b:9500,d:500,kY:30},{b:10000,d:500,kY:-30},{b:10500,d:500,c:{x:87.50,t:-87.50}},{b:11000,d:500,c:{x:-87.50,t:87.50}}],
              [{b:0,d:600,x:410,e:{x:27}}],
              [{b:-1,d:1,o:-1},{b:0,d:600,o:1,e:{o:5}}],
              [{b:-1,d:1,c:{x:175.0,t:-175.0}},{b:0,d:800,c:{x:-175.0,t:175.0},e:{c:{x:7,t:7}}}],
              [{b:-1,d:1,o:-1},{b:0,d:600,x:-570,o:1,e:{x:6}}],
              [{b:-1,d:1,o:-1,r:-180},{b:0,d:800,o:1,r:180,e:{r:7}}],
              [{b:0,d:1000,y:80,e:{y:24}},{b:1000,d:1100,x:570,y:170,o:-1,r:30,sX:9,sY:9,e:{x:2,y:6,r:1,sX:5,sY:5}}],
              [{b:2000,d:600,rY:30}],
              [{b:0,d:500,x:-105},{b:500,d:500,x:230},{b:1000,d:500,y:-120},{b:1500,d:500,x:-70,y:120},{b:2600,d:500,y:-80},{b:3100,d:900,y:160,e:{y:24}}],
              [{b:0,d:1000,o:-0.4,rX:2,rY:1},{b:1000,d:1000,rY:1},{b:2000,d:1000,rX:-1},{b:3000,d:1000,rY:-1},{b:4000,d:1000,o:0.4,rX:-1,rY:-1}]
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $Idle: 2000,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions,
                $Breaks: [
                  [{d:2000,b:1000}]
                ]
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 600);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/

            var progressElement = document.getElementById("progress-element");

            function ProgressChangeEventHandler(slideIndex, progress, progressBegin, idleBegin, idleEnd, progressEnd) {
                //this event continuously fires within the process of current slide

                //slideIndex: the index of slide
                //progress: current time in the whole process
                //progressBegin: the begining of the whole process (generally, layer animation starts to play in)
                //idleBegin: captions played in and become idle, will wait for a period which is specified by option '$Idle' (or a break point created using slider maker)
                //idleEnd: the idle time is over, play the rest until progressEnd
                //progressEnd: the whole process has been completed

                if (progressEnd > 0) {
                    var progressPercent = progress / progressEnd * 100 + "%";
                    progressElement.style.width = progressPercent;
                }
            }

            jssor_1_slider.$On($JssorSlider$.$EVT_PROGRESS_CHANGE, ProgressChangeEventHandler);
        };
    </script>
    <section class="ftco-section">
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:600px;height:300px;overflow:hidden;visibility:hidden;">
        
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../svg/loading/static-svg/spin.svg" />
        </div>

        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:600px;height:300px;overflow:hidden;">
            <div>
                <img data-u="image" src="<?php echo base_url() ?>/assets/img/Galeria/980x380/002.jpg" />
                <div data-u="caption" data-t="0" style="position:absolute;top:320px;left:30px;width:350px;height:30px;z-index:0;background-color:rgba(235,81,0,0.5);font-size:20px;color:#ffffff;line-height:30px;text-align:center;">mobile ready, touch swipe</div>
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url() ?>/assets/img/Galeria/980x380/007.jpg" />
                <div data-u="caption" data-t="1" data-3d="1" style="position:absolute;top:-50px;left:125px;width:350px;height:30px;z-index:0;background-color:rgba(235,81,0,0.5);font-size:20px;color:#ffffff;line-height:30px;text-align:center;">time lined layer animation</div>
            </div>
            <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
        		<div class="staff">
      				<div class="img mb-4" style="background-image: url('<?php echo base_url() ?>/assets/img/Galeria/person_4.jpg');"></div>
      				<div class="info text-center">
      					<h3><a href="teacher-single.html">Los tupés están de moda</a></h3>
      					<span class="position">Alex Piñero</span>
      					<div class="text">
	        				<p>El tupé es el peinado por excelencia que más ha estado de moda en los últimos años.</p>
	        			</div>
      				</div>
        		</div>
        	</div>
            <div>
                <img data-u="image" src="<?php echo base_url() ?>/assets/img/Galeria/980x380/004.jpg" />
                <div data-u="caption" data-t="3" style="position:absolute;top:30px;left:30px;width:350px;height:30px;z-index:0;background-color:rgba(235,81,0,0.5);font-size:20px;color:#ffffff;line-height:30px;text-align:center;">responsive, scale smoothly</div>
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url() ?>/assets/img/Galeria/980x380/005.jpg" />
                <div data-u="caption" data-t="4" style="position:absolute;top:30px;left:30px;width:350px;height:30px;z-index:0;background-color:rgba(235,81,0,0.6);font-size:20px;color:#ffffff;line-height:30px;text-align:center;">image, text, and custom layers</div>
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url() ?>/assets/img/Galeria/980x380/006.jpg" />
                <div data-u="caption" data-t="5" style="position:absolute;top:30px;left:600px;width:350px;height:30px;z-index:0;background-color:rgba(235,81,0,0.5);font-size:20px;color:#ffffff;line-height:30px;text-align:center;">tons of transition type</div>
            </div>
            <div>
                <img data-u="image" src="<?php echo base_url() ?>/assets/img/Galeria/980x380/009.jpg" />
                <div data-u="caption" data-t="6" style="position:absolute;top:30px;left:30px;width:350px;height:30px;z-index:0;background-color:rgba(235,81,0,0.5);font-size:20px;color:#ffffff;line-height:30px;text-align:center;">visual slider maker</div>
            </div>
            <div data-b="0">
                <img data-u="image" src="<?php echo base_url() ?>/assets/img/Galeria980x380/008.jpg" />
                <div data-u="caption" data-t="7" style="position:absolute;top:-50px;left:30px;width:350px;height:30px;z-index:0;background-color:rgba(235,81,0,0.5);font-size:20px;color:#ffffff;line-height:30px;text-align:center;">play in and play out</div>
            </div>
            <div data-p="112.50">
                <img data-u="image" src="<?php echo base_url() ?>/assets/img/980x380/011.jpg" />
                <div data-u="caption" data-t="8" data-3d="1" style="position:absolute;top:25px;left:150px;width:250px;height:250px;z-index:0;background-color:rgba(40,177,255,0.6); overflow:hidden;">
                    <div data-u="caption" data-t="9" style="position:absolute;top:100px;left:25px;width:200px;height:50px;z-index:0;font-size:24px;line-height:50px;">A Child Layer</div>
                </div>
            </div>
            <div data-p="112.50">
                <img data-u="image" src="<?php echo base_url() ?>/assets/img/Galeria/980x380/010.jpg" />
                <div data-u="caption" data-t="10" data-3d="1" style="position:absolute;top:25px;left:100px;width:250px;height:250px;z-index:0;background-color:rgba(40,177,255,0.6);">
                    <div style="margin: 15px; font-size: 20px;">
                        <p>This is full customized content layer.<br />
                        </p>
                        <p>
                            Everything is allowed

                        </p>
                        You can put

                        <a href="http://wwww.jssor.com">
                            a link
                        </a> or an image

                        <img src="../img/icons/icon_chrome.png" /> here.

                    </div>
                </div>
            </div>
            <div id="progress-element" data-u="progress" style="position: absolute; left: 0; bottom: 20px; width: 0%; height: 5px; background-color: rgba(255,255,255,0.7); z-index: 100;"></div>
        </div>


        <!--#region Arrow Navigator Skin Begin -->
        <!-- Help: https://www.jssor.com/development/slider-with-arrow-navigator.html -->
        <style>
            .jssora051 {display:block;position:absolute;cursor:pointer;}
            .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
            .jssora051:hover {opacity:.8;}
            .jssora051.jssora051dn {opacity:.5;}
            .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
        </style>
        <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
        <!--#endregion Arrow Navigator Skin End -->

    </div>
</section>
	    <section class="ftco-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Nuestros Estilos</h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <p class="mt-5">Os mostramos nuestros estilos y diseño más originales </p>
          </div>
        </div>
        <div class="row">
        	
          <?php
              $fila = 1;
             foreach ($estilo as $row ) 
             {
                $i = 0;
                echo"<div class='col-lg-3 d-flex mb-sm-4 ftco-animate'>
                  <div class='staff'>";?>
                    <div class="img mb-4" style="background-image: url('<?php echo base_url() ?>/assets/img/Galeria/person_1.jpg');"></div>
                    <?php echo"<div class='info text-center'>
                      <h3>";
                      $i = 0;
                      foreach ($ImagenEstilo as $row2 ) 
                      {
                        if($row->id == $row2->idEstilo)
                        {
                          echo"<a href='".base_url()."/uploads/".$row2->imagen."' class='image-popup-".$fila." d-flex align-items-center'>"; if($i == 0) echo $row->asunto; echo"</a></h3>";
                          $i++;   
                        }
                        
                      }
                        
                      echo"<span class='position'>Alex Piñero</span>
                      <div class='text'>
                        <p>".$row->descripcion."</p>
                      </div>
                    </div>
                  </div>
                </div>";
                $fila++;
              }?>






        	<!--<div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
        		<div class="staff">
      				<div class="img mb-4" style="background-image: url('<?php echo base_url() ?>/assets/img/Galeria/person_2.jpg');"></div>
      				<div class="info text-center">
      					<h3><a href='<?php echo base_url() ?>/assets/img/Galeria/gallery-4.jpg' class="image-popup-2 d-flex align-items-center">Corte y peinado de pelo corto</a></span></h3>
      					<span class="position">Alex Piñero</span>
      					<div class="text">
	        				<p>Ya sabemos desde hace tiempo que los cortes de pelo corto y peinados para hombres pueden ser tanto o más variados que los que suelen llevar las mujeres. </p>
	        			</div>
      				</div>
        		</div>
        	</div>
        	<div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
        		<div class="staff">
      				<div class="img mb-4" style="background-image: url('<?php echo base_url() ?>/assets/img/Galeria/person_3.jpg');"></div>
      				<div class="info text-center">
      					<h3><a href="teacher-single.html">Los peinados de Cristiano Ronaldo</a></h3>
      					<span class="position">Alex Piñero</span>
      					<div class="text">
	        				<p>Cristiano Ronaldo no es sólo uno de los mejores jugadores del mundo, sino que además se ha convertido en todo un icono de estilo para sus fieles seguidores</p>
	        			</div>
      				</div>
        		</div>
        	</div>
        	<div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
        		<div class="staff">
      				<div class="img mb-4" style="background-image: url('<?php echo base_url() ?>/assets/img/Galeria/person_4.jpg');"></div>
      				<div class="info text-center">
      					<h3><a href="teacher-single.html">Los tupés están de moda</a></h3>
      					<span class="position">Alex Piñero</span>
      					<div class="text">
	        				<p>El tupé es el peinado por excelencia que más ha estado de moda en los últimos años.</p>
	        			</div>
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


   


    <script type="text/javascript">jssor_1_slider_init();</script>





<!--Latest stable release of jQuery Core Library-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>