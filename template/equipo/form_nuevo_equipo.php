<form method="POST" action="<?= URL ?>equipo/registrar" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="inputdescrip">Nombre</label>
        <input type="text" value = "<?= $this->equipo['numMec'] ?>" class="form-control" name="numMec" placeholder="" require>
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['numMec']))? $this->errores['numMec']:null?></small>
    </div>
    <div class="form-group">
        <label for="inputund">Número de mecánicos</label>
        <input type="number" value = "<?= $this->equipo['numMec'] ?>"class="form-control" name="numMec" value="0">
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['numMec']))? $this->errores['numMec']:null?></small>
    </div>
    			  				
    <!-- botones acción -->
    <hr>
    <a href="<?= URL ?>equipo" class="btn btn-secondary" role="button" aria-pressed="true">Cancelar</a>
	<button type="reset" class="btn btn-secondary">Reset</button>
    <button type="submit" class="btn btn-primary" >Añadir</button>
    
</form>