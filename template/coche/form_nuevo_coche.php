<form method="POST" action="<?= URL ?>coche/registrar" enctype="multipart/form-data">
    
    <div class="form-group">
      <label for="">Equipo</label>
      <select class="form-control" name="equipo_id" id="">
        <?php foreach($equipos as $equipo): ?>       
            <option value="<?= $equipo->id ?>"><?= $equipo->nombreE ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="form-group">
        <label for="inputdescrip">Marca</label>
        <input type="text" value = "<?= $this->coche['marca'] ?>" class="form-control" name="marca" placeholder="" require>
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['marca']))? $this->errores['marca']:null?></small>
    </div>
    <div class="form-group">
        <label for="inputund">Modelo</label>
        <input type="text" value = "<?= $this->coche['modelo'] ?>"class="form-control" name="modelo">
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['modelo']))? $this->errores['modelo']:null?></small>
    </div>
    <div class="form-group">
        <label for="inputund">Cilindrada</label>
        <input type="text" value = "<?= $this->coche['cilindrada'] ?>"class="form-control" name="cilindrada" value="0">
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['cilindrada']))? $this->errores['cilindrada']:null?></small>
    </div>		  				
    <!-- botones acción -->
    <hr>
    <a href="<?= URL ?>coche" class="btn btn-secondary" role="button" aria-pressed="true">Cancelar</a>
	<button type="reset" class="btn btn-secondary">Reset</button>
    <button type="submit" class="btn btn-primary" >Añadir</button>
    
</form>