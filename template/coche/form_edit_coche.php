<form method="POST" action="<?= URL ?>coche/updateCoche" enctype="multipart/form-data">
    <div class="form-group">
      <input type="number"  style="display:none" class="form-control" required="required" title="id" name="id" value = "<?= $this->coche['id']; ?>" >
    </div>

    <div class="form-group">
      <label for="">Equipo</label>
      <select class="form-control" name="equipo_id" id="">
          <?php foreach($this->equipos as $key => $registro): ?>
            <option value="<?= $registro->id ?>" <?= ($this->coche['equipo_id'] == $registro->id) ? 'selected': null ?> ><?= $registro->nombreE ?></option>
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
        <input type="text" value = "<?= $this->coche['cilindrada'] ?>"class="form-control" name="cilindrada">
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['cilindrada']))? $this->errores['cilindrada']:null?></small>
    </div>		  				
    <!-- botones acción -->
    <hr>
    <a href="<?= URL ?>coche" class="btn btn-secondary" role="button" aria-pressed="true">Cancelar</a>
    <button type="submit" class="btn btn-primary" >Actualizar</button>
    <button><i class="material-icons">picture_as_pdf</i></button>
    
</form>