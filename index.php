<?php require_once('autoload.php'); ?>
	<!DOCTYPE html>
	<html lang="es" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="Colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Laboratorio Clinico</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">=
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">
			<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>

			<!-- Start Header Area -->
			<header class="default-header">
				<div class="container">
					<div class="header-wrap">
						<div class="header-top d-flex justify-content-between align-items-center">
							<div class="logo">
								<a href="#inicio"><img src="img/logo.png" alt=""></a>
							</div>
							<div class="main-menubar d-flex align-items-center">
								<nav class="hide">
									<a href="#inicio">Inicio</a>
									<a href="#servicio">Servicio</a>
									<a href="#consultas">Consultas</a>
									<a href="#personal">Personal</a>
								</nav>
								<div class="menu-bar"><span class="lnr lnr-menu"></span></div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- End Header Area -->

			<!-- start banner Area -->
			<section class="banner-area relative" id="inicio">
				<div class="container">
						<div class="row fullscreen align-items-center justify-content-center">
							<div class="banner-content col-lg-6 col-md-12">
								<h1 class="text-uppercase">
									Somos un equipo <br>
									de excelencia
								</h1>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.
								</p>
								<a class="primary-btn2 mt-20 text-uppercase" href="#personal">Conocenos<span class="lnr lnr-arrow-right"></span></a>
							</div>
							<div class="col-lg-6 d-flex align-self-end img-right">
								<img class="img-fluid" src="img/header-img.png" alt="">
							</div>
						</div>
				</div>
			</section>
			<!-- End banner Area -->

			<!-- Start feature Area -->
			<section class="feature-area section-gap" id="servicio">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="single-feature d-flex flex-row pb-30">
								<div class="icon">
									<span class="lnr lnr-rocket"></span>
								</div>
								<div class="desc">
									<h4 class="text-uppercase">24/7 emergency</h4>
									<p>
										inappropriate behavior is often laughed off as “boys will be boys,” <br> women face higher conduct women face higher conduct.
									</p>
								</div>
							</div>
							<div class="single-feature d-flex flex-row pb-30">
								<div class="icon">
									<span class="lnr lnr-chart-bars"></span>
								</div>
								<div class="desc">
									<h4 class="text-uppercase">X-Ray servicio</h4>
									<p>
										inappropriate behavior is often laughed off as “boys will be boys,” <br> women face higher conduct women face higher conduct.
									</p>
								</div>
							</div>
							<div class="single-feature d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-bug"></span>
								</div>
								<div class="desc">
									<h4 class="text-uppercase">Cuidado Intensivo</h4>
									<p>
										inappropriate behavior is often laughed off as “boys will be boys,” <br> women face higher conduct women face higher conduct.
									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="single-feature d-flex flex-row pb-30">
								<div class="icon">
									<span class="lnr lnr-heart-pulse"></span>
								</div>
								<div class="desc">
									<h4 class="text-uppercase">24/7 emergency</h4>
									<p>
										inappropriate behavior is often laughed off as “boys will be boys,” <br> women face higher conduct women face higher conduct.
									</p>
								</div>
							</div>
							<div class="single-feature d-flex flex-row pb-30">
								<div class="icon">
									<span class="lnr lnr-paw"></span>
								</div>
								<div class="desc">
									<h4 class="text-uppercase">X-Ray servicio</h4>
									<p>
										inappropriate behavior is often laughed off as “boys will be boys,” <br> women face higher conduct women face higher conduct.
									</p>
								</div>
							</div>
							<div class="single-feature d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-users"></span>
								</div>
								<div class="desc">
									<h4 class="text-uppercase">Intensive Care</h4>
									<p>
										inappropriate behavior is often laughed off as “boys will be boys,” <br> women face higher conduct women face higher conduct.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End feature Area -->


			<!-- Start about Area -->
			<section class="about-area" id="consultas">
				<div class="container-fluid">
					<div class="row d-flex justify-content-end align-items-center">
						<div class="col-lg-6 col-md-12 about-left no-padding">
							<img class="img-fluid" src="img/about-img.jpg" alt="">
						</div>
						<div class="col-lg-6 col-md-12 about-right no-padding">
							<h1>Book an <br> Appoinment</h1>
							<form class="booking-form" id="myForm" action="donate.php">
								 	<div class="row">
								 		<div class="col-lg-12 d-flex flex-column">
							 				<input name="name" placeholder="Patient name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Patient name'" class="form-control mt-20" required="" type="text" required>
								 		</div>
							 			<div class="col-lg-6 d-flex flex-column">
											<input name="phone" placeholder="Phone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'" class="form-control mt-20" required="" type="text" required>
										</div>
										<div class="col-lg-6 d-flex flex-column">
											<input id="datepicker2" name="app-date" class="single-in mt-20"  onblur="this.placeholder = 'Appoinment date'" type="text" placeholder="Appoinment date" required>
										</div>
										<div class="col-lg-12 flex-column">
											<textarea class="form-control mt-20" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
										</div>

										<div class="col-lg-12 d-flex justify-content-end send-btn">
											<button class="submit-btn primary-btn mt-20 text-uppercase ">confirm booking<span class="lnr lnr-arrow-right"></span></button>
										</div>

										<div class="alert-msg"></div>
									</div>
					  		</form>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End about Area -->

			<!-- Start consultans Area -->
			<section class="consultans-area section-gap" id="personal">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-8 pb-80 header-text">
							<h1>Our Consultants</h1>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> labore  et dolore magna aliqua.
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3 col-md-3 vol-wrap">
							<div class="single-con">
								<div class="content">
								    <a href="#" target="_blank">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/c1.jpg" alt="">
								      	<div class="content-details fadeIn-bottom">
								      		<h4>Andy Florence</h4>
								      		<p>
								      			inappropriate behavior
								      		</p>
								      	</div>
								    </a>
								 </div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 vol-wrap">
							<div class="single-con">
								<div class="content">
								    <a href="#" target="_blank">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/c2.jpg" alt="">
								      	<div class="content-details fadeIn-bottom">
								      		<h4>Andy Florence</h4>
								      		<p>
								      			inappropriate behavior
								      		</p>
								      	</div>
								    </a>
								 </div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 vol-wrap">
							<div class="single-con">
								<div class="content">
								    <a href="#" target="_blank">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/c3.jpg" alt="">
								      	<div class="content-details fadeIn-bottom">
								      		<h4>Andy Florence</h4>
								      		<p>
								      			inappropriate behavior
								      		</p>
								      	</div>
								    </a>
								 </div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 vol-wrap">
							<div class="single-con">
								<div class="content">
								    <a href="#" target="_blank">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/c4.jpg" alt="">
								      	<div class="content-details fadeIn-bottom">
								      		<h4>Andy Florence</h4>
								      		<p>
								      			inappropriate behavior
								      		</p>
								      	</div>
								    </a>
								 </div>
							</div>
						</div>

					</div>
				</div>
			</section>
			<!-- End consultans Area -->

			<!-- Start fact Area -->
			<section class="facts-area pt-100 pb-100">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6 single-fact">
							<h2 class="counter">2536</h2>
							<p class="text-uppercase">Clientes Atendidos</p>
						</div>
						<div class="col-lg-3 col-md-6 single-fact">
							<h2 class="counter">6784</h2>
							<p class="text-uppercase">Rayos-X Realizados</p>
						</div>
						<div class="col-lg-3 col-md-6 single-fact">
							<h2 class="counter">1059</h2>
							<p class="text-uppercase">Ordenes Completadas</p>
						</div>
						<div class="col-lg-3 col-md-6 single-fact">
							<h2 class="counter">2239</h2>
							<p class="text-uppercase">Casos Especiales</p>
						</div>
					</div>
				</div>
			</section>
			<!-- end fact Area -->

			<!-- Start orden Area -->
			<section class="orden-area section-gap">
				<div class="container">
          <h1>Solicita una <br> orden</h1>
          <div class="orden">
            <?php
              $query = new query;

              $secciones = $query->getRowsArray('*', 'SECCION');

              $secciones = $query->getRowsArray('*','seccion', 'ORDER BY seccion.nombreseccion');
              
              foreach ($secciones as $seccion) {
                  echo "<div class='servicio'>";
                  echo "<h1>".$seccion['NOMBRESECCION']."</h1>";
                  echo "<ul>";
                      $subcategorias = $query->getRowsArray('*','CATEGORIA','WHERE IDSECCION ='.$seccion['IDSECCION']);
                      foreach($subcategorias as $subcategoria){
                          echo "<li><input class='check' type='checkbox' name='realizar[".$subcategoria['IDCATEGORIA']."]' value='".$subcategoria['IDCATEGORIA']."' data-codigo='".$subcategoria['IDCATEGORIA']."' data-costo='".$subcategoria['COSTO']."' data-nombre='".$subcategoria['NOMBRECATEGORIA']."'/><span>".$subcategoria['NOMBRECATEGORIA']." : </span><span>".$subcategoria['COSTO']."Bs.</span></li>";
                      }
                  echo "</ul>";
                  echo "</div>";
              }
            ?>
          </div>
				</div>
			</section>
			<!-- end orden Area -->

			<!-- start footer Area -->
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-2  col-md-6">
							<div class="single-footer-widget">
								<h6>Informacion</h6>
								<ul class="footer-nav">
									<li><a href="#">Managed Website</a></li>
									<li><a href="#">Manage Reputation</a></li>
									<li><a href="#">Power Tools</a></li>
									<li><a href="#">Marketing servicio</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-4  col-md-6">
							<div class="single-footer-widget mail-chimp">
								<h6 class="mb-20">Contact Us</h6>
								<p>
									Av. Blanco Galindo Km. 3
								</p>
								<h3>+591 - 4123456 (oficina)</h3>
								<h3>+591 - 4123123 (fax)</h3>
							</div>
						</div>
						<div class="col-lg-6  col-md-12">
							<div class="single-footer-widget newsletter">
								<h6>Intranet</h6>
								<p>Acceso a intranet para personal.</p>
								<div id="mc_embed_signup">
									<form novalidate="true" action="administrador/index.php" method="post" class="form-inline">

										<div class="form-group row" style="width: 100%">
											<div class="col-lg-8 col-md-12">
												<input name="login" placeholder="Usuario" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Usuario '" required="" type="email">
												<input name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password '" required="" type="email">
											</div>

											<div class="col-lg-4 col-md-12">
												<button class="nw-btn primary-btn">Entrar<span class="lnr lnr-arrow-right"></span></button>
											</div>
										</div>
										<div class="info"></div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<div class="row footer-bottom d-flex justify-content-between">
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</footer>
			<!-- End footer Area -->

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>
			<script src="js/jquery.sticky.js"></script>
			<script src="js/parallax.min.js"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>
			<script src="js/waypoints.min.js"></script>
			<script src="js/jquery.counterup.min.js"></script>
			<script src="js/main.js"></script>
		</body>
	</html>
