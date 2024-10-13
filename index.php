<?php require 'cfg/base.php'; 
$cusuarios->redirectLogin(); 
$rowt=$mtienda->poride($_SESSION['s_usua_tienda']); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>U.M.S.L</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="img/logo_umsl.png" type="image/x-icon">
		<?php require 'css/ace.php'; ?>
		<?php require 'js/ace.php'; ?>	
	</head>

	<body>
		<div class="bootbox modal fade in" role="dialog" id="modal"  tabindex="-1" aria-hidden="false">
			<div class="modal-dialog">
				<div class="modal-content"></div>
			</div>
		</div>	
		<div id="navbar" class="navbar navbar-default" style="background:#<?php echo $rowt[0]->empresa_bg_menu ?>">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
			
			<div class="col-sm-12" style="background:#<?php echo $rowt[0]->empresa_bg_encabezado ?>">
				<div class="clearfix"></div>
				<div class="space-2"></div>
				<img src="img/logo_umsl_1.png" align="" class="pull-left" height="80 px">	
				<h2 class="pull-left" style="padding-left:30px">
					<span class="<?php echo $rowt[0]->empresa_col_nombre ?>"><?php echo "GESTIÓN DE PACIENTES" ?></span>
					<div class="space-0"></div>
					<span class="<?php echo $rowt[0]->empresa_col_nombre ?>"><?php echo $rowt[0]->empresa_nombre ?></span>
					<span class="<?php echo $rowt[0]->empresa_col_nombre ?>"><?php echo "RIF: ".$rowt[0]->empresa_rif ?></span>
				</h2>
				<img src="img/<?php echo $rowt[0]->empresa_logo ?>" align="" class="pull-right" height="80 px">	
				<div class="clearfix"></div>
				<div class="space-1"></div>
			</div>

			<div id="navbar-container" class="navbar-container">
				<div class="navbar-header pull-left">
				</div>
			        <div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav"><?php require 'menu.php'; ?></ul>
				</div>
			</div>
		</div>
		<div id="main-container" class="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			<div class="main-container-inner">
				<div class="page-content">
					<?php require 'contenido.php'; ?>
				</div>
			</div>
			<a id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse" href="#">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div>
	</body>
</html>