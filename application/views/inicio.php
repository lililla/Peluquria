<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>HTML Template</title>

	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Welcome/bootstrap.min.css" />

	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>/assets/css/Welcome/style.css" />
</head>

<body>
	<!-- Header -->
	<header id="home">
		<!-- Background Image -->
		<div class="bg-img" style="background-image: url('<?php echo base_url() ?>/assets/img/Welcome/background1.jpg');">
			<div class="overlay"></div>
		</div>
	
		<div class="home-wrapper">
				<div class="row">

					<!-- home content -->
					<div class="col-md-10 col-md-offset-1">
						<div class="home-content">
							<h1 class="white-text">We Are Creative Agency</h1>
							<p class="white-text">Morbi mattis felis at nunc. Duis viverra diam non justo. In nisl. Nullam sit amet magna in magna gravida vehicula. Mauris tincidunt sem sed arcu. Nunc posuere.
							</p>
							<a href="<?php echo site_url() ?>Gestion/inicio"><img src="<?php echo base_url() ?>/assets/img/Home/image_1.jpg" alt="Go to W3Schools!" width="160" height="220" border="100"></img></a>
							<a href="<?php echo site_url() ?>Gestion/inicio"><img src="<?php echo base_url() ?>/assets/img/Home/image_2.jpg" alt="Go to W3Schools!" width="160" height="220" border="100"></img></a>
						</div>
					</div>

				</div>
			
		</div>


	</header>

</body>

</html>