<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index">Inicio <span class="sr-only">(current)</span></a>
      </li>
      
      <!-- Capa Gestión perfiles -->
      <?php if (isset($_SESSION['id'])):?>
        <?php if ($_SESSION['rol_name'] != 'Registrado'):?>
          <li class="nav-item">
            <a class="nav-link" href="<?= URL ?>coche/create">Crear</a>
          </li>
        <?php endif;?>
      <?php endif;?>
     
      <!-- Fin capa gestión de perfiles -->
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ordenar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="<?= URL ?>coche/ordenar/id">id</a>
          <a class="dropdown-item" href="<?= URL ?>coche/ordenar/nombreE">Equipo</a>
          <a class="dropdown-item" href="<?= URL ?>coche/ordenar/marca">Marca</a>
          <a class="dropdown-item" href="<?= URL ?>coche/ordenar/modelo">Modelo</a>
          <a class="dropdown-item" href="<?= URL ?>coche/ordenar/cilindrada">Cilindrada</a>
        </div>
      </li>
    </ul>

      <a href="<?= URL ?>coche/imprimir_pdf"><i class="material-icons">picture_as_pdf</i></a>
    &nbsp;
    &nbsp;
    <form class="form-inline my-2 my-lg-0">
      <input name="expresion" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-light my-2 my-sm-0" formaction="<?= URL ?>coche/buscar" type="submit">Buscar</button>
    </form>
  </div>
</nav>