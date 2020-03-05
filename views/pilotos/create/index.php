<?php 

	require_once "models/pilotosModel.php";
	$nuevo = new pilotosModel();
	$equipos = $nuevo->getEquipos();
?>
<!doctype html>
<html lang="es"> 

<?php require_once("template/partials/head.php") ?>

<body>
    <?php require_once("template/partials/menu.php") ?>
    
    <!-- Page Content -->
    <div class="container">
	<br><br><br><br>

		<?php require_once("template/partials/mensaje.php") ?>
		

		<!-- Estilo card de bootstrap -->
		<div class="card">
            
			<div class="card-header">
				MVC - Sección Pilotos CREATE
			</div>
			<div class="card-body">
                <?php require_once("template/pilotos/form_nuevo_piloto.php")?>
			</div>
		</div>

    </div>

    <!-- /.container -->
    
    <?php require_once("template/partials/footer.php") ?>
	<?php require_once("template/partials/javascript.php") ?>
	
</body>

</html>