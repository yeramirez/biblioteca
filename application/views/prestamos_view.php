
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-3" src="assets/img/if_user-group.png" alt="" width="128" height="128">
      <h2>Prestamos</h2>
    </div>
      <div class="row">
          <div class="col-12">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <form id="UserForm" method ="POST" action="<?php echo base_url();?>Prestamos/ingreso_prestamos" class="needs-validation" autocomplete="off">
                          <div class="row">
                          </div>
                               <hr class="mb-4">
                                                     
                              <h4 class="mb-3">Seleccióne un producto</h4>
                              <div class="form-group">
                                  <select name="producto" class="custom-select" required>
                                    <option value="">Seleccionar</option>
                                      <?php
                                      foreach($datos as $tipo) {
                                          echo '<option value="'.$tipo['id_materiales'].'">'." Nombre Material : ". $tipo['nombre']."  ,   Autor  :   ".$tipo['nombre_au']."  ".$tipo['apellido']."  ,  Tipo :  ". $tipo['tipo_material']." ,  Precio :  ". $tipo['precio'].'</option>';
                                      }
                                      ?>  

                                   </select>  
                                </div>  
                                 <div class="form-group">
                                    <h4 class="mb-3">Fecha de Entrega</h4>
                                    <input class="form-control" id="fecha_entrega" name="fecha_entrega" placeholder="Fecha_entrega" type="date" required>
                                    <div class="valid-feedback">Esta bien!</div>
                                  <div class="invalid-feedback">Porfavor coloque una fecha de entrega</div>
                                
                              </div>  
                                 <div class="form-group">
                                    <h4 class="mb-3">Fecha de Devolucion</h4>
                                    <input class="form-control" id="fecha_devolucion" name="fecha_devolucion" placeholder="Fecha_devolucion" type="date" required>
                                    <div class="valid-feedback">Esta bien!</div>
                                  <div class="invalid-feedback">Porfavor coloque una fecha de devulucion</div>
                                
                              </div>                

                              <?php

                                $usuario = $this->session->userdata('logged_in');
                                extract($usuario);
                              ?>
                              <h4 class="mb-3">Usuarios</h4>
                              <div class="form-group">
                                  <select name="usuario" class="custom-select" required>
                                    <option value="">Seleccionar</option>
                                           <option value="<?php echo "$id_usuarios";?>"> <?php echo "$nombres $apellidos";?> </option>;
                                   </select>  
                                </div>                 
                                                         
                               <button  type="submit" value="enviar" class="btn btn-primary"><span id="enviar" name="enviar"> Prestar</span></button>
                          </div>
                        </form>
                  </div>

                </div>
          
            </div>
          </div>
      </div>
</div>
