<?php 
	require_once "models/etapaModel.php";
	$nuevo = new EtapaModel();
	$carreras = $nuevo->getCarreras();
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
				MVC - Sección Etapas CREATE
			</div>
			<div class="card-body">
                <?php require_once("template/etapa/form_nuevo_etapa.php")?>
			</div>
		</div>

    </div>

    <!-- /.container -->
    
    <?php require_once("template/partials/footer.php") ?>
	<?php require_once("template/partials/javascript.php") ?>
	
</body>

</html>