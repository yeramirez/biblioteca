<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Colegio Hogwarts</a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Home');?>">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Servicios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo site_url('Prestamos');?>">Prestamos <span class="sr-only">(current)</span></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo site_url('Reservas');?>">Reservas</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Home');?>">Devoluciones</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Administracion
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo site_url('Usuarios');?>">Usuarios <span class="sr-only">(current)</span></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Perfiles usuario</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo site_url('Materiales');?>">Materiales</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="">Consultas</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo site_url('Autores');?>">Ingresar Autor</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav px-3">
    	<li class="nav-item text-nowrap">
        <?php
  				$usuario = $this->session->userdata('logged_in');
  				extract($usuario);
		?>
    		<a class="nav-link">
          <?php echo "Hola $nombres $apellidos";?>
        </a>
    	</li>
    	<li class="nav-item text-nowrap">
          <a href="<?php echo site_url('Login/logout');?>" class="btn btn-link"> Logout</a>
      </li>
    </ul>
  </div>
</nav>
