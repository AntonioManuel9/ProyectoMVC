<form method="POST" action="<?= URL ?>pilotos/registrar" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="inputdescrip">Nombre</label>
        <input type="text" value = "<?= $this->pilotos['nombre'] ?>" class="form-control" name="nombre" placeholder="" require>
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['nombre']))? $this->errores['nombre']:null?></small>
    </div>
    <div class="form-group">
        <label for="inputprec">Apellidos</label>
        <input type="text" value = "<?= $this->pilotos['apellidos'] ?>" class="form-control" name="apellidos" require>
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['apellidos']))? $this->errores['apellidos']:null?></small>
    </div>
    <div class="form-group">
        <label for="inputprev">Población</label>
        <input type="text" value = "<?= $this->pilotos['poblacion'] ?>" class="form-control" name="poblacion" require>
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['poblacion']))? $this->errores['poblacion']:null?></small>
    </div>
    <div class="form-group">
        <label for="inputund">DNI</label>
        <input type="number" value = "<?= $this->pilotos['dni'] ?>"class="form-control" name="dni" value="0">
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['dni']))? $this->errores['dni']:null?></small>
    </div>
    <div class="form-group">
        <label for="inputund">Fecha de Nacimiento</label>
        <input type="date" value = "<?= $this->pilotos['stock'] ?>"class="form-control" name="fechaNac">
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['fechaNac']))? $this->errores['fechaNac']:null?></small>
    </div>
    
    <div class="form-group">
      <label for="">Equipo</label>
      <select class="form-control" name="carrera" id="">
        <?php foreach($equipos as $equipo): ?>       
            <option value="<?= $equipo->id ?>"><?= $equipo->nombreE ?></option>
        <?php endforeach; ?>
      </select>
      <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['equipo_id']))? $this->errores['equipo_id']:null?></small>
    </div>		  				
    <!-- botones acción -->
    <hr>
    <a href="<?= URL ?>pilotos" class="btn btn-secondary" role="button" aria-pressed="true">Cancelar</a>
	<button type="reset" class="btn btn-secondary">Reset</button>
    <button type="submit" class="btn btn-primary" >Añadir</button>
    
</form>