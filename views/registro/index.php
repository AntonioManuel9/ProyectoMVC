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
				MVC - Sección Registros
			</div>
			<div class="card-body">
			<section>
                    <article>
                        <br>
                        <table class ="table">
                            <thead>
                                <tr>
                                    <?php foreach ($this->cabecera as $key => $valor): ?>
                                    <th><?=$valor?></th>
                                    <?php endforeach;?>
                                </tr>
                            </thead>	
                            <tbody>
                                    <?php foreach ($this->datos as $valor => $value):?>
                                        <tr>
                                            <td><?=$value->id?></td>
                                            <td><?=$value->etapa_id?></td>
                                            <td><?=$value->nombreP?></td>
                                            <td><?=$value->marca?></td>
                                            <td><?=$value->salida?></td>
                                            <td><?=$value->llegada?></td>
                                            <td><?=$value->tiempo?></td>
                                        </tr>
                                    <?php endforeach;?>
                            </tbody>			
                        </table>
                        <h5>El número de registros es: <?= count($this->datos);?></h4>
                    </article>
                </section>

			</div>
		</div>
    </div>

    <!-- /.container -->
    
    <?php require_once("template/partials/footer.php") ?>
	<?php require_once("template/partials/javascript.php") ?>
	
</body>

</html>