<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="assets/img/if_user-group.png" alt="" width="128" height="128">
    <h2>Registro de Autores</h2>
  </div>


    <div class="col-8">
        <div class="tab-content" id="nav-tabContent" >
            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                   
                    <form id="UserForm"  method ="POST" action="<?php echo base_url();?>/Autores/guardar" class="needs-validation" autocomplete="off">
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label>Nombres</label>
                          <input class="form-control" id="nombres_libro" name="nombre" placeholder="Nombres" type="text" required>
                          <div class="valid-feedback">Esta bien!</div>
                          <div class="invalid-feedback">Porfavor coloque un nombre</div>
                        </div>
                        
                      </div>
                      <div>
                      <button  type="submit" value="Enviar" class="btn btn-primary"><span id="logText"> Enviar</span></button>
                      </div>
                    </form>
              </div>
            </div>       
  					  							  
        </div>
           
      </div>

</div>