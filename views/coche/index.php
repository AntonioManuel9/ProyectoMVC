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
				MVC - Sección Coches
			</div>
			<div class="card-body">
			<section>
                    <article>
                        <?php require_once("template/coche/menubar.php")?>
                        <br>
                        <table class ="table">
                            <thead>
                                <tr>
                                    <?php foreach ($this->cabecera as $key => $valor): ?>
                                    <th><?=$valor?></th>
                                    <?php endforeach;?>
                                    <?php if (isset($_SESSION['id'])):?>
                                        <th>
                                            Acciones
                                        </th>
                                    <?php endif;?>
                                </tr>
                            </thead>	
                            <tbody>
                                    <?php foreach ($this->datos as $registro => $value):?>
                                        <tr>
                                            <td><?=$value->id?></td>
                                            <td><?=$value->nombreEquipo?></td>
                                            <td><?=$value->marca?></td>
                                            <td><?=$value->modelo?></td>
                                            <td><?=$value->cilindrada?></td>
                                            <td>
                                                <?php if (isset($_SESSION['id'])):?>
                                                    <?php  if ($_SESSION['rol_name'] == "Registrado"):?>
                                                        <a href="<?= URL ?>coche/show/<?=$value->id?>" title="Visualizar"><i class="material-icons">visibility</i></a>
                                                    <?php endif;?>
                                                    <?php  if ($_SESSION['rol_name'] == "Editor"):?>
                                                        <a href="<?= URL ?>coche/edit/<?=$value->id?>" title="Editar"><i class="material-icons">edit</i></a>
                                                        <a href="<?= URL ?>coche/show/<?=$value->id?>" title="Visualizar"><i class="material-icons">visibility</i></a>
                                                    <?php endif;?>
                                                    <?php  if ($_SESSION['rol_name'] == "Administrador"):?>
                                                        <a href="<?= URL ?>coche/edit/<?=$value->id?>" title="Editar"><i class="material-icons">edit</i></a>
                                                        <a href="<?= URL ?>coche/show/<?=$value->id?>" title="Visualizar"><i class="material-icons">visibility</i></a>
                                                        <a href="<?= URL ?>coche/delete/<?=$value->id?>" title="Eliminar"><i class="material-icons">clear</i></a>
                                                    <?php endif;?>
                                                <?php endif;?>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                            </tbody>			
                        </table>
                        <h5>El número de coches es: <?= count($this->datos);?></h4>
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