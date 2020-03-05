<form method="POST" action="<?= URL ?>etapa/registrar" enctype="multipart/form-data">
    
    <!--Este div es de tipo lista desplegable-->
    <div class="form-group">
      <label for="">Carrera</label>
      <select class="form-control" name="carrera" id="">
        <?php foreach($carreras as $carrera): ?>       
            <option value="<?= $carrera->id ?>"><?= $carrera->localizacion ?></option>
        <?php endforeach; ?>
      </select>
    </div>		  				
    <!-- botones acción -->
    <hr>
    <a href="<?= URL ?>etapa" class="btn btn-secondary" role="button" aria-pressed="true">Cancelar</a>
	<button type="reset" class="btn btn-secondary">Reset</button>
    <button type="submit" class="btn btn-primary" >Añadir</button>
    
</form>