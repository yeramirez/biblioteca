<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="assets/img/if_user-group.png" alt="" width="128" height="128">
        <h2>Registro de Usuarios</h2>
      </div>
      <div class="row">
          <div class="col-3">
            <div class="list-group" id="list-tab" role="tablist">
              <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Ingresar Usuarios</a>
              <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Gestion Usuarios</a>
            </div>
          </div>
          <div class="col-8">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <form id="UserForm" class="needs-validation" autocomplete="off">
                          <div class="row">
                            <div class="col-md-6 mb-3">
                              <label>Nombres</label>
                              <input class="form-control" id="nombres" name="nombres" placeholder="Nombres" type="text" required>
                              <div class="valid-feedback">Esta bien!</div>
                              <div class="invalid-feedback">Porfavor coloque un nombre</div>
                            </div>
                            <div class="col-md-6 mb-3">
                              <label>Apellidos</label>
                              <input class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" type="text" required>
                              <div class="valid-feedback">Esta bien!</div>
                              <div class="invalid-feedback">Porfavor coloque un apellido</div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12 mb-3">
                              <label>Email</label>
                              <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                              <div class="valid-feedback">Esta bien!</div>
                              <div class="invalid-feedback">Porfavor coloque un email</div>
                            </div>
                          </div>
                            <div class="row">
                            <div class="col-md-6 mb-3">
                              <label>Password</label>
                              <input class="form-control" id="password1" name="password1" placeholder="Password" type="password" required>
                              <div class="invalid-feedback">
                                  Porfavor coloque el Password
                              </div>
                            </div>
                            <div class="col-md-6 mb-3">
                              <label>Repetir Password</label>
                              <input class="form-control" id="password2" name="password2" placeholder="Repetir Password" type="password" required>
                              <div class="invalid-feedback">
                                  El password no coincide
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label>Nota</label>
                              <textarea class="form-control" id="nota" name="nota" placeholder="Si require informacion adicional" rows="3"></textarea>
                          </div>
                          <hr class="mb-4">
                          <h4 class="mb-3">Perfil Usuario</h4>
                          <div class="form-group">
                              <select name="perfilusuario" class="custom-select" required>
                              	<option value="">Seleccionar</option>
                                  <?php
                                  foreach($dropdown_perfiles as $perfiles) {
                                      echo '<option value="'.$perfiles['id_tipo_usuario'].'">'.$perfiles['tipo_usuario'].'</option>';
                                  }
                                  ?>
  							  </select>
  							  <div class="valid-feedback">Esta bien!</div>
                               <div class="invalid-feedback">Seleccione una opcion</div>
                          </div>
                          <hr class="mb-4">
                          <h4 class="mb-3">Tipo de Usuario</h4>
                          <div class="d-block my-3">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="tipousuario" id="tipousuario" value="1" checked>
                              <label class="form-check-label">Activo</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="tipousuario" id="tipousuario2" value="2">
                              <label class="form-check-label">Inactivo</label>
                            </div>
                          </div>
                          <div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
                            <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                            <span id="message"></span>
                          </div>
                          <hr class="mb-4">
                          <button type="submit" class="btn btn-primary"><span id="logText"></span></button>
                          <button type="reset" class="btn btn-secondary">Limpiar</button>
                          <button type="reset" class="btn btn-danger">Cancelar</button>
                        </form>
                  </div>
                </div>
                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Documento</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Email</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      foreach($data as $datos_usuario) {
                          echo "<tr>";
                          echo '<td>'. $datos_usuario['nombres'] .'</td>';
                          echo '<td>'. $datos_usuario['apellidos'] .'</td>';
                          echo "</tr>";
                      }
                      ?>
                      </tbody>
                    </table>
                </div>
            </div>
          </div>
      </div>
</div>

<!--JS-->
<script src="assets/js/usuarios_view.js"></script>
<script>
  // Configuracion de envio de datos
  $(document).ready(function(){
    $('#logText').html('Guardar');
    $('#UserForm').submit(function(e){
      e.preventDefault();
      var url = '<?php echo base_url();?>';
      var user = $('#UserForm').serialize();
      var registro_usuario = function(){
        $.ajax({
          type: 'POST',
          url: url + 'Usuarios/ingreso_usuario',
          dataType: 'json',
          data: user,
          success:function(response){
            $('#message').html(response.message);
            if(response.error){
              $('#responseDiv').removeClass('alert alert-success').addClass('alert alert-danger').show();
            } else {
              $('#responseDiv').removeClass('alert alert-danger').addClass('alert alert-success').show();
              $('#UserForm')[0].reset();
            }
          }
        });
      };
      setTimeout(registro_usuario, 0);
    });
    $(document).on('click', '#clearMsg', function(){
      $('#responseDiv').hide();
    });
  });
</script>
