<form method="POST" action="<?= URL ?>registro/registrar" enctype="multipart/form-data">
    
    <!--Los siguientes inputs seran de tipo lista desplegable-->
    <div class="form-group">
        <label for="inputdescrip">Etapa</label>
        <input type="text" value = "<?= $this->registro['marca'] ?>" class="form-control" name="marca" placeholder="" require>
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['marca']))? $this->errores['marca']:null?></small>
    </div>
    <div class="form-group">
        <label for="inputund">Piloto</label>
        <input type="text" value = "<?= $this->registro['modelo'] ?>"class="form-control" name="modelo" value="0">
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['modelo']))? $this->errores['modelo']:null?></small>
    </div>
    <div class="form-group">
        <label for="inputund">Coche</label>
        <input type="number" value = "<?= $this->registro['cilindrada'] ?>"class="form-control" name="cilindrada" value="0">
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['cilindrada']))? $this->errores['cilindrada']:null?></small>
    </div>	
    <div class="form-group">
        <label for="inputund">Salida</label>
        <input type="text" value = "<?= $this->registro['salida'] ?>"class="form-control" name="salida" value="0">
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['salida']))? $this->errores['salida']:null?></small>
    </div>
    <div class="form-group">
        <label for="inputund">Llegada</label>
        <input type="text" value = "<?= $this->registro['llegada'] ?>"class="form-control" name="llegada" value="0">
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['llegada']))? $this->errores['llegada']:null?></small>
    </div>	 
    <div class="form-group">
        <label for="inputund">Tiempo</label>
        <input type="text" value = "<?= $this->registro['tiempo'] ?>"class="form-control" name="tiempo" value="0">
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['tiempo']))? $this->errores['tiempo']:null?></small>
    </div>	 				
    <!-- botones acción -->
    <hr>
    <a href="<?= URL ?>registro" class="btn btn-secondary" role="button" aria-pressed="true">Cancelar</a>
	<button type="reset" class="btn btn-secondary">Reset</button>
    <button type="submit" class="btn btn-primary" >Añadir</button>
    
</form>