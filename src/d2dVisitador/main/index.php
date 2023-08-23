
<?php
	session_start();
	if( !isset($_SESSION['estatus-door2door'])  ){
		?>
		<!DOCTYPE html>
		<html lang="es">
			<head>
				<meta http-equiv='cache-control' content='no-cache'> 
                <meta http-equiv='expires' content='0'> 
                <meta http-equiv='pragma' content='no-cache'>
				<meta charset="UTF-8">
				<meta http-equiv="X-UA-Compatible" content="IE-edge">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title> d2d.mx - door to door  </title>
				<link rel="stylesheet" type="text/css" href="css/normalize.css">
				<link rel="stylesheet" type="text/css" href="css/ideatech.css">
				
				<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
				<!-- Tempusdominus Bootstrap 4 -->
				<link rel="stylesheet" href="https://d2d.mx/door2door/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
				<!-- iCheck -->
				<link rel="stylesheet" href="https://d2d.mx/door2door/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
				<!-- JQVMap -->
				<link rel="stylesheet" href="https://d2d.mx/door2door/plugins/jqvmap/jqvmap.min.css">
				<!-- Theme style -->
				<link rel="stylesheet" href="https://d2d.mx/door2door/dist/css/adminlte.min.css">
				<!-- overlayScrollbars -->
				<link rel="stylesheet" href="https://d2d.mx/door2door/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
				<!-- Daterange picker -->
				<link rel="stylesheet" href="https://d2d.mx/door2door/plugins/daterangepicker/daterangepicker.css">
				<!-- summernote -->
				<link rel="stylesheet" href="https://d2d.mx/door2door/plugins/summernote/summernote-bs4.min.css">

				<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
				<link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
				<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
				<link rel="manifest" href="/favicon/site.webmanifest">
				<link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
				<meta name="msapplication-TileColor" content="#da532c">
				<meta name="theme-color" content="#ffffff">
				<link rel="icon" type="image/x-icon" href="https://d2d.mx/door2door/Modules/ModulesImage/door2door.png">

				<style>
					.nav-panel{
						background: linear-gradient(to right, #5a569a, #b75192, #ee9424);
						color:#fff;
						border-radius:10px;
						margin:10px;
					}
				</style>
			</head>
			<body >
				<div class="container-fluid">
					<nav class=" navbar-expand-lg nav-panel">
						<div class="row" style="height:60px;" >
							<div class="col-sm-9">

							</div>
							<div class="col-sm-2" style="">
								<!-- style="border-radius:30px;color:#fff;margin-bottom: 20px;margin-right:10px;margin-left:100px;"   -->
								<a href="https://d2d.mx/d2dVisitador/login"  	id="button-inicialr-sesion-door2door" 
															style="border-radius:30px;color:#fff; margin-bottom: 20px;margin-top:10px;" 
															class="btn  btn btn-outline-primary btn-block">
									<strong>
										Ingresar
									</strong>
								</a>
							</div>
						</div>
					</nav>
					<div class="row ">
						<div class="col-sm-4"></div>
						<div class="col-sm-4  "><br><br>
							<div class="row">
								<div class="col-sm-12">
									<center>
										<h2><strong>Bienvenidos</strong></h2>
									</center>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-12">
									<center>
										
											<a href="https://d2d.mx/d2dVisitador/login"  id="button-inicialr-sesion-door2door" style="border-radius:30px"  class="btn  btn-block">
												<img class="img-fluid " class="btn btn-outline-light"    style="width:300px;height:300px;" src="assets/d2dlogo.png">
											</a>
										
									</center>
								</div>
							</div>
						</div>
						<div class="col-sm-4"></div>

					</div>
					
				</div>
				
				<script async src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDwQClTGJJEBxBdoDdpvZqj410LlfAb8FM'; ></script>
				<!-- jQuery -->
				<script src="/d2dVisitador/plugins/jquery/jquery.min.js"></script>
				<!-- jQuery UI 1.11.4 -->
				<script src="/d2dVisitador/plugins/jquery-ui/jquery-ui.min.js"></script>
				<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
				<script>
				$.widget.bridge('uibutton', $.ui.button)
				</script>
				<!-- Bootstrap 4 -->
				<script src="/d2dVisitador/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
				<!-- ChartJS -->
				<script src="/d2dVisitador/plugins/chart.js/Chart.min.js"></script>
				<!-- Sparkline
				<script src="/d2dVisitador/plugins/sparklines/sparkline.js"></script> -->
				<!-- JQVMap -->
				<script src="/d2dVisitador/plugins/jqvmap/jquery.vmap.min.js"></script>
				<script src="/d2dVisitador/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
				<!-- jQuery Knob Chart -->
				<script src="/d2dVisitador/plugins/jquery-knob/jquery.knob.min.js"></script>
				<!-- daterangepicker -->
				<script src="/d2dVisitador/plugins/moment/moment.min.js"></script>
				<script src="/d2dVisitador/plugins/daterangepicker/daterangepicker.js"></script>
				<!-- Tempusdominus Bootstrap 4 -->
				<script src="/d2dVisitador/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
				<!-- Summernote -->
				<script src="/d2dVisitador/plugins/summernote/summernote-bs4.min.js"></script>
				<!-- overlayScrollbars -->
				<script src="/d2dVisitador/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
				<!-- AdminLTE App -->
				<script src="/d2dVisitador/dist/js/adminlte.js"></script>
				<!-- AdminLTE for demo purposes -->
				<script src="/d2dVisitador/dist/js/demo.js"></script>
				<script src="https://kit.fontawesome.com/56ef72515a.js" crossorigin="anonymous"></script>
				<!-- AdminLTE dashboard demo (This is only for demo purposes) 
				<script src="/d2dVisitador/dist/js/pages/dashboard.js"></script>-->

				<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
				<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
				<link rel="icon" type="image/x-icon" href="/d2dVisitador/Modules/ModulesImage/door2door.png">

				<script>
					if (    
						navigator.userAgent.match(/Android/i)       || 
						navigator.userAgent.match(/webOS/i)         || 
						navigator.userAgent.match(/iPhone/i)        || 
						navigator.userAgent.match(/iPad/i)          || 
						navigator.userAgent.match(/iPod/i)          || 
						navigator.userAgent.match(/BlackBerry/i)    || 
						navigator.userAgent.match(/Windows Phone/i) 
					) {   
						
					}else{
						window.location.href = "/";
					}
					
				</script>

				<script >
					/*<OPTENER GEOLOCALIZACION>*/ 
						/*<VARIABLES>*/                 
							let option = {
								EnableHighAccuracy:true,
								Timeout:500,
								MaximunAge:0
							}
						/*</VARIABLES>*/  

						/*<GEOLOCALIZACION>*/
							if(navigator.geolocation){               
									navigator.geolocation.getCurrentPosition(success, error,  option); console.log("hola2")
							}else{ console.log("Inservible"); }  
						/*</GEOLOCALIZACION>*/        

						/*<SUCCESS>*/
							function success(geolocationPosition){
								let coords = geolocationPosition.coords;     
								localStorage.setItem('JSON_LOCALIZACION', JSON.stringify({lat: coords.latitude, lng: coords.longitude}));
								console.log({lat: coords.latitude, lng: coords.longitude})
							}
						/*</SUCCESS>*/

						/*<ERROR>*/
							function error(error){           
							
								//localStorage.setItem('JSON_LOCALIZACION', JSON.stringify({lat: 20.652684681069186, lng: -103.45285311189987}));
								console.log(error)
							}
						/*</ERROR>*/
					/*<OPTENER GEOLOCALIZACION>*/ 
				
				</script>

			</body>
		</html> <?php 
	}else{
		if($_SESSION['estatus-door2door'] == 'ACTIVO'){
			header('Location: http://d2d.mx/d2dVisitador/Modules/ModuleClientSugerenicas/');
		}else{
			header('Location: http://d2d.mx/d2dVisitador/Perfil/Perfil/');
		}
	}
?>
