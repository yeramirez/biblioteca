<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-3" src="assets/img/if_user-group.png" alt="" width="128" height="128">
        <h2>Ingreso Material</h2>
      </div>
      <div class="row">
          
          <div class="col-12">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <form id="UserForm" method ="POST" action="<?php echo base_url();?>/Materiales/ingreso_materiales" class="needs-validation" autocomplete="off">
                          <div class="row">

                            <div class="col-md-6 mb-3">
                              <label>Codigo</label>
                              <input class="form-control" id="codigo" name="codigo" placeholder="Codigo" type="text" required>
                              <div class="valid-feedback">Esta bien!</div>
                              <div class="invalid-feedback">Porfavor coloque un codigo</div>
                            </div>

                            <div class="col-md-6 mb-3">
                              <label>Nombre</label>
                              <input class="form-control" id="nombre" name="nombre" placeholder="Nombres" type="text" required>
                              <div class="valid-feedback">Esta bien!</div>
                              <div class="invalid-feedback">Porfavor coloque un nombre</div>
                            </div>

                            <div class="col-md-6 mb-3">
                              <label>Ejemplar</label>
                              <input class="form-control" id="ejemplar" name="ejemplar" placeholder="Ejemplar" type="text" required>
                              <div class="valid-feedback">Esta bien!</div>
                              <div class="invalid-feedback">Porfavor coloque un ejemplar</div>
                            </div>
                          

                          <div class="col-md-6 mb-3">
                              <label>Cantidad</label>
                              <input class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad" type="text" required>
                              <div class="valid-feedback">Esta bien!</div>
                              <div class="invalid-feedback">Porfavor coloque una Cantidad</div>
                            </div>


                            <div class="col-md-6 mb-3">
                              <label>Precio</label>
                              <input class="form-control" id="precio" name="precio" placeholder="Precio" type="text" required>
                              <div class="valid-feedback">Esta bien!</div>
                              <div class="invalid-feedback">Porfavor coloque un Precio</div>
                            </div>

                            <div class="col-md-6 mb-3">
                              <label>Fecha Publicacion</label>
                              <input class="form-control" id="fecha_publicacion" name="fecha_publicacion" placeholder="Fecha_publicacion" type="date" required>
                              <div class="valid-feedback">Esta bien!</div>
                              <div class="invalid-feedback">Porfavor coloque una fecha de publicacion</div>
                            </div>

                             <div class="col-md-6 mb-3">
                              <label>Fecha Ingreso</label>
                              <input class="form-control" id="fecha_ingreso" name="fecha_ingreso" placeholder="Fecha_ingreso" type="date" required>
                              <div class="valid-feedback">Esta bien!</div>
                              <div class="invalid-feedback">Porfavor coloque una fecha de publicacion</div>
                            </div>
                              
                          </div>
                          <hr class="mb-4">
                          <h4 class="mb-3">Autor</h4>
                          <div class="form-group">
                              <select name="autor" class="custom-select" required>
                              	<option value="">Seleccionar</option>
                                  <?php
                                  foreach($datos as $autor) {
                                      echo '<option value="'.$autor['id_autores'].'">'.$autor['nombre'] ." ". $autor['apellido'].'</option>';
                                  }
                                  ?>  


  							               </select>
  							                                 
                          </div>
                          <hr class="mb-4">
                          <h4 class="mb-3">Editorial</h4>
                          <div class="form-group">
                              <select name="editorial" class="custom-select" required>
                                <option value="">Seleccionar</option>
                                  <?php
                                  foreach($editorial as $editoriales) {
                                       echo '<option value="'.$editoriales['id_editorial'].'">'.$editoriales['editorial'] .'</option>';
                                  }

                                  ?>
                               </select>
                                                 
                          </div>

                          <hr class="mb-4">
                          <h4 class="mb-3">Tema Libro</h4>
                          <div class="form-group">
                              <select name="tema_libro" class="custom-select" required>
                                <option value="">Seleccionar</option>
                                  <?php
                                  foreach($tema_libro as $tlibros) {
                                      echo '<option value="'.$tlibros['id_tema_libro'].'">'.$tlibros['tema_libro'].'</option>';
                                  }
                                  ?>
                               </select>
                                                 
                          </div>

                          <hr class="mb-4">
                          <h4 class="mb-3">Tipo Material</h4>
                          <div class="form-group">
                              <select name="tipo_material" class="custom-select" required>
                                <option value="">Seleccionar</option>
                                  <?php
                                  foreach($tipo_material as $materiales) {
                                     echo '<option value="'.$materiales['id_tipo_materiales'].'">'.$materiales['tipo_material'] .'</option>';
                                  }
                                  ?>
                               </select>
                                                 
                          </div>
                          <div>
                      <button  type="submit" value="Enviar" class="btn btn-primary"><span id="logText"> Registrar</span></button>
                      </div>
                        </form>
                  </div>
                </div>
          
            </div>
          </div>
      </div>
</div>

