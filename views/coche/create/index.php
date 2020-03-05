<?php 
	require_once "models/cocheModel.php";
	$nuevo = new CocheModel();
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
				MVC - Sección Coches CREATE
			</div>
			<div class="card-body">
                <?php require_once("template/coche/form_nuevo_coche.php")?>
			</div>
		</div>

    </div>

    <!-- /.container -->
    
    <?php require_once("template/partials/footer.php") ?>
	<?php require_once("template/partials/javascript.php") ?>
	
</body>

</html>