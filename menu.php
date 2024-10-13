<li class="<?php echo $rowt[0]->empresa_col_ele_menu ?>">
	<a href="inicio">
		<i class="fa fa-home fa-lg"></i> 
		<span class="hidden-480">Inicio</span>
	</a>
</li>
<?php foreach($musuarios->modulos($s_tius_ide) as $m): ?>
	<li class="<?php echo $rowt[0]->empresa_col_ele_menu ?>">
		<a class="dropdown-toggle" href="#" data-toggle="dropdown">
			<i class="fa fa-<?php echo $m->modu_icono; ?> fa-lg"></i> 
			<?php echo $m->modu_descrip ?>
			<i class="icon-caret-down"></i>
		</a>
		<ul class="user-menu pull-right dropdown-menu dropdown-<?php echo $rowt[0]->empresa_col_ele_menu_alt ?> dropdown-caret dropdown-close">
			<?php foreach($musuarios->submodulos($s_tius_ide,$m->modu_ide) as $s): ?>
				<li>
					<a href="?var=<?php echo base64_encode($s->sumo_ide) ?>">
						<i class="fa fa-<?php echo $s->sumo_icono; ?>"></i>
						<span class="hidden-480"><?php echo $s->sumo_descrip ?></span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</li>
<?php endforeach; ?>
<!-- Configuración de usuario -->
<li class="<?php echo $rowt[0]->empresa_col_ele_menu ?>">
	<a class="dropdown-toggle" href="#" data-toggle="dropdown">
		<img class="nav-user-photo" alt="" src="<?php echo $cusuarios->picture($s_usua_ide).'?'.rand(1,1000) ?>">
		<span class="user-info">
			<small>Hola,</small>
			<?php echo $s_usua_nombre ?>
		</span>
		<i class="icon-caret-down"></i>		
	</a>
	<ul class="user-menu pull-right dropdown-menu dropdown-<?php echo $rowt[0]->empresa_col_ele_menu_alt ?> dropdown-caret dropdown-close">
		<!--<li>
			<a href="#">
				<i class="icon-cog"></i>
					Configuración
			</a>
		</li>-->
		<li>
			<a href="?gvar=1">
				<i class="icon-user"></i>
				Perfil
			</a>
		</li>
		<li>
			<a href="?gvar=2">
				<i class="icon-exchange"></i>
				Cambiar de empresa
			</a>
		</li>
		<li class="divider"></li>
		<li>
			<a href="logout">
				<i class="icon-off"></i>
				Salir
			</a>
		</li>
	</ul>
</li>
<!-- Session Inactiva 1 Hora = 3600 Seg-->
<script> $.idle(3600, function() {window.location.href = "tiempo.php"; }); </script>