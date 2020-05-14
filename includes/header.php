<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> <?php echo _telefono;?></a></li>
								<li><a href="mailto:<?php echo _email;?>"><i class="fa fa-envelope"></i> <?php echo _email;?></a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="" target="_blank"><i class="fa fa-youtube"></i></a></li>
								
								<li><a href="" target="_blank"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/<?php echo _logo;?>" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<?php /*?><div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div><?php */?>
							<?php BloqueIdiomas();?>
							
							<?php BloqueMonedas(); ?>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								<li><a href="usuario-lista-deseos.php" class="destinodeseos"><i class="fa fa-heart"></i> <?php echo _T3;?></a></li>
								<li><a href="usuario-lista-comparar.php" class="destinocomparar"><i class="fa fa-bars "></i> <?php echo _T4;?></a></li>
								<li><a href="carrito.php"><i class="fa fa-shopping-cart"></i> <?php echo _T5;?> <?php
									if ((isset($_SESSION['tienda2017Front_UserId'])) || (isset($_SESSION['MM2_Temporal'])))
										MostrarCantidadCarrito();?></a></li>
								<?php if (!isset($_SESSION['tienda2017Front_UserId'])){?>
								<li><a href="login.php"><i class="fa fa-lock"></i> <?php echo _T6;?></a></li>
								<?php }
								else {
									echo '<li><a href="#"><i class="fa fa-user"></i> '. ObtenerNombreUsuario($_SESSION['tienda2017Front_UserId']).'</a></li>';
									echo '<li><a href="logout.php"><i class="fa fa-times-circle  "></i> '._T7.'</a></li>';
								}?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" ><?php echo _T1;?></a></li>
								
								<li><a href="contacto.php"><?php echo _T2;?></a></li>
							</ul>
						</div>
					</div>
					<?php /*?><div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div><?php */?>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header>