<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="inicio.php">Tu Tienda Online.com</a>
                <?php echo MostrarVersionTienda();?>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <?php /*?><li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li><?php */?>
                <!-- /.dropdown -->
                <?php /*?><li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li><?php */?>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                       <?php $comentariospendientes=ObtenerComentariosPendientes();
						
						if ($comentariospendientes>0) {?>
                      <i class="fa fa-bell faa-ring animated"></i> <i class="fa fa-caret-down"></i>
                       
                       <?php }
                       else
                       {?>
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                       
                       <?php }?>
                       
                        
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="comentario-lista.php">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> Nuevos Comentarios
                                    <span class="pull-right text-muted small"><?php echo $comentariospendientes;?></span>
                                </div>
                            </a>
                        </li>
                       
                      
                      
                      
                     
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                       <?php /*?> <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li><?php */?>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
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
                      <?php /*?>  <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li><?php */?>
                        <li>
                            <a href="#"><i class="fa fa-archive fa-fw" title="Expande el área de Productos"></i> Productos<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
								   <li>
										<a href="categoria-lista.php" title="Listado de Categorías"><i class="fa fa-ellipsis-v  fa-fw"></i> Categorías</a>
                        			</li>
									 <li>
										<a href="marca-lista.php" title="Listado de Marcas"><i class="fa  fa-apple   fa-fw"></i> Marcas</a>
									</li>
									 <li>
										<a href="producto-lista.php" title="Listado de Productos"><i class="fa   fa-certificate    fa-fw"></i> Productos</a>
									</li>
									 <li>
										<a href="opcion-lista.php" title="Listado de Opciones de Producto"><i class="fa  fa-asterisk  fa-fw"></i> Opciones de Producto</a>
									</li>
										  <li>
										<a href="caracteristica-lista.php" title="Listado de Características de Productos"><i class="fa  fa-random     fa-fw"></i> Características de Producto</a>
									</li>                            
								</ul>
                        	</li>
                         	<li>
                            	<a href="#"><i class="fa fa-archive fa-fw" title="Expande el área de Pedidos"></i> Pedidos<span class="fa arrow"></span></a>
                              	<ul class="nav nav-second-level">
                               		<li>
                            			<a href="pedido-lista.php?ver=0" listado de Pedidos Pendientes><i class="fa fa-question-circle   fa-fw"></i> Pendientes</a>
									</li>
									 <li>
										<a href="pedido-lista.php?ver=1" title="Listado de Pedidos Completados"><i class="fa  fa-check-circle   fa-fw"></i> Completados</a>
									</li>
									 <li>
										<a href="pedido-lista.php?ver=2" title="Listado de Pedidos Anulados"><i class="fa fa-times-circle    fa-fw"></i> Anulados</a>
									</li>                    
								</ul>
                        	</li>                        
							<li>
								<a href="#"><i class="fa fa-gear fa-fw" title="Expande el área de Configuración"></i> Configuración<span class="fa arrow"></span></a>
								  	<ul class="nav nav-second-level">
										<li>
											<a href="configuracion.php" title="Configuración General de la Tienda"><i class="fa fa-gear  fa-fw"></i> Configuración General</a>
										</li>
                           				<li>
                            				<a href="redes.php" title="Configuración de las Redes Socialies de la Tienda"><i class="fa fa-comments  fa-fw"></i> Redes Sociales</a>
                        				</li>
										<li>
											<a href="usuario-lista.php" title="Listadode Usuarios"><i class="fa fa-user fa-fw"></i> Usuarios</a>
										</li>
										<li>
											<a href="slider-lista.php" title="Listado de Productos del Slider"><i class="fa  fa-arrows-h     fa-fw"></i> Slider Principal</a>
										</li>
										<li>
											<a href="comentario-lista.php" title="Listado de los Comentarios de la Tienda"><i class="fa  fa-comment    fa-fw"></i> Comentarios</a>
										</li>
										<li>
											<a href="zona-lista.php" title="Listado de las Zonas"><i class="fa  fa-suitcase    fa-fw"></i> Zonas</a>
										</li>
										<li>
											<a href="zonaimpuesto-lista.php" title="Listado de las Zonas de Impuestos"><i class="fa  fa-suitcase    fa-fw"></i> Zonas Impuestos</a>
										</li>
										<li>
											<a href="grupo-lista.php" title="Listados de los Productos con Descuentos por Grupo"><i class="fa  fa-group    fa-fw"></i> Precios de Grupo</a>
										</li>                        
										<li>
											<a href="idioma.php" title="Listado de Idiomas de la Tienda"><i class="fa fa-language   fa-fw"></i> Idiomas</a>
										</li>
										<li>
											<a href="pie-lista.php" title="Confifuración del Pie de Página"><i class="fa fa-language   fa-fw"></i> Pie de página</a>
										</li>
										<li>
											<a href="impuesto-lista.php" title="Listado de Impuestos"><i class="fa fa-globe  fa-fw"></i> Impuestos</a>
										</li>
										<li>
											<a href="moneda-lista.php" title="Listado de Monedas"><i class="fa fa-bitcoin  fa-fw"></i> Monedas</a>
										</li>
                          			</ul>
                       <?php /*?> <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Flot Charts</a>
                                </li>
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li><?php */?>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>