<form method="POST" action="<?= URL ?>carrera/registrar" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="inputdescrip">Localización</label>
        <input type="text" value = "<?= $this->carrera['localizacion'] ?>" class="form-control" name="localizacion" placeholder="" require>
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['localizacion']))? $this->errores['localizacion']:null?></small>
    </div>
    <div class="form-group">
        <label for="inputund">Número de participantes</label>
        <input type="number" value = "<?= $this->carrera['participantes'] ?>"class="form-control" name="participantes" value="0">
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['participantes']))? $this->errores['participantes']:null?></small>
    </div>

    <div class="form-group">
        <label for="inputund">Fecha</label>
        <input type="date" value = "<?= $this->carrera['fecha'] ?>"class="form-control" name="fecha">
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['fecha']))? $this->errores['fecha']:null?></small>
    </div>

    <div class="form-group">
      <label for="">Pilotos</label>
      <select class="form-control" name="piloto" id="">
        <?php foreach($pilotos as $piloto): ?>       
            <option value="<?= $piloto->id ?>"><?= $piloto->nombreP ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <!-- botones acción -->
    <hr>
    <a href="<?= URL ?>carrera" class="btn btn-secondary" role="button" aria-pressed="true">Cancelar</a>
	<button type="reset" class="btn btn-secondary">Reset</button>
    <button type="submit" class="btn btn-primary" >Añadir</button>
    
</form>