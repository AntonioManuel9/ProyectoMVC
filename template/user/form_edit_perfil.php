<form method="POST" action="<?= URL ?>user/validar_EditPerfil" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Nombre:</label>
        <input type="text" class="form-control" required value="<?= $this->name?>" title="name" name="name">
        <small id="nameHelp" class="form-text text-muted">Nombre de usuario entre 5-50 caracteres</small>
    </div>  

    <div class="form-group">
        <label for="">Correo electrónico:</label>
        <input type="email" class="form-control" required value="<?= $this->email?>" title="email" name="email" placeholder="example@hotmail.es">
        <small id="emailHelp" class="form-text text-muted">Introduzca Email válido</small>
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['email'])) ? $this->errores['email'] : null ?></small>
    </div>
    <a class="btn btn-danger" href="<?= URL ?>coche" value="Cancelar">Cancelar</a>
    <button type="submit" class="btn btn-primary">Modificar</button>
</form>